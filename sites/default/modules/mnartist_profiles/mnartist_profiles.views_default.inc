<?php
/**
 * @file
 * mnartist_profiles.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function mnartist_profiles_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'artist_artworks';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Artist Artworks';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Artist Artworks';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['default_field_elements'] = FALSE;
  /* Field: Content: Artwork */
  $handler->display->display_options['fields']['field_media']['id'] = 'field_media';
  $handler->display->display_options['fields']['field_media']['table'] = 'field_data_field_media';
  $handler->display->display_options['fields']['field_media']['field'] = 'field_media';
  $handler->display->display_options['fields']['field_media']['label'] = '';
  $handler->display->display_options['fields']['field_media']['alter']['path'] = 'http://google.com';
  $handler->display->display_options['fields']['field_media']['alter']['external'] = TRUE;
  $handler->display->display_options['fields']['field_media']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_media']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_media']['type'] = 'file_rendered';
  $handler->display->display_options['fields']['field_media']['settings'] = array(
    'file_view_mode' => 'full',
  );
  $handler->display->display_options['fields']['field_media']['delta_limit'] = '1';
  $handler->display->display_options['fields']['field_media']['delta_offset'] = '0';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_wrapper_type'] = 'div';
  $handler->display->display_options['fields']['title']['element_wrapper_class'] = 'title';
  /* Field: Content: Medium or Genre */
  $handler->display->display_options['fields']['field_medium3']['id'] = 'field_medium3';
  $handler->display->display_options['fields']['field_medium3']['table'] = 'field_data_field_medium3';
  $handler->display->display_options['fields']['field_medium3']['field'] = 'field_medium3';
  $handler->display->display_options['fields']['field_medium3']['label'] = '';
  $handler->display->display_options['fields']['field_medium3']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_medium3']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_medium3']['delta_offset'] = '0';
  /* Field: Content: Dimensions/Duration */
  $handler->display->display_options['fields']['field_dimensions']['id'] = 'field_dimensions';
  $handler->display->display_options['fields']['field_dimensions']['table'] = 'field_data_field_dimensions';
  $handler->display->display_options['fields']['field_dimensions']['field'] = 'field_dimensions';
  $handler->display->display_options['fields']['field_dimensions']['label'] = '';
  $handler->display->display_options['fields']['field_dimensions']['element_type'] = 'div';
  $handler->display->display_options['fields']['field_dimensions']['element_class'] = 'dimensions';
  $handler->display->display_options['fields']['field_dimensions']['element_label_colon'] = FALSE;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['element_type'] = 'div';
  $handler->display->display_options['fields']['body']['element_class'] = 'description';
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['body']['settings'] = array(
    'trim_length' => '200',
  );
  $handler->display->display_options['fields']['body']['field_api_classes'] = TRUE;
  /* Field: Content: Artwork */
  $handler->display->display_options['fields']['field_media_1']['id'] = 'field_media_1';
  $handler->display->display_options['fields']['field_media_1']['table'] = 'field_data_field_media';
  $handler->display->display_options['fields']['field_media_1']['field'] = 'field_media';
  $handler->display->display_options['fields']['field_media_1']['label'] = '';
  $handler->display->display_options['fields']['field_media_1']['alter']['path'] = 'http://www.google.com';
  $handler->display->display_options['fields']['field_media_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_media_1']['element_wrapper_class'] = '[field_media_1-display]';
  $handler->display->display_options['fields']['field_media_1']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_media_1']['type'] = 'file_rendered';
  $handler->display->display_options['fields']['field_media_1']['settings'] = array(
    'file_view_mode' => 'preview',
  );
  $handler->display->display_options['fields']['field_media_1']['delta_limit'] = '1';
  $handler->display->display_options['fields']['field_media_1']['delta_offset'] = '0';
  /* Field: Content: Created Date */
  $handler->display->display_options['fields']['field_created_date']['id'] = 'field_created_date';
  $handler->display->display_options['fields']['field_created_date']['table'] = 'field_data_field_created_date';
  $handler->display->display_options['fields']['field_created_date']['field'] = 'field_created_date';
  $handler->display->display_options['fields']['field_created_date']['label'] = '';
  $handler->display->display_options['fields']['field_created_date']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_created_date']['click_sort_column'] = 'timestamp';
  $handler->display->display_options['fields']['field_created_date']['settings'] = array(
    'use_override' => 'none',
    'format' => 'custom',
    'component_settings' => array(
      'meridiem' => 'a',
      'year_designation' => 'ce',
      'display' => array(
        'year' => 'date_only',
        'month' => 'none',
        'day' => 'none',
        'hour' => 'none',
        'minute' => 'none',
        'second' => 'none',
        'timezone' => 'none',
      ),
      'separator' => array(
        'date' => ' ',
        'time' => ':',
        'datetime' => ' ',
        'other' => ' ',
        'range' => '',
      ),
      'components' => array(
        'year' => array(
          'format' => 'Y',
          'empty' => '',
          'weight' => '0',
        ),
        'month' => array(
          'format' => 'M',
          'empty' => '',
          'weight' => '1',
        ),
        'day' => array(
          'format' => 'j-S',
          'empty' => '',
          'weight' => '2',
        ),
        'hour' => array(
          'format' => 'h',
          'empty' => '',
          'weight' => '3',
        ),
        'minute' => array(
          'format' => 'i',
          'empty' => '',
          'weight' => '4',
        ),
        'second' => array(
          'format' => 's',
          'empty' => '',
          'weight' => '5',
        ),
        'timezone' => array(
          'format' => 'T',
          'empty' => '',
          'weight' => '6',
        ),
        'c1' => array(
          'value' => '',
          'weight' => '7',
        ),
        'c2' => array(
          'value' => '',
          'weight' => '8',
        ),
        'c3' => array(
          'value' => '',
          'weight' => '9',
        ),
        'approx' => array(
          'value' => '',
          'weight' => '-1',
        ),
      ),
    ),
  );
  /* Field: Content: Path */
  $handler->display->display_options['fields']['path']['id'] = 'path';
  $handler->display->display_options['fields']['path']['table'] = 'node';
  $handler->display->display_options['fields']['path']['field'] = 'path';
  $handler->display->display_options['fields']['path']['label'] = '';
  $handler->display->display_options['fields']['path']['exclude'] = TRUE;
  $handler->display->display_options['fields']['path']['element_label_colon'] = FALSE;
  /* Field: Content: Nid */
  $handler->display->display_options['fields']['nid']['id'] = 'nid';
  $handler->display->display_options['fields']['nid']['table'] = 'node';
  $handler->display->display_options['fields']['nid']['field'] = 'nid';
  $handler->display->display_options['fields']['nid']['label'] = '';
  $handler->display->display_options['fields']['nid']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['nid']['link_to_node'] = TRUE;
  /* Contextual filter: Content: Author uid */
  $handler->display->display_options['arguments']['uid']['id'] = 'uid';
  $handler->display->display_options['arguments']['uid']['table'] = 'node';
  $handler->display->display_options['arguments']['uid']['field'] = 'uid';
  $handler->display->display_options['arguments']['uid']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['uid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['uid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['uid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['uid']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'artwork' => 'artwork',
  );
  /* Filter criterion: Content: Public (field_public) */
  $handler->display->display_options['filters']['field_public_value']['id'] = 'field_public_value';
  $handler->display->display_options['filters']['field_public_value']['table'] = 'field_data_field_public';
  $handler->display->display_options['filters']['field_public_value']['field'] = 'field_public_value';
  $handler->display->display_options['filters']['field_public_value']['value'] = array(
    1 => '1',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'artist/artworks';

  /* Display: Slideshow */
  $handler = $view->new_display('block', 'Slideshow', 'block_1');
  $export['artist_artworks'] = $view;

  $view = new view();
  $view->name = 'artists';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Artists';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'access user profiles';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Relationship: User: Profile */
  $handler->display->display_options['relationships']['profile']['id'] = 'profile';
  $handler->display->display_options['relationships']['profile']['table'] = 'users';
  $handler->display->display_options['relationships']['profile']['field'] = 'profile';
  $handler->display->display_options['relationships']['profile']['bundle_types'] = array(
    'main' => 'main',
  );
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Field: User: Picture */
  $handler->display->display_options['fields']['picture']['id'] = 'picture';
  $handler->display->display_options['fields']['picture']['table'] = 'users';
  $handler->display->display_options['fields']['picture']['field'] = 'picture';
  $handler->display->display_options['fields']['picture']['label'] = '';
  $handler->display->display_options['fields']['picture']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['picture']['image_style'] = 'thumbnail';
  /* Field: Profile: Bio */
  $handler->display->display_options['fields']['field_bio']['id'] = 'field_bio';
  $handler->display->display_options['fields']['field_bio']['table'] = 'field_data_field_bio';
  $handler->display->display_options['fields']['field_bio']['field'] = 'field_bio';
  $handler->display->display_options['fields']['field_bio']['relationship'] = 'profile';
  $handler->display->display_options['fields']['field_bio']['label'] = '';
  $handler->display->display_options['fields']['field_bio']['element_label_colon'] = FALSE;
  /* Field: User: Link */
  $handler->display->display_options['fields']['view_user']['id'] = 'view_user';
  $handler->display->display_options['fields']['view_user']['table'] = 'users';
  $handler->display->display_options['fields']['view_user']['field'] = 'view_user';
  $handler->display->display_options['fields']['view_user']['label'] = '';
  $handler->display->display_options['fields']['view_user']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['view_user']['text'] = 'More';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: User: Roles */
  $handler->display->display_options['filters']['rid']['id'] = 'rid';
  $handler->display->display_options['filters']['rid']['table'] = 'users_roles';
  $handler->display->display_options['filters']['rid']['field'] = 'rid';
  $handler->display->display_options['filters']['rid']['value'] = array(
    4 => '4',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'artists';
  $handler->display->display_options['menu']['type'] = 'normal';
  $handler->display->display_options['menu']['title'] = 'Browse Artists';
  $handler->display->display_options['menu']['weight'] = '0';
  $handler->display->display_options['menu']['name'] = 'main-menu';
  $handler->display->display_options['menu']['context'] = 0;
  $export['artists'] = $view;

  return $export;
}
