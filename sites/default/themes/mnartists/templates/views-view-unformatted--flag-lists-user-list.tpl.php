<?php

// this template renders individual collection lists
// (see views-view-fields--flag-lists-user-list.tpl.php) for
// the rendering of the individual items in the list

reset($rows);
$list_title = $view->style_plugin->render_tokens[0]['%1'];
$list_uri = $view->style_plugin->render_tokens[0]['%q'].'/'.$view->style_plugin->render_tokens[0]['!1'];

// @TODO: consider eliminating single view, just pass id to multiple view to limit
?>
<h2><a href="/<?= $list_uri ?>"><?= $list_title ?></a></h2>
<ul class="user-list">
    <?php
        foreach ($rows as $index => $item) {
            print $item;
    } ?>
</ul>