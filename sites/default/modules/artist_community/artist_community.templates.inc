<?php

function template_preprocess_artist_community_artist_profile(&$vars) {
    $vars['image'] = '';
    $profile = profile2_load_by_user($vars['user']);

    // Use the psuedonym if available
    if (isset($profile['main']->field_psuedonym['und'][0]['value'])) {
        $vars['name'] = $profile['main']->field_psuedonym['und'][0]['value'];
    } else {
        $vars['name'] = $vars['user']->name;
    }

    // Find the users avatar
    if (isset($vars['user']->picture->uri)) {
        $image = $vars['user']->picture->uri;
    } else {
        $avatar = file_load(variable_get('upload_default_avatar_fid'));
        $image = $avatar->uri;
    }

    $vars['image'] = theme('image_style', array(
        'style_name' => 'artist_thumbnail_small',
        'path' => $image
    ));

    $vars['url'] = url('user/' . $vars['user']->uid);
}


function template_preprocess_artist_community_page (&$vars) {
  $featured_articles_will_show = (!is_null($vars['articles']) && !empty($vars['articles']) && (!isset($_GET['global_search']) || (isset($_GET['global_search']) && $_GET['global_search'] === '')));
  $sidebar_will_show = (!isset($_GET['global_search']) && (!is_null($vars['all_event_results']) || !empty($vars['latest_users']) || !empty($vars['event_widget_items'])));
  $vars['sidebar_will_show'] = $sidebar_will_show;
  $vars['featured_articles_will_show'] = $featured_articles_will_show;
}