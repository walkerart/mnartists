<?php 


$options['db_type'] = 'mysql';
$options['db_host'] = '72.14.187.109';
$options['db_port'] = '3306';
$options['db_passwd'] = 'jpgzZEQdid';
$options['db_name'] = 'mnartistsorg';
$options['db_user'] = 'mnartistsorg';
$options['installed'] = true;
$options['packages'] = array (
  'platforms' => 
  array (
    'drupal' => 
    array (
      'short_name' => 'drupal',
      'version' => '7.22',
      'description' => 'This platform is running Drupal 7.22',
    ),
  ),
  'profiles' => 
  array (
    'standard' => 
    array (
      'name' => 'standard',
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/profiles/standard/standard.profile',
      'project' => 'drupal',
      'info' => 
      array (
        'name' => 'Standard',
        'description' => 'Install with commonly used features pre-configured.',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'block',
          1 => 'color',
          2 => 'comment',
          3 => 'contextual',
          4 => 'dashboard',
          5 => 'help',
          6 => 'image',
          7 => 'list',
          8 => 'menu',
          9 => 'number',
          10 => 'options',
          11 => 'path',
          12 => 'taxonomy',
          13 => 'dblog',
          14 => 'search',
          15 => 'shortcut',
          16 => 'toolbar',
          17 => 'overlay',
          18 => 'field_ui',
          19 => 'file',
          20 => 'rdf',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
        'languages' => 
        array (
          0 => 'en',
        ),
        'old_short_name' => 'default',
      ),
      'version' => '7.22',
      'status' => 1,
    ),
  ),
  'modules' => 
  array (
    'actions_permissions' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/views_bulk_operations/actions_permissions.module',
      'name' => 'actions_permissions',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Actions permissions (VBO)',
        'description' => 'Provides permission-based access control for actions. Used by Views Bulk Operations.',
        'package' => 'Administration',
        'core' => '7.x',
        'version' => '7.x-3.1',
        'project' => 'views_bulk_operations',
        'datestamp' => '1354500015',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'views_bulk_operations',
      'version' => '7.x-3.1',
    ),
    'activity' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/activity/activity.module',
      'name' => 'activity',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7300',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Activity',
        'description' => 'Log Activity across the site.',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'trigger',
        ),
        'package' => 'Activity',
        'files' => 
        array (
          0 => 'activity_action_handlers.inc',
          1 => 'activity.tokens.inc',
          2 => 'views/views_handler_fields.inc',
          3 => 'views/views_handler_filters.inc',
          4 => 'views/views_handler_arguments.inc',
          5 => 'tests/activity_unit.test',
        ),
        'version' => '7.x-1.x-dev',
        'project' => 'activity',
        'datestamp' => '1341576123',
        'php' => '5.2.4',
      ),
      'project' => 'activity',
      'version' => '7.x-1.x-dev',
    ),
    'activity_comments' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/activity/activity_comments/activity_comments.module',
      'name' => 'activity_comments',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Activity comments',
        'description' => 'Allow users to comment on activities',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'activity',
        ),
        'package' => 'Activity',
        'version' => '7.x-1.x-dev',
        'project' => 'activity',
        'datestamp' => '1341576123',
        'php' => '5.2.4',
      ),
      'project' => 'activity',
      'version' => '7.x-1.x-dev',
    ),
    'adb' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'adb',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7160',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'admin_devel' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/admin_menu/admin_devel/admin_devel.module',
      'name' => 'admin_devel',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Administration Development tools',
        'description' => 'Administration and debugging functionality for developers and site builders.',
        'package' => 'Administration',
        'core' => '7.x',
        'scripts' => 
        array (
          0 => 'admin_devel.js',
        ),
        'version' => '7.x-3.0-rc4',
        'project' => 'admin_menu',
        'datestamp' => '1359651687',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'admin_menu',
      'version' => '7.x-3.0-rc4',
    ),
    'admin_menu' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/admin_menu/admin_menu.module',
      'name' => 'admin_menu',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7304',
      'weight' => '100',
      'info' => 
      array (
        'name' => 'Administration menu',
        'description' => 'Provides a dropdown menu to most administrative tasks and other common destinations (to users with the proper permissions).',
        'package' => 'Administration',
        'core' => '7.x',
        'configure' => 'admin/config/administration/admin_menu',
        'dependencies' => 
        array (
          0 => 'system (>7.10)',
        ),
        'files' => 
        array (
          0 => 'tests/admin_menu.test',
        ),
        'version' => '7.x-3.0-rc4',
        'project' => 'admin_menu',
        'datestamp' => '1359651687',
        'php' => '5.2.4',
      ),
      'project' => 'admin_menu',
      'version' => '7.x-3.0-rc4',
    ),
    'admin_menu_toolbar' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/admin_menu/admin_menu_toolbar/admin_menu_toolbar.module',
      'name' => 'admin_menu_toolbar',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Administration menu Toolbar style',
        'description' => 'A better Toolbar.',
        'package' => 'Administration',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'admin_menu',
        ),
        'version' => '7.x-3.0-rc4',
        'project' => 'admin_menu',
        'datestamp' => '1359651687',
        'php' => '5.2.4',
      ),
      'project' => 'admin_menu',
      'version' => '7.x-3.0-rc4',
    ),
    'aggregator' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/aggregator/aggregator.module',
      'name' => 'aggregator',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Aggregator',
        'description' => 'Aggregates syndicated content (RSS, RDF, and Atom feeds).',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'aggregator.test',
        ),
        'configure' => 'admin/config/services/aggregator/settings',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'aggregator.css',
          ),
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'artist_community' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/artist_community/artist_community.module',
      'name' => 'artist_community',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Artist Community',
        'core' => '7.x',
        'package' => 'MNArtists',
        'php' => '5.2.4',
        'version' => '7.x-1.0',
        'project' => 'artist_community',
        'dependencies' => 
        array (
          0 => 'text',
          1 => 'views',
          2 => 'views_content',
          3 => 'views_slideshow',
          4 => 'mnartist_profiles',
        ),
        'features' => 
        array (
          'ctools' => 
          array (
            0 => 'views:views_default:3.0',
          ),
          'features_api' => 
          array (
            0 => 'api:1',
          ),
          'field_base' => 
          array (
            0 => 'body',
            1 => 'field_additional_links',
            2 => 'field_category',
            3 => 'field_created',
            4 => 'field_dimensions',
            5 => 'field_featured_artist',
            6 => 'field_for_sale',
            7 => 'field_images',
            8 => 'field_license',
            9 => 'field_media',
            10 => 'field_medium',
            11 => 'field_public',
            12 => 'field_role',
            13 => 'field_tags',
            14 => 'group_group',
            15 => 'og_group_ref',
            16 => 'og_user_node',
          ),
          'field_instance' => 
          array (
            0 => 'node-article-body',
            1 => 'node-article-field_category',
            2 => 'node-article-field_images',
            3 => 'node-article-field_tags',
            4 => 'node-article-og_group_ref',
            5 => 'node-artwork-body',
            6 => 'node-artwork-field_additional_links',
            7 => 'node-artwork-field_created',
            8 => 'node-artwork-field_dimensions',
            9 => 'node-artwork-field_for_sale',
            10 => 'node-artwork-field_images',
            11 => 'node-artwork-field_license',
            12 => 'node-artwork-field_media',
            13 => 'node-artwork-field_medium',
            14 => 'node-artwork-field_public',
            15 => 'node-artwork-field_role',
            16 => 'node-artwork-field_tags',
            17 => 'node-artwork-og_group_ref',
            18 => 'node-blog-body',
            19 => 'node-blog-field_category',
            20 => 'node-blog-field_images',
            21 => 'node-blog-og_group_ref',
            22 => 'node-community-body',
            23 => 'node-community-field_medium',
            24 => 'node-community-group_group',
            25 => 'user-user-field_featured_artist',
            26 => 'user-user-og_user_node',
          ),
          'node' => 
          array (
            0 => 'article',
            1 => 'artwork',
            2 => 'blog',
            3 => 'community',
          ),
          'og_membership_type' => 
          array (
            0 => 'community',
          ),
          'taxonomy' => 
          array (
            0 => 'article_category',
            1 => 'blog_category',
            2 => 'medium',
            3 => 'tags',
          ),
          'views_view' => 
          array (
            0 => 'community_artworks',
            1 => 'community_featured_articles',
            2 => 'community_featured_artists',
            3 => 'community_featured_events',
          ),
        ),
        'features_exclude' => 
        array (
          'dependencies' => 
          array (
            'date' => 'date',
            'entity' => 'entity',
            'entityreference' => 'entityreference',
            'events_calendar' => 'events_calendar',
            'features' => 'features',
            'file' => 'file',
            'image' => 'image',
            'list' => 'list',
            'media' => 'media',
            'og' => 'og',
            'og_ui' => 'og_ui',
            'options' => 'options',
            'taxonomy' => 'taxonomy',
            'url' => 'url',
            'ctools' => 'ctools',
          ),
          'field' => 
          array (
            'node-community-field_medium' => 'node-community-field_medium',
            'node-article-body' => 'node-article-body',
            'node-article-field_tags' => 'node-article-field_tags',
            'node-article-og_group_ref' => 'node-article-og_group_ref',
            'node-article-field_images' => 'node-article-field_images',
            'node-article-field_category' => 'node-article-field_category',
            'node-artwork-body' => 'node-artwork-body',
            'node-artwork-og_group_ref' => 'node-artwork-og_group_ref',
            'node-artwork-field_images' => 'node-artwork-field_images',
            'node-artwork-field_public' => 'node-artwork-field_public',
            'node-artwork-field_media' => 'node-artwork-field_media',
            'node-artwork-field_license' => 'node-artwork-field_license',
            'node-artwork-field_additional_links' => 'node-artwork-field_additional_links',
            'node-artwork-field_created' => 'node-artwork-field_created',
            'node-artwork-field_medium' => 'node-artwork-field_medium',
            'node-artwork-field_role' => 'node-artwork-field_role',
            'node-artwork-field_dimensions' => 'node-artwork-field_dimensions',
            'node-artwork-field_for_sale' => 'node-artwork-field_for_sale',
            'node-artwork-field_tags' => 'node-artwork-field_tags',
            'node-blog-og_group_ref' => 'node-blog-og_group_ref',
            'node-blog-body' => 'node-blog-body',
            'node-blog-field_images' => 'node-blog-field_images',
            'node-blog-field_category' => 'node-blog-field_category',
            'node-community-body' => 'node-community-body',
            'node-community-group_group' => 'node-community-group_group',
          ),
        ),
        'project path' => 'sites/default/modules',
        'description' => '',
      ),
      'platform' => -1,
      'project' => 'artist_community',
      'version' => '7.x-1.0',
    ),
    'better_formats' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'better_formats',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '100',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'block' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/block/block.module',
      'name' => 'block',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7008',
      'weight' => '-5',
      'info' => 
      array (
        'name' => 'Block',
        'description' => 'Controls the visual building blocks a page is constructed with. Blocks are boxes of content rendered into an area, or region, of a web page.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'block.test',
        ),
        'configure' => 'admin/structure/block',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'blog' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/blog/blog.module',
      'name' => 'blog',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Blog',
        'description' => 'Enables multi-user blogs.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'blog.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'book' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/book/book.module',
      'name' => 'book',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Book',
        'description' => 'Allows users to create and organize related content in an outline.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'book.test',
        ),
        'configure' => 'admin/content/book/settings',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'book.css',
          ),
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'bulk_export' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/ctools/bulk_export/bulk_export.module',
      'name' => 'bulk_export',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Bulk Export',
        'description' => 'Performs bulk exporting of data objects known about by Chaos tools.',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'ctools',
        ),
        'package' => 'Chaos tool suite',
        'version' => '7.x-1.3',
        'project' => 'ctools',
        'datestamp' => '1365013512',
        'php' => '5.2.4',
      ),
      'project' => 'ctools',
      'version' => '7.x-1.3',
    ),
    'chosen' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/chosen/chosen.module',
      'name' => 'chosen',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7201',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Chosen',
        'description' => 'Makes select elements more user-friendly using <a href="http://harvesthq.github.com/chosen/">Chosen</a>.',
        'configure' => 'admin/config/user-interface/chosen',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'jquery_update',
        ),
        'version' => '7.x-2.0-alpha4',
        'project' => 'chosen',
        'datestamp' => '1379598967',
        'php' => '5.2.4',
      ),
      'project' => 'chosen',
      'version' => '7.x-2.0-alpha4',
    ),
    'color' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/color/color.module',
      'name' => 'color',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Color',
        'description' => 'Allows administrators to change the color scheme of compatible themes.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'color.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'comment' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/comment/comment.module',
      'name' => 'comment',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7009',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Comment',
        'description' => 'Allows users to comment on and discuss published content.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'text',
        ),
        'files' => 
        array (
          0 => 'comment.module',
          1 => 'comment.test',
        ),
        'configure' => 'admin/content/comment',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'comment.css',
          ),
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'commentaccess' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'commentaccess',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'conditional_fields' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'conditional_fields',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7002',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'contact' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/contact/contact.module',
      'name' => 'contact',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Contact',
        'description' => 'Enables the use of both personal and site-wide contact forms.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'contact.test',
        ),
        'configure' => 'admin/structure/contact',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'contextual' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/contextual/contextual.module',
      'name' => 'contextual',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Contextual links',
        'description' => 'Provides contextual links to perform actions related to elements on a page.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'contextual.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'ctools' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/ctools/ctools.module',
      'name' => 'ctools',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '6008',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Chaos tools',
        'description' => 'A library of helpful tools by Merlin of Chaos.',
        'core' => '7.x',
        'package' => 'Chaos tool suite',
        'files' => 
        array (
          0 => 'includes/context.inc',
          1 => 'includes/math-expr.inc',
          2 => 'includes/stylizer.inc',
        ),
        'version' => '7.x-1.3',
        'project' => 'ctools',
        'datestamp' => '1365013512',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'ctools',
      'version' => '7.x-1.3',
    ),
    'ctools_access_ruleset' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/ctools/ctools_access_ruleset/ctools_access_ruleset.module',
      'name' => 'ctools_access_ruleset',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Custom rulesets',
        'description' => 'Create custom, exportable, reusable access rulesets for applications like Panels.',
        'core' => '7.x',
        'package' => 'Chaos tool suite',
        'dependencies' => 
        array (
          0 => 'ctools',
        ),
        'version' => '7.x-1.3',
        'project' => 'ctools',
        'datestamp' => '1365013512',
        'php' => '5.2.4',
      ),
      'project' => 'ctools',
      'version' => '7.x-1.3',
    ),
    'ctools_ajax_sample' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/ctools/ctools_ajax_sample/ctools_ajax_sample.module',
      'name' => 'ctools_ajax_sample',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Chaos Tools (CTools) AJAX Example',
        'description' => 'Shows how to use the power of Chaos AJAX.',
        'package' => 'Chaos tool suite',
        'dependencies' => 
        array (
          0 => 'ctools',
        ),
        'core' => '7.x',
        'version' => '7.x-1.3',
        'project' => 'ctools',
        'datestamp' => '1365013512',
        'php' => '5.2.4',
      ),
      'project' => 'ctools',
      'version' => '7.x-1.3',
    ),
    'ctools_custom_content' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/ctools/ctools_custom_content/ctools_custom_content.module',
      'name' => 'ctools_custom_content',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Custom content panes',
        'description' => 'Create custom, exportable, reusable content panes for applications like Panels.',
        'core' => '7.x',
        'package' => 'Chaos tool suite',
        'dependencies' => 
        array (
          0 => 'ctools',
        ),
        'version' => '7.x-1.3',
        'project' => 'ctools',
        'datestamp' => '1365013512',
        'php' => '5.2.4',
      ),
      'project' => 'ctools',
      'version' => '7.x-1.3',
    ),
    'ctools_plugin_example' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/ctools/ctools_plugin_example/ctools_plugin_example.module',
      'name' => 'ctools_plugin_example',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Chaos Tools (CTools) Plugin Example',
        'description' => 'Shows how an external module can provide ctools plugins (for Panels, etc.).',
        'package' => 'Chaos tool suite',
        'dependencies' => 
        array (
          0 => 'ctools',
          1 => 'panels',
          2 => 'page_manager',
          3 => 'advanced_help',
        ),
        'core' => '7.x',
        'version' => '7.x-1.3',
        'project' => 'ctools',
        'datestamp' => '1365013512',
        'php' => '5.2.4',
      ),
      'project' => 'ctools',
      'version' => '7.x-1.3',
    ),
    'current_search' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/facetapi/contrib/current_search/current_search.module',
      'name' => 'current_search',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Current Search Blocks',
        'description' => 'Provides an interface for creating blocks containing information about the current search.',
        'dependencies' => 
        array (
          0 => 'facetapi',
        ),
        'package' => 'Search Toolkit',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'plugins/current_search/item.inc',
          1 => 'plugins/current_search/item_active.inc',
          2 => 'plugins/current_search/item_group.inc',
          3 => 'plugins/current_search/item_text.inc',
          4 => 'tests/current_search.test',
        ),
        'configure' => 'admin/config/search/current_search',
        'version' => '7.x-1.3',
        'project' => 'facetapi',
        'datestamp' => '1364861711',
        'php' => '5.2.4',
      ),
      'project' => 'facetapi',
      'version' => '7.x-1.3',
    ),
    'dashboard' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/dashboard/dashboard.module',
      'name' => 'dashboard',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Dashboard',
        'description' => 'Provides a dashboard page in the administrative interface for organizing administrative tasks and tracking information within your site.',
        'core' => '7.x',
        'package' => 'Core',
        'version' => '7.22',
        'files' => 
        array (
          0 => 'dashboard.test',
        ),
        'dependencies' => 
        array (
          0 => 'block',
        ),
        'configure' => 'admin/dashboard/customize',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'date' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date.module',
      'name' => 'date',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7004',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Date',
        'description' => 'Makes date/time fields available.',
        'dependencies' => 
        array (
          0 => 'date_api',
        ),
        'package' => 'Date/Time',
        'core' => '7.x',
        'php' => '5.2',
        'files' => 
        array (
          0 => 'tests/date_api.test',
          1 => 'tests/date.test',
          2 => 'tests/date_field.test',
          3 => 'tests/date_validation.test',
          4 => 'tests/date_timezone.test',
        ),
        'version' => '7.x-2.6',
        'project' => 'date',
        'datestamp' => '1344850024',
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'date_all_day' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date_all_day/date_all_day.module',
      'name' => 'date_all_day',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Date All Day',
        'description' => 'Adds \'All Day\' functionality to date fields, including an \'All Day\' theme and \'All Day\' checkboxes for the Date select and Date popup widgets.',
        'dependencies' => 
        array (
          0 => 'date_api',
          1 => 'date',
        ),
        'package' => 'Date/Time',
        'core' => '7.x',
        'version' => '7.x-2.6',
        'project' => 'date',
        'datestamp' => '1344850024',
        'php' => '5.2.4',
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'date_api' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date_api/date_api.module',
      'name' => 'date_api',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7001',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Date API',
        'description' => 'A Date API that can be used by other modules.',
        'package' => 'Date/Time',
        'core' => '7.x',
        'php' => '5.2',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'date.css',
          ),
        ),
        'files' => 
        array (
          0 => 'date_api.module',
          1 => 'date_api_sql.inc',
        ),
        'version' => '7.x-2.6',
        'project' => 'date',
        'datestamp' => '1344850024',
        'dependencies' => 
        array (
        ),
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'date_context' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date_context/date_context.module',
      'name' => 'date_context',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Date Context',
        'description' => 'Adds an option to the Context module to set a context condition based on the value of a date field.',
        'package' => 'Date/Time',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'date',
          1 => 'context',
        ),
        'files' => 
        array (
          0 => 'date_context.module',
          1 => 'plugins/date_context_date_condition.inc',
        ),
        'version' => '7.x-2.6',
        'project' => 'date',
        'datestamp' => '1344850024',
        'php' => '5.2.4',
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'date_migrate' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date_migrate/date_migrate.module',
      'name' => 'date_migrate',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Date Migration',
        'description' => 'Provides support for importing into date fields with the Migrate module.',
        'core' => '7.x',
        'package' => 'Date/Time',
        'dependencies' => 
        array (
          0 => 'migrate',
          1 => 'date',
        ),
        'files' => 
        array (
          0 => 'date.migrate.inc',
          1 => 'date_migrate.test',
        ),
        'version' => '7.x-2.6',
        'project' => 'date',
        'datestamp' => '1344850024',
        'php' => '5.2.4',
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'date_migrate_example' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date_migrate/date_migrate_example/date_migrate_example.module',
      'name' => 'date_migrate_example',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'date',
          1 => 'date_repeat',
          2 => 'date_repeat_field',
          3 => 'date_migrate',
          4 => 'features',
          5 => 'migrate',
        ),
        'description' => 'Examples of migrating with the Date module',
        'features' => 
        array (
          'field' => 
          array (
            0 => 'node-date_migrate_example-body',
            1 => 'node-date_migrate_example-field_date',
            2 => 'node-date_migrate_example-field_date_range',
            3 => 'node-date_migrate_example-field_date_repeat',
            4 => 'node-date_migrate_example-field_datestamp',
            5 => 'node-date_migrate_example-field_datestamp_range',
            6 => 'node-date_migrate_example-field_datetime',
            7 => 'node-date_migrate_example-field_datetime_range',
          ),
          'node' => 
          array (
            0 => 'date_migrate_example',
          ),
        ),
        'files' => 
        array (
          0 => 'date_migrate_example.migrate.inc',
        ),
        'name' => 'Date Migration Example',
        'package' => 'Features',
        'project' => 'date',
        'version' => '7.x-2.6',
        'datestamp' => '1344850024',
        'php' => '5.2.4',
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'date_popup' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date_popup/date_popup.module',
      'name' => 'date_popup',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Date Popup',
        'description' => 'Enables jquery popup calendars and time entry widgets for selecting dates and times.',
        'dependencies' => 
        array (
          0 => 'date_api',
        ),
        'package' => 'Date/Time',
        'core' => '7.x',
        'configure' => 'admin/config/date/date_popup',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'themes/datepicker.1.7.css',
          ),
        ),
        'version' => '7.x-2.6',
        'project' => 'date',
        'datestamp' => '1344850024',
        'php' => '5.2.4',
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'date_repeat' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date_repeat/date_repeat.module',
      'name' => 'date_repeat',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Date Repeat API',
        'description' => 'A Date Repeat API to calculate repeating dates and times from iCal rules.',
        'dependencies' => 
        array (
          0 => 'date_api',
        ),
        'package' => 'Date/Time',
        'core' => '7.x',
        'php' => '5.2',
        'files' => 
        array (
          0 => 'tests/date_repeat.test',
          1 => 'tests/date_repeat_form.test',
        ),
        'version' => '7.x-2.6',
        'project' => 'date',
        'datestamp' => '1344850024',
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'date_repeat_field' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date_repeat_field/date_repeat_field.module',
      'name' => 'date_repeat_field',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Date Repeat Field',
        'description' => 'Creates the option of Repeating date fields and manages Date fields that use the Date Repeat API.',
        'dependencies' => 
        array (
          0 => 'date_api',
          1 => 'date',
          2 => 'date_repeat',
        ),
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'date_repeat_field.css',
          ),
        ),
        'package' => 'Date/Time',
        'core' => '7.x',
        'version' => '7.x-2.6',
        'project' => 'date',
        'datestamp' => '1344850024',
        'php' => '5.2.4',
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'date_tools' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date_tools/date_tools.module',
      'name' => 'date_tools',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Date Tools',
        'description' => 'Tools to import and auto-create dates and calendars.',
        'dependencies' => 
        array (
          0 => 'date',
        ),
        'package' => 'Date/Time',
        'core' => '7.x',
        'configure' => 'admin/config/date/tools',
        'files' => 
        array (
          0 => 'tests/date_tools.test',
        ),
        'version' => '7.x-2.6',
        'project' => 'date',
        'datestamp' => '1344850024',
        'php' => '5.2.4',
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'date_views' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/date/date_views/date_views.module',
      'name' => 'date_views',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Date Views',
        'description' => 'Views integration for date fields and date functionality.',
        'package' => 'Date/Time',
        'dependencies' => 
        array (
          0 => 'date_api',
          1 => 'views',
        ),
        'core' => '7.x',
        'php' => '5.2',
        'files' => 
        array (
          0 => 'includes/date_views_argument_handler.inc',
          1 => 'includes/date_views_argument_handler_simple.inc',
          2 => 'includes/date_views_filter_handler.inc',
          3 => 'includes/date_views_filter_handler_simple.inc',
          4 => 'includes/date_views.views_default.inc',
          5 => 'includes/date_views.views.inc',
          6 => 'includes/date_views_plugin_pager.inc',
        ),
        'version' => '7.x-2.6',
        'project' => 'date',
        'datestamp' => '1344850024',
      ),
      'project' => 'date',
      'version' => '7.x-2.6',
    ),
    'dblog' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/dblog/dblog.module',
      'name' => 'dblog',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '1',
      'schema_version' => '7002',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Database logging',
        'description' => 'Logs and records system events to the database.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'dblog.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'devel' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/devel/devel.module',
      'name' => 'devel',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '1',
      'schema_version' => '7004',
      'weight' => '88',
      'info' => 
      array (
        'name' => 'Devel',
        'description' => 'Various blocks, pages, and functions for developers.',
        'package' => 'Development',
        'core' => '7.x',
        'configure' => 'admin/config/development/devel',
        'tags' => 
        array (
          0 => 'developer',
        ),
        'files' => 
        array (
          0 => 'devel.test',
          1 => 'devel.mail.inc',
        ),
        'version' => '7.x-1.3',
        'project' => 'devel',
        'datestamp' => '1338940281',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'devel',
      'version' => '7.x-1.3',
    ),
    'devel_generate' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/devel/devel_generate/devel_generate.module',
      'name' => 'devel_generate',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Devel generate',
        'description' => 'Generate dummy users, nodes, and taxonomy terms.',
        'package' => 'Development',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'devel',
        ),
        'tags' => 
        array (
          0 => 'developer',
        ),
        'configure' => 'admin/config/development/generate',
        'version' => '7.x-1.3',
        'project' => 'devel',
        'datestamp' => '1338940281',
        'php' => '5.2.4',
      ),
      'project' => 'devel',
      'version' => '7.x-1.3',
    ),
    'devel_node_access' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/devel/devel_node_access.module',
      'name' => 'devel_node_access',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Devel node access',
        'description' => 'Developer blocks and page illustrating relevant node_access records.',
        'package' => 'Development',
        'dependencies' => 
        array (
          0 => 'menu',
        ),
        'core' => '7.x',
        'configure' => 'admin/config/development/devel',
        'tags' => 
        array (
          0 => 'developer',
        ),
        'version' => '7.x-1.3',
        'project' => 'devel',
        'datestamp' => '1338940281',
        'php' => '5.2.4',
      ),
      'project' => 'devel',
      'version' => '7.x-1.3',
    ),
    'devel_themer' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/devel_themer/devel_themer.module',
      'name' => 'devel_themer',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '6001',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Theme developer',
        'description' => 'Essential theme API information for theme developers',
        'package' => 'Development',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'devel',
          1 => 'simplehtmldom',
        ),
        'configure' => 'admin/config/development/devel_themer',
        'files' => 
        array (
          0 => 'devel_themer.module',
        ),
        'version' => '7.x-1.x-dev',
        'project' => 'devel_themer',
        'datestamp' => '1365209224',
        'php' => '5.2.4',
      ),
      'project' => 'devel_themer',
      'version' => '7.x-1.x-dev',
    ),
    'diff' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/diff/diff.module',
      'name' => 'diff',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7305',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Diff',
        'description' => 'Show differences between content revisions.',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'DiffEngine.php',
        ),
        'version' => '7.x-3.2',
        'project' => 'diff',
        'datestamp' => '1352784357',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'diff',
      'version' => '7.x-3.2',
    ),
    'edge_fonts' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/modules/edge_fonts/edge_fonts.module',
      'name' => 'edge_fonts',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Edge Fonts',
        'description' => '@font-your-face provider for Edge Fonts.',
        'dependencies' => 
        array (
          0 => 'fontyourface',
        ),
        'package' => '@font-your-face',
        'core' => '7.x',
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'email' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/email/email.module',
      'name' => 'email',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Email',
        'description' => 'Defines an email field type.',
        'core' => '7.x',
        'package' => 'Fields',
        'files' => 
        array (
          0 => 'email.migrate.inc',
        ),
        'version' => '7.x-1.2',
        'project' => 'email',
        'datestamp' => '1346254131',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'email',
      'version' => '7.x-1.2',
    ),
    'entity' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/entity/entity.module',
      'name' => 'entity',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7002',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Entity API',
        'description' => 'Enables modules to work with any entity type and to provide entities.',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'entity.features.inc',
          1 => 'entity.i18n.inc',
          2 => 'entity.info.inc',
          3 => 'entity.rules.inc',
          4 => 'entity.test',
          5 => 'includes/entity.inc',
          6 => 'includes/entity.controller.inc',
          7 => 'includes/entity.ui.inc',
          8 => 'includes/entity.wrapper.inc',
          9 => 'views/entity.views.inc',
          10 => 'views/handlers/entity_views_field_handler_helper.inc',
          11 => 'views/handlers/entity_views_handler_area_entity.inc',
          12 => 'views/handlers/entity_views_handler_field_boolean.inc',
          13 => 'views/handlers/entity_views_handler_field_date.inc',
          14 => 'views/handlers/entity_views_handler_field_duration.inc',
          15 => 'views/handlers/entity_views_handler_field_entity.inc',
          16 => 'views/handlers/entity_views_handler_field_field.inc',
          17 => 'views/handlers/entity_views_handler_field_numeric.inc',
          18 => 'views/handlers/entity_views_handler_field_options.inc',
          19 => 'views/handlers/entity_views_handler_field_text.inc',
          20 => 'views/handlers/entity_views_handler_field_uri.inc',
          21 => 'views/handlers/entity_views_handler_relationship_by_bundle.inc',
          22 => 'views/handlers/entity_views_handler_relationship.inc',
          23 => 'views/plugins/entity_views_plugin_row_entity_view.inc',
        ),
        'version' => '7.x-1.2',
        'project' => 'entity',
        'datestamp' => '1376493705',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'entity',
      'version' => '7.x-1.2',
    ),
    'entityconnect' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/entityconnect/entityconnect.module',
      'name' => 'entityconnect',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Entity Connect',
        'description' => 'Allows for referenced entity to be created and edited from the entity reference field',
        'core' => '7.x',
        'version' => '7.x-1.0-rc1',
        'project' => 'entityconnect',
        'datestamp' => '1360574066',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'entityconnect',
      'version' => '7.x-1.0-rc1',
    ),
    'entityreference' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/entityreference/entityreference.module',
      'name' => 'entityreference',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7002',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Entity Reference',
        'description' => 'Provides a field that can reference other entities.',
        'core' => '7.x',
        'package' => 'Fields',
        'dependencies' => 
        array (
          0 => 'entity',
          1 => 'ctools',
        ),
        'files' => 
        array (
          0 => 'entityreference.migrate.inc',
          1 => 'plugins/selection/abstract.inc',
          2 => 'plugins/selection/views.inc',
          3 => 'plugins/behavior/abstract.inc',
          4 => 'views/entityreference_plugin_display.inc',
          5 => 'views/entityreference_plugin_style.inc',
          6 => 'views/entityreference_plugin_row_fields.inc',
          7 => 'tests/entityreference.handlers.test',
          8 => 'tests/entityreference.taxonomy.test',
          9 => 'tests/entityreference.admin.test',
          10 => 'tests/entityreference.feeds.test',
        ),
        'version' => '7.x-1.1',
        'project' => 'entityreference',
        'datestamp' => '1384973110',
        'php' => '5.2.4',
      ),
      'project' => 'entityreference',
      'version' => '7.x-1.1',
    ),
    'entityreference_behavior_example' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/entityreference/examples/entityreference_behavior_example/entityreference_behavior_example.module',
      'name' => 'entityreference_behavior_example',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Entity Reference Behavior Example',
        'description' => 'Provides some example code for implementing Entity Reference behaviors.',
        'core' => '7.x',
        'package' => 'Fields',
        'dependencies' => 
        array (
          0 => 'entityreference',
        ),
        'version' => '7.x-1.1',
        'project' => 'entityreference',
        'datestamp' => '1384973110',
        'php' => '5.2.4',
      ),
      'project' => 'entityreference',
      'version' => '7.x-1.1',
    ),
    'entity_token' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/entity/entity_token.module',
      'name' => 'entity_token',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Entity tokens',
        'description' => 'Provides token replacements for all properties that have no tokens and are known to the entity API.',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'entity_token.tokens.inc',
          1 => 'entity_token.module',
        ),
        'dependencies' => 
        array (
          0 => 'entity',
        ),
        'version' => '7.x-1.2',
        'project' => 'entity',
        'datestamp' => '1376493705',
        'php' => '5.2.4',
      ),
      'project' => 'entity',
      'version' => '7.x-1.2',
    ),
    'events_calendar' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/events_calendar/events_calendar.module',
      'name' => 'events_calendar',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Events Calendar',
        'core' => '7.x',
        'package' => 'MNArtists',
        'php' => '5.2.4',
        'version' => '7.x-1.0',
        'project' => 'events_calendar',
        'dependencies' => 
        array (
          0 => 'artist_community',
          1 => 'og_ui',
        ),
        'features' => 
        array (
          'ctools' => 
          array (
            0 => 'views:views_default:3.0',
          ),
          'features_api' => 
          array (
            0 => 'api:2',
          ),
          'field_base' => 
          array (
            0 => 'field_address',
            1 => 'field_city',
            2 => 'field_contact_name',
            3 => 'field_date',
            4 => 'field_email',
            5 => 'field_phone',
            6 => 'field_programs',
            7 => 'field_sponsor',
            8 => 'field_state',
            9 => 'field_type',
            10 => 'field_url',
            11 => 'field_venue',
            12 => 'field_zip',
          ),
          'field_instance' => 
          array (
            0 => 'node-event-body',
            1 => 'node-event-field_category',
            2 => 'node-event-field_date',
            3 => 'node-event-field_email',
            4 => 'node-event-field_images',
            5 => 'node-event-field_phone',
            6 => 'node-event-field_programs',
            7 => 'node-event-field_sponsor',
            8 => 'node-event-field_url',
            9 => 'node-event-field_venue',
            10 => 'node-event-og_group_ref',
            11 => 'node-program-body',
            12 => 'node-program-field_images',
            13 => 'node-venue-field_address',
            14 => 'node-venue-field_city',
            15 => 'node-venue-field_contact_name',
            16 => 'node-venue-field_images',
            17 => 'node-venue-field_phone',
            18 => 'node-venue-field_public',
            19 => 'node-venue-field_state',
            20 => 'node-venue-field_type',
            21 => 'node-venue-field_url',
            22 => 'node-venue-field_zip',
          ),
          'node' => 
          array (
            0 => 'event',
            1 => 'program',
            2 => 'venue',
          ),
          'taxonomy' => 
          array (
            0 => 'event_categories',
            1 => 'venue_type',
          ),
          'views_view' => 
          array (
            0 => 'events',
            1 => 'node_reference_venues',
          ),
        ),
        'features_exclude' => 
        array (
          'dependencies' => 
          array (
            'date' => 'date',
            'email' => 'email',
            'entityreference' => 'entityreference',
            'features' => 'features',
            'image' => 'image',
            'list' => 'list',
            'number' => 'number',
            'options' => 'options',
            'phone' => 'phone',
            'taxonomy' => 'taxonomy',
            'url' => 'url',
          ),
          'field' => 
          array (
            'node-event-body' => 'node-event-body',
            'node-event-field_category' => 'node-event-field_category',
            'node-event-field_date' => 'node-event-field_date',
            'node-event-field_venue' => 'node-event-field_venue',
            'node-event-field_phone' => 'node-event-field_phone',
            'node-event-field_email' => 'node-event-field_email',
            'node-event-field_sponsor' => 'node-event-field_sponsor',
            'node-event-field_images' => 'node-event-field_images',
            'node-event-field_url' => 'node-event-field_url',
            'node-event-field_programs' => 'node-event-field_programs',
            'node-program-body' => 'node-program-body',
            'node-program-field_images' => 'node-program-field_images',
            'node-venue-field_images' => 'node-venue-field_images',
            'node-venue-field_phone' => 'node-venue-field_phone',
            'node-venue-field_url' => 'node-venue-field_url',
            'node-venue-field_type' => 'node-venue-field_type',
            'node-venue-field_address' => 'node-venue-field_address',
            'node-venue-field_city' => 'node-venue-field_city',
            'node-venue-field_state' => 'node-venue-field_state',
            'node-venue-field_zip' => 'node-venue-field_zip',
            'node-venue-field_contact_name' => 'node-venue-field_contact_name',
            'node-venue-field_public' => 'node-venue-field_public',
          ),
        ),
        'description' => '',
      ),
      'platform' => -1,
      'project' => 'events_calendar',
      'version' => '7.x-1.0',
    ),
    'facetapi' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/facetapi/facetapi.module',
      'name' => 'facetapi',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7103',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Facet API',
        'description' => 'An abstracted facet API that can be used by various search backends.',
        'dependencies' => 
        array (
          0 => 'ctools',
        ),
        'package' => 'Search Toolkit',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'plugins/facetapi/adapter.inc',
          1 => 'plugins/facetapi/dependency.inc',
          2 => 'plugins/facetapi/dependency_bundle.inc',
          3 => 'plugins/facetapi/dependency_role.inc',
          4 => 'plugins/facetapi/empty_behavior.inc',
          5 => 'plugins/facetapi/empty_behavior_text.inc',
          6 => 'plugins/facetapi/filter.inc',
          7 => 'plugins/facetapi/query_type.inc',
          8 => 'plugins/facetapi/url_processor.inc',
          9 => 'plugins/facetapi/url_processor_standard.inc',
          10 => 'plugins/facetapi/widget.inc',
          11 => 'plugins/facetapi/widget_links.inc',
          12 => 'tests/facetapi_test.plugins.inc',
          13 => 'tests/facetapi.test',
        ),
        'version' => '7.x-1.3',
        'project' => 'facetapi',
        'datestamp' => '1364861711',
        'php' => '5.2.4',
      ),
      'project' => 'facetapi',
      'version' => '7.x-1.3',
    ),
    'features' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/features/features.module',
      'name' => 'features',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '6101',
      'weight' => '20',
      'info' => 
      array (
        'name' => 'Features',
        'description' => 'Provides feature management for Drupal.',
        'core' => '7.x',
        'package' => 'Features',
        'files' => 
        array (
          0 => 'tests/features.test',
        ),
        'version' => '7.x-2.0-rc1',
        'project' => 'features',
        'datestamp' => '1369094412',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'features',
      'version' => '7.x-2.0-rc1',
    ),
    'feeds' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'feeds',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7208',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'feeds_ui' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'feeds_ui',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7000',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'field' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/field/field.module',
      'name' => 'field',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7003',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Field',
        'description' => 'Field API to add fields to entities like nodes and users.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'field.module',
          1 => 'field.attach.inc',
          2 => 'field.info.class.inc',
          3 => 'tests/field.test',
        ),
        'dependencies' => 
        array (
          0 => 'field_sql_storage',
        ),
        'required' => true,
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'theme/field.css',
          ),
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'field_collection' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/field_collection/field_collection.module',
      'name' => 'field_collection',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7002',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Field collection',
        'description' => 'Provides a field collection field, to which any number of fields can be attached.',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'entity',
        ),
        'files' => 
        array (
          0 => 'field_collection.test',
          1 => 'field_collection.info.inc',
          2 => 'views/field_collection_handler_relationship.inc',
        ),
        'configure' => 'admin/structure/field-collections',
        'package' => 'Fields',
        'version' => '7.x-1.0-beta5',
        'project' => 'field_collection',
        'datestamp' => '1356475963',
        'php' => '5.2.4',
      ),
      'project' => 'field_collection',
      'version' => '7.x-1.0-beta5',
    ),
    'field_formatter_settings' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/field_formatter_settings/field_formatter_settings.module',
      'name' => 'field_formatter_settings',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Field formatter settings API',
        'description' => 'Provides missing alter hooks for field formatter settings and summaries',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'field_ui',
        ),
        'files' => 
        array (
          0 => 'field_formatter_settings.module',
        ),
        'version' => '7.x-1.0',
        'project' => 'field_formatter_settings',
        'datestamp' => '1345588632',
        'php' => '5.2.4',
      ),
      'project' => 'field_formatter_settings',
      'version' => '7.x-1.0',
    ),
    'field_group' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/field_group/field_group.module',
      'name' => 'field_group',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7006',
      'weight' => '1',
      'info' => 
      array (
        'name' => 'Fieldgroup',
        'description' => 'Fieldgroup',
        'package' => 'Fields',
        'dependencies' => 
        array (
          0 => 'field',
          1 => 'ctools',
        ),
        'core' => '7.x',
        'files' => 
        array (
          0 => 'field_group.install',
          1 => 'field_group.module',
          2 => 'field_group.field_ui.inc',
          3 => 'field_group.form.inc',
          4 => 'field_group.features.inc',
          5 => 'tests/field_group.ui.test',
          6 => 'tests/field_group.display.test',
        ),
        'version' => '7.x-1.3',
        'project' => 'field_group',
        'datestamp' => '1380124361',
        'php' => '5.2.4',
      ),
      'project' => 'field_group',
      'version' => '7.x-1.3',
    ),
    'field_group_test' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/field_group/tests/field_group_test.module',
      'name' => 'field_group_test',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Fieldgroup Test',
        'description' => 'Test module for fieldgroup',
        'core' => '7.x',
        'package' => 'Fieldgroup',
        'version' => '7.x-1.3',
        'project' => 'field_group',
        'datestamp' => '1380124361',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'field_group',
      'version' => '7.x-1.3',
    ),
    'field_multiple_limit' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/field_multiple_limit/field_multiple_limit.module',
      'name' => 'field_multiple_limit',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Field Multiple Limit',
        'description' => 'Provides extra field formatter settings to specify the number of values to display on multi-value fields.',
        'core' => '7.x',
        'package' => 'Fields',
        'dependencies' => 
        array (
          0 => 'field_formatter_settings',
        ),
        'version' => '7.x-1.0-alpha4',
        'project' => 'field_multiple_limit',
        'datestamp' => '1361374879',
        'php' => '5.2.4',
      ),
      'project' => 'field_multiple_limit',
      'version' => '7.x-1.0-alpha4',
    ),
    'field_permissions' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/field_permissions/field_permissions.module',
      'name' => 'field_permissions',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7001',
      'weight' => '50',
      'info' => 
      array (
        'name' => 'Field Permissions',
        'description' => 'Set field-level permissions to create, update or view fields.',
        'package' => 'Fields',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'field_permissions.module',
          1 => 'field_permissions.admin.inc',
          2 => 'field_permissions.test',
        ),
        'configure' => 'admin/reports/fields/permissions',
        'version' => '7.x-1.0-beta2',
        'project' => 'field_permissions',
        'datestamp' => '1327510549',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'field_permissions',
      'version' => '7.x-1.0-beta2',
    ),
    'field_sql_storage' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/field/modules/field_sql_storage/field_sql_storage.module',
      'name' => 'field_sql_storage',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7002',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Field SQL storage',
        'description' => 'Stores field data in an SQL database.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'field',
        ),
        'files' => 
        array (
          0 => 'field_sql_storage.test',
        ),
        'required' => true,
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'field_ui' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/field_ui/field_ui.module',
      'name' => 'field_ui',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Field UI',
        'description' => 'User interface for the Field API.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'field',
        ),
        'files' => 
        array (
          0 => 'field_ui.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'file' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/file/file.module',
      'name' => 'file',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'File',
        'description' => 'Defines a file field type.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'field',
        ),
        'files' => 
        array (
          0 => 'tests/file.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'file_entity' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/file_entity/file_entity.module',
      'name' => 'file_entity',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7204',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'File entity',
        'description' => 'Extends Drupal file entities to be fieldable and viewable.',
        'package' => 'Media',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'field',
          1 => 'file',
          2 => 'ctools',
        ),
        'files' => 
        array (
          0 => 'views/views_handler_argument_file_type.inc',
          1 => 'views/views_handler_field_file_rendered.inc',
          2 => 'views/views_handler_field_file_type.inc',
          3 => 'views/views_handler_filter_file_type.inc',
          4 => 'views/views_plugin_row_file_view.inc',
          5 => 'tests/file_entity.test',
        ),
        'configure' => 'admin/structure/file-types',
        'version' => '7.x-2.0-unstable7',
        'project' => 'file_entity',
        'datestamp' => '1353226911',
        'php' => '5.2.4',
      ),
      'project' => 'file_entity',
      'version' => '7.x-2.0-unstable7',
    ),
    'filter' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/filter/filter.module',
      'name' => 'filter',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7010',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Filter',
        'description' => 'Filters content in preparation for display.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'filter.test',
        ),
        'required' => true,
        'configure' => 'admin/config/content/formats',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'find_content' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/find_content/find_content.module',
      'name' => 'find_content',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Find Content',
        'description' => 'Adds a search box to the Find Content screen',
        'core' => '7.x',
        'package' => 'Fields',
        'dependencies' => 
        array (
          0 => 'node',
          1 => 'field',
        ),
        'stylesheets' => 
        array (
          'screen' => 
          array (
            0 => 'find_content.css',
          ),
        ),
        'version' => '7.x-1.0',
        'project' => 'find_content',
        'datestamp' => '1366811470',
        'php' => '5.2.4',
      ),
      'project' => 'find_content',
      'version' => '7.x-1.0',
    ),
    'flag' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/flag/flag.module',
      'name' => 'flag',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7204',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Flag',
        'description' => 'Create customized flags that users can set on content.',
        'core' => '7.x',
        'package' => 'Flags',
        'configure' => 'admin/structure/flags',
        'files' => 
        array (
          0 => 'flag.inc',
          1 => 'flag.rules.inc',
          2 => 'includes/flag_handler_argument_content_id.inc',
          3 => 'includes/flag_handler_field_ops.inc',
          4 => 'includes/flag_handler_filter_flagged.inc',
          5 => 'includes/flag_handler_sort_flagged.inc',
          6 => 'includes/flag_handler_relationships.inc',
          7 => 'includes/flag_plugin_argument_validate_flaggability.inc',
          8 => 'tests/flag.test',
        ),
        'version' => '7.x-2.1',
        'project' => 'flag',
        'datestamp' => '1368081620',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'flag',
      'version' => '7.x-2.1',
    ),
    'flag_actions' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/flag/flag_actions.module',
      'name' => 'flag_actions',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Flag actions',
        'description' => 'Execute actions on Flag events.',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'flag',
        ),
        'package' => 'Flags',
        'configure' => 'admin/structure/webform/flags',
        'files' => 
        array (
          0 => 'flag.install',
          1 => 'flag_actions.module',
        ),
        'version' => '7.x-2.1',
        'project' => 'flag',
        'datestamp' => '1368081620',
        'php' => '5.2.4',
      ),
      'project' => 'flag',
      'version' => '7.x-2.1',
    ),
    'flag_lists' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/flag_lists/flag_lists.module',
      'name' => 'flag_lists',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Flag lists',
        'core' => '7.x',
        'package' => 'Flags',
        'dependencies' => 
        array (
          0 => 'flag',
          1 => 'token',
        ),
        'files' => 
        array (
          0 => 'flag_lists.admin.inc',
          1 => 'flag_lists.module',
          2 => 'flag_lists.install',
          3 => 'includes/flag_lists.views.inc',
          4 => 'includes/flag_lists.views_default.inc',
          5 => 'includes/flag_lists_handler_argument_fid.inc',
          6 => 'includes/flag_lists_handler_field_list.inc',
          7 => 'includes/flag_lists_handler_field_list_delete.inc',
          8 => 'includes/flag_lists_handler_field_list_edit.inc',
          9 => 'includes/flag_lists_handler_field_ops.inc',
          10 => 'includes/flag_lists_handler_field_template.inc',
          11 => 'includes/flag_lists_handler_field_template_types.inc',
          12 => 'includes/flag_lists_handler_filter_template.inc',
        ),
        'description' => 'Allows users to create personal flag lists.',
        'version' => '7.x-1.1',
        'project' => 'flag_lists',
        'datestamp' => '1336060255',
        'php' => '5.2.4',
      ),
      'project' => 'flag_lists',
      'version' => '7.x-1.1',
    ),
    'fontdeck' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/modules/fontdeck/fontdeck.module',
      'name' => 'fontdeck',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '1',
      'info' => 
      array (
        'name' => 'Fontdeck',
        'description' => '@font-your-face provider of fonts from Fontdeck.com.',
        'dependencies' => 
        array (
          0 => 'fontyourface',
        ),
        'package' => '@font-your-face',
        'core' => '7.x',
        'php' => '5.2.0',
        'files' => 
        array (
          0 => 'fontdeck.install',
          1 => 'fontdeck.module',
        ),
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'fontsquirrel' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/modules/fontsquirrel/fontsquirrel.module',
      'name' => 'fontsquirrel',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Font Squirrel API',
        'description' => '@font-your-face provider with Font Squirrel fonts.',
        'dependencies' => 
        array (
          0 => 'fontyourface',
        ),
        'package' => '@font-your-face',
        'core' => '7.x',
        'php' => '5.2.0',
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'fonts_com' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/modules/fonts_com/fonts_com.module',
      'name' => 'fonts_com',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Fonts.com',
        'description' => '@font-your-face provider of fonts from Fonts.com.',
        'dependencies' => 
        array (
          0 => 'fontyourface',
        ),
        'package' => '@font-your-face',
        'core' => '7.x',
        'php' => '5.2.0',
        'files' => 
        array (
          0 => 'api.inc',
        ),
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'fontyourface' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/fontyourface.module',
      'name' => 'fontyourface',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7204',
      'weight' => '0',
      'info' => 
      array (
        'name' => '@font-your-face',
        'description' => 'Manages web fonts.',
        'package' => '@font-your-face',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'fontyourface.test',
        ),
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'fontyourface_ui' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/modules/fontyourface_ui/fontyourface_ui.module',
      'name' => 'fontyourface_ui',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => '@font-your-face UI',
        'description' => 'Administrative interface for managing fonts.',
        'package' => '@font-your-face',
        'dependencies' => 
        array (
          0 => 'fontyourface',
          1 => 'views',
        ),
        'configure' => 'admin/config/user-interface/fontyourface',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'views/fontyourface.views_default.inc',
          1 => 'views/views_handler_field_fontyourface_font.inc',
          2 => 'views/views_handler_field_fontyourface_foundry.inc',
          3 => 'views/views_handler_field_fontyourface_license.inc',
          4 => 'views/views_handler_field_fontyourface_provider.inc',
          5 => 'views/views_handler_field_fontyourface_tag_font_tid.inc',
          6 => 'views/views_handler_filter_tag_font_tid.inc',
          7 => 'views/views_handler_relationship_fontyourface_tag.inc',
          8 => 'views/views_handler_field_fontyourface_preview.inc',
          9 => 'views/views_handler_field_fontyourface_enable_disable.inc',
          10 => 'views/views_handler_field_fontyourface_enabled_yes_no.inc',
          11 => 'views/views_handler_filter_fontyourface_provider.inc',
          12 => 'views/views_handler_filter_fontyourface_foundry.inc',
        ),
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'fontyourface_wysiwyg' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/modules/fontyourface_wysiwyg/fontyourface_wysiwyg.module',
      'name' => 'fontyourface_wysiwyg',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'WYSIWYG for @font-your-face',
        'description' => 'Adds list of enabled fonts to WYSIWYG.',
        'dependencies' => 
        array (
          0 => 'fontyourface',
          1 => 'wysiwyg',
        ),
        'package' => '@font-your-face',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'fontyourface_wysiwyg.module',
        ),
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'font_reference' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/modules/font_reference/font_reference.module',
      'name' => 'font_reference',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Font Reference',
        'description' => 'Defines a field type for referencing a font from a node.',
        'package' => 'Fields',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'fontyourface',
          1 => 'field',
          2 => 'options',
        ),
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'forum' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/forum/forum.module',
      'name' => 'forum',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Forum',
        'description' => 'Provides discussion forums.',
        'dependencies' => 
        array (
          0 => 'taxonomy',
          1 => 'comment',
        ),
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'forum.test',
        ),
        'configure' => 'admin/structure/forum',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'forum.css',
          ),
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'geocoder' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/geocoder/geocoder.module',
      'name' => 'geocoder',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Geocoder',
        'description' => 'An API and widget to geocode various known data into other GIS data types.',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'geophp',
          1 => 'ctools',
        ),
        'version' => '7.x-1.2',
        'project' => 'geocoder',
        'datestamp' => '1346083034',
        'php' => '5.2.4',
      ),
      'project' => 'geocoder',
      'version' => '7.x-1.2',
    ),
    'geophp' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/geophp/geophp.module',
      'name' => 'geophp',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'geoPHP',
        'description' => 'Wraps the geoPHP library: advanced geometry operations in PHP',
        'core' => '7.x',
        'version' => '7.x-1.7',
        'project' => 'geophp',
        'datestamp' => '1352084822',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'geophp',
      'version' => '7.x-1.7',
    ),
    'google_fonts_api' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/modules/google_fonts_api/google_fonts_api.module',
      'name' => 'google_fonts_api',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Google Fonts API',
        'description' => '@font-your-face provider with Google fonts.',
        'dependencies' => 
        array (
          0 => 'fontyourface',
        ),
        'package' => '@font-your-face',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'views/google_fonts_api.views_default.inc',
        ),
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'help' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/help/help.module',
      'name' => 'help',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Help',
        'description' => 'Manages the display of online help.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'help.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'image' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/image/image.module',
      'name' => 'image',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7004',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Image',
        'description' => 'Provides image manipulation tools.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'file',
        ),
        'files' => 
        array (
          0 => 'image.test',
        ),
        'configure' => 'admin/config/media/image-styles',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'imagecache_actions' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'imagecache_actions',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'imagecache_coloractions' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'imagecache_coloractions',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'imagecache_profiles' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'imagecache_profiles',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7000',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'imagemagick' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/imagemagick/imagemagick.module',
      'name' => 'imagemagick',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7000',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'ImageMagick',
        'description' => 'Provides ImageMagick integration.',
        'core' => '7.x',
        'configure' => 'admin/config/media/image-toolkit',
        'version' => '7.x-1.0',
        'project' => 'imagemagick',
        'datestamp' => '1362244511',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'imagemagick',
      'version' => '7.x-1.0',
    ),
    'imagemagick_advanced' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/imagemagick/imagemagick_advanced/imagemagick_advanced.module',
      'name' => 'imagemagick_advanced',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'ImageMagick Advanced',
        'description' => 'Provides advanced ImageMagick effects and options.',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'imagemagick',
        ),
        'version' => '7.x-1.0',
        'project' => 'imagemagick',
        'datestamp' => '1362244511',
        'php' => '5.2.4',
      ),
      'project' => 'imagemagick',
      'version' => '7.x-1.0',
    ),
    'image_field_caption' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/image_field_caption/image_field_caption.module',
      'name' => 'image_field_caption',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7202',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Image Field Caption',
        'description' => 'Provides a caption textarea for image fields.',
        'core' => '7.x',
        'package' => 'Other',
        'dependencies' => 
        array (
          0 => 'image',
        ),
        'configure' => 'admin/config/media/image-field-caption',
        'version' => '7.x-2.0',
        'project' => 'image_field_caption',
        'datestamp' => '1370462752',
        'php' => '5.2.4',
      ),
      'project' => 'image_field_caption',
      'version' => '7.x-2.0',
    ),
    'insert' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'insert',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '15',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'job_scheduler' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'job_scheduler',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7101',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'jquery_ui_multiselect' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'jquery_ui_multiselect',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'jquery_update' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/jquery_update/jquery_update.module',
      'name' => 'jquery_update',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7000',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'jQuery Update',
        'description' => 'Update jQuery and jQuery UI to a more recent version.',
        'package' => 'User interface',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'jquery_update.module',
          1 => 'jquery_update.install',
        ),
        'configure' => 'admin/config/development/jquery_update',
        'version' => '7.x-2.3',
        'project' => 'jquery_update',
        'datestamp' => '1360375905',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'jquery_update',
      'version' => '7.x-2.3',
    ),
    'label_help' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/label_help/label_help.module',
      'name' => 'label_help',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Label Help',
        'description' => 'Creates the help text directly below the label in form fields',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'label_help.module',
        ),
        'version' => '7.x-1.0',
        'project' => 'label_help',
        'datestamp' => '1366294266',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'label_help',
      'version' => '7.x-1.0',
    ),
    'libraries' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/libraries/libraries.module',
      'name' => 'libraries',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7200',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Libraries',
        'description' => 'Allows version-dependent and shared usage of external libraries.',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'tests/libraries.test',
        ),
        'version' => '7.x-2.1',
        'project' => 'libraries',
        'datestamp' => '1362848412',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'libraries',
      'version' => '7.x-2.1',
    ),
    'link' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'link',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7001',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'list' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/field/modules/list/list.module',
      'name' => 'list',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7002',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'List',
        'description' => 'Defines list field types. Use with Options to create selection lists.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'field',
          1 => 'options',
        ),
        'files' => 
        array (
          0 => 'tests/list.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'locale' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/locale/locale.module',
      'name' => 'locale',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7005',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Locale',
        'description' => 'Adds language handling functionality and enables the translation of the user interface to languages other than English.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'locale.test',
        ),
        'configure' => 'admin/config/regional/language',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'local_fonts' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/modules/local_fonts/local_fonts.module',
      'name' => 'local_fonts',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Local Fonts',
        'description' => '@font-your-face provider with fonts installed locally on the Drupal server.',
        'dependencies' => 
        array (
          0 => 'fontyourface',
        ),
        'package' => '@font-your-face',
        'core' => '7.x',
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'location' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'location',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7302',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'location_user' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'location_user',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'login_destination' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'login_destination',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7000',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'mailchimp' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/mailchimp/mailchimp.module',
      'name' => 'mailchimp',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7201',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MailChimp',
        'description' => 'MailChimp email service integration.',
        'package' => 'MailChimp',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'includes/mailchimp.inc',
          1 => 'tests/mailchimp_tests.inc',
        ),
        'dependencies' => 
        array (
          0 => 'libraries (>=2)',
        ),
        'configure' => 'admin/config/services/mailchimp',
        'version' => '7.x-2.12',
        'project' => 'mailchimp',
        'datestamp' => '1374771079',
        'php' => '5.2.4',
      ),
      'project' => 'mailchimp',
      'version' => '7.x-2.12',
    ),
    'mailchimp_activity' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/mailchimp/modules/mailchimp_activity/mailchimp_activity.module',
      'name' => 'mailchimp_activity',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MailChimp Activity',
        'description' => 'View activity for an email address associated with any entity.',
        'package' => 'MailChimp',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'mailchimp',
          1 => 'entity',
        ),
        'files' => 
        array (
          0 => 'mailchimp_activity.entity.inc',
          1 => 'mailchimp_activity.ui_controller.inc',
        ),
        'version' => '7.x-2.12',
        'project' => 'mailchimp',
        'datestamp' => '1374771079',
        'php' => '5.2.4',
      ),
      'project' => 'mailchimp',
      'version' => '7.x-2.12',
    ),
    'mailchimp_campaign' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/mailchimp/modules/mailchimp_campaign/mailchimp_campaign.module',
      'name' => 'mailchimp_campaign',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MailChimp Campaigns',
        'description' => 'Create, send and import MailChimp campaigns.',
        'package' => 'MailChimp',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'mailchimp_lists',
          1 => 'entity',
        ),
        'files' => 
        array (
          0 => 'mailchimp_campaign.admin.inc',
          1 => 'mailchimp_campaign.entity.inc',
        ),
        'configure' => 'admin/config/services/mailchimp/campaigns',
        'version' => '7.x-2.12',
        'project' => 'mailchimp',
        'datestamp' => '1374771079',
        'php' => '5.2.4',
      ),
      'project' => 'mailchimp',
      'version' => '7.x-2.12',
    ),
    'mailchimp_lists' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/mailchimp/modules/mailchimp_lists/mailchimp_lists.module',
      'name' => 'mailchimp_lists',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7206',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MailChimp Lists',
        'description' => 'Manage and integrate MailChimp lists.',
        'package' => 'MailChimp',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'mailchimp',
          1 => 'entity',
          2 => 'entity_token',
        ),
        'configure' => 'admin/config/services/mailchimp/lists',
        'files' => 
        array (
          0 => 'lib/mailchimp_lists.entity.inc',
          1 => 'tests/mailchimp_lists.test',
        ),
        'version' => '7.x-2.12',
        'project' => 'mailchimp',
        'datestamp' => '1374771079',
        'php' => '5.2.4',
      ),
      'project' => 'mailchimp',
      'version' => '7.x-2.12',
    ),
    'media' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/media/media.module',
      'name' => 'media',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7211',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Media',
        'description' => 'Provides the core Media API',
        'package' => 'Media',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'file_entity',
          1 => 'image',
          2 => 'views',
        ),
        'files' => 
        array (
          0 => 'includes/MediaReadOnlyStreamWrapper.inc',
          1 => 'includes/MediaBrowserPluginInterface.inc',
          2 => 'includes/MediaBrowserPlugin.inc',
          3 => 'includes/MediaBrowserUpload.inc',
          4 => 'includes/MediaBrowserView.inc',
          5 => 'includes/MediaEntityTranslationHandler.inc',
          6 => 'includes/media_views_plugin_display_media_browser.inc',
          7 => 'includes/media_views_plugin_style_media_browser.inc',
          8 => 'tests/media.test',
          9 => 'tests/media.entity.test',
        ),
        'configure' => 'admin/config/media/browser',
        'version' => '7.x-2.0-unstable7',
        'project' => 'media',
        'datestamp' => '1353227523',
        'php' => '5.2.4',
      ),
      'project' => 'media',
      'version' => '7.x-2.0-unstable7',
    ),
    'mediafield' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/media/modules/mediafield/mediafield.module',
      'name' => 'mediafield',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Media Field',
        'description' => 'Provides a field type that stores media-specific data. <em>Deprecated by the core File field type.</em>',
        'package' => 'Media',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'media',
        ),
        'version' => '7.x-2.0-unstable7',
        'project' => 'media',
        'datestamp' => '1353227523',
        'php' => '5.2.4',
      ),
      'project' => 'media',
      'version' => '7.x-2.0-unstable7',
    ),
    'media_internet' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/media/modules/media_internet/media_internet.module',
      'name' => 'media_internet',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Media Internet Sources',
        'description' => 'Provides an API for accessing media on various internet services',
        'package' => 'Media',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'media',
        ),
        'files' => 
        array (
          0 => 'includes/MediaBrowserInternet.inc',
        ),
        'version' => '7.x-2.0-unstable7',
        'project' => 'media',
        'datestamp' => '1353227523',
        'php' => '5.2.4',
      ),
      'project' => 'media',
      'version' => '7.x-2.0-unstable7',
    ),
    'media_soundcloud' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/media_soundcloud/media_soundcloud.module',
      'name' => 'media_soundcloud',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Media: SoundCloud',
        'description' => 'Provides SoundCloud support to the Media module.',
        'package' => 'Media',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'media_soundcloud.module',
          1 => 'includes/MediaSoundCloudStreamWrapper.inc',
          2 => 'includes/MediaInternetSoundCloudHandler.inc',
          3 => 'includes/media_soundcloud.styles.inc',
          4 => 'includes/MediaSoundCloudStyles.inc',
        ),
        'dependencies' => 
        array (
          0 => 'media_internet',
        ),
        'version' => '7.x-1.0',
        'project' => 'media_soundcloud',
        'datestamp' => '1363779912',
        'php' => '5.2.4',
      ),
      'project' => 'media_soundcloud',
      'version' => '7.x-1.0',
    ),
    'media_vimeo' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/media_vimeo/media_vimeo.module',
      'name' => 'media_vimeo',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7200',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Media: Vimeo',
        'description' => 'Provides Vimeo support to the Media module.',
        'package' => 'Media',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'media_vimeo.module',
          1 => 'includes/MediaInternetVimeoHandler.inc',
          2 => 'includes/MediaVimeoStreamWrapper.inc',
          3 => 'includes/media_vimeo.formatters.inc',
          4 => 'includes/media_vimeo.variables.inc',
        ),
        'dependencies' => 
        array (
          0 => 'media',
          1 => 'media_internet',
        ),
        'version' => '7.x-2.x-dev',
        'project' => 'media_vimeo',
        'datestamp' => '1355404546',
        'php' => '5.2.4',
      ),
      'project' => 'media_vimeo',
      'version' => '7.x-2.x-dev',
    ),
    'media_youtube' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/media_youtube/media_youtube.module',
      'name' => 'media_youtube',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7202',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Media: YouTube',
        'description' => 'Provides YouTube support for File Entity and the Media module.',
        'package' => 'Media',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'includes/MediaInternetYouTubeHandler.inc',
          1 => 'includes/MediaYouTubeStreamWrapper.inc',
          2 => 'includes/MediaYouTubeBrowser.inc',
        ),
        'dependencies' => 
        array (
          0 => 'media',
          1 => 'media_internet',
        ),
        'version' => '7.x-2.0-rc3',
        'project' => 'media_youtube',
        'datestamp' => '1367383511',
        'php' => '5.2.4',
      ),
      'project' => 'media_youtube',
      'version' => '7.x-2.0-rc3',
    ),
    'menu' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/menu/menu.module',
      'name' => 'menu',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7003',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Menu',
        'description' => 'Allows administrators to customize the site navigation menu.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'menu.test',
        ),
        'configure' => 'admin/structure/menu',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'message' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'message',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7012',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'mnartist_activity' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/mnartist_activity/mnartist_activity.module',
      'name' => 'mnartist_activity',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MNArtist Activity',
        'core' => '7.x',
        'package' => 'MNArtists',
        'php' => '5.2.4',
        'version' => '7.x-1.0',
        'project' => 'mnartist_activity',
        'dependencies' => 
        array (
          0 => 'flag',
          1 => 'views',
          2 => 'activity',
          3 => 'trigger',
          4 => 'mnartist_profiles',
        ),
        'description' => '',
      ),
      'platform' => -1,
      'project' => 'mnartist_activity',
      'version' => '7.x-1.0',
    ),
    'mnartist_article' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/mnartist_article/mnartist_article.module',
      'name' => 'mnartist_article',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MNArists Article',
        'core' => '7.x',
        'package' => 'MNArtists',
        'php' => '5.2.4',
        'version' => '7.x-1.0',
        'project' => 'artist_community',
        'dependencies' => 
        array (
          0 => 'artist_community',
          1 => 'mnartist_profiles',
          2 => 'wysiwyg',
        ),
        'project path' => 'sites/default/modules',
        'description' => '',
      ),
      'platform' => -1,
      'project' => 'artist_community',
      'version' => '7.x-1.0',
    ),
    'mnartist_artwork' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'mnartist_artwork',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => '',
      'version' => NULL,
    ),
    'mnartist_collections' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/mnartist_collections/mnartist_collections.module',
      'name' => 'mnartist_collections',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MNArtist Collections',
        'core' => '7.x',
        'package' => 'MNArtists',
        'php' => '5.2.4',
        'version' => '7.x-1.0',
        'project' => 'mnartist_collections',
        'dependencies' => 
        array (
          0 => 'flag',
          1 => 'flag_lists',
          2 => 'views',
        ),
        'description' => '',
      ),
      'platform' => -1,
      'project' => 'mnartist_collections',
      'version' => '7.x-1.0',
    ),
    'mnartist_filter' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/mnartist_filter/mnartist_filter.module',
      'name' => 'mnartist_filter',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MNArtist Filter',
        'core' => '7.x',
        'package' => 'MNArtists',
        'php' => '5.2.4',
        'version' => '7.x-1.0',
        'project' => 'mnartist_filter',
        'dependencies' => 
        array (
          0 => 'flag',
          1 => 'views',
        ),
        'description' => '',
      ),
      'platform' => -1,
      'project' => 'mnartist_filter',
      'version' => '7.x-1.0',
    ),
    'mnartist_flag_lists_privacy' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/mnartist_flag_lists_privacy/mnartist_flag_lists_privacy.module',
      'name' => 'mnartist_flag_lists_privacy',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MNArtist Flag Lists Privacy',
        'core' => '7.x',
        'package' => 'MNArtists',
        'php' => '5.2.4',
        'version' => '7.x-1.0',
        'project' => 'mnartist_flag_lists_privacy',
        'dependencies' => 
        array (
          0 => 'flag',
          1 => 'flag_lists',
        ),
        'description' => '',
      ),
      'platform' => -1,
      'project' => 'mnartist_flag_lists_privacy',
      'version' => '7.x-1.0',
    ),
    'mnartist_profiles' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/mnartist_profiles/mnartist_profiles.module',
      'name' => 'mnartist_profiles',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MNArtist Profiles',
        'core' => '7.x',
        'package' => 'MNArtists',
        'php' => '5.2.4',
        'version' => '7.x-1.0',
        'project' => 'mnartist_profiles',
        'dependencies' => 
        array (
          0 => 'artist_community',
          1 => 'taxonomy',
          2 => 'text',
          3 => 'views',
          4 => 'views_slideshow',
        ),
        'features' => 
        array (
          'ctools' => 
          array (
            0 => 'views:views_default:3.0',
          ),
          'features_api' => 
          array (
            0 => 'api:1',
          ),
          'field_base' => 
          array (
            0 => 'field__teaching_venue',
            1 => 'field_award_name',
            2 => 'field_award_organization',
            3 => 'field_awards',
            4 => 'field_bio',
            5 => 'field_biography',
            6 => 'field_birthdate',
            7 => 'field_birthplace',
            8 => 'field_collection_name',
            9 => 'field_collections',
            10 => 'field_country',
            11 => 'field_course',
            12 => 'field_degree',
            13 => 'field_description',
            14 => 'field_education',
            15 => 'field_employer',
            16 => 'field_exhibition_and_performance',
            17 => 'field_exhibition_venue',
            18 => 'field_facebook',
            19 => 'field_galleries',
            20 => 'field_gallery_name',
            21 => 'field_gender',
            22 => 'field_general_statement',
            23 => 'field_group_individual',
            24 => 'field_organization',
            25 => 'field_organization_name',
            26 => 'field_organization_type',
            27 => 'field_position',
            28 => 'field_pseudonym',
            29 => 'field_publication',
            30 => 'field_publication_title',
            31 => 'field_publications',
            32 => 'field_related_organizations',
            33 => 'field_school',
            34 => 'field_services',
            35 => 'field_teaching_experience',
            36 => 'field_title',
            37 => 'field_twitter',
            38 => 'field_websites',
            39 => 'field_work_experience',
            40 => 'field_works',
            41 => 'field_year',
            42 => 'field_years',
          ),
          'field_instance' => 
          array (
            0 => 'field_collection_item-field_awards-field_award_name',
            1 => 'field_collection_item-field_awards-field_award_organization',
            2 => 'field_collection_item-field_awards-field_year',
            3 => 'field_collection_item-field_collections-field_collection_name',
            4 => 'field_collection_item-field_collections-field_works',
            5 => 'field_collection_item-field_education-field_degree',
            6 => 'field_collection_item-field_education-field_school',
            7 => 'field_collection_item-field_education-field_year',
            8 => 'field_collection_item-field_exhibition_and_performance-field_exhibition_venue',
            9 => 'field_collection_item-field_exhibition_and_performance-field_group_individual',
            10 => 'field_collection_item-field_exhibition_and_performance-field_title',
            11 => 'field_collection_item-field_exhibition_and_performance-field_year',
            12 => 'field_collection_item-field_galleries-field_contact_name',
            13 => 'field_collection_item-field_galleries-field_gallery_name',
            14 => 'field_collection_item-field_publications-field_publication',
            15 => 'field_collection_item-field_publications-field_publication_title',
            16 => 'field_collection_item-field_publications-field_year',
            17 => 'field_collection_item-field_related_organizations-field_organization',
            18 => 'field_collection_item-field_related_organizations-field_years',
            19 => 'field_collection_item-field_teaching_experience-field__teaching_venue',
            20 => 'field_collection_item-field_teaching_experience-field_course',
            21 => 'field_collection_item-field_teaching_experience-field_year',
            22 => 'field_collection_item-field_work_experience-field_employer',
            23 => 'field_collection_item-field_work_experience-field_position',
            24 => 'field_collection_item-field_work_experience-field_years',
            25 => 'profile2-main-field_address',
            26 => 'profile2-main-field_bio',
            27 => 'profile2-main-field_birthdate',
            28 => 'profile2-main-field_birthplace',
            29 => 'profile2-main-field_city',
            30 => 'profile2-main-field_country',
            31 => 'profile2-main-field_facebook',
            32 => 'profile2-main-field_gender',
            33 => 'profile2-main-field_phone',
            34 => 'profile2-main-field_pseudonym',
            35 => 'profile2-main-field_services',
            36 => 'profile2-main-field_state',
            37 => 'profile2-main-field_twitter',
            38 => 'profile2-main-field_zip',
            39 => 'profile2-organization-field_additional_links',
            40 => 'profile2-organization-field_description',
            41 => 'profile2-organization-field_organization_name',
            42 => 'profile2-organization-field_organization_type',
            43 => 'profile2-organization-field_url',
            44 => 'profile2-resume-field_awards',
            45 => 'profile2-resume-field_biography',
            46 => 'profile2-resume-field_collections',
            47 => 'profile2-resume-field_education',
            48 => 'profile2-resume-field_exhibition_and_performance',
            49 => 'profile2-resume-field_galleries',
            50 => 'profile2-resume-field_general_statement',
            51 => 'profile2-resume-field_publications',
            52 => 'profile2-resume-field_related_organizations',
            53 => 'profile2-resume-field_teaching_experience',
            54 => 'profile2-resume-field_websites',
            55 => 'profile2-resume-field_work_experience',
          ),
          'profile2_type' => 
          array (
            0 => 'main',
            1 => 'organization',
            2 => 'resume',
          ),
          'taxonomy' => 
          array (
            0 => 'organization_type',
          ),
          'views_view' => 
          array (
            0 => 'artist_artworks',
            1 => 'artists',
          ),
        ),
        'features_exclude' => 
        array (
          'dependencies' => 
          array (
            'date' => 'date',
            'entity' => 'entity',
            'features' => 'features',
            'field_collection' => 'field_collection',
            'list' => 'list',
            'number' => 'number',
            'options' => 'options',
            'phone' => 'phone',
            'profile2' => 'profile2',
            'url' => 'url',
            'ctools' => 'ctools',
          ),
          'field_base' => 
          array (
            'field_phone' => 'field_phone',
            'field_url' => 'field_url',
            'field_address' => 'field_address',
            'field_city' => 'field_city',
            'field_state' => 'field_state',
            'field_zip' => 'field_zip',
            'field_contact_name' => 'field_contact_name',
          ),
          'field' => 
          array (
            'field_collection_item-field_education-field_school' => 'field_collection_item-field_education-field_school',
            'field_collection_item-field_education-field_degree' => 'field_collection_item-field_education-field_degree',
            'field_collection_item-field_education-field_year' => 'field_collection_item-field_education-field_year',
            'field_collection_item-field_work_experience-field_employer' => 'field_collection_item-field_work_experience-field_employer',
            'field_collection_item-field_work_experience-field_position' => 'field_collection_item-field_work_experience-field_position',
            'field_collection_item-field_work_experience-field_years' => 'field_collection_item-field_work_experience-field_years',
            'field_collection_item-field_teaching_experience-field__teaching_venue' => 'field_collection_item-field_teaching_experience-field__teaching_venue',
            'field_collection_item-field_teaching_experience-field_course' => 'field_collection_item-field_teaching_experience-field_course',
            'field_collection_item-field_teaching_experience-field_year' => 'field_collection_item-field_teaching_experience-field_year',
            'field_collection_item-field_awards-field_award_name' => 'field_collection_item-field_awards-field_award_name',
            'field_collection_item-field_awards-field_year' => 'field_collection_item-field_awards-field_year',
            'field_collection_item-field_awards-field_award_organization' => 'field_collection_item-field_awards-field_award_organization',
            'field_collection_item-field_exhibition_and_performance-field_title' => 'field_collection_item-field_exhibition_and_performance-field_title',
            'field_collection_item-field_exhibition_and_performance-field_exhibition_venue' => 'field_collection_item-field_exhibition_and_performance-field_exhibition_venue',
            'field_collection_item-field_exhibition_and_performance-field_year' => 'field_collection_item-field_exhibition_and_performance-field_year',
            'field_collection_item-field_exhibition_and_performance-field_group_individual' => 'field_collection_item-field_exhibition_and_performance-field_group_individual',
            'field_collection_item-field_publications-field_publication' => 'field_collection_item-field_publications-field_publication',
            'field_collection_item-field_publications-field_publication_title' => 'field_collection_item-field_publications-field_publication_title',
            'field_collection_item-field_publications-field_year' => 'field_collection_item-field_publications-field_year',
            'field_collection_item-field_galleries-field_gallery_name' => 'field_collection_item-field_galleries-field_gallery_name',
            'field_collection_item-field_galleries-field_contact_name' => 'field_collection_item-field_galleries-field_contact_name',
            'field_collection_item-field_collections-field_collection_name' => 'field_collection_item-field_collections-field_collection_name',
            'field_collection_item-field_collections-field_works' => 'field_collection_item-field_collections-field_works',
            'field_collection_item-field_related_organizations-field_organization' => 'field_collection_item-field_related_organizations-field_organization',
            'field_collection_item-field_related_organizations-field_years' => 'field_collection_item-field_related_organizations-field_years',
            'profile2-main-field_address' => 'profile2-main-field_address',
            'profile2-main-field_state' => 'profile2-main-field_state',
            'profile2-main-field_city' => 'profile2-main-field_city',
            'profile2-main-field_zip' => 'profile2-main-field_zip',
            'profile2-main-field_country' => 'profile2-main-field_country',
            'profile2-main-field_phone' => 'profile2-main-field_phone',
            'profile2-main-field_twitter' => 'profile2-main-field_twitter',
            'profile2-main-field_facebook' => 'profile2-main-field_facebook',
            'profile2-main-field_pseudonym' => 'profile2-main-field_pseudonym',
            'profile2-main-field_birthplace' => 'profile2-main-field_birthplace',
            'profile2-main-field_birthdate' => 'profile2-main-field_birthdate',
            'profile2-main-field_gender' => 'profile2-main-field_gender',
            'profile2-main-field_services' => 'profile2-main-field_services',
            'profile2-main-field_bio' => 'profile2-main-field_bio',
            'profile2-resume-field_general_statement' => 'profile2-resume-field_general_statement',
            'profile2-resume-field_biography' => 'profile2-resume-field_biography',
            'profile2-resume-field_education' => 'profile2-resume-field_education',
            'profile2-resume-field_work_experience' => 'profile2-resume-field_work_experience',
            'profile2-resume-field_teaching_experience' => 'profile2-resume-field_teaching_experience',
            'profile2-resume-field_awards' => 'profile2-resume-field_awards',
            'profile2-resume-field_exhibition_and_performance' => 'profile2-resume-field_exhibition_and_performance',
            'profile2-resume-field_publications' => 'profile2-resume-field_publications',
            'profile2-resume-field_galleries' => 'profile2-resume-field_galleries',
            'profile2-resume-field_collections' => 'profile2-resume-field_collections',
            'profile2-resume-field_related_organizations' => 'profile2-resume-field_related_organizations',
            'profile2-resume-field_websites' => 'profile2-resume-field_websites',
            'profile2-organization-field_organization_name' => 'profile2-organization-field_organization_name',
            'profile2-organization-field_description' => 'profile2-organization-field_description',
            'profile2-organization-field_url' => 'profile2-organization-field_url',
            'profile2-organization-field_additional_links' => 'profile2-organization-field_additional_links',
            'profile2-organization-field_organization_type' => 'profile2-organization-field_organization_type',
          ),
        ),
        'project path' => 'sites/default/modules',
        'description' => '',
      ),
      'platform' => -1,
      'project' => 'mnartist_profiles',
      'version' => '7.x-1.0',
    ),
    'mnartist_register' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/mnartist_register/mnartist_register.module',
      'name' => 'mnartist_register',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MNArtist Register',
        'core' => '7.x',
        'package' => 'MNArtists',
        'php' => '5.2.4',
        'version' => '7.x-1.0',
        'project' => 'mnartist_register',
        'dependencies' => 
        array (
          0 => 'mnartist_profiles',
        ),
        'description' => '',
      ),
      'platform' => -1,
      'project' => 'mnartist_register',
      'version' => '7.x-1.0',
    ),
    'mnartist_twitter' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/mnartist_twitter/mnartist_twitter.module',
      'name' => 'mnartist_twitter',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MNArtist Twitter',
        'core' => '7.x',
        'package' => 'MNArtists',
        'php' => '5.2.4',
        'version' => '7.x-1.0',
        'project' => 'mnartist_twitter',
        'dependencies' => 
        array (
          0 => 'views',
        ),
        'description' => '',
      ),
      'platform' => -1,
      'project' => 'mnartist_twitter',
      'version' => '7.x-1.0',
    ),
    'mn_ap' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'mn_ap',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => '',
      'version' => NULL,
    ),
    'mn_op' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'mn_op',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => '',
      'version' => NULL,
    ),
    'module_filter' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'module_filter',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7201',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'node' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/node/node.module',
      'name' => 'node',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7013',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Node',
        'description' => 'Allows content to be submitted to the site and displayed on pages.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'node.module',
          1 => 'node.test',
        ),
        'required' => true,
        'configure' => 'admin/structure/types',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'node.css',
          ),
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'node_authored_select' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'node_authored_select',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'number' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/field/modules/number/number.module',
      'name' => 'number',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Number',
        'description' => 'Defines numeric field types.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'field',
        ),
        'files' => 
        array (
          0 => 'number.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'og' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/og/og.module',
      'name' => 'og',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7204',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Organic groups',
        'description' => 'API to allow associating content with groups.',
        'package' => 'Organic groups',
        'dependencies' => 
        array (
          0 => 'options',
          1 => 'list',
          2 => 'text',
          3 => 'entity',
          4 => 'entityreference',
        ),
        'core' => '7.x',
        'files' => 
        array (
          0 => 'og.info.inc',
          1 => 'includes/og.admin.inc',
          2 => 'includes/og.exception.inc',
          3 => 'includes/og.membership.inc',
          4 => 'includes/og.membership_type.inc',
          5 => 'includes/views/og.views.inc',
          6 => 'og.test',
          7 => 'includes/views/handlers/og_plugin_argument_validate_group.inc',
          8 => 'includes/views/handlers/og_plugin_argument_default_user_groups.inc',
          9 => 'includes/views/handlers/og_handler_field_group_member_count.inc',
          10 => 'includes/views/handlers/og_handler_field_group_audience_state.inc',
          11 => 'includes/views/handlers/og_handler_field_prerender_list.inc',
          12 => 'includes/views/handlers/og_handler_field_user_roles.inc',
          13 => 'includes/views/handlers/og_handler_field_group_permissions.inc',
          14 => 'includes/views/handlers/og_handler_field_og_membership_link_edit.inc',
          15 => 'includes/views/handlers/og_handler_filter_group_audience_state.inc',
          16 => 'includes/views/handlers/og_handler_filter_user_roles.inc',
          17 => 'includes/views/handlers/og_handler_relationship.inc',
          18 => 'includes/migrate/plugins/destinations/og_membership.inc',
          19 => 'includes/migrate/7000/og_add_fields.inc',
          20 => 'includes/migrate/7000/og_content.inc',
          21 => 'includes/migrate/7000/og_group.inc',
          22 => 'includes/migrate/7000/og_user.inc',
          23 => 'includes/migrate/7000/og_ogur_roles.migrate.inc',
          24 => 'includes/migrate/7000/og_ogur.migrate.inc',
          25 => 'includes/migrate/og.migrate.inc',
          26 => 'includes/migrate/7200/og_og_membership.migrate.inc',
          27 => 'includes/migrate/7200/og_roles.migrate.inc',
          28 => 'includes/migrate/7200/og_user_roles.migrate.inc',
        ),
        'version' => '7.x-2.4',
        'project' => 'og',
        'datestamp' => '1384971519',
        'php' => '5.2.4',
      ),
      'project' => 'og',
      'version' => '7.x-2.4',
    ),
    'og_access' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/og/og_access/og_access.module',
      'name' => 'og_access',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7200',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Organic groups access control',
        'description' => 'Enable access control for private and public groups and group content.',
        'package' => 'Organic groups',
        'dependencies' => 
        array (
          0 => 'og',
        ),
        'core' => '7.x',
        'version' => '7.x-2.4',
        'files' => 
        array (
          0 => 'og_access.module',
          1 => 'og_access.install',
          2 => 'og_access.test',
        ),
        'project' => 'og',
        'datestamp' => '1384971519',
        'php' => '5.2.4',
      ),
      'project' => 'og',
      'version' => '7.x-2.4',
    ),
    'og_context' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/og/og_context/og_context.module',
      'name' => 'og_context',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Organic groups context',
        'description' => 'Get a group from a viewed page.',
        'package' => 'Organic groups',
        'dependencies' => 
        array (
          0 => 'og',
        ),
        'core' => '7.x',
        'files' => 
        array (
          0 => 'og_context.module',
          1 => 'og_context.install',
          2 => 'includes/views/handlers/og_context_plugin_argument_default_group_context.inc',
          3 => 'includes/views/handlers/og_context_plugin_access_og_perm.inc',
        ),
        'version' => '7.x-2.4',
        'project' => 'og',
        'datestamp' => '1384971519',
        'php' => '5.2.4',
      ),
      'project' => 'og',
      'version' => '7.x-2.4',
    ),
    'og_example' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/og/og_example/og_example.module',
      'name' => 'og_example',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'ctools',
          1 => 'entityreference_prepopulate',
          2 => 'features',
          3 => 'list',
          4 => 'message_notify',
          5 => 'og',
          6 => 'og_ui',
          7 => 'page_manager',
          8 => 'panels',
          9 => 'rules',
          10 => 'views_content',
        ),
        'description' => 'Example module to show Organic groups configuration that can be used as building block.',
        'features' => 
        array (
          'ctools' => 
          array (
            0 => 'page_manager:pages_default:1',
          ),
          'field' => 
          array (
            0 => 'message-og_new_content-field_node_reference',
            1 => 'node-group-body',
            2 => 'node-group-group_group',
            3 => 'node-post-body',
            4 => 'node-post-og_group_ref',
            5 => 'node-post-og_group_ref_other_groups',
          ),
          'message_type' => 
          array (
            0 => 'og_new_content',
          ),
          'node' => 
          array (
            0 => 'group',
            1 => 'post',
          ),
          'page_manager_handlers' => 
          array (
            0 => 'node_view_panel_context',
          ),
          'rules_config' => 
          array (
            0 => 'rules_og_new_content_message',
          ),
        ),
        'name' => 'OG example',
        'package' => 'Features',
        'php' => '5.2.4',
        'version' => '7.x-2.4',
        'project' => 'og',
        'datestamp' => '1384971519',
      ),
      'project' => 'og',
      'version' => '7.x-2.4',
    ),
    'og_field_access' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/og/og_field_access/og_field_access.module',
      'name' => 'og_field_access',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Organic groups field access',
        'description' => 'Provide field access based on group.',
        'package' => 'Organic groups',
        'dependencies' => 
        array (
          0 => 'og',
        ),
        'core' => '7.x',
        'files' => 
        array (
          0 => 'og_field_access.module',
          1 => 'og_field_access.test',
        ),
        'version' => '7.x-2.4',
        'project' => 'og',
        'datestamp' => '1384971519',
        'php' => '5.2.4',
      ),
      'project' => 'og',
      'version' => '7.x-2.4',
    ),
    'og_register' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/og/og_register/og_register.module',
      'name' => 'og_register',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Organic groups register',
        'description' => 'Allow subscribing to groups during the user registration.',
        'package' => 'Organic groups',
        'dependencies' => 
        array (
          0 => 'og',
        ),
        'core' => '7.x',
        'files' => 
        array (
          0 => 'og_register.module',
          1 => 'og_register.install',
        ),
        'version' => '7.x-2.4',
        'project' => 'og',
        'datestamp' => '1384971519',
        'php' => '5.2.4',
      ),
      'project' => 'og',
      'version' => '7.x-2.4',
    ),
    'og_ui' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/og/og_ui/og_ui.module',
      'name' => 'og_ui',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7200',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Organic groups UI',
        'description' => 'Organic groups UI.',
        'package' => 'Organic groups',
        'dependencies' => 
        array (
          0 => 'og',
          1 => 'views_bulk_operations',
        ),
        'core' => '7.x',
        'version' => '7.x-2.4',
        'files' => 
        array (
          0 => 'og_ui.test',
          1 => 'includes/views/handlers/og_ui_handler_area_og_membership_overview.inc',
          2 => 'includes/migrate/7000/add_field.inc',
          3 => 'includes/migrate/7000/populate_field.inc',
          4 => 'includes/migrate/7000/set_roles.inc',
        ),
        'configure' => 'admin/config/group',
        'project' => 'og',
        'datestamp' => '1384971519',
        'php' => '5.2.4',
      ),
      'project' => 'og',
      'version' => '7.x-2.4',
    ),
    'openid' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/openid/openid.module',
      'name' => 'openid',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'OpenID',
        'description' => 'Allows users to log into your site using OpenID.',
        'version' => '7.22',
        'package' => 'Core',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'openid.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'options' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/field/modules/options/options.module',
      'name' => 'options',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Options',
        'description' => 'Defines selection, check box and radio button widgets for text and numeric fields.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'field',
        ),
        'files' => 
        array (
          0 => 'options.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'overlay' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/overlay/overlay.module',
      'name' => 'overlay',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Overlay',
        'description' => 'Displays the Drupal administration interface in an overlay.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'page_manager' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/ctools/page_manager/page_manager.module',
      'name' => 'page_manager',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '99',
      'info' => 
      array (
        'name' => 'Page manager',
        'description' => 'Provides a UI and API to manage pages within the site.',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'ctools',
        ),
        'package' => 'Chaos tool suite',
        'version' => '7.x-1.3',
        'project' => 'ctools',
        'datestamp' => '1365013512',
        'php' => '5.2.4',
      ),
      'project' => 'ctools',
      'version' => '7.x-1.3',
    ),
    'panelizer' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/panelizer/panelizer.module',
      'name' => 'panelizer',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7110',
      'weight' => '21',
      'info' => 
      array (
        'name' => 'Panelizer',
        'description' => 'Allow any node type to have custom panel displays, similar to the panel node type.',
        'package' => 'Panels',
        'dependencies' => 
        array (
          0 => 'panels',
          1 => 'ctools',
          2 => 'page_manager',
        ),
        'core' => '7.x',
        'configure' => 'admin/config/content/panelizer',
        'files' => 
        array (
          0 => 'plugins/views/panelizer_handler_field_link.inc',
          1 => 'plugins/views/panelizer_handler_panelizer_status.inc',
          2 => 'plugins/views/panelizer_handler_filter_panelizer_status.inc',
          3 => 'plugins/views/panelizer_plugin_row_panelizer_node_view.inc',
        ),
        'version' => '7.x-3.1',
        'project' => 'panelizer',
        'datestamp' => '1360785942',
        'php' => '5.2.4',
      ),
      'project' => 'panelizer',
      'version' => '7.x-3.1',
    ),
    'panels' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/panels/panels.module',
      'name' => 'panels',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7301',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Panels',
        'description' => 'Core Panels display functions; provides no external UI, at least one other Panels module should be enabled.',
        'core' => '7.x',
        'package' => 'Panels',
        'configure' => 'admin/structure/panels',
        'dependencies' => 
        array (
          0 => 'ctools',
        ),
        'files' => 
        array (
          0 => 'panels.module',
          1 => 'includes/common.inc',
          2 => 'includes/legacy.inc',
          3 => 'includes/plugins.inc',
          4 => 'plugins/views/panels_views_plugin_row_fields.inc',
        ),
        'version' => '7.x-3.3',
        'project' => 'panels',
        'datestamp' => '1345319572',
        'php' => '5.2.4',
      ),
      'project' => 'panels',
      'version' => '7.x-3.3',
    ),
    'panels_ipe' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/panels/panels_ipe/panels_ipe.module',
      'name' => 'panels_ipe',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Panels In-Place Editor',
        'description' => 'Provide a UI for managing some Panels directly on the frontend, instead of having to use the backend.',
        'package' => 'Panels',
        'dependencies' => 
        array (
          0 => 'panels',
        ),
        'core' => '7.x',
        'configure' => 'admin/structure/panels',
        'files' => 
        array (
          0 => 'panels_ipe.module',
        ),
        'version' => '7.x-3.3',
        'project' => 'panels',
        'datestamp' => '1345319572',
        'php' => '5.2.4',
      ),
      'project' => 'panels',
      'version' => '7.x-3.3',
    ),
    'panels_mini' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/panels/panels_mini/panels_mini.module',
      'name' => 'panels_mini',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Mini panels',
        'description' => 'Create mini panels that can be used as blocks by Drupal and panes by other panel modules.',
        'package' => 'Panels',
        'dependencies' => 
        array (
          0 => 'panels',
        ),
        'core' => '7.x',
        'files' => 
        array (
          0 => 'plugins/export_ui/panels_mini_ui.class.php',
        ),
        'version' => '7.x-3.3',
        'project' => 'panels',
        'datestamp' => '1345319572',
        'php' => '5.2.4',
      ),
      'project' => 'panels',
      'version' => '7.x-3.3',
    ),
    'panels_node' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/panels/panels_node/panels_node.module',
      'name' => 'panels_node',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Panel nodes',
        'description' => 'Create nodes that are divided into areas with selectable content.',
        'package' => 'Panels',
        'dependencies' => 
        array (
          0 => 'panels',
        ),
        'configure' => 'admin/structure/panels',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'panels_node.module',
        ),
        'version' => '7.x-3.3',
        'project' => 'panels',
        'datestamp' => '1345319572',
        'php' => '5.2.4',
      ),
      'project' => 'panels',
      'version' => '7.x-3.3',
    ),
    'partial_date' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/partial_date/partial_date.module',
      'name' => 'partial_date',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Partial Date',
        'description' => 'Simple date field that collects dates and allows partial dates.',
        'package' => 'Date/Time',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'date',
        ),
        'files' => 
        array (
          0 => 'includes/partial_date.views.year_period_handler.inc',
        ),
        'version' => '7.x-1.0-beta1',
        'project' => 'partial_date',
        'datestamp' => '1342599117',
        'php' => '5.2.4',
      ),
      'project' => 'partial_date',
      'version' => '7.x-1.0-beta1',
    ),
    'path' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/path/path.module',
      'name' => 'path',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Path',
        'description' => 'Allows users to rename URLs.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'path.test',
        ),
        'configure' => 'admin/config/search/path',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'pathauto' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/pathauto/pathauto.module',
      'name' => 'pathauto',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7005',
      'weight' => '1',
      'info' => 
      array (
        'name' => 'Pathauto',
        'description' => 'Provides a mechanism for modules to automatically generate aliases for the content they manage.',
        'dependencies' => 
        array (
          0 => 'path',
          1 => 'token',
        ),
        'core' => '7.x',
        'files' => 
        array (
          0 => 'pathauto.test',
        ),
        'configure' => 'admin/config/search/path/patterns',
        'recommends' => 
        array (
          0 => 'redirect',
        ),
        'version' => '7.x-1.2',
        'project' => 'pathauto',
        'datestamp' => '1344525185',
        'php' => '5.2.4',
      ),
      'project' => 'pathauto',
      'version' => '7.x-1.2',
    ),
    'phone' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/phone/phone.module',
      'name' => 'phone',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7199',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Phone',
        'description' => 'The phone module allows administrators to define a field type for phone numbers.',
        'package' => 'Fields',
        'dependencies' => 
        array (
          0 => 'field',
        ),
        'files' => 
        array (
          0 => 'phone.migrate.inc',
          1 => 'tests/phone.au.test',
          2 => 'tests/phone.be.test',
          3 => 'tests/phone.br.test',
          4 => 'tests/phone.ca.test',
          5 => 'tests/phone.ch.test',
          6 => 'tests/phone.cl.test',
          7 => 'tests/phone.cn.test',
          8 => 'tests/phone.cr.test',
          9 => 'tests/phone.cs.test',
          10 => 'tests/phone.eg.test',
          11 => 'tests/phone.es.test',
          12 => 'tests/phone.fr.test',
          13 => 'tests/phone.hu.test',
          14 => 'tests/phone.il.test',
          15 => 'tests/phone.int.test',
          16 => 'tests/phone.it.test',
          17 => 'tests/phone.jo.test',
          18 => 'tests/phone.nl.test',
          19 => 'tests/phone.nz.test',
          20 => 'tests/phone.pa.test',
          21 => 'tests/phone.ph.test',
          22 => 'tests/phone.pk.test',
          23 => 'tests/phone.pl.test',
          24 => 'tests/phone.ru.test',
          25 => 'tests/phone.se.test',
          26 => 'tests/phone.sg.test',
          27 => 'tests/phone.ua.test',
          28 => 'tests/phone.uk.test',
          29 => 'tests/phone.za.test',
        ),
        'core' => '7.x',
        'version' => '7.x-1.x-dev',
        'project' => 'phone',
        'datestamp' => '1369449996',
        'php' => '5.2.4',
      ),
      'project' => 'phone',
      'version' => '7.x-1.x-dev',
    ),
    'php' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/php/php.module',
      'name' => 'php',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'PHP filter',
        'description' => 'Allows embedded PHP code/snippets to be evaluated.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'php.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'poll' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/poll/poll.module',
      'name' => 'poll',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Poll',
        'description' => 'Allows your site to capture votes on different topics in the form of multiple choice questions.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'poll.test',
        ),
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'poll.css',
          ),
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'profile2' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/profile2/profile2.module',
      'name' => 'profile2',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7102',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Profile2',
        'description' => 'Supports configurable user profiles.',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'profile2.admin.inc',
          1 => 'profile2.info.inc',
          2 => 'profile2.test',
        ),
        'dependencies' => 
        array (
          0 => 'entity',
        ),
        'configure' => 'admin/structure/profiles',
        'version' => '7.x-1.3',
        'project' => 'profile2',
        'datestamp' => '1356482021',
        'php' => '5.2.4',
      ),
      'project' => 'profile2',
      'version' => '7.x-1.3',
    ),
    'profile2_field_privacy' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/profile2_field_privacy/profile2_field_privacy.module',
      'name' => 'profile2_field_privacy',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Profile2 Field Privacy',
        'description' => 'Provides options for users to override visibility of their profile fields.',
        'dependencies' => 
        array (
          0 => 'user',
          1 => 'field',
          2 => 'profile2',
        ),
        'files' => 
        array (
          0 => 'profile2_field_privacy.admin.inc',
        ),
        'configure' => 'admin/config/people/profile2-field-privacy',
        'core' => '7.x',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'profile2_i18n' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/profile2/contrib/profile2_i18n.module',
      'name' => 'profile2_i18n',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Profile2 translation',
        'description' => 'Translate profile2 types.',
        'dependencies' => 
        array (
          0 => 'profile2',
          1 => 'i18n_string',
        ),
        'package' => 'Multilingual - Internationalization',
        'core' => '7.x',
        'version' => '7.x-1.3',
        'project' => 'profile2',
        'datestamp' => '1356482021',
        'php' => '5.2.4',
      ),
      'project' => 'profile2',
      'version' => '7.x-1.3',
    ),
    'profile2_og_access' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/profile2/contrib/profile2_og_access.module',
      'name' => 'profile2_og_access',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Profile2 group access',
        'description' => 'Adds Organic groups permissions to control profile access on the group level.',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'profile2',
          1 => 'og',
        ),
        'package' => 'Organic groups',
        'version' => '7.x-1.3',
        'project' => 'profile2',
        'datestamp' => '1356482021',
        'php' => '5.2.4',
      ),
      'project' => 'profile2',
      'version' => '7.x-1.3',
    ),
    'profile2_page' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/profile2/contrib/profile2_page.module',
      'name' => 'profile2_page',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Profile2 pages',
        'description' => 'Adds separate pages for viewing and editing profiles.',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'profile2',
        ),
        'version' => '7.x-1.3',
        'project' => 'profile2',
        'datestamp' => '1356482021',
        'php' => '5.2.4',
      ),
      'project' => 'profile2',
      'version' => '7.x-1.3',
    ),
    'profile2_privacy' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'profile2_privacy',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7101',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'rdf' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/rdf/rdf.module',
      'name' => 'rdf',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'RDF',
        'description' => 'Enriches your content with metadata to let other applications (e.g. search engines, aggregators) better understand its relationships and attributes.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'rdf.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'rules' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'rules',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7213',
      'weight' => '20',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'rules_admin' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'rules_admin',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'scheduler' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/scheduler/scheduler.module',
      'name' => 'scheduler',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '6101',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Scheduler',
        'description' => 'This module allows nodes to be published and unpublished on specified dates and time.',
        'core' => '7.x',
        'configure' => 'admin/config/content/scheduler',
        'files' => 
        array (
          0 => 'scheduler.install',
          1 => 'scheduler.module',
          2 => 'scheduler.views.inc',
          3 => 'scheduler.test',
          4 => 'scheduler_handler_field_scheduler_countdown.inc',
        ),
        'version' => '7.x-1.1',
        'project' => 'scheduler',
        'datestamp' => '1366294356',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'scheduler',
      'version' => '7.x-1.1',
    ),
    'search' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/search/search.module',
      'name' => 'search',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7000',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Search',
        'description' => 'Enables site-wide keyword searching.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'search.extender.inc',
          1 => 'search.test',
        ),
        'configure' => 'admin/config/search/settings',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'search.css',
          ),
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'search_api' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/search_api/search_api.module',
      'name' => 'search_api',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7114',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Search API',
        'description' => 'Provides a generic API for modules offering search capabilites.',
        'dependencies' => 
        array (
          0 => 'entity',
        ),
        'core' => '7.x',
        'package' => 'Search',
        'files' => 
        array (
          0 => 'search_api.test',
          1 => 'includes/callback.inc',
          2 => 'includes/callback_add_aggregation.inc',
          3 => 'includes/callback_add_hierarchy.inc',
          4 => 'includes/callback_add_url.inc',
          5 => 'includes/callback_add_viewed_entity.inc',
          6 => 'includes/callback_bundle_filter.inc',
          7 => 'includes/callback_language_control.inc',
          8 => 'includes/callback_node_access.inc',
          9 => 'includes/callback_node_status.inc',
          10 => 'includes/datasource.inc',
          11 => 'includes/datasource_entity.inc',
          12 => 'includes/datasource_external.inc',
          13 => 'includes/exception.inc',
          14 => 'includes/index_entity.inc',
          15 => 'includes/processor.inc',
          16 => 'includes/processor_html_filter.inc',
          17 => 'includes/processor_ignore_case.inc',
          18 => 'includes/processor_stopwords.inc',
          19 => 'includes/processor_tokenizer.inc',
          20 => 'includes/processor_transliteration.inc',
          21 => 'includes/query.inc',
          22 => 'includes/server_entity.inc',
          23 => 'includes/service.inc',
        ),
        'configure' => 'admin/config/search/search_api',
        'version' => '7.x-1.6',
        'project' => 'search_api',
        'datestamp' => '1369840267',
        'php' => '5.2.4',
      ),
      'project' => 'search_api',
      'version' => '7.x-1.6',
    ),
    'search_api_facetapi' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/search_api/contrib/search_api_facetapi/search_api_facetapi.module',
      'name' => 'search_api_facetapi',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Search facets',
        'description' => 'Integrate the Search API with the Facet API to provide facetted searches.',
        'dependencies' => 
        array (
          0 => 'search_api',
          1 => 'facetapi',
        ),
        'core' => '7.x',
        'package' => 'Search',
        'files' => 
        array (
          0 => 'plugins/facetapi/adapter.inc',
          1 => 'plugins/facetapi/query_type_term.inc',
          2 => 'plugins/facetapi/query_type_date.inc',
        ),
        'version' => '7.x-1.6',
        'project' => 'search_api',
        'datestamp' => '1369840267',
        'php' => '5.2.4',
      ),
      'project' => 'search_api',
      'version' => '7.x-1.6',
    ),
    'search_api_location' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'search_api_location',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'search_api_multi' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'search_api_multi',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7101',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'search_api_page' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/search_api_page/search_api_page.module',
      'name' => 'search_api_page',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '7102',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Search pages',
        'description' => 'Create search pages using Search API indexes.',
        'dependencies' => 
        array (
          0 => 'search_api',
        ),
        'core' => '7.x',
        'package' => 'Search',
        'configure' => 'admin/config/search/search_api/page',
        'version' => '7.x-1.0-beta2',
        'project' => 'search_api_page',
        'datestamp' => '1320944736',
        'php' => '5.2.4',
      ),
      'project' => 'search_api_page',
      'version' => '7.x-1.0-beta2',
    ),
    'search_api_solr' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/search_api_solr/search_api_solr.module',
      'name' => 'search_api_solr',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7102',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Solr search',
        'description' => 'Offers an implementation of the Search API that uses an Apache Solr server for indexing content.',
        'dependencies' => 
        array (
          0 => 'search_api',
        ),
        'core' => '7.x',
        'package' => 'Search',
        'files' => 
        array (
          0 => 'includes/document.inc',
          1 => 'includes/service.inc',
          2 => 'includes/solr_connection.inc',
          3 => 'includes/solr_connection.interface.inc',
          4 => 'includes/solr_field.inc',
          5 => 'includes/spellcheck.inc',
        ),
        'version' => '7.x-1.0-rc5',
        'project' => 'search_api_solr',
        'datestamp' => '1368804321',
        'php' => '5.2.4',
      ),
      'project' => 'search_api_solr',
      'version' => '7.x-1.0-rc5',
    ),
    'search_api_views' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/search_api/contrib/search_api_views/search_api_views.module',
      'name' => 'search_api_views',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7102',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Search views',
        'description' => 'Integrates the Search API with Views, enabling users to create views with searches as filters or arguments.',
        'dependencies' => 
        array (
          0 => 'search_api',
          1 => 'views',
        ),
        'core' => '7.x',
        'package' => 'Search',
        'files' => 
        array (
          0 => 'includes/display_facet_block.inc',
          1 => 'includes/handler_argument.inc',
          2 => 'includes/handler_argument_fulltext.inc',
          3 => 'includes/handler_argument_more_like_this.inc',
          4 => 'includes/handler_argument_taxonomy_term.inc',
          5 => 'includes/handler_filter.inc',
          6 => 'includes/handler_filter_boolean.inc',
          7 => 'includes/handler_filter_date.inc',
          8 => 'includes/handler_filter_fulltext.inc',
          9 => 'includes/handler_filter_language.inc',
          10 => 'includes/handler_filter_options.inc',
          11 => 'includes/handler_filter_text.inc',
          12 => 'includes/handler_sort.inc',
          13 => 'includes/query.inc',
        ),
        'version' => '7.x-1.6',
        'project' => 'search_api',
        'datestamp' => '1369840267',
        'php' => '5.2.4',
      ),
      'project' => 'search_api',
      'version' => '7.x-1.6',
    ),
    'shortcut' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/shortcut/shortcut.module',
      'name' => 'shortcut',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Shortcut',
        'description' => 'Allows users to manage customizable lists of shortcut links.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'shortcut.test',
        ),
        'configure' => 'admin/config/user-interface/shortcut',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'simplehtmldom' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/simplehtmldom/simplehtmldom.module',
      'name' => 'simplehtmldom',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'simplehtmldom API',
        'description' => 'A wrapper module around the simplehtmldom PHP library at sourceforge.',
        'package' => 'Filter',
        'core' => '7.x',
        'version' => '7.x-1.12',
        'project' => 'simplehtmldom',
        'datestamp' => '1307968619',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'simplehtmldom',
      'version' => '7.x-1.12',
    ),
    'simpletest' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/simpletest/simpletest.module',
      'name' => 'simpletest',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Testing',
        'description' => 'Provides a framework for unit and functional testing.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'simpletest.test',
          1 => 'drupal_web_test_case.php',
          2 => 'tests/actions.test',
          3 => 'tests/ajax.test',
          4 => 'tests/batch.test',
          5 => 'tests/bootstrap.test',
          6 => 'tests/cache.test',
          7 => 'tests/common.test',
          8 => 'tests/database_test.test',
          9 => 'tests/entity_crud_hook_test.test',
          10 => 'tests/entity_query.test',
          11 => 'tests/error.test',
          12 => 'tests/file.test',
          13 => 'tests/filetransfer.test',
          14 => 'tests/form.test',
          15 => 'tests/graph.test',
          16 => 'tests/image.test',
          17 => 'tests/lock.test',
          18 => 'tests/mail.test',
          19 => 'tests/menu.test',
          20 => 'tests/module.test',
          21 => 'tests/pager.test',
          22 => 'tests/password.test',
          23 => 'tests/path.test',
          24 => 'tests/registry.test',
          25 => 'tests/schema.test',
          26 => 'tests/session.test',
          27 => 'tests/tablesort.test',
          28 => 'tests/theme.test',
          29 => 'tests/unicode.test',
          30 => 'tests/update.test',
          31 => 'tests/xmlrpc.test',
          32 => 'tests/upgrade/upgrade.test',
          33 => 'tests/upgrade/upgrade.comment.test',
          34 => 'tests/upgrade/upgrade.filter.test',
          35 => 'tests/upgrade/upgrade.forum.test',
          36 => 'tests/upgrade/upgrade.locale.test',
          37 => 'tests/upgrade/upgrade.menu.test',
          38 => 'tests/upgrade/upgrade.node.test',
          39 => 'tests/upgrade/upgrade.taxonomy.test',
          40 => 'tests/upgrade/upgrade.trigger.test',
          41 => 'tests/upgrade/upgrade.translatable.test',
          42 => 'tests/upgrade/upgrade.upload.test',
          43 => 'tests/upgrade/upgrade.user.test',
          44 => 'tests/upgrade/update.aggregator.test',
          45 => 'tests/upgrade/update.trigger.test',
          46 => 'tests/upgrade/update.field.test',
          47 => 'tests/upgrade/update.user.test',
        ),
        'configure' => 'admin/config/development/testing/settings',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'standard' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/profiles/standard/standard.profile',
      'name' => 'standard',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '1000',
      'info' => 
      array (
        'name' => 'Standard',
        'description' => 'Install with commonly used features pre-configured.',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'block',
          1 => 'color',
          2 => 'comment',
          3 => 'contextual',
          4 => 'dashboard',
          5 => 'help',
          6 => 'image',
          7 => 'list',
          8 => 'menu',
          9 => 'number',
          10 => 'options',
          11 => 'path',
          12 => 'taxonomy',
          13 => 'dblog',
          14 => 'search',
          15 => 'shortcut',
          16 => 'toolbar',
          17 => 'overlay',
          18 => 'field_ui',
          19 => 'file',
          20 => 'rdf',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'statistics' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/statistics/statistics.module',
      'name' => 'statistics',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Statistics',
        'description' => 'Logs access statistics for your site.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'statistics.test',
        ),
        'configure' => 'admin/config/system/statistics',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'stylizer' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/ctools/stylizer/stylizer.module',
      'name' => 'stylizer',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Stylizer',
        'description' => 'Create custom styles for applications such as Panels.',
        'core' => '7.x',
        'package' => 'Chaos tool suite',
        'dependencies' => 
        array (
          0 => 'ctools',
          1 => 'color',
        ),
        'version' => '7.x-1.3',
        'project' => 'ctools',
        'datestamp' => '1365013512',
        'php' => '5.2.4',
      ),
      'project' => 'ctools',
      'version' => '7.x-1.3',
    ),
    'syslog' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/syslog/syslog.module',
      'name' => 'syslog',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Syslog',
        'description' => 'Logs and records system events to syslog.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'syslog.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'system' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/system/system.module',
      'name' => 'system',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7078',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'System',
        'description' => 'Handles general site configuration for administrators.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'system.archiver.inc',
          1 => 'system.mail.inc',
          2 => 'system.queue.inc',
          3 => 'system.tar.inc',
          4 => 'system.updater.inc',
          5 => 'system.test',
        ),
        'required' => true,
        'configure' => 'admin/config/system',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'taxonomy' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/taxonomy/taxonomy.module',
      'name' => 'taxonomy',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7010',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Taxonomy',
        'description' => 'Enables the categorization of content.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'options',
        ),
        'files' => 
        array (
          0 => 'taxonomy.module',
          1 => 'taxonomy.test',
        ),
        'configure' => 'admin/structure/taxonomy',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'terms_of_use' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/terms_of_use/terms_of_use.module',
      'name' => 'terms_of_use',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Terms of Use',
        'description' => 'Adds terms of Use to the registration page.',
        'core' => '7.x',
        'configure' => 'admin/config/people/terms_of_use',
        'files' => 
        array (
          0 => 'tests/terms_of_use.test',
        ),
        'version' => '7.x-1.2',
        'project' => 'terms_of_use',
        'datestamp' => '1341924142',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'terms_of_use',
      'version' => '7.x-1.2',
    ),
    'term_reference_tree' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/term_reference_tree/term_reference_tree.module',
      'name' => 'term_reference_tree',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Term Reference Tree',
        'description' => 'An expanding/collapsing tree widget for selecting terms in a taxonomy term reference field.',
        'package' => 'Fields',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'taxonomy',
        ),
        'version' => '7.x-1.10',
        'project' => 'term_reference_tree',
        'datestamp' => '1369842362',
        'php' => '5.2.4',
      ),
      'project' => 'term_reference_tree',
      'version' => '7.x-1.10',
    ),
    'text' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/field/modules/text/text.module',
      'name' => 'text',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7000',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Text',
        'description' => 'Defines simple text field types.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'field',
        ),
        'files' => 
        array (
          0 => 'text.test',
        ),
        'required' => true,
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'timefield' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/timefield/timefield.module',
      'name' => 'timefield',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Time Field',
        'description' => 'Implements a time field (HH:MM), with optional to time and weekly repeat value.',
        'core' => '7.x',
        'package' => 'Fields',
        'dependencies' => 
        array (
          0 => 'libraries',
        ),
        'files' => 
        array (
          0 => 'views/timefield_handler_field_timefield.inc',
          1 => 'views/timefield_plugin_style_minical.inc',
          2 => 'views/timefield_handler_field_timefield_duration.inc',
          3 => 'views/timefield_handler_sort_timefield_duration.inc',
          4 => 'views/timefield_handler_filter_timefield_duration.inc',
          5 => 'timefield.test',
        ),
        'version' => '7.x-1.0-alpha2',
        'project' => 'timefield',
        'datestamp' => '1356309026',
        'php' => '5.2.4',
      ),
      'project' => 'timefield',
      'version' => '7.x-1.0-alpha2',
    ),
    'token' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/token/token.module',
      'name' => 'token',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7001',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Token',
        'description' => 'Provides a user interface for the Token API and some missing core tokens.',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'token.test',
        ),
        'version' => '7.x-1.5',
        'project' => 'token',
        'datestamp' => '1361665026',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'token',
      'version' => '7.x-1.5',
    ),
    'toolbar' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/toolbar/toolbar.module',
      'name' => 'toolbar',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Toolbar',
        'description' => 'Provides a toolbar that shows the top-level administration menu items and links from other modules.',
        'core' => '7.x',
        'package' => 'Core',
        'version' => '7.22',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'tracker' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/tracker/tracker.module',
      'name' => 'tracker',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Tracker',
        'description' => 'Enables tracking of recent content for users.',
        'dependencies' => 
        array (
          0 => 'comment',
        ),
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'tracker.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'translation' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/translation/translation.module',
      'name' => 'translation',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Content translation',
        'description' => 'Allows content to be translated into different languages.',
        'dependencies' => 
        array (
          0 => 'locale',
        ),
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'translation.test',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'trigger' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/trigger/trigger.module',
      'name' => 'trigger',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7002',
      'weight' => '2',
      'info' => 
      array (
        'name' => 'Trigger',
        'description' => 'Enables actions to be fired on certain system events, such as when new content is created.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'trigger.test',
        ),
        'configure' => 'admin/structure/trigger',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'typekit_api' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/modules/fontyourface/modules/typekit_api/typekit_api.module',
      'name' => 'typekit_api',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '1',
      'info' => 
      array (
        'name' => 'Typekit API',
        'description' => '@font-your-face provider with Typekit.com fonts.',
        'dependencies' => 
        array (
          0 => 'fontyourface',
        ),
        'package' => '@font-your-face',
        'core' => '7.x',
        'php' => '5.2.0',
        'version' => '7.x-2.8',
        'project' => 'fontyourface',
        'datestamp' => '1367195415',
      ),
      'platform' => -1,
      'project' => 'fontyourface',
      'version' => '7.x-2.8',
    ),
    'update' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/update/update.module',
      'name' => 'update',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7001',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Update manager',
        'description' => 'Checks for available updates, and can securely install or update modules and themes via a web interface.',
        'version' => '7.22',
        'package' => 'Core',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'update.test',
        ),
        'configure' => 'admin/reports/updates/settings',
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'upload_default_avatar' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/upload_default_avatar/upload_default_avatar.module',
      'name' => 'upload_default_avatar',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Upload default avatar',
        'description' => 'This module adds form to upload the default user\'s avatar.',
        'dependencies' => 
        array (
          0 => 'image',
        ),
        'core' => '7.x',
        'files' => 
        array (
          0 => 'upload_default_avatar.module',
          1 => 'upload_default_avatar.install',
        ),
        'configure' => 'admin/config/people/accounts',
        'version' => '7.x-1.1',
        'project' => 'upload_default_avatar',
        'datestamp' => '1365124518',
        'php' => '5.2.4',
      ),
      'project' => 'upload_default_avatar',
      'version' => '7.x-1.1',
    ),
    'url' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/url/url.module',
      'name' => 'url',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7100',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'URL',
        'description' => 'Defines a simple URL field type.',
        'package' => 'Fields',
        'core' => '7.x',
        'dependencies' => 
        array (
          0 => 'field',
        ),
        'recommends' => 
        array (
          0 => 'elements',
        ),
        'files' => 
        array (
          0 => 'url.test',
        ),
        'version' => '7.x-1.0',
        'project' => 'url',
        'datestamp' => '1359196701',
        'php' => '5.2.4',
      ),
      'project' => 'url',
      'version' => '7.x-1.0',
    ),
    'user' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/modules/user/user.module',
      'name' => 'user',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7018',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'User',
        'description' => 'Manages the user registration and login system.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'user.module',
          1 => 'user.test',
        ),
        'required' => true,
        'configure' => 'admin/config/people',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'user.css',
          ),
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'user_avatar_block' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/upload_default_avatar/user_avatar_block/user_avatar_block.module',
      'name' => 'user_avatar_block',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'User Avatar Block',
        'description' => 'This module allow you to show styled users pictures into block.',
        'dependencies' => 
        array (
          0 => 'upload_default_avatar',
        ),
        'core' => '7.x',
        'files' => 
        array (
          0 => 'user_avatar_block.module',
          1 => 'user_avatar_block.install',
        ),
        'version' => '7.x-1.1',
        'project' => 'upload_default_avatar',
        'datestamp' => '1365124518',
        'php' => '5.2.4',
      ),
      'project' => 'upload_default_avatar',
      'version' => '7.x-1.1',
    ),
    'value_is' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists',
      'name' => 'value_is',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'dependencies' => 
        array (
        ),
        'description' => '',
        'version' => NULL,
        'php' => '5.2.4',
      ),
      'project' => '',
      'version' => NULL,
    ),
    'varnish' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/varnish/varnish.module',
      'name' => 'varnish',
      'type' => 'module',
      'owner' => '',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Varnish',
        'description' => 'Provides integration with the Varnish HTTP accelerator.',
        'core' => '7.x',
        'configure' => 'admin/config/development/varnish',
        'package' => 'Caching',
        'files' => 
        array (
          0 => 'varnish.admin.inc',
          1 => 'varnish.cache.inc',
          2 => 'varnish.test',
        ),
        'version' => '7.x-1.0-beta2',
        'project' => 'varnish',
        'datestamp' => '1361391598',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'varnish',
      'version' => '7.x-1.0-beta2',
    ),
    'views' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/views/views.module',
      'name' => 'views',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7301',
      'weight' => '10',
      'info' => 
      array (
        'name' => 'Views',
        'description' => 'Create customized lists and queries from your database.',
        'package' => 'Views',
        'core' => '7.x',
        'php' => '5.2',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'css/views.css',
          ),
        ),
        'dependencies' => 
        array (
          0 => 'ctools',
        ),
        'files' => 
        array (
          0 => 'handlers/views_handler_area.inc',
          1 => 'handlers/views_handler_area_result.inc',
          2 => 'handlers/views_handler_area_text.inc',
          3 => 'handlers/views_handler_area_text_custom.inc',
          4 => 'handlers/views_handler_area_view.inc',
          5 => 'handlers/views_handler_argument.inc',
          6 => 'handlers/views_handler_argument_date.inc',
          7 => 'handlers/views_handler_argument_formula.inc',
          8 => 'handlers/views_handler_argument_many_to_one.inc',
          9 => 'handlers/views_handler_argument_null.inc',
          10 => 'handlers/views_handler_argument_numeric.inc',
          11 => 'handlers/views_handler_argument_string.inc',
          12 => 'handlers/views_handler_argument_group_by_numeric.inc',
          13 => 'handlers/views_handler_field.inc',
          14 => 'handlers/views_handler_field_counter.inc',
          15 => 'handlers/views_handler_field_boolean.inc',
          16 => 'handlers/views_handler_field_contextual_links.inc',
          17 => 'handlers/views_handler_field_custom.inc',
          18 => 'handlers/views_handler_field_date.inc',
          19 => 'handlers/views_handler_field_entity.inc',
          20 => 'handlers/views_handler_field_markup.inc',
          21 => 'handlers/views_handler_field_math.inc',
          22 => 'handlers/views_handler_field_numeric.inc',
          23 => 'handlers/views_handler_field_prerender_list.inc',
          24 => 'handlers/views_handler_field_time_interval.inc',
          25 => 'handlers/views_handler_field_serialized.inc',
          26 => 'handlers/views_handler_field_machine_name.inc',
          27 => 'handlers/views_handler_field_url.inc',
          28 => 'handlers/views_handler_filter.inc',
          29 => 'handlers/views_handler_filter_boolean_operator.inc',
          30 => 'handlers/views_handler_filter_boolean_operator_string.inc',
          31 => 'handlers/views_handler_filter_combine.inc',
          32 => 'handlers/views_handler_filter_date.inc',
          33 => 'handlers/views_handler_filter_equality.inc',
          34 => 'handlers/views_handler_filter_entity_bundle.inc',
          35 => 'handlers/views_handler_filter_group_by_numeric.inc',
          36 => 'handlers/views_handler_filter_in_operator.inc',
          37 => 'handlers/views_handler_filter_many_to_one.inc',
          38 => 'handlers/views_handler_filter_numeric.inc',
          39 => 'handlers/views_handler_filter_string.inc',
          40 => 'handlers/views_handler_relationship.inc',
          41 => 'handlers/views_handler_relationship_groupwise_max.inc',
          42 => 'handlers/views_handler_sort.inc',
          43 => 'handlers/views_handler_sort_date.inc',
          44 => 'handlers/views_handler_sort_formula.inc',
          45 => 'handlers/views_handler_sort_group_by_numeric.inc',
          46 => 'handlers/views_handler_sort_menu_hierarchy.inc',
          47 => 'handlers/views_handler_sort_random.inc',
          48 => 'includes/base.inc',
          49 => 'includes/handlers.inc',
          50 => 'includes/plugins.inc',
          51 => 'includes/view.inc',
          52 => 'modules/aggregator/views_handler_argument_aggregator_fid.inc',
          53 => 'modules/aggregator/views_handler_argument_aggregator_iid.inc',
          54 => 'modules/aggregator/views_handler_argument_aggregator_category_cid.inc',
          55 => 'modules/aggregator/views_handler_field_aggregator_title_link.inc',
          56 => 'modules/aggregator/views_handler_field_aggregator_category.inc',
          57 => 'modules/aggregator/views_handler_field_aggregator_item_description.inc',
          58 => 'modules/aggregator/views_handler_field_aggregator_xss.inc',
          59 => 'modules/aggregator/views_handler_filter_aggregator_category_cid.inc',
          60 => 'modules/aggregator/views_plugin_row_aggregator_rss.inc',
          61 => 'modules/book/views_plugin_argument_default_book_root.inc',
          62 => 'modules/comment/views_handler_argument_comment_user_uid.inc',
          63 => 'modules/comment/views_handler_field_comment.inc',
          64 => 'modules/comment/views_handler_field_comment_depth.inc',
          65 => 'modules/comment/views_handler_field_comment_link.inc',
          66 => 'modules/comment/views_handler_field_comment_link_approve.inc',
          67 => 'modules/comment/views_handler_field_comment_link_delete.inc',
          68 => 'modules/comment/views_handler_field_comment_link_edit.inc',
          69 => 'modules/comment/views_handler_field_comment_link_reply.inc',
          70 => 'modules/comment/views_handler_field_comment_node_link.inc',
          71 => 'modules/comment/views_handler_field_comment_username.inc',
          72 => 'modules/comment/views_handler_field_ncs_last_comment_name.inc',
          73 => 'modules/comment/views_handler_field_ncs_last_updated.inc',
          74 => 'modules/comment/views_handler_field_node_comment.inc',
          75 => 'modules/comment/views_handler_field_node_new_comments.inc',
          76 => 'modules/comment/views_handler_field_last_comment_timestamp.inc',
          77 => 'modules/comment/views_handler_filter_comment_user_uid.inc',
          78 => 'modules/comment/views_handler_filter_ncs_last_updated.inc',
          79 => 'modules/comment/views_handler_filter_node_comment.inc',
          80 => 'modules/comment/views_handler_sort_comment_thread.inc',
          81 => 'modules/comment/views_handler_sort_ncs_last_comment_name.inc',
          82 => 'modules/comment/views_handler_sort_ncs_last_updated.inc',
          83 => 'modules/comment/views_plugin_row_comment_rss.inc',
          84 => 'modules/comment/views_plugin_row_comment_view.inc',
          85 => 'modules/contact/views_handler_field_contact_link.inc',
          86 => 'modules/field/views_handler_field_field.inc',
          87 => 'modules/field/views_handler_relationship_entity_reverse.inc',
          88 => 'modules/field/views_handler_argument_field_list.inc',
          89 => 'modules/field/views_handler_argument_field_list_string.inc',
          90 => 'modules/field/views_handler_filter_field_list.inc',
          91 => 'modules/filter/views_handler_field_filter_format_name.inc',
          92 => 'modules/locale/views_handler_field_node_language.inc',
          93 => 'modules/locale/views_handler_filter_node_language.inc',
          94 => 'modules/locale/views_handler_argument_locale_group.inc',
          95 => 'modules/locale/views_handler_argument_locale_language.inc',
          96 => 'modules/locale/views_handler_field_locale_group.inc',
          97 => 'modules/locale/views_handler_field_locale_language.inc',
          98 => 'modules/locale/views_handler_field_locale_link_edit.inc',
          99 => 'modules/locale/views_handler_filter_locale_group.inc',
          100 => 'modules/locale/views_handler_filter_locale_language.inc',
          101 => 'modules/locale/views_handler_filter_locale_version.inc',
          102 => 'modules/node/views_handler_argument_dates_various.inc',
          103 => 'modules/node/views_handler_argument_node_language.inc',
          104 => 'modules/node/views_handler_argument_node_nid.inc',
          105 => 'modules/node/views_handler_argument_node_type.inc',
          106 => 'modules/node/views_handler_argument_node_vid.inc',
          107 => 'modules/node/views_handler_argument_node_uid_revision.inc',
          108 => 'modules/node/views_handler_field_history_user_timestamp.inc',
          109 => 'modules/node/views_handler_field_node.inc',
          110 => 'modules/node/views_handler_field_node_link.inc',
          111 => 'modules/node/views_handler_field_node_link_delete.inc',
          112 => 'modules/node/views_handler_field_node_link_edit.inc',
          113 => 'modules/node/views_handler_field_node_revision.inc',
          114 => 'modules/node/views_handler_field_node_revision_link.inc',
          115 => 'modules/node/views_handler_field_node_revision_link_delete.inc',
          116 => 'modules/node/views_handler_field_node_revision_link_revert.inc',
          117 => 'modules/node/views_handler_field_node_path.inc',
          118 => 'modules/node/views_handler_field_node_type.inc',
          119 => 'modules/node/views_handler_filter_history_user_timestamp.inc',
          120 => 'modules/node/views_handler_filter_node_access.inc',
          121 => 'modules/node/views_handler_filter_node_status.inc',
          122 => 'modules/node/views_handler_filter_node_type.inc',
          123 => 'modules/node/views_handler_filter_node_uid_revision.inc',
          124 => 'modules/node/views_plugin_argument_default_node.inc',
          125 => 'modules/node/views_plugin_argument_validate_node.inc',
          126 => 'modules/node/views_plugin_row_node_rss.inc',
          127 => 'modules/node/views_plugin_row_node_view.inc',
          128 => 'modules/profile/views_handler_field_profile_date.inc',
          129 => 'modules/profile/views_handler_field_profile_list.inc',
          130 => 'modules/profile/views_handler_filter_profile_selection.inc',
          131 => 'modules/search/views_handler_argument_search.inc',
          132 => 'modules/search/views_handler_field_search_score.inc',
          133 => 'modules/search/views_handler_filter_search.inc',
          134 => 'modules/search/views_handler_sort_search_score.inc',
          135 => 'modules/search/views_plugin_row_search_view.inc',
          136 => 'modules/statistics/views_handler_field_accesslog_path.inc',
          137 => 'modules/system/views_handler_argument_file_fid.inc',
          138 => 'modules/system/views_handler_field_file.inc',
          139 => 'modules/system/views_handler_field_file_extension.inc',
          140 => 'modules/system/views_handler_field_file_filemime.inc',
          141 => 'modules/system/views_handler_field_file_uri.inc',
          142 => 'modules/system/views_handler_field_file_status.inc',
          143 => 'modules/system/views_handler_filter_file_status.inc',
          144 => 'modules/taxonomy/views_handler_argument_taxonomy.inc',
          145 => 'modules/taxonomy/views_handler_argument_term_node_tid.inc',
          146 => 'modules/taxonomy/views_handler_argument_term_node_tid_depth.inc',
          147 => 'modules/taxonomy/views_handler_argument_term_node_tid_depth_modifier.inc',
          148 => 'modules/taxonomy/views_handler_argument_vocabulary_vid.inc',
          149 => 'modules/taxonomy/views_handler_argument_vocabulary_machine_name.inc',
          150 => 'modules/taxonomy/views_handler_field_taxonomy.inc',
          151 => 'modules/taxonomy/views_handler_field_term_node_tid.inc',
          152 => 'modules/taxonomy/views_handler_field_term_link_edit.inc',
          153 => 'modules/taxonomy/views_handler_filter_term_node_tid.inc',
          154 => 'modules/taxonomy/views_handler_filter_term_node_tid_depth.inc',
          155 => 'modules/taxonomy/views_handler_filter_vocabulary_vid.inc',
          156 => 'modules/taxonomy/views_handler_filter_vocabulary_machine_name.inc',
          157 => 'modules/taxonomy/views_handler_relationship_node_term_data.inc',
          158 => 'modules/taxonomy/views_plugin_argument_validate_taxonomy_term.inc',
          159 => 'modules/taxonomy/views_plugin_argument_default_taxonomy_tid.inc',
          160 => 'modules/tracker/views_handler_argument_tracker_comment_user_uid.inc',
          161 => 'modules/tracker/views_handler_filter_tracker_comment_user_uid.inc',
          162 => 'modules/tracker/views_handler_filter_tracker_boolean_operator.inc',
          163 => 'modules/system/views_handler_filter_system_type.inc',
          164 => 'modules/translation/views_handler_argument_node_tnid.inc',
          165 => 'modules/translation/views_handler_field_node_link_translate.inc',
          166 => 'modules/translation/views_handler_field_node_translation_link.inc',
          167 => 'modules/translation/views_handler_filter_node_tnid.inc',
          168 => 'modules/translation/views_handler_filter_node_tnid_child.inc',
          169 => 'modules/translation/views_handler_relationship_translation.inc',
          170 => 'modules/user/views_handler_argument_user_uid.inc',
          171 => 'modules/user/views_handler_argument_users_roles_rid.inc',
          172 => 'modules/user/views_handler_field_user.inc',
          173 => 'modules/user/views_handler_field_user_language.inc',
          174 => 'modules/user/views_handler_field_user_link.inc',
          175 => 'modules/user/views_handler_field_user_link_cancel.inc',
          176 => 'modules/user/views_handler_field_user_link_edit.inc',
          177 => 'modules/user/views_handler_field_user_mail.inc',
          178 => 'modules/user/views_handler_field_user_name.inc',
          179 => 'modules/user/views_handler_field_user_permissions.inc',
          180 => 'modules/user/views_handler_field_user_picture.inc',
          181 => 'modules/user/views_handler_field_user_roles.inc',
          182 => 'modules/user/views_handler_filter_user_current.inc',
          183 => 'modules/user/views_handler_filter_user_name.inc',
          184 => 'modules/user/views_handler_filter_user_permissions.inc',
          185 => 'modules/user/views_handler_filter_user_roles.inc',
          186 => 'modules/user/views_plugin_argument_default_current_user.inc',
          187 => 'modules/user/views_plugin_argument_default_user.inc',
          188 => 'modules/user/views_plugin_argument_validate_user.inc',
          189 => 'modules/user/views_plugin_row_user_view.inc',
          190 => 'plugins/views_plugin_access.inc',
          191 => 'plugins/views_plugin_access_none.inc',
          192 => 'plugins/views_plugin_access_perm.inc',
          193 => 'plugins/views_plugin_access_role.inc',
          194 => 'plugins/views_plugin_argument_default.inc',
          195 => 'plugins/views_plugin_argument_default_php.inc',
          196 => 'plugins/views_plugin_argument_default_fixed.inc',
          197 => 'plugins/views_plugin_argument_default_raw.inc',
          198 => 'plugins/views_plugin_argument_validate.inc',
          199 => 'plugins/views_plugin_argument_validate_numeric.inc',
          200 => 'plugins/views_plugin_argument_validate_php.inc',
          201 => 'plugins/views_plugin_cache.inc',
          202 => 'plugins/views_plugin_cache_none.inc',
          203 => 'plugins/views_plugin_cache_time.inc',
          204 => 'plugins/views_plugin_display.inc',
          205 => 'plugins/views_plugin_display_attachment.inc',
          206 => 'plugins/views_plugin_display_block.inc',
          207 => 'plugins/views_plugin_display_default.inc',
          208 => 'plugins/views_plugin_display_embed.inc',
          209 => 'plugins/views_plugin_display_extender.inc',
          210 => 'plugins/views_plugin_display_feed.inc',
          211 => 'plugins/views_plugin_display_page.inc',
          212 => 'plugins/views_plugin_exposed_form_basic.inc',
          213 => 'plugins/views_plugin_exposed_form.inc',
          214 => 'plugins/views_plugin_exposed_form_input_required.inc',
          215 => 'plugins/views_plugin_localization_core.inc',
          216 => 'plugins/views_plugin_localization.inc',
          217 => 'plugins/views_plugin_localization_none.inc',
          218 => 'plugins/views_plugin_pager.inc',
          219 => 'plugins/views_plugin_pager_full.inc',
          220 => 'plugins/views_plugin_pager_mini.inc',
          221 => 'plugins/views_plugin_pager_none.inc',
          222 => 'plugins/views_plugin_pager_some.inc',
          223 => 'plugins/views_plugin_query.inc',
          224 => 'plugins/views_plugin_query_default.inc',
          225 => 'plugins/views_plugin_row.inc',
          226 => 'plugins/views_plugin_row_fields.inc',
          227 => 'plugins/views_plugin_row_rss_fields.inc',
          228 => 'plugins/views_plugin_style.inc',
          229 => 'plugins/views_plugin_style_default.inc',
          230 => 'plugins/views_plugin_style_grid.inc',
          231 => 'plugins/views_plugin_style_list.inc',
          232 => 'plugins/views_plugin_style_jump_menu.inc',
          233 => 'plugins/views_plugin_style_mapping.inc',
          234 => 'plugins/views_plugin_style_rss.inc',
          235 => 'plugins/views_plugin_style_summary.inc',
          236 => 'plugins/views_plugin_style_summary_jump_menu.inc',
          237 => 'plugins/views_plugin_style_summary_unformatted.inc',
          238 => 'plugins/views_plugin_style_table.inc',
          239 => 'tests/handlers/views_handler_area_text.test',
          240 => 'tests/handlers/views_handler_argument_null.test',
          241 => 'tests/handlers/views_handler_argument_string.test',
          242 => 'tests/handlers/views_handler_field.test',
          243 => 'tests/handlers/views_handler_field_boolean.test',
          244 => 'tests/handlers/views_handler_field_custom.test',
          245 => 'tests/handlers/views_handler_field_counter.test',
          246 => 'tests/handlers/views_handler_field_date.test',
          247 => 'tests/handlers/views_handler_field_file_size.test',
          248 => 'tests/handlers/views_handler_field_math.test',
          249 => 'tests/handlers/views_handler_field_url.test',
          250 => 'tests/handlers/views_handler_field_xss.test',
          251 => 'tests/handlers/views_handler_filter_combine.test',
          252 => 'tests/handlers/views_handler_filter_date.test',
          253 => 'tests/handlers/views_handler_filter_equality.test',
          254 => 'tests/handlers/views_handler_filter_in_operator.test',
          255 => 'tests/handlers/views_handler_filter_numeric.test',
          256 => 'tests/handlers/views_handler_filter_string.test',
          257 => 'tests/handlers/views_handler_sort_random.test',
          258 => 'tests/handlers/views_handler_sort_date.test',
          259 => 'tests/handlers/views_handler_sort.test',
          260 => 'tests/test_plugins/views_test_plugin_access_test_dynamic.inc',
          261 => 'tests/test_plugins/views_test_plugin_access_test_static.inc',
          262 => 'tests/test_plugins/views_test_plugin_style_test_mapping.inc',
          263 => 'tests/plugins/views_plugin_display.test',
          264 => 'tests/styles/views_plugin_style_jump_menu.test',
          265 => 'tests/styles/views_plugin_style.test',
          266 => 'tests/styles/views_plugin_style_base.test',
          267 => 'tests/styles/views_plugin_style_mapping.test',
          268 => 'tests/styles/views_plugin_style_unformatted.test',
          269 => 'tests/views_access.test',
          270 => 'tests/views_analyze.test',
          271 => 'tests/views_basic.test',
          272 => 'tests/views_argument_default.test',
          273 => 'tests/views_argument_validator.test',
          274 => 'tests/views_exposed_form.test',
          275 => 'tests/field/views_fieldapi.test',
          276 => 'tests/views_glossary.test',
          277 => 'tests/views_groupby.test',
          278 => 'tests/views_handlers.test',
          279 => 'tests/views_module.test',
          280 => 'tests/views_pager.test',
          281 => 'tests/views_plugin_localization_test.inc',
          282 => 'tests/views_translatable.test',
          283 => 'tests/views_query.test',
          284 => 'tests/views_upgrade.test',
          285 => 'tests/views_test.views_default.inc',
          286 => 'tests/comment/views_handler_argument_comment_user_uid.test',
          287 => 'tests/comment/views_handler_filter_comment_user_uid.test',
          288 => 'tests/node/views_node_revision_relations.test',
          289 => 'tests/taxonomy/views_handler_relationship_node_term_data.test',
          290 => 'tests/user/views_handler_field_user_name.test',
          291 => 'tests/user/views_user_argument_default.test',
          292 => 'tests/user/views_user_argument_validate.test',
          293 => 'tests/user/views_user.test',
          294 => 'tests/views_cache.test',
          295 => 'tests/views_view.test',
          296 => 'tests/views_ui.test',
        ),
        'version' => '7.x-3.7',
        'project' => 'views',
        'datestamp' => '1365499236',
      ),
      'project' => 'views',
      'version' => '7.x-3.7',
    ),
    'views_bulk_operations' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/views_bulk_operations/views_bulk_operations.module',
      'name' => 'views_bulk_operations',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Views Bulk Operations',
        'description' => 'Provides a way of selecting multiple rows and applying operations to them.',
        'dependencies' => 
        array (
          0 => 'entity',
          1 => 'views',
        ),
        'package' => 'Views',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'plugins/operation_types/base.class.php',
          1 => 'views/views_bulk_operations_handler_field_operations.inc',
        ),
        'version' => '7.x-3.1',
        'project' => 'views_bulk_operations',
        'datestamp' => '1354500015',
        'php' => '5.2.4',
      ),
      'project' => 'views_bulk_operations',
      'version' => '7.x-3.1',
    ),
    'views_content' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/ctools/views_content/views_content.module',
      'name' => 'views_content',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Views content panes',
        'description' => 'Allows Views content to be used in Panels, Dashboard and other modules which use the CTools Content API.',
        'package' => 'Chaos tool suite',
        'dependencies' => 
        array (
          0 => 'ctools',
          1 => 'views',
        ),
        'core' => '7.x',
        'files' => 
        array (
          0 => 'plugins/views/views_content_plugin_display_ctools_context.inc',
          1 => 'plugins/views/views_content_plugin_display_panel_pane.inc',
          2 => 'plugins/views/views_content_plugin_style_ctools_context.inc',
        ),
        'version' => '7.x-1.3',
        'project' => 'ctools',
        'datestamp' => '1365013512',
        'php' => '5.2.4',
      ),
      'project' => 'ctools',
      'version' => '7.x-1.3',
    ),
    'views_slideshow' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/views_slideshow/views_slideshow.module',
      'name' => 'views_slideshow',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Views Slideshow',
        'description' => 'Provides a View style that displays rows as a jQuery slideshow.  This is an API and requires Views Slideshow Cycle or another module that supports the API.',
        'dependencies' => 
        array (
          0 => 'views',
        ),
        'package' => 'Views',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'views_slideshow.module',
          1 => 'theme/views_slideshow.theme.inc',
          2 => 'views_slideshow.views.inc',
          3 => 'views_slideshow_plugin_style_slideshow.inc',
        ),
        'version' => '7.x-3.0',
        'project' => 'views_slideshow',
        'datestamp' => '1319589616',
        'php' => '5.2.4',
      ),
      'project' => 'views_slideshow',
      'version' => '7.x-3.0',
    ),
    'views_slideshow_cycle' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/views_slideshow/contrib/views_slideshow_cycle/views_slideshow_cycle.module',
      'name' => 'views_slideshow_cycle',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Views Slideshow: Cycle',
        'description' => 'Adds a Rotating slideshow mode to Views Slideshow.',
        'dependencies' => 
        array (
          0 => 'views_slideshow',
          1 => 'libraries',
        ),
        'package' => 'Views',
        'core' => '7.x',
        'files' => 
        array (
          0 => 'views_slideshow_cycle.module',
          1 => 'views_slideshow_cycle.views_slideshow.inc',
          2 => 'theme/views_slideshow_cycle.theme.inc',
        ),
        'version' => '7.x-3.0',
        'project' => 'views_slideshow',
        'datestamp' => '1319589616',
        'php' => '5.2.4',
      ),
      'project' => 'views_slideshow',
      'version' => '7.x-3.0',
    ),
    'views_ui' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/views/views_ui.module',
      'name' => 'views_ui',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '0',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Views UI',
        'description' => 'Administrative interface to views. Without this module, you cannot create or edit your views.',
        'package' => 'Views',
        'core' => '7.x',
        'configure' => 'admin/structure/views',
        'dependencies' => 
        array (
          0 => 'views',
        ),
        'files' => 
        array (
          0 => 'views_ui.module',
          1 => 'plugins/views_wizard/views_ui_base_views_wizard.class.php',
        ),
        'version' => '7.x-3.7',
        'project' => 'views',
        'datestamp' => '1365499236',
        'php' => '5.2.4',
      ),
      'project' => 'views',
      'version' => '7.x-3.7',
    ),
    'wysiwyg' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/modules/wysiwyg/wysiwyg.module',
      'name' => 'wysiwyg',
      'type' => 'module',
      'owner' => '',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => '7202',
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Wysiwyg',
        'description' => 'Allows to edit content with client-side editors.',
        'package' => 'User interface',
        'core' => '7.x',
        'configure' => 'admin/config/content/wysiwyg',
        'files' => 
        array (
          0 => 'wysiwyg.module',
          1 => 'tests/wysiwyg.test',
        ),
        'version' => '7.x-2.2+34-dev',
        'project' => 'wysiwyg',
        'datestamp' => '1399579729',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'wysiwyg',
      'version' => '7.x-2.2+34-dev',
    ),
  ),
  'themes' => 
  array (
    'adaptivetheme' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/themes/adaptivetheme/at_core/adaptivetheme.info',
      'name' => 'adaptivetheme',
      'type' => 'theme',
      'owner' => 'themes/engines/phptemplate/phptemplate.engine',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'AT Core',
        'description' => 'AT Core is the framework that drives the responsive layout system and provides an extensive set of tools for theme development. You do not need to enable this theme. Use the provided AT Subtheme to get started.',
        'core' => '7.x',
        'release' => '7.x-3.x',
        'engine' => 'phptemplate',
        'screenshot' => 'screenshot.png',
        'stylesheets' => 
        array (
          'screen' => 
          array (
            0 => 'css/at.layout.css',
          ),
        ),
        'unset_core' => 
        array (
          'modules/aggregator/aggregator.css' => 'aggregator.css',
          'modules/block/block.css' => 'block.css',
          'modules/book/book.css' => 'book.css',
          'modules/color/color.css' => 'color.css',
          'modules/comment/comment.css' => 'comment.css',
          'modules/contextual/contextual.css' => 'contextual.css',
          'modules/dashboard/dashboard.css' => 'dashboard.css',
          'modules/dblog/dblog.css' => 'dblog.css',
          'modules/field/theme/field.css' => 'field.css',
          'modules/field_ui/field_ui.css' => 'field_ui.css',
          'modules/file/file.css' => 'file.css',
          'modules/filter/filter.css' => 'filter.css',
          'modules/forum/forum.css' => 'forum.css',
          'modules/help/help.css' => 'help.css',
          'modules/image/image.admin.css' => 'image.admin.css',
          'modules/image/image.css' => 'image.css',
          'modules/locale/locale.css' => 'locale.css',
          'modules/menu/menu.css' => 'menu.css',
          'modules/node/node.css' => 'node.css',
          'modules/openid/openid.css' => 'openid.css',
          'modules/poll/poll.css' => 'poll.css',
          'modules/profile/profile.css' => 'profile.css',
          'modules/search/search.css' => 'search.css',
          'modules/shortcut/shortcut.admin.css' => 'shortcut.admin.css',
          'modules/shortcut/shortcut.css' => 'shortcut.css',
          'modules/simpletest/simpletest.css' => 'simpletest.css',
          'modules/system/system.admin.css' => 'system.admin.css',
          'modules/system/system.base.css' => 'system.base.css',
          'modules/system/system.maintenance.css' => 'system.maintenance.css',
          'modules/system/system.menus.css' => 'system.menus.css',
          'modules/system/system.messages.css' => 'system.messages.css',
          'modules/system/system.theme.css' => 'system.theme.css',
          'modules/taxonomy/taxonomy.css' => 'taxonomy.css',
          'modules/toolbar/toolbar.css' => 'toolbar.css',
          'modules/tracker/tracker.css' => 'tracker.css',
          'modules/update/update.css' => 'update.css',
          'modules/user/user.css' => 'user.css',
        ),
        'regions' => 
        array (
          'sidebar_first' => 'Sidebar first',
          'sidebar_second' => 'Sidebar second',
          'content' => 'Main Content',
          'highlighted' => 'Highlighted',
          'content_aside' => 'Aside',
          'secondary_content' => 'Secondary',
          'tertiary_content' => 'Tertiary',
          'footer' => 'Footer',
          'leaderboard' => 'Leaderboard',
          'header' => 'Header',
          'menu_bar' => 'Menu Bar',
          'help' => 'Help',
          'page_top' => 'Page top',
          'page_bottom' => 'Page bottom',
        ),
        'plugins' => 
        array (
          'page_layout' => 
          array (
            'layouts' => 'layouts/core',
          ),
          'panels' => 
          array (
            'layouts' => 'layouts/panels',
          ),
        ),
        'settings' => 
        array (
          'bigscreen_layout' => 'three_col_grail',
          'bigscreen_page_unit' => '%',
          'bigscreen_sidebar_unit' => '%',
          'bigscreen_max_width_unit' => 'px',
          'bigscreen_page_width' => '100',
          'bigscreen_sidebar_first' => '25',
          'bigscreen_sidebar_second' => '25',
          'bigscreen_set_max_width' => '1',
          'bigscreen_max_width' => '1140',
          'bigscreen_media_query' => 'only screen and (min-width:1025px)',
          'tablet_landscape_layout' => 'three_col_grail',
          'tablet_landscape_page_unit' => '%',
          'tablet_landscape_sidebar_unit' => '%',
          'tablet_landscape_max_width_unit' => 'px',
          'tablet_landscape_page_width' => '100',
          'tablet_landscape_sidebar_first' => '20',
          'tablet_landscape_sidebar_second' => '20',
          'tablet_landscape_set_max_width' => '0',
          'tablet_landscape_max_width' => '960',
          'tablet_landscape_media_query' => 'only screen and (min-width:769px) and (max-width:1024px)',
          'tablet_portrait_layout' => 'one-col-vert',
          'tablet_portrait_page_unit' => '%',
          'tablet_portrait_sidebar_unit' => '%',
          'tablet_portrait_max_width_unit' => 'px',
          'tablet_portrait_page_width' => '100',
          'tablet_portrait_sidebar_first' => '50',
          'tablet_portrait_sidebar_second' => '50',
          'tablet_portrait_set_max_width' => '0',
          'tablet_portrait_max_width' => '780',
          'tablet_portrait_media_query' => 'only screen and (min-width:481px) and (max-width:768px)',
          'smartphone_landscape_layout' => 'one_col_vert',
          'smartphone_landscape_page_unit' => '%',
          'smartphone_landscape_sidebar_unit' => '%',
          'smartphone_landscape_max_width_unit' => 'px',
          'smartphone_landscape_page_width' => '100',
          'smartphone_landscape_sidebar_first' => '50',
          'smartphone_landscape_sidebar_second' => '50',
          'smartphone_landscape_set_max_width' => '0',
          'smartphone_landscape_max_width' => '520',
          'smartphone_landscape_media_query' => 'only screen and (min-width:321px) and (max-width:480px)',
          'smartphone_portrait_media_query' => 'only screen and (max-width:320px)',
          'bigscreen_two_50' => 'two-50',
          'bigscreen_two_33_66' => 'two-33-66',
          'bigscreen_two_66_33' => 'two-66-33',
          'bigscreen_two_brick' => 'two-brick',
          'bigscreen_three_3x33' => 'three-3x33',
          'bigscreen_three_25_50_25' => 'three-25-50-25',
          'bigscreen_three_25_25_50' => 'three-25-25-50',
          'bigscreen_three_50_25_25' => 'three-50-25-25',
          'bigscreen_four_4x25' => 'four-4x25',
          'bigscreen_five_5x20' => 'five-5x20-2x3-grid',
          'bigscreen_six_6x16' => 'six-6x16-3x2-grid',
          'bigscreen_three_inset_left' => 'three-inset-left',
          'bigscreen_three_inset_right' => 'three-inset-right',
          'tablet_landscape_two_50' => 'two-50',
          'tablet_landscape_two_33_66' => 'two-33-66',
          'tablet_landscape_two_66_33' => 'two-66-33',
          'tablet_landscape_two_brick' => 'two-brick',
          'tablet_landscape_three_3x33' => 'three-3x33',
          'tablet_landscape_three_25_50_25' => 'three-25-50-25',
          'tablet_landscape_three_25_25_50' => 'three-25-25-50',
          'tablet_landscape_three_50_25_25' => 'three-50-25-25',
          'tablet_landscape_four_4x25' => 'four-4x25',
          'tablet_landscape_five_5x20' => 'five-5x20-2x3-grid',
          'tablet_landscape_six_6x16' => 'six-6x16-3x2-grid',
          'tablet_landscape_three_inset_left' => 'three-inset-left',
          'tablet_landscape_three_inset_right' => 'three-inset-right',
          'tablet_portrait_two_50' => 'two-50',
          'tablet_portrait_two_33_66' => 'two-33-66',
          'tablet_portrait_two_66_33' => 'two-66-33',
          'tablet_portrait_two_brick' => 'two-brick',
          'tablet_portrait_three_3x33' => 'three-3x33-stack-top',
          'tablet_portrait_three_25_50_25' => 'three-25-50-25-stack-top',
          'tablet_portrait_three_25_25_50' => 'three-25-25-50-stack-top',
          'tablet_portrait_three_50_25_25' => 'three-50-25-25-stack-top',
          'tablet_portrait_four_4x25' => 'four-4x25-2x2-grid',
          'tablet_portrait_five_5x20' => 'five-5x20-1x2x2-grid',
          'tablet_portrait_six_6x16' => 'six-6x16-2x3-grid',
          'tablet_portrait_three_inset_left' => 'three-inset-left-wrap',
          'tablet_portrait_three_inset_right' => 'three-inset-right-wrap',
          'smartphone_landscape_two_50' => 'two-50-stack',
          'smartphone_landscape_two_33_66' => 'two-33-66-stack',
          'smartphone_landscape_two_66_33' => 'two-66-33-stack',
          'smartphone_landscape_two_brick' => 'two-brick-stack',
          'smartphone_landscape_three_3x33' => 'three-3x33-stack',
          'smartphone_landscape_three_25_50_25' => 'three-25-50-25-stack',
          'smartphone_landscape_three_25_25_50' => 'three-25-25-50-stack',
          'smartphone_landscape_three_50_25_25' => 'three-50-25-25-stack',
          'smartphone_landscape_four_4x25' => 'four-4x25-stack',
          'smartphone_landscape_five_5x20' => 'five-5x20-stack',
          'smartphone_landscape_six_6x16' => 'six-6x16-stack',
          'smartphone_landscape_three_inset_left' => 'three-inset-left-stack',
          'smartphone_landscape_three_inset_right' => 'three-inset-right-stack',
          'disable_responsive_styles' => '0',
          'enable_custom_media_queries' => '1',
          'global_default_layout' => 'smartphone-portrait',
          'global_default_layout_toggle' => '0',
          'global_files_path' => 'public_files',
          'load_html5js' => '1',
          'load_onmediaqueryjs' => '0',
          'load_respondjs' => '0',
          'load_ltie8css' => '0',
          'load_scalefixjs' => '0',
          'expose_regions' => '0',
          'load_all_panels' => '0',
          'load_all_panels_no_sidebars' => '0',
          'show_window_size' => '0',
          'rebuild_theme_data' => '0',
          'enable_extensions' => '0',
          'enable_font_settings' => '0',
          'enable_heading_settings' => '0',
          'enable_image_settings' => '0',
          'enable_apple_touch_icons' => '0',
          'enable_exclude_css' => '0',
          'enable_custom_css' => '0',
          'enable_context_regions' => '0',
          'enable_float_region_blocks' => '0',
          'enable_markup_overides' => '0',
          'base_font_type' => '<none>',
          'site_name_font_type' => '<none>',
          'site_slogan_font_type' => '<none>',
          'page_title_font_type' => '<none>',
          'node_title_font_type' => '<none>',
          'comment_title_font_type' => '<none>',
          'block_title_font_type' => '<none>',
          'main_menu_font_type' => '<none>',
          'secondary_menu_font_type' => '<none>',
          'block_menu_font_type' => '<none>',
          'selectors_font_type' => '<none>',
          'base_font_size' => '<none>',
          'site_name_font_size' => '<none>',
          'site_slogan_font_size' => '<none>',
          'page_title_font_size' => '<none>',
          'node_title_font_size' => '<none>',
          'comment_title_font_size' => '<none>',
          'block_title_font_size' => '<none>',
          'main_menu_font_size' => '<none>',
          'secondary_menu_font_size' => '<none>',
          'block_menu_font_size' => '<none>',
          'content_headings_h1h4_font_type' => '<none>',
          'content_headings_h5h6_font_type' => '<none>',
          'h1_font_size' => '2em',
          'h2_font_size' => '1.6em',
          'h3_font_size' => '1.4em',
          'h4_font_size' => '1.2em',
          'h5_font_size' => '1em',
          'h6_font_size' => '1em',
          'page_title_case' => 'ptc-n',
          'page_title_weight' => 'ptw-b',
          'page_title_alignment' => 'pta-l',
          'page_title_shadow' => 'pts-n',
          'node_title_case' => 'ntc-n',
          'node_title_weight' => 'ntw-b',
          'node_title_alignment' => 'nta-l',
          'node_title_shadow' => 'nts-n',
          'comment_title_case' => 'ctc-n',
          'comment_title_weight' => 'ctw-b',
          'comment_title_alignment' => 'cta-l',
          'comment_title_shadow' => 'cts-n',
          'block_title_case' => 'btc-uc',
          'block_title_weight' => 'btw-b',
          'block_title_alignment' => 'bta-l',
          'block_title_shadow' => 'bts-n',
          'image_alignment' => 'ia-l',
          'image_alignment_teaser' => 'iat-l',
          'image_caption_full' => '0',
          'image_caption_teaser' => '0',
          'image_teaser' => '0',
          'breadcrumb_display' => '1',
          'breadcrumb_home' => '0',
          'breadcrumb_label' => '0',
          'breadcrumb_title' => '0',
          'breadcrumb_separator' => ' &#187; ',
          'horizontal_login_block_enable' => 'on',
          'horizontal_login_block' => '0',
          'login_block_remove_links' => '0',
          'login_block_remove_openid' => '0',
          'global_gutter_width' => '',
          'page_full_width_wrappers' => '0',
          'page_content_type_suggestions' => '0',
          'menu_item_span_elements' => '0',
          'extra_page_classes' => '1',
          'extra_article_classes' => '1',
          'extra_comment_classes' => '1',
          'extra_block_classes' => '1',
          'extra_menu_classes' => '1',
          'extra_item_list_classes' => '1',
          'comments_hide_title' => '0',
          'feed_icons' => '0',
          'unset_block_system_main_front' => '0',
          'skip_link_target' => '#main-content',
          'adv_search_extra_fieldsets' => '0',
          'rel_author' => '0',
          'mobile_friendly_metatags' => '1',
          'adaptivetheme_meta_viewport' => 'width=device-width, initial-scale=1',
          'adaptivetheme_meta_mobileoptimized' => 'width',
          'adaptivetheme_meta_handheldfriendly' => 'true',
          'adaptivetheme_meta_apple_mobile_web_app_capable' => 'yes',
          'chrome_edge' => '0',
          'clear_type' => '0',
          'apple_touch_icon_enable' => '0',
          'apple_touch_icon_path_l' => '',
          'apple_touch_icon_path_m' => '',
          'apple_touch_icon_path_h' => '',
          'custom_css' => '',
        ),
        'version' => '7.x-3.1',
        'project' => 'adaptivetheme',
        'datestamp' => '1346238662',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'adaptivetheme',
      'version' => '7.x-3.1',
    ),
    'adaptivetheme_admin' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/themes/adaptivetheme/at_admin/adaptivetheme_admin.info',
      'name' => 'adaptivetheme_admin',
      'type' => 'theme',
      'owner' => 'themes/engines/phptemplate/phptemplate.engine',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'AT Admin',
        'description' => 'A better admin theme for Drupal 7. Clean, calm, invisible. Includes left and right sidebars, Overlay support and all AT\'s theme setting goodies.',
        'core' => '7.x',
        'base theme' => 'adaptivetheme',
        'release' => '7.x-3.x',
        'engine' => 'phptemplate',
        'screenshot' => 'screenshot.png',
        'stylesheets' => 
        array (
          'screen' => 
          array (
            0 => 'css/at_admin.css',
          ),
        ),
        'regions' => 
        array (
          'content' => 'Main content',
          'sidebar_first' => 'Sidebar first',
          'sidebar_second' => 'Sidebar second',
          'highlighted' => 'Highlighted',
          'help' => 'Help',
          'footer' => 'Footer',
          'page_top' => 'Page top',
          'page_bottom' => 'Page bottom',
        ),
        'settings' => 
        array (
          'shortcut_module_link' => '1',
          'bigscreen_layout' => 'three_col_grail',
          'bigscreen_page_unit' => '%',
          'bigscreen_sidebar_unit' => 'px',
          'bigscreen_max_width_unit' => 'px',
          'bigscreen_page_width' => '100',
          'bigscreen_sidebar_first' => '180',
          'bigscreen_sidebar_second' => '180',
          'bigscreen_set_max_width' => '1',
          'bigscreen_max_width' => '1330',
          'bigscreen_media_query' => 'only screen and (min-width:1025px)',
          'tablet_landscape_layout' => 'three_col_grail',
          'tablet_landscape_page_unit' => '%',
          'tablet_landscape_sidebar_unit' => '%',
          'tablet_landscape_page_width' => '100',
          'tablet_landscape_sidebar_first' => '20',
          'tablet_landscape_sidebar_second' => '20',
          'tablet_landscape_media_query' => 'only screen and (min-width:769px) and (max-width:1024px)',
          'tablet_portrait_layout' => 'one_col_vert',
          'tablet_portrait_page_unit' => '%',
          'tablet_portrait_sidebar_unit' => '%',
          'tablet_portrait_page_width' => '100',
          'tablet_portrait_sidebar_first' => '50',
          'tablet_portrait_sidebar_second' => '50',
          'tablet_portrait_media_query' => 'only screen and (min-width:481px) and (max-width:768px)',
          'smartphone_landscape_layout' => 'one_col_vert',
          'smartphone_landscape_page_unit' => '%',
          'smartphone_landscape_sidebar_unit' => '%',
          'smartphone_landscape_page_width' => '100',
          'smartphone_landscape_sidebar_first' => '50',
          'smartphone_landscape_sidebar_second' => '50',
          'smartphone_landscape_media_query' => 'only screen and (min-width:321px) and (max-width:480px)',
          'smartphone_portrait_layout' => 'one_col_stack',
          'smartphone_portrait_page_unit' => '%',
          'smartphone_portrait_sidebar_unit' => '%',
          'smartphone_portrait_page_width' => '100',
          'smartphone_portrait_sidebar_first' => '100',
          'smartphone_portrait_sidebar_second' => '100',
          'smartphone_portrait_media_query' => 'only screen and (max-width:320px)',
          'bigscreen_two_50' => 'two-50',
          'bigscreen_two_33_66' => 'two-33-66',
          'bigscreen_two_66_33' => 'two-66-33',
          'bigscreen_two_brick' => 'two-brick',
          'bigscreen_three_3x33' => 'three-3x33',
          'bigscreen_three_25_50_25' => 'three-25-50-25',
          'bigscreen_three_25_25_50' => 'three-25-25-50',
          'bigscreen_three_50_25_25' => 'three-50-25-25',
          'bigscreen_four_4x25' => 'four-4x25',
          'bigscreen_five_5x20' => 'five-5x20-2x3-grid',
          'bigscreen_six_6x16' => 'six-6x16-3x2-grid',
          'bigscreen_three_inset_left' => 'three-inset-left',
          'bigscreen_three_inset_right' => 'three-inset-right',
          'tablet_landscape_two_50' => 'two-50',
          'tablet_landscape_two_33_66' => 'two-33-66',
          'tablet_landscape_two_66_33' => 'two-66-33',
          'tablet_landscape_two_brick' => 'two-brick',
          'tablet_landscape_three_3x33' => 'three-3x33',
          'tablet_landscape_three_25_50_25' => 'three-25-50-25',
          'tablet_landscape_three_25_25_50' => 'three-25-25-50',
          'tablet_landscape_three_50_25_25' => 'three-50-25-25',
          'tablet_landscape_four_4x25' => 'four-4x25',
          'tablet_landscape_five_5x20' => 'five-5x20-2x3-grid',
          'tablet_landscape_six_6x16' => 'six-6x16-3x2-grid',
          'tablet_landscape_three_inset_left' => 'three-inset-left',
          'tablet_landscape_three_inset_right' => 'three-inset-right',
          'tablet_portrait_two_50' => 'two-50',
          'tablet_portrait_two_33_66' => 'two-33-66',
          'tablet_portrait_two_66_33' => 'two-66-33',
          'tablet_portrait_two_brick' => 'two-brick',
          'tablet_portrait_three_3x33' => 'three-3x33-stack-top',
          'tablet_portrait_three_25_50_25' => 'three-25-50-25-stack-top',
          'tablet_portrait_three_25_25_50' => 'three-25-25-50-stack-top',
          'tablet_portrait_three_50_25_25' => 'three-50-25-25-stack-top',
          'tablet_portrait_four_4x25' => 'four-4x25-2x2-grid',
          'tablet_portrait_five_5x20' => 'five-5x20-1x2x2-grid',
          'tablet_portrait_six_6x16' => 'six-6x16-2x3-grid',
          'tablet_portrait_three_inset_left' => 'three-inset-left-wrap',
          'tablet_portrait_three_inset_right' => 'three-inset-right-wrap',
          'smartphone_landscape_two_50' => 'two-50-stack',
          'smartphone_landscape_two_33_66' => 'two-33-66-stack',
          'smartphone_landscape_two_66_33' => 'two-66-33-stack',
          'smartphone_landscape_two_brick' => 'two-brick-stack',
          'smartphone_landscape_three_3x33' => 'three-3x33-stack',
          'smartphone_landscape_three_25_50_25' => 'three-25-50-25-stack',
          'smartphone_landscape_three_25_25_50' => 'three-25-25-50-stack',
          'smartphone_landscape_three_50_25_25' => 'three-50-25-25-stack',
          'smartphone_landscape_four_4x25' => 'four-4x25-stack',
          'smartphone_landscape_five_5x20' => 'five-5x20-stack',
          'smartphone_landscape_six_6x16' => 'six-6x16-stack',
          'smartphone_landscape_three_inset_left' => 'three-inset-left-stack',
          'smartphone_landscape_three_inset_right' => 'three-inset-right-stack',
          'disable_responsive_styles' => '0',
          'enable_custom_media_queries' => '0',
          'global_default_layout' => 'smartphone-portrait',
          'global_default_layout_toggle' => '0',
          'global_files_path' => 'public_files',
          'load_html5js' => '1',
          'load_onmediaqueryjs' => '0',
          'load_respondjs' => '0',
          'load_ltie8css' => '0',
          'load_scalefixjs' => '0',
          'expose_regions' => '0',
          'load_all_panels' => '0',
          'load_all_panels_no_sidebars' => '0',
          'show_window_size' => '0',
          'rebuild_theme_data' => '0',
          'enable_extensions' => '1',
          'enable_font_settings' => '0',
          'enable_heading_settings' => '0',
          'enable_image_settings' => '0',
          'enable_apple_touch_icons' => '0',
          'enable_exclude_css' => '0',
          'enable_custom_css' => '0',
          'enable_context_regions' => '0',
          'enable_float_region_blocks' => '0',
          'enable_markup_overides' => '1',
          'base_font_type' => '',
          'site_name_font_type' => '',
          'site_slogan_font_type' => '',
          'page_title_font_type' => '',
          'node_title_font_type' => '',
          'comment_title_font_type' => '',
          'block_title_font_type' => '',
          'base_font' => 'bf-sss',
          'site_name_font' => 'snf-sl',
          'site_slogan_font' => 'ssf-sl',
          'main_menu_font' => 'mmf-sl',
          'page_title_font' => 'ptf-sl',
          'node_title_font' => 'ntf-sl',
          'comment_title_font' => 'ctf-sl',
          'block_title_font' => 'btf-sl',
          'base_font_size' => '1em',
          'site_name_font_size' => '2em',
          'site_slogan_font_size' => '1.2em',
          'page_title_font_size' => '2em',
          'node_title_font_size' => '1.6em',
          'comment_title_font_size' => '1.4em',
          'block_title_font_size' => '1.4em',
          'h1_font_size' => '2em',
          'h2_font_size' => '1.6em',
          'h3_font_size' => '1.4em',
          'h4_font_size' => '1.2em',
          'h5_font_size' => '1em',
          'h6_font_size' => '1em',
          'page_title_case' => 'ptc-n',
          'page_title_weight' => 'ptw-b',
          'page_title_alignment' => 'pta-l',
          'page_title_shadow' => 'pts-n',
          'node_title_case' => 'ntc-n',
          'node_title_weight' => 'ntw-b',
          'node_title_alignment' => 'nta-l',
          'node_title_shadow' => 'nts-n',
          'comment_title_case' => 'ctc-n',
          'comment_title_weight' => 'ctw-b',
          'comment_title_alignment' => 'cta-l',
          'comment_title_shadow' => 'cts-n',
          'block_title_case' => 'btc-uc',
          'block_title_weight' => 'btw-b',
          'block_title_alignment' => 'bta-l',
          'block_title_shadow' => 'bts-n',
          'image_alignment' => 'ia-l',
          'image_alignment_teaser' => 'iat-l',
          'image_caption_full' => '0',
          'image_caption_teaser' => '0',
          'image_teaser' => '1',
          'breadcrumb_display' => '1',
          'breadcrumb_home' => '1',
          'breadcrumb_label' => '0',
          'breadcrumb_title' => '0',
          'breadcrumb_separator' => ' &#187; ',
          'horizontal_login_block_enable' => 'on',
          'horizontal_login_block' => '0',
          'login_block_remove_links' => '0',
          'login_block_remove_openid' => '0',
          'global_gutter_width' => '',
          'page_full_width_wrappers' => '0',
          'page_content_type_suggestions' => '0',
          'menu_item_span_elements' => '0',
          'extra_page_classes' => '1',
          'extra_article_classes' => '1',
          'extra_comment_classes' => '1',
          'extra_block_classes' => '1',
          'extra_menu_classes' => '1',
          'extra_item_list_classes' => '1',
          'comments_hide_title' => '0',
          'feed_icons' => '0',
          'unset_block_system_main_front' => '0',
          'skip_link_target' => '#main-content',
          'adv_search_extra_fieldsets' => '0',
          'rel_author' => '0',
          'mobile_friendly_metatags' => '1',
          'adaptivetheme_meta_viewport' => 'width=device-width, initial-scale=1',
          'adaptivetheme_meta_mobileoptimized' => 'width',
          'adaptivetheme_meta_handheldfriendly' => 'true',
          'adaptivetheme_meta_apple_mobile_web_app_capable' => 'yes',
          'chrome_edge' => '0',
          'clear_type' => '0',
          'apple_touch_icon_enable' => '0',
          'apple_touch_icon_path_l' => 'images/touch-icon-l.png',
          'apple_touch_icon_path_m' => 'images/touch-icon-m.png',
          'apple_touch_icon_path_h' => 'images/touch-icon-h.png',
          'custom_css' => '',
        ),
        'features' => 
        array (
          0 => 'logo',
          1 => 'name',
          2 => 'favicon',
          3 => 'main_menu',
          4 => 'secondary_menu',
        ),
        'version' => '7.x-3.1',
        'project' => 'adaptivetheme',
        'datestamp' => '1346238662',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'adaptivetheme',
      'version' => '7.x-3.1',
    ),
    'adaptivetheme_subtheme' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/all/themes/adaptivetheme/at_subtheme/adaptivetheme_subtheme.info',
      'name' => 'adaptivetheme_subtheme',
      'type' => 'theme',
      'owner' => 'themes/engines/phptemplate/phptemplate.engine',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'AT Subtheme',
        'description' => 'Copy this subtheme to get started - see the <b><a href="http://adaptivethemes.com/documentation/adaptivethemes-documentation" target="_blank" title="Adaptivethemes.com - Rocking the hardest since 2006">documentation</a></b> for guidence or the included README. Drush users can generate a new theme using the command: drush adaptivetheme. If you need help please use the <b><a href="http://drupal.org/project/issues/adaptivetheme" target="_blank">issue queue</a></b> or ask in the IRC channel: <b><a href="irc://irc.freenode.net/drupal-adaptivetheme">#drupal-adaptivetheme</a></b>.',
        'core' => '7.x',
        'base theme' => 'adaptivetheme',
        'release' => '7.x-3.x',
        'engine' => 'phptemplate',
        'screenshot' => 'screenshot.png',
        'stylesheets' => 
        array (
          'screen' => 
          array (
            0 => 'css/global.base.css',
            1 => 'css/global.styles.css',
          ),
        ),
        'regions' => 
        array (
          'sidebar_first' => 'Sidebar first',
          'sidebar_second' => 'Sidebar second',
          'content' => 'Main Content',
          'highlighted' => 'Highlighted',
          'content_aside' => 'Aside',
          'secondary_content' => 'Secondary',
          'tertiary_content' => 'Tertiary',
          'footer' => 'Footer',
          'leaderboard' => 'Leaderboard',
          'header' => 'Header',
          'menu_bar' => 'Menu Bar',
          'help' => 'Help',
          'page_top' => 'Page top',
          'page_bottom' => 'Page bottom',
        ),
        'features' => 
        array (
          0 => 'logo',
          1 => 'name',
          2 => 'slogan',
          3 => 'node_user_picture',
          4 => 'comment_user_picture',
          5 => 'comment_user_verification',
          6 => 'favicon',
          7 => 'main_menu',
          8 => 'secondary_menu',
        ),
        'settings' => 
        array (
          'bigscreen_layout' => 'three_col_grail',
          'bigscreen_page_unit' => '%',
          'bigscreen_sidebar_unit' => '%',
          'bigscreen_max_width_unit' => 'px',
          'bigscreen_page_width' => '100',
          'bigscreen_sidebar_first' => '25',
          'bigscreen_sidebar_second' => '25',
          'bigscreen_set_max_width' => '1',
          'bigscreen_max_width' => '1140',
          'bigscreen_media_query' => 'only screen and (min-width:1025px)',
          'tablet_landscape_layout' => 'three_col_grail',
          'tablet_landscape_page_unit' => '%',
          'tablet_landscape_sidebar_unit' => '%',
          'tablet_landscape_page_width' => '100',
          'tablet_landscape_sidebar_first' => '20',
          'tablet_landscape_sidebar_second' => '20',
          'tablet_landscape_media_query' => 'only screen and (min-width:769px) and (max-width:1024px)',
          'tablet_portrait_layout' => 'one_col_vert',
          'tablet_portrait_page_unit' => '%',
          'tablet_portrait_sidebar_unit' => '%',
          'tablet_portrait_page_width' => '100',
          'tablet_portrait_sidebar_first' => '50',
          'tablet_portrait_sidebar_second' => '50',
          'tablet_portrait_media_query' => 'only screen and (min-width:481px) and (max-width:768px)',
          'smartphone_landscape_layout' => 'one_col_vert',
          'smartphone_landscape_page_unit' => '%',
          'smartphone_landscape_sidebar_unit' => '%',
          'smartphone_landscape_page_width' => '100',
          'smartphone_landscape_sidebar_first' => '50',
          'smartphone_landscape_sidebar_second' => '50',
          'smartphone_landscape_media_query' => 'only screen and (min-width:321px) and (max-width:480px)',
          'smartphone_portrait_layout' => 'one_col_stack',
          'smartphone_portrait_page_unit' => '%',
          'smartphone_portrait_sidebar_unit' => '%',
          'smartphone_portrait_page_width' => '100',
          'smartphone_portrait_sidebar_first' => '100',
          'smartphone_portrait_sidebar_second' => '100',
          'smartphone_portrait_media_query' => 'only screen and (max-width:320px)',
          'bigscreen_two_50' => 'two-50',
          'bigscreen_two_33_66' => 'two-33-66',
          'bigscreen_two_66_33' => 'two-66-33',
          'bigscreen_two_brick' => 'two-brick',
          'bigscreen_three_3x33' => 'three-3x33',
          'bigscreen_three_25_50_25' => 'three-25-50-25',
          'bigscreen_three_25_25_50' => 'three-25-25-50',
          'bigscreen_three_50_25_25' => 'three-50-25-25',
          'bigscreen_four_4x25' => 'four-4x25',
          'bigscreen_five_5x20' => 'five-5x20-2x3-grid',
          'bigscreen_six_6x16' => 'six-6x16-3x2-grid',
          'bigscreen_three_inset_left' => 'three-inset-left',
          'bigscreen_three_inset_right' => 'three-inset-right',
          'tablet_landscape_two_50' => 'two-50',
          'tablet_landscape_two_33_66' => 'two-33-66',
          'tablet_landscape_two_66_33' => 'two-66-33',
          'tablet_landscape_two_brick' => 'two-brick',
          'tablet_landscape_three_3x33' => 'three-3x33',
          'tablet_landscape_three_25_50_25' => 'three-25-50-25',
          'tablet_landscape_three_25_25_50' => 'three-25-25-50',
          'tablet_landscape_three_50_25_25' => 'three-50-25-25',
          'tablet_landscape_four_4x25' => 'four-4x25',
          'tablet_landscape_five_5x20' => 'five-5x20-2x3-grid',
          'tablet_landscape_six_6x16' => 'six-6x16-3x2-grid',
          'tablet_landscape_three_inset_left' => 'three-inset-left',
          'tablet_landscape_three_inset_right' => 'three-inset-right',
          'tablet_portrait_two_50' => 'two-50',
          'tablet_portrait_two_33_66' => 'two-33-66',
          'tablet_portrait_two_66_33' => 'two-66-33',
          'tablet_portrait_two_brick' => 'two-brick',
          'tablet_portrait_three_3x33' => 'three-3x33-stack-top',
          'tablet_portrait_three_25_50_25' => 'three-25-50-25-stack-top',
          'tablet_portrait_three_25_25_50' => 'three-25-25-50-stack-top',
          'tablet_portrait_three_50_25_25' => 'three-50-25-25-stack-top',
          'tablet_portrait_four_4x25' => 'four-4x25-2x2-grid',
          'tablet_portrait_five_5x20' => 'five-5x20-1x2x2-grid',
          'tablet_portrait_six_6x16' => 'six-6x16-2x3-grid',
          'tablet_portrait_three_inset_left' => 'three-inset-left-wrap',
          'tablet_portrait_three_inset_right' => 'three-inset-right-wrap',
          'smartphone_landscape_two_50' => 'two-50-stack',
          'smartphone_landscape_two_33_66' => 'two-33-66-stack',
          'smartphone_landscape_two_66_33' => 'two-66-33-stack',
          'smartphone_landscape_two_brick' => 'two-brick-stack',
          'smartphone_landscape_three_3x33' => 'three-3x33-stack',
          'smartphone_landscape_three_25_50_25' => 'three-25-50-25-stack',
          'smartphone_landscape_three_25_25_50' => 'three-25-25-50-stack',
          'smartphone_landscape_three_50_25_25' => 'three-50-25-25-stack',
          'smartphone_landscape_four_4x25' => 'four-4x25-stack',
          'smartphone_landscape_five_5x20' => 'five-5x20-stack',
          'smartphone_landscape_six_6x16' => 'six-6x16-stack',
          'smartphone_landscape_three_inset_left' => 'three-inset-left-stack',
          'smartphone_landscape_three_inset_right' => 'three-inset-right-stack',
          'disable_responsive_styles' => '0',
          'enable_custom_media_queries' => '1',
          'global_default_layout' => 'smartphone-portrait',
          'global_default_layout_toggle' => '0',
          'global_files_path' => 'public_files',
          'load_html5js' => '1',
          'load_respondjs' => '0',
          'load_ltie8css' => '0',
          'load_scalefixjs' => '0',
          'expose_regions' => '0',
          'load_all_panels' => '0',
          'load_all_panels_no_sidebars' => '0',
          'show_window_size' => '0',
          'rebuild_theme_data' => '0',
          'enable_extensions' => '0',
          'enable_font_settings' => '0',
          'enable_heading_settings' => '0',
          'enable_image_settings' => '0',
          'enable_apple_touch_icons' => '0',
          'enable_exclude_css' => '0',
          'enable_custom_css' => '0',
          'enable_context_regions' => '0',
          'enable_float_region_blocks' => '0',
          'enable_markup_overides' => '0',
          'base_font_type' => '<none>',
          'site_name_font_type' => '<none>',
          'site_slogan_font_type' => '<none>',
          'page_title_font_type' => '<none>',
          'node_title_font_type' => '<none>',
          'comment_title_font_type' => '<none>',
          'block_title_font_type' => '<none>',
          'main_menu_font_type' => '<none>',
          'secondary_menu_font_type' => '<none>',
          'block_menu_font_type' => '<none>',
          'selectors_font_type' => '<none>',
          'content_headings_h1h4_font_type' => '<none>',
          'content_headings_h5h6_font_type' => '<none>',
          'base_font_size' => '<none>',
          'site_name_font_size' => '<none>',
          'site_slogan_font_size' => '<none>',
          'page_title_font_size' => '<none>',
          'node_title_font_size' => '<none>',
          'comment_title_font_size' => '<none>',
          'block_title_font_size' => '<none>',
          'main_menu_font_size' => '<none>',
          'secondary_menu_font_size' => '<none>',
          'block_menu_font_size' => '<none>',
          'h1_font_size' => '2em',
          'h2_font_size' => '1.6em',
          'h3_font_size' => '1.4em',
          'h4_font_size' => '1.2em',
          'h5_font_size' => '1em',
          'h6_font_size' => '1em',
          'page_title_case' => 'ptc-n',
          'page_title_weight' => 'ptw-b',
          'page_title_alignment' => 'pta-l',
          'page_title_shadow' => 'pts-n',
          'node_title_case' => 'ntc-n',
          'node_title_weight' => 'ntw-b',
          'node_title_alignment' => 'nta-l',
          'node_title_shadow' => 'nts-n',
          'comment_title_case' => 'ctc-n',
          'comment_title_weight' => 'ctw-b',
          'comment_title_alignment' => 'cta-l',
          'comment_title_shadow' => 'cts-n',
          'block_title_case' => 'btc-n',
          'block_title_weight' => 'btw-b',
          'block_title_alignment' => 'bta-l',
          'block_title_shadow' => 'bts-n',
          'image_alignment' => 'ia-n',
          'image_alignment_teaser' => 'iat-n',
          'image_caption_full' => '0',
          'image_caption_teaser' => '0',
          'image_teaser' => '0',
          'breadcrumb_display' => '1',
          'breadcrumb_home' => '0',
          'breadcrumb_label' => '0',
          'breadcrumb_title' => '0',
          'breadcrumb_separator' => ' &#187; ',
          'horizontal_login_block_enable' => 'on',
          'horizontal_login_block' => '0',
          'login_block_remove_links' => '0',
          'login_block_remove_openid' => '0',
          'global_gutter_width' => '',
          'page_full_width_wrappers' => '0',
          'page_content_type_suggestions' => '0',
          'menu_item_span_elements' => '0',
          'extra_page_classes' => '1',
          'extra_article_classes' => '1',
          'extra_comment_classes' => '1',
          'extra_block_classes' => '1',
          'extra_menu_classes' => '1',
          'extra_item_list_classes' => '1',
          'comments_hide_title' => '0',
          'feed_icons' => '0',
          'unset_block_system_main_front' => '0',
          'unset_menu_titles' => '0',
          'skip_link_target' => '#main-content',
          'adv_search_extra_fieldsets' => '0',
          'rel_author' => '0',
          'mobile_friendly_metatags' => '1',
          'adaptivetheme_meta_viewport' => 'width=device-width, initial-scale=1',
          'adaptivetheme_meta_mobileoptimized' => 'width',
          'adaptivetheme_meta_handheldfriendly' => 'true',
          'adaptivetheme_meta_apple_mobile_web_app_capable' => 'yes',
          'chrome_edge' => '0',
          'clear_type' => '0',
          'apple_touch_icon_enable' => '0',
          'apple_touch_icon_path_l' => 'images/touch-icon-l.png',
          'apple_touch_icon_path_m' => 'images/touch-icon-m.png',
          'apple_touch_icon_path_h' => 'images/touch-icon-h.png',
          'custom_css' => '',
        ),
        'version' => '7.x-3.1',
        'project' => 'adaptivetheme',
        'datestamp' => '1346238662',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'adaptivetheme',
      'version' => '7.x-3.1',
    ),
    'bartik' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/themes/bartik/bartik.info',
      'name' => 'bartik',
      'type' => 'theme',
      'owner' => 'themes/engines/phptemplate/phptemplate.engine',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Bartik',
        'description' => 'A flexible, recolorable theme with many regions.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'css/layout.css',
            1 => 'css/style.css',
            2 => 'css/colors.css',
          ),
          'print' => 
          array (
            0 => 'css/print.css',
          ),
        ),
        'regions' => 
        array (
          'header' => 'Header',
          'help' => 'Help',
          'page_top' => 'Page top',
          'page_bottom' => 'Page bottom',
          'highlighted' => 'Highlighted',
          'featured' => 'Featured',
          'content' => 'Content',
          'sidebar_first' => 'Sidebar first',
          'sidebar_second' => 'Sidebar second',
          'triptych_first' => 'Triptych first',
          'triptych_middle' => 'Triptych middle',
          'triptych_last' => 'Triptych last',
          'footer_firstcolumn' => 'Footer first column',
          'footer_secondcolumn' => 'Footer second column',
          'footer_thirdcolumn' => 'Footer third column',
          'footer_fourthcolumn' => 'Footer fourth column',
          'footer' => 'Footer',
        ),
        'settings' => 
        array (
          'shortcut_module_link' => '0',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'garland' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/themes/garland/garland.info',
      'name' => 'garland',
      'type' => 'theme',
      'owner' => 'themes/engines/phptemplate/phptemplate.engine',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Garland',
        'description' => 'A multi-column theme which can be configured to modify colors and switch between fixed and fluid width layouts.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'style.css',
          ),
          'print' => 
          array (
            0 => 'print.css',
          ),
        ),
        'settings' => 
        array (
          'garland_width' => 'fluid',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'mnartists' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/sites/mnartists.org/themes/mnartists/mnartists.info',
      'name' => 'mnartists',
      'type' => 'theme',
      'owner' => 'themes/engines/phptemplate/phptemplate.engine',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'MN Artists',
        'description' => 'Copy this subtheme to get started - see the <b><a href="http://adaptivethemes.com/documentation/adaptivethemes-documentation" target="_blank" title="Adaptivethemes.com - Rocking the hardest since 2006">documentation</a></b> for guidence or the included README. Drush users can generate a new theme using the command: drush adaptivetheme. If you need help please use the <b><a href="http://drupal.org/project/issues/adaptivetheme" target="_blank">issue queue</a></b> or ask in the IRC channel: <b><a href="irc://irc.freenode.net/drupal-adaptivetheme">#drupal-adaptivetheme</a></b>.',
        'core' => '7.x',
        'base theme' => 'adaptivetheme',
        'release' => '7.x-3.x',
        'engine' => 'phptemplate',
        'screenshot' => 'screenshot.png',
        'stylesheets' => 
        array (
          'screen' => 
          array (
            0 => 'css/global.base.css',
            1 => 'css/global.styles.css',
            2 => 'css/style.css',
            3 => 'css/menu.css',
            4 => 'css/jquery-ui.css',
          ),
        ),
        'scripts' => 
        array (
          0 => 'scripts/slide.js',
          1 => 'scripts/fitvid.js',
          2 => 'scripts/javascript.js',
          3 => 'scripts/menu.js',
          4 => 'scripts/user-artwork-media.js',
          5 => 'scripts/jquery.icheck.min.js',
          6 => 'scripts/jquery.customSelect.min.js',
          7 => 'scripts/jquery.nicefileinput.min.js',
          8 => 'scripts/jquery.infinify.js',
          9 => 'scripts/imagesloaded.pkgd.min.js',
          10 => 'scripts/jquery.isotope.min.js',
          11 => 'scripts/masonry.pkgd.min.js',
        ),
        'regions' => 
        array (
          'sidebar_first' => 'Sidebar first',
          'sidebar_second' => 'Sidebar second',
          'content' => 'Main Content',
          'highlighted' => 'Highlighted',
          'content_aside' => 'Aside',
          'secondary_content' => 'Secondary',
          'tertiary_content' => 'Tertiary',
          'footer' => 'Footer',
          'leaderboard' => 'Leaderboard',
          'header' => 'Header',
          'menu_bar' => 'Menu Bar',
          'help' => 'Help',
          'page_top' => 'Page top',
          'page_bottom' => 'Page bottom',
          'menu' => 'Menu',
          'inset_left' => 'Inset Left',
          'inset_right' => 'Inset Right',
        ),
        'plugins' => 
        array (
          'panels' => 
          array (
            'layouts' => 'layouts',
          ),
        ),
        'features' => 
        array (
          0 => 'logo',
          1 => 'name',
          2 => 'slogan',
          3 => 'node_user_picture',
          4 => 'comment_user_picture',
          5 => 'comment_user_verification',
          6 => 'favicon',
          7 => 'main_menu',
          8 => 'secondary_menu',
        ),
        'settings' => 
        array (
          'bigscreen_layout' => 'three_col_grail',
          'bigscreen_page_unit' => '%',
          'bigscreen_sidebar_unit' => '%',
          'bigscreen_max_width_unit' => 'px',
          'bigscreen_page_width' => '100',
          'bigscreen_sidebar_first' => '25',
          'bigscreen_sidebar_second' => '25',
          'bigscreen_set_max_width' => '1',
          'bigscreen_max_width' => '1140',
          'bigscreen_media_query' => 'only screen and (min-width:1025px)',
          'tablet_landscape_layout' => 'three_col_grail',
          'tablet_landscape_page_unit' => '%',
          'tablet_landscape_sidebar_unit' => '%',
          'tablet_landscape_page_width' => '100',
          'tablet_landscape_sidebar_first' => '20',
          'tablet_landscape_sidebar_second' => '20',
          'tablet_landscape_media_query' => 'only screen and (min-width:769px) and (max-width:1024px)',
          'tablet_portrait_layout' => 'one_col_vert',
          'tablet_portrait_page_unit' => '%',
          'tablet_portrait_sidebar_unit' => '%',
          'tablet_portrait_page_width' => '100',
          'tablet_portrait_sidebar_first' => '50',
          'tablet_portrait_sidebar_second' => '50',
          'tablet_portrait_media_query' => 'only screen and (min-width:481px) and (max-width:768px)',
          'smartphone_landscape_layout' => 'one_col_vert',
          'smartphone_landscape_page_unit' => '%',
          'smartphone_landscape_sidebar_unit' => '%',
          'smartphone_landscape_page_width' => '100',
          'smartphone_landscape_sidebar_first' => '50',
          'smartphone_landscape_sidebar_second' => '50',
          'smartphone_landscape_media_query' => 'only screen and (min-width:321px) and (max-width:480px)',
          'smartphone_portrait_layout' => 'one_col_stack',
          'smartphone_portrait_page_unit' => '%',
          'smartphone_portrait_sidebar_unit' => '%',
          'smartphone_portrait_page_width' => '100',
          'smartphone_portrait_sidebar_first' => '100',
          'smartphone_portrait_sidebar_second' => '100',
          'smartphone_portrait_media_query' => 'only screen and (max-width:320px)',
          'bigscreen_two_50' => 'two-50',
          'bigscreen_two_33_66' => 'two-33-66',
          'bigscreen_two_66_33' => 'two-66-33',
          'bigscreen_two_brick' => 'two-brick',
          'bigscreen_three_3x33' => 'three-3x33',
          'bigscreen_three_25_50_25' => 'three-25-50-25',
          'bigscreen_three_25_25_50' => 'three-25-25-50',
          'bigscreen_three_50_25_25' => 'three-50-25-25',
          'bigscreen_four_4x25' => 'four-4x25',
          'bigscreen_five_5x20' => 'five-5x20-2x3-grid',
          'bigscreen_six_6x16' => 'six-6x16-3x2-grid',
          'bigscreen_three_inset_left' => 'three-inset-left',
          'bigscreen_three_inset_right' => 'three-inset-right',
          'tablet_landscape_two_50' => 'two-50',
          'tablet_landscape_two_33_66' => 'two-33-66',
          'tablet_landscape_two_66_33' => 'two-66-33',
          'tablet_landscape_two_brick' => 'two-brick',
          'tablet_landscape_three_3x33' => 'three-3x33',
          'tablet_landscape_three_25_50_25' => 'three-25-50-25',
          'tablet_landscape_three_25_25_50' => 'three-25-25-50',
          'tablet_landscape_three_50_25_25' => 'three-50-25-25',
          'tablet_landscape_four_4x25' => 'four-4x25',
          'tablet_landscape_five_5x20' => 'five-5x20-2x3-grid',
          'tablet_landscape_six_6x16' => 'six-6x16-3x2-grid',
          'tablet_landscape_three_inset_left' => 'three-inset-left',
          'tablet_landscape_three_inset_right' => 'three-inset-right',
          'tablet_portrait_two_50' => 'two-50',
          'tablet_portrait_two_33_66' => 'two-33-66',
          'tablet_portrait_two_66_33' => 'two-66-33',
          'tablet_portrait_two_brick' => 'two-brick',
          'tablet_portrait_three_3x33' => 'three-3x33-stack-top',
          'tablet_portrait_three_25_50_25' => 'three-25-50-25-stack-top',
          'tablet_portrait_three_25_25_50' => 'three-25-25-50-stack-top',
          'tablet_portrait_three_50_25_25' => 'three-50-25-25-stack-top',
          'tablet_portrait_four_4x25' => 'four-4x25-2x2-grid',
          'tablet_portrait_five_5x20' => 'five-5x20-1x2x2-grid',
          'tablet_portrait_six_6x16' => 'six-6x16-2x3-grid',
          'tablet_portrait_three_inset_left' => 'three-inset-left-wrap',
          'tablet_portrait_three_inset_right' => 'three-inset-right-wrap',
          'smartphone_landscape_two_50' => 'two-50-stack',
          'smartphone_landscape_two_33_66' => 'two-33-66-stack',
          'smartphone_landscape_two_66_33' => 'two-66-33-stack',
          'smartphone_landscape_two_brick' => 'two-brick-stack',
          'smartphone_landscape_three_3x33' => 'three-3x33-stack',
          'smartphone_landscape_three_25_50_25' => 'three-25-50-25-stack',
          'smartphone_landscape_three_25_25_50' => 'three-25-25-50-stack',
          'smartphone_landscape_three_50_25_25' => 'three-50-25-25-stack',
          'smartphone_landscape_four_4x25' => 'four-4x25-stack',
          'smartphone_landscape_five_5x20' => 'five-5x20-stack',
          'smartphone_landscape_six_6x16' => 'six-6x16-stack',
          'smartphone_landscape_three_inset_left' => 'three-inset-left-stack',
          'smartphone_landscape_three_inset_right' => 'three-inset-right-stack',
          'disable_responsive_styles' => '0',
          'enable_custom_media_queries' => '1',
          'global_default_layout' => 'smartphone-portrait',
          'global_default_layout_toggle' => '0',
          'global_files_path' => 'public_files',
          'load_html5js' => '1',
          'load_respondjs' => '0',
          'load_ltie8css' => '0',
          'load_scalefixjs' => '0',
          'expose_regions' => '0',
          'load_all_panels' => '0',
          'load_all_panels_no_sidebars' => '0',
          'show_window_size' => '0',
          'rebuild_theme_data' => '0',
          'enable_extensions' => '0',
          'enable_font_settings' => '0',
          'enable_heading_settings' => '0',
          'enable_image_settings' => '0',
          'enable_apple_touch_icons' => '0',
          'enable_exclude_css' => '0',
          'enable_custom_css' => '0',
          'enable_context_regions' => '0',
          'enable_float_region_blocks' => '0',
          'enable_markup_overides' => '0',
          'base_font_type' => '<none>',
          'site_name_font_type' => '<none>',
          'site_slogan_font_type' => '<none>',
          'page_title_font_type' => '<none>',
          'node_title_font_type' => '<none>',
          'comment_title_font_type' => '<none>',
          'block_title_font_type' => '<none>',
          'main_menu_font_type' => '<none>',
          'secondary_menu_font_type' => '<none>',
          'block_menu_font_type' => '<none>',
          'selectors_font_type' => '<none>',
          'content_headings_h1h4_font_type' => '<none>',
          'content_headings_h5h6_font_type' => '<none>',
          'base_font_size' => '<none>',
          'site_name_font_size' => '<none>',
          'site_slogan_font_size' => '<none>',
          'page_title_font_size' => '<none>',
          'node_title_font_size' => '<none>',
          'comment_title_font_size' => '<none>',
          'block_title_font_size' => '<none>',
          'main_menu_font_size' => '<none>',
          'secondary_menu_font_size' => '<none>',
          'block_menu_font_size' => '<none>',
          'h1_font_size' => '2em',
          'h2_font_size' => '1.6em',
          'h3_font_size' => '1.4em',
          'h4_font_size' => '1.2em',
          'h5_font_size' => '1em',
          'h6_font_size' => '1em',
          'page_title_case' => 'ptc-n',
          'page_title_weight' => 'ptw-b',
          'page_title_alignment' => 'pta-l',
          'page_title_shadow' => 'pts-n',
          'node_title_case' => 'ntc-n',
          'node_title_weight' => 'ntw-b',
          'node_title_alignment' => 'nta-l',
          'node_title_shadow' => 'nts-n',
          'comment_title_case' => 'ctc-n',
          'comment_title_weight' => 'ctw-b',
          'comment_title_alignment' => 'cta-l',
          'comment_title_shadow' => 'cts-n',
          'block_title_case' => 'btc-n',
          'block_title_weight' => 'btw-b',
          'block_title_alignment' => 'bta-l',
          'block_title_shadow' => 'bts-n',
          'image_alignment' => 'ia-n',
          'image_alignment_teaser' => 'iat-n',
          'image_caption_full' => '0',
          'image_caption_teaser' => '0',
          'image_teaser' => '0',
          'breadcrumb_display' => '1',
          'breadcrumb_home' => '0',
          'breadcrumb_label' => '0',
          'breadcrumb_title' => '0',
          'breadcrumb_separator' => ' &#187; ',
          'horizontal_login_block_enable' => 'on',
          'horizontal_login_block' => '0',
          'login_block_remove_links' => '0',
          'login_block_remove_openid' => '0',
          'global_gutter_width' => '',
          'page_full_width_wrappers' => '0',
          'page_content_type_suggestions' => '0',
          'menu_item_span_elements' => '0',
          'extra_page_classes' => '1',
          'extra_article_classes' => '1',
          'extra_comment_classes' => '1',
          'extra_block_classes' => '1',
          'extra_menu_classes' => '1',
          'extra_item_list_classes' => '1',
          'comments_hide_title' => '0',
          'feed_icons' => '0',
          'unset_block_system_main_front' => '0',
          'unset_menu_titles' => '0',
          'skip_link_target' => '#main-content',
          'adv_search_extra_fieldsets' => '0',
          'rel_author' => '0',
          'mobile_friendly_metatags' => '1',
          'adaptivetheme_meta_viewport' => 'width=device-width, initial-scale=1',
          'adaptivetheme_meta_mobileoptimized' => 'width',
          'adaptivetheme_meta_handheldfriendly' => 'true',
          'adaptivetheme_meta_apple_mobile_web_app_capable' => 'yes',
          'chrome_edge' => '0',
          'clear_type' => '0',
          'apple_touch_icon_enable' => '0',
          'apple_touch_icon_path_l' => 'images/touch-icon-l.png',
          'apple_touch_icon_path_m' => 'images/touch-icon-m.png',
          'apple_touch_icon_path_h' => 'images/touch-icon-h.png',
          'custom_css' => '',
        ),
        'version' => '7.x-3.1',
        'project' => 'adaptivetheme',
        'datestamp' => '1346238662',
        'fonts' => 
        array (
          'typekit_api' => 
          array (
            0 => 'adobe-text-pro#n7',
            1 => 'adobe-text-pro#i7',
            2 => 'adobe-text-pro#i4',
            3 => 'adobe-text-pro#n4',
          ),
          'fontdeck' => 
          array (
            0 => 'Apercu+Bold',
            1 => 'Apercu+Bold+Italic',
            2 => 'Apercu+Italic',
            3 => 'Apercu+Regular',
          ),
        ),
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'platform' => -1,
      'project' => 'adaptivetheme',
      'version' => '7.x-3.1',
    ),
    'seven' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/themes/seven/seven.info',
      'name' => 'seven',
      'type' => 'theme',
      'owner' => 'themes/engines/phptemplate/phptemplate.engine',
      'status' => '1',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Seven',
        'description' => 'A simple one-column, tableless, fluid width administration theme.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'stylesheets' => 
        array (
          'screen' => 
          array (
            0 => 'reset.css',
            1 => 'style.css',
          ),
        ),
        'settings' => 
        array (
          'shortcut_module_link' => '1',
        ),
        'regions' => 
        array (
          'content' => 'Content',
          'help' => 'Help',
          'page_top' => 'Page top',
          'page_bottom' => 'Page bottom',
          'sidebar_first' => 'First sidebar',
        ),
        'regions_hidden' => 
        array (
          0 => 'sidebar_first',
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
    'stark' => 
    array (
      'filename' => '/var/aegir/platforms/custom/clients/walkerart/mnartists/themes/stark/stark.info',
      'name' => 'stark',
      'type' => 'theme',
      'owner' => 'themes/engines/phptemplate/phptemplate.engine',
      'status' => '0',
      'bootstrap' => '0',
      'schema_version' => 0,
      'weight' => '0',
      'info' => 
      array (
        'name' => 'Stark',
        'description' => 'This theme demonstrates Drupal\'s default HTML markup and CSS styles. To learn how to build your own theme and override Drupal\'s default code, see the <a href="http://drupal.org/theme-guide">Theming Guide</a>.',
        'package' => 'Core',
        'version' => '7.22',
        'core' => '7.x',
        'stylesheets' => 
        array (
          'all' => 
          array (
            0 => 'layout.css',
          ),
        ),
        'project' => 'drupal',
        'datestamp' => '1365027012',
        'dependencies' => 
        array (
        ),
        'php' => '5.2.4',
      ),
      'project' => 'drupal',
      'version' => '7.22',
    ),
  ),
);
# Aegir additions
$_SERVER['db_type'] = $options['db_type'];
$_SERVER['db_port'] = $options['db_port'];
$_SERVER['db_host'] = $options['db_host'];
$_SERVER['db_user'] = $options['db_user'];
$_SERVER['db_passwd'] = $options['db_passwd'];
$_SERVER['db_name'] = $options['db_name'];
