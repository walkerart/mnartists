<?php

// this template renders the individual items in
// the collection, by rendering the collected
// nodes's teaser view (wrapped in a little extra
// markup)

$node = node_load($row->nid);
$user = user_load($node->uid);
$node_uri = "/node/$node->nid";
$image_uri = null;

if ($node->type === 'artwork') {
    // if non-standard media type get image by scheme,
    // otherwise use image
    if (isset($node->field_media['und'])) {
      $working_uri = $node->field_media['und'][0]['uri'];
      $scheme = file_uri_scheme($working_uri);
      switch ($scheme) {
        case ('soundcloud'):
        case ('youtube'):
        case ('vimeo'):
          $wrapper = file_stream_wrapper_get_instance_by_uri($working_uri);
          $working_uri = $wrapper->getLocalThumbnailPath();
          break;
        case ('public'):
          break;
      }
    }
    $image_uri = image_style_url('medium', $working_uri);
}
?>
<a class="user-collection-item" href="<?= $node_uri ?>">
    <img src="<?= file_create_url($image_uri) ?>">
</a>