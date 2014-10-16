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
    $this->addSimpleMappings(array('title', 'created', 'field_article_category', 'field_community_user_select', 'field_article_subheader'));

    $this->addFieldMapping('field_body', 'bodytext');
    $this->addFieldMapping('field_body:format')
         ->defaultValue($this->inputFormat->format);

    $this->addFieldMapping('migrate_redirects', 'old_url');

    // unmigrated sources
    $this->addUnmigratedSources(array('priorityranking', 'enddate', 'concurrencycol'));

    // Unmapped destination fields
    $this->addUnmigratedDestinations(array('is_new', 'changed',
      'promote', 'revision', 'language', 'revision_uid', 'log', 'tnid',
      'comment', 'field_images', 'field_tags', 'og_group_ref', 'field_medium'));
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

      // topic in the form of {'Feature', 'Reviews'}
      $row->topic = str_replace(array('{', '}'), '', $row->topic);
      $topics = explode(',', $row->topic);
      foreach($topics as $key => $value) {
        $topic = trim($value);
        if (isset($category[$topic])) {
          $row->field_article_category = $category[$topic];
        }
        if (isset($community[$topic])) {
          $row->field_community_user_select = $communities[$community[$topic]];
        }
      }
    }

    return TRUE;
  }
}
