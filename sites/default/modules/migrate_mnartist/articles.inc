<?php

/**
 * @file
 * MNArtists article migration.
 *
 */

/**
 * Abstract intermediate class holding common settings.
 */
abstract class MNArtistsMigration extends Migration {
  public $inputFormat;

  public function __construct() {
    parent::__construct();

    $this->team = array(
      new MigrateTeamMember('Chin Kiong, Ng', 'ck@origineight.net', t('Developer')),
    );
    $this->issuePattern = 'http://drupal.org/node/:id:';

    // Filtered HTML
    $this->inputFormat = filter_format_load('filtered_html');

    // We can do shared field mappings in the common class
    if (module_exists('path')) {
      $this->addFieldMapping('path')
           ->issueGroup(t('DNM'));
      if (module_exists('pathauto')) {
        $this->addFieldMapping('pathauto')
             ->issueGroup(t('DNM'));
      }
    }
  }
}

class MNArticleMigration extends MNArtistsMigration {
  public function __construct() {
    parent::__construct();
    $this->description = t('MNArtists article migration.');

    // Article HTML input format
    $this->inputFormat = filter_format_load('filtered_html_b');

    $this->map = new MigrateSQLMap($this->machineName,
      array(
        'resourceid' => array(
          'type' => 'int',
          'unsigned' => TRUE,
          'not null' => TRUE,
        )
      ),
      MigrateDestinationNode::getKeySchema(),
      'migration'
    );

    $subquery1 = Database::getConnection('default', 'migration')
      ->select('t_resource', 'r');
    $subquery1->fields('r', array('id'));
    $subquery1->join('t_resourcetype', 'ty', 'ty.id = r.resourcetype');
    $subquery1->condition('ty.name', 'Resource Genre', '=');
    $subquery1->condition('r.title', array('Articles', 'Articles by Discipline'), 'IN');

    $subquery2 = Database::getConnection('default', 'migration')
      ->select('t_resource_child', 'rc');
    $subquery2->fields('rc', array('childid'));
    $subquery2->condition('rc.parentid', $subquery1, 'IN');

    $query = Database::getConnection('default', 'migration')
      ->select('t_article', 'a');
    $query->join('t_resource', 'ar', 'ar.id = a.resourceid');
    $query->join('t_resource_child', 'rc', 'rc.childid = ar.id');
    $query->join('t_resource', 'tr', 'tr.id = rc.parentid');
    $query->fields('a');
    $query->condition('rc.parentid', $subquery2, 'IN');
    $query->groupBy('a.resourceid');
    $query->addExpression('array_agg(tr.title)', 'topic');
    $query->addExpression('(array_agg(ar.title))[1]', 'title');
    // $query->range(0,50);

    $this->source = new MigrateSourceSQL($query, array(), NULL, array('map_joinable' => FALSE));
    $this->destination = new MigrateDestinationNode('article');

    // hardcode author to user info@mnartists.org (uid: 492) and published
    $this->addFieldMapping('uid')
         ->defaultValue(492);
    $this->addFieldMapping('status')
         ->defaultValue(1);

    // simple mapping or these are mapped in prepareRow
    $this->addSimpleMappings(array('title', 'created', 'field_article_category', 'field_article_subheader'));

    // map to both Community and Group Audience fields
    $this->addFieldMapping('field_community_user_select', 'community_cat')
         ->separator(',');
    $this->addFieldMapping('og_group_ref', 'community_cat')
         ->separator(',');

    $this->addFieldMapping('field_body', 'bodytext');
    $this->addFieldMapping('field_body:format')
         ->defaultValue($this->inputFormat->format);

    $this->addFieldMapping('migrate_redirects', 'old_url');

    // images
    $this->addFieldMapping('field_images', 'images_uri');
    $this->addFieldMapping('field_images:alt', 'images_alt');
    $this->addFieldMapping('field_images:title', 'images_title');

    $this->addFieldMapping('field_images:type')
         ->defaultValue('form');
    $this->addFieldMapping('field_images:file_class')
         ->defaultValue('MigrateFileUri');
    // We only want the filename and not retaining the old directory structure,
    // so don't set the 'destination_file'
    $this->addFieldMapping('field_images:destination_dir')
         ->defaultValue(variable_get('file_default_scheme', 'public') . '://article/images');
    $this->addFieldMapping('field_images:file_replace')
         ->defaultValue(MigrateFile::FILE_EXISTS_REUSE);
    $this->addFieldMapping('field_images:preserve_files')
         ->defaultValue(FALSE);

    // unmigrated sources
    $this->addUnmigratedSources(array('priorityranking', 'enddate', 'concurrencycol'));

    // Unmapped destination fields
    $this->addUnmigratedDestinations(array('is_new', 'changed',
      'promote', 'revision', 'language', 'revision_uid', 'log', 'tnid',
      'comment', 'field_tags', 'field_medium'));
    if (module_exists('statistics')) {
      $this->addUnmigratedDestinations(array('totalcount', 'daycount', 'timestamp'));
    }
  }

  public function prepareRow($row) {
    // Always include this fragment at the beginning of every prepareRow()
    // implementation, so parent classes can ignore rows.
    if (parent::prepareRow($row) === FALSE) {
      return FALSE;
    }

    if (isset($row->resourceid)) {
      $row->old_url = 'article.do?rid=' . $row->resourceid;

      // load media
      $this->get_resource_files($row);
    }
    else {
      return FALSE;
    }

    if (isset($row->startdate)) {
      $row->created = strtotime($row->startdate);
    }
    if (isset($row->title)) {
      $row->title = trim(strip_tags($row->title));
    }
    if (isset($row->subhead)) {
      $row->field_article_subheader = trim(strip_tags($row->subhead));
    }
    if (isset($row->topic)) {
      $category = array(
        'Ampers' => 'Feature',
        'Art on the Wall' => 'Profile',
        'ARTmn | The Precious Object' => 'Feature',
        'Behind the Scenes' => 'Scene',
        'Exchange' => 'Feature',
        'Featured Artist' => 'Profile',
        'Features' => 'Feature',
        'Fringe Shorts' => 'Review',
        'In Performance' => 'Review',
        'In the Galleries' => 'Review',
        'Interviews' => 'Profile',
        'miniStories' => 'Feature',
        'Mix Tape: Minnesota Music' => 'Review',
        'MN FashionFLASH' => 'Feature',
        'mnSpin' => 'Feature',
        'Outland' => 'Feature',
        'Pangaea Station' => 'Feature',
        'Podcast: Minnesota Stories presents: mnartists' => 'Scene',
        'Podcast: Radio mnartists' => 'Scene',
        'Podcast: Some Assembly Required' => 'Feature',
        'Podcast: What\'s So Funny?' => 'Feature',
        'Podcast: You Are Hear' => 'Feature',
        'Reviews' => 'Review',
        'The Column' => 'Feature',
        'The Look of Things' => 'Feature',
        'Thinking Souls: A Literary Series' => 'Feature',
        'What Light Poetry Project' => 'Feature',
        'Work of Art' => 'Scene',
      );
      $community = array(
        'Ampers' => 'Media Arts',
        'Art on the Wall' => 'Visual Arts',
        'ARTmn | The Precious Object' => 'Visual Arts',
        'Design & Architecture' => 'Design & Architecture',
        'Fringe Shorts' => 'Performing Arts',
        'In Performance' => 'Performing Arts',
        'In the Galleries' => 'Visual Arts',
        'Interviews' => 'Visual Arts',
        'Literary Arts' => 'Literary Arts',
        'Media Arts' => 'Media Arts',
        'miniStories' => 'Literary Arts',
        'Mix Tape: Minnesota Music' => 'Performing Arts',
        'MN FashionFLASH' => 'Design & Architecture',
        'mnSpin' => 'Performing Arts',
        'Pangaea Station' => 'Media Arts',
        'Performing Arts' => 'Performing Arts',
        'Podcast: Minnesota Stories presents: mnartists' => 'Literary Arts',
        'Podcast: Radio mnartists' => 'Media Arts',
        'Podcast: Some Assembly Required' => 'Media Arts',
        'Podcast: What\'s So Funny?' => 'Performing Arts',
        'Podcast: You Are Hear' => 'Literary Arts',
        'The Look of Things' => 'Design & Architecture',
        'Thinking Souls: A Literary Series' => 'Literary Arts',
        'Visual Arts' => 'Visual Arts',
        'What Light Poetry Project' => 'Literary Arts',
      );

      $communities = &drupal_static(__FUNCTION__);

      if (!isset($communities)) {
        $query = new EntityFieldQuery();
        $query->entityCondition('entity_type', 'node')
          ->entityCondition('bundle', 'community')
          ->propertyCondition('status', 1);
        $result = $query->execute();
        if (isset($result['node'])) {
          $community_nids = array_keys($result['node']);
          $communities_nodes = entity_load('node', $community_nids);
        }
        $communities = array();
        foreach ($communities_nodes as $nid => $node) {
          $communities[$node->title] = $nid;
        }
      }

      // topic in the form of {"Feature", "Reviews"}
      $row->topic = str_replace(array('{', '}'), '', $row->topic);
      $topics = explode(',', $row->topic);

      $communities_cat = array();

      foreach($topics as $key => $value) {
        $topic = trim(str_replace('"', '', $value));
        // will only take the first mapped article_category
        if (isset($category[$topic]) && empty($row->field_article_category)) {
          $row->field_article_category = $category[$topic];
        }
        if (isset($community[$topic])) {
          $communities_cat[] = $communities[$community[$topic]];
        }
      }
      if (!empty($communities_cat)) {
        $row->community_cat = implode(',', $communities_cat);
      }
    }

    return TRUE;
  }

  public function complete($entity, stdClass $row) {
    // Save image caption
    if (isset($row->images_caption)) {
      $input_format = filter_format_load('filtered_html');
      $table_name = 'field_image_field_caption';
      $revision_name = 'field_image_field_caption_revision';

      foreach ($row->images_caption as $delta => $caption) {
        if (!empty($caption)) {
          $record = array(
            'field_name' => 'field_images',
            'entity_type' => 'node',
            'bundle' => 'article',
            'entity_id' => $entity->nid,
            'revision_id' => $entity->vid,
            'language' => LANGUAGE_NONE,
            'delta' => $delta,
            'caption' => $caption,
            'caption_format' => $input_format->format,
          );
          // dpm($caption);
          // dpm($record);

          // @TODO: all versions not working, all columns work fine except
          // the caption and caption_format are inserted as NULL
          drupal_write_record($table_name, $record);
          drupal_write_record($revision_name, $record);

          // db_insert($table_name)->fields($record)->execute();
          // db_insert($revision_name)->fields($record)->execute();

          // db_query("INSERT INTO {$table_name} (field_name, entity_type, bundle, entity_id, revision_id, language, delta, caption, caption_format) VALUES (%s, %s, %s, %d, %d, %s, %d, %s, %s)", 'field_images', 'node', 'article', $entity->nid, $entity->vid, LANGUAGE_NONE, $delta, $caption, $input_format->format);
          // db_query("INSERT INTO {$revision_name} (field_name, entity_type, bundle, entity_id, revision_id, language, delta, caption, caption_format) VALUES (%s, %s, %s, %d, %d, %s, %d, %s, %s)", 'field_images', 'node', 'article', $entity->nid, $entity->vid, LANGUAGE_NONE, $delta, $caption, $input_format->format);
        }
      }
    }
  }

  protected function get_resource_files(&$row) {
    $query = Database::getConnection('default', 'migration')
      ->select('t_resource_file', 'rf');
    $query->innerJoin('t_mediafile', 'f', 'rf.fileid = f.id');
    $query->fields('f');
    $query->condition('rf.resourceid', $row->resourceid, '=');
    $files = $query->execute()->fetchAll();

    $row->images_uri = array();
    $row->images_caption = array();
    $row->images_alt = array();
    $row->images_title = array();
    // $row->images_preserve_files = array();
    // $row->images_file_replace = array();

    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if (!empty($files)) {
      foreach ($files as $key => $value) {
        $ext = substr(strrchr($value->filename, '.'), 1);
        if (in_array($ext, $allowed)) {
          $path = (strrpos($value->filepath, '/') === strlen($value->filepath) - 1) ? $value->filepath : $value->filepath . '/';
          $row->images_uri[] = 'http://mnartists.org' . $path . $value->filename;
          $row->images_caption[] = trim(strip_tags($value->description));
          $row->images_alt[] = trim(strip_tags($value->title));
          $row->images_title[] = trim(strip_tags($value->title));
          // $row->images_preserve_files[] = FALSE;
          // $row->images_file_replace[] = MigrateFile::FILE_EXISTS_REUSE;
        }
      }
    }
  }
}
