<?php
$excerpt_limit = 200;
$artwork_node = node_load($row->nid);
$text_excerpt = '';
$excerpt_overflow = '';
if (isset($artwork_node->body[LANGUAGE_NONE])) {
    $original_text = $artwork_node->body[LANGUAGE_NONE][0]['value'];
    $stripped_text = trim(strip_tags($original_text));
    if (strlen($stripped_text) > $excerpt_limit) {
        $text_excerpt = substr($stripped_text, 0, $excerpt_limit);
        $excerpt_overflow = substr($stripped_text, $excerpt_limit, strlen($stripped_text));
    } else {
        $text_excerpt = $stripped_text;
    }
}
?>
<div class="user-profile-slideshow-artwork-body">
    <p><?= $text_excerpt ?><?php if (!empty($excerpt_overflow)) { ?><span class="user-profile-slideshow-artwork-body-hellip">&hellip;</span><span class="user-profile-slideshow-artwork-body-overflow"><?= $excerpt_overflow ?></span><a href="user-profile-slideshow-artwork-body-more-link">MORE</a><?php } ?></p>
</div>