<?php

// this template renders individual collection lists
// (see views-view-fields--flag-lists-user-list.tpl.php) for
// the rendering of the individual items in the list

reset($rows);

$row_limit = 9;
$is_singular_view = (is_numeric(arg(2)));// check for list id to figure out if we're in the list-of-lists view or single-list view

?>
<?php if ($is_singular_view) { ?>
<h2><?= $view->get_title() ?></h2>
<?php } ?>
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
<a class="user-list-more-link" href="/<?= $view->get_url() ?>">and <?= (count($rows) - $row_limit) ?> more items&hellip;</a>
<?php } ?>