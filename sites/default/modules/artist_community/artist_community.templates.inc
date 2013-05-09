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
