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
    $query->condition('tr.title', array('Old News', 'Old Opportunities and Deadlines'), 'NOT IN');
    $query->condition('rc.parentid', $subquery2, 'IN');
    $query->groupBy('a.resourceid');
    $query->addExpression('array_agg(tr.title)', 'topic');
    $query->addExpression('(array_agg(ar.title))[1]', 'title');
    // $query->range(0,50);

    $this->source = new MigrateSourceSQL($query, array(), NULL, array('map_joinable' => FALSE));
    $this->destination = new MigrateDestinationNode('opportunity');

    // hardcode author to user 1 and published
    $this->addFieldMapping('uid')
         ->defaultValue(1);
    $this->addFieldMapping('status')
         ->defaultValue(1);

    // simple mapping or these are mapped in prepareRow
    $this->addSimpleMappings(array('title', 'created', 'field_op_type', 'op_short_description'));

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
      $row->op_short_description = trim(strip_tags($row->subhead));
    }
    if (isset($row->topic)) {
      $category = array(
        'Call for Artists' => 'Call for Artists',
        'Grant/Fellowship' => 'Grant/Fellowship',
        'Job' => 'Job',
        'Participate' => 'Participate',
        'Space' => 'Space',
      );

      // topic in the form of {'Feature', 'Reviews'}
      $row->topic = str_replace(array('{', '}'), '', $row->topic);
      $topics = explode(',', $row->topic);
      foreach($topics as $key => $value) {
        $topic = trim($value);
        if (isset($category[$topic])) {
          $row->field_op_type = $category[$topic];
        }
      }
    }

    return TRUE;
  }
}
