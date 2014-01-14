<?php

// this template renders individual collection lists
// (see views-view-fields--flag-lists-user-list.tpl.php) for
// the rendering of the individual items in the list

reset($rows);
$list_title = $view->style_plugin->render_tokens[0]['%1'];
$list_uri = $view->style_plugin->render_tokens[0]['%q'].'/'.$view->style_plugin->render_tokens[0]['!1'];

$row_limit = 9;
$is_singular_view = (arg(4));// check for list id to figure out if we're int he list-of-lists view or single-list view

?>
<h2><a href="/<?= $list_uri ?>"><?= $list_title ?></a></h2>
<ul class="user-list">
    <?php
        foreach ($rows as $index => $item) {
            if (!($is_singular_view) && $index === $row_limit) {
                break;
            }
            print $item;
    } ?>
</ul>
<?php if (!($is_singular_view) && count($rows) > $row_limit) { ?>
<a class="user-list-more-link" href="/<?= $list_uri ?>">and <?= (count($rows) - $row_limit) ?> more items&hellip;</a>
<? } ?>