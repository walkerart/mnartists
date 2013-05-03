<?php

function template_preprocess_artist_community_artist_profile(&$vars) {
    $vars['image'] = '';
    if (isset($vars['user']->picture->uri)) {
        $vars['image'] = theme('image_style', array(
            'style_name' => 'thumbnail',
            'path' => $vars['user']->picture->uri
        ));
    }

    $vars['url'] = url('user/' . $vars['user']->uid);
}
