<?php
$node = menu_get_object();
if ($node && $node->nid) {
    // You have a valid node to work with.
    if (isset($node->field_category[LANGUAGE_NONE])) {
        $category = taxonomy_term_load($node->field_category[LANGUAGE_NONE][0]['tid']);

        if (!is_null($category)) { ?>
            <a href="/community?content[event][0]=<?= $category->tid ?>"><?= $category->name ?></a>
        <?php }
    }
} ?>