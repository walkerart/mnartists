<?php

// this template renders the individual items in
// the collection, by rendering the collected
// nodes's teaser view (wrapped in a little extra
// markup)

$node = node_load($row->nid);
$user = user_load($node->uid);
$user_picture_uri = image_style_url('square_thumbnail', $user->picture->uri);
$rendered_teaser = render(node_view($node, 'teaser'));

?>
<li class="user-collection-item">
    <img src="<?= file_create_url($user_picture_uri) ?>" width="50" height="50">
    <div class="user-collection-item-container">
        <div class="user-collection-item-teaser"><?= $rendered_teaser ?></div>
    </div>
</li>