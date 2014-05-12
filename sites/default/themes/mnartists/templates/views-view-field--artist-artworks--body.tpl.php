<?php
$excerpt_limit = 200;
$artwork_node = node_load($row->nid);
$text_excerpt = '';
if (isset($artwork_node->body[LANGUAGE_NONE])) {
    $original_text = $artwork_node->body[LANGUAGE_NONE][0]['value'];
    $stripped_text = trim(strip_tags($original_text));
    $text_excerpt = (strlen($stripped_text) > $excerpt_limit) ? text_summary($stripped_text, 'text', $excerpt_limit).'&hellip;' : $stripped_text;
}
?>
<p><?= $text_excerpt ?></p>