<?php

/**
 * @file
 * MNArtists Opportunity migration.
 *
 */

class MNOpportunityMigration extends MNArtistsMigration {
  public function __construct() {
    parent::__construct();
    $this->description = t('MNArtists opportunity migration.');

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

    // select
    // array_agg(tr.title) as topic,
    // (array_agg(ar.title))[1] as title,
    // a.*
    // from t_article a
    // join t_resource ar on ar.id=a.resourceid
    // join t_resource_child rc on rc.childid=ar.id
    // join t_resource tr on tr.id=rc.parentid
    // where
    // tr.title IN ('Current News | Opportunities ')
    // AND
    // ((extract(year from a.enddate) = 2014 AND extract(month from a.enddate) >= 10) OR (extract(year from a.enddate) = 2015))
    // AND
    // rc.parentid in (
    // select childid from t_resource_child where parentid in (
    // select r.id from t_resource r
    // join t_resourcetype ty on ty.id = r.resourcetype
    // where (ty.name = 'Resource Genre')
    // and (r.title = 'News | Opportunities' or r.title = 'Opportunities and Deadlines')
    // )
    // )
    // group by a.resourceid;

    $subquery1 = Database::getConnection('default', 'migration')
      ->select('t_resource', 'r');
    $subquery1->fields('r', array('id'));
    $subquery1->join('t_resourcetype', 'ty', 'ty.id = r.resourcetype');
    $subquery1->condition('ty.name', 'Resource Genre', '=');
    $subquery1->condition('r.title', array('News | Opportunities', 'Opportunities and Deadlines'), 'IN');

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
    $query->condition('tr.title', 'Current News | Opportunities ', '=');
    $query->where('((extract(year from a.enddate) = 2014 AND extract(month from a.enddate) >= 10) OR (extract(year from a.enddate) = 2015))');
    $query->condition('rc.parentid', $subquery2, 'IN');
    $query->groupBy('a.resourceid');
    $query->addExpression('array_agg(tr.title)', 'topic');
    $query->addExpression('(array_agg(ar.title))[1]', 'title');

    $this->source = new MigrateSourceSQL($query, array(), NULL, array('map_joinable' => FALSE));
    $this->destination = new MigrateDestinationNode('opportunity');

    // hardcode author to user info@mnartists.org (uid: 492) and published
    $this->addFieldMapping('uid')
         ->defaultValue(492);
    $this->addFieldMapping('status')
         ->defaultValue(1);

    // simple mapping or these are mapped in prepareRow
    $this->addSimpleMappings(array('created', 'field_op_type'));

    $this->addFieldMapping('title', 'subhead');

    $this->addFieldMapping('body', 'bodytext');
    $this->addFieldMapping('body:format')
         ->defaultValue($this->inputFormat->format);

    $this->addFieldMapping('og_group_ref', 'community_cat')
         ->separator(',');

    $this->addFieldMapping('field_announce_date', 'startdate');
    $this->addFieldMapping('op_dates', 'op_dates');

    $this->addFieldMapping('migrate_redirects', 'old_url');

    // unmigrated sources
    $this->addUnmigratedSources(array('topic', 'priorityranking', 'concurrencycol'));

    // Unmapped destination fields
    $this->addUnmigratedDestinations(array('is_new', 'changed',
      'promote', 'revision', 'language', 'revision_uid', 'log', 'tnid',
      'comment', 'op_cover_image', 'field_tags', 'op_short_description', 'field_medium'));
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
    if (isset($row->enddate)) {
      $date_data = array(
        'from' => $row->startdate,
        'to' => $row->enddate,
        // 'from' => date('Y-m-d H:i', strtotime($row->startdate)),
        // 'to' => date('Y-m-d H:i', strtotime($row->enddate)),
      );
      $row->op_dates = drupal_json_encode($date_data);
    }
    else {
      // can't import item without enddate
      return FALSE;
    }

    if (isset($row->subhead)) {
      $row->subhead = trim(strip_tags($row->subhead));
    }
    if (isset($row->bodytext)) {
      $row->bodytext = str_replace(array('<b>', '</b>', '<i>', '</i>'), array('<strong>', '</strong>', '<em>', '</em>'), $row->bodytext);
    }
    if (isset($row->title)) {
      // row NOT to import
      $exclusion = array('How to submit News & Events');

      if (in_array($row->title, $exclusion)) {
        return FALSE;
      }

      // prepare communities og mapping
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

      // for match by keywords
      $keywords = array(
        'volunteer' => 'Participate',
        'call' => 'Call for Artists',
        'casting' => 'Call for Artists',
        'performance' => 'Call for Artists',
        'job' => 'Job',
        'grant' => 'Grant/Fellowship',
        'fellowship' => 'Grant/Fellowship',
        'space' => 'Space',
        'beta' => 'Participate',
      );
      $keywords_og = array(
        'casting' => 'Performing Arts',
        'performance' => 'Performing Arts',
      );

      $category = array(
        'Audition Opportunity' => 'Call for Artists',
        'Board Opportunity' => 'Jobs',
        'Film Festival Opportunity' => 'Call for Artists',
        'Internship Opportunity' => 'Job',
        'Join the The Liberty Parade!' => 'Participate',
        'Professional Development Opportunity' => 'Job',
        'Residency Opportunity' => 'Call for Artists',
        'Survey Opportunity' => 'Participate',
        'Teaching Opportunity' => 'Job',
        'Training Opportunity' => 'Job',
        'Youth Program Opportunity' => 'Participate',
      );
      $category_og = array(
        'Audition Opportunity' => 'Performing Arts',
        'Film Festival Opportunity' => 'Media Arts',
      );

      // topic in the form of {"Feature", "Reviews"}
      $op_type = str_replace(array('{', '}'), '', $row->title);
      $op_types = explode(',', $op_type);

      $communities_cat = array();

      foreach($op_types as $key => $value) {
        $op = trim(str_replace('"', '', $value));

        // keyword case insensitive match
        foreach ($keywords as $key => $value) {
          if (stristr($op, $key)) {
            $row->field_op_type = $value;

            // keyword OG match
            if (isset($keywords_og[$key])) {
              $communities_cat[] = $communities[$keywords_og[$key]];
            }
          }
        }

        // hardcoded category match
        if (isset($category[$op]) && empty($row->field_op_type)) {
          $row->field_op_type = $category[$op];
        }

        // community OG match
        if (isset($category_og[$op])) {
          $communities_cat[] = $communities[$category_og[$op]];
        }
      }
      if (!empty($communities_cat)) {
        $row->community_cat = implode(',', $communities_cat);
      }
    }

    return TRUE;
  }
}
