<?php

// this template renders individual collection lists
// (see views-view-fields--flag-lists-user-list.tpl.php) for
// the rendering of the individual items in the list

global $user;

reset($rows);

$row_limit = 9;
// check for list id to figure out if we're in the list-of-lists view or single-list view
$is_singular_view = ((arg(0) === 'user' && is_numeric(arg(4))) || (arg(0) === 'flags' && is_numeric(arg(2))));
$link_url = 'user/'.$user->uid.'/'.$view->get_url();
$list_id = $view->args[0];

?>
<?php if ($is_singular_view) { ?>
<h2><?= $view->get_title() ?></h2>
<?php } ?>
<ul class="edit-controls">
    <li class="edit"><a href="/flags/lists/edit/<?= $list_id ?>">edit</a></li>
    <li class="delete"><a href="/flags/lists/delete/<?= $list_id ?>">delete</a></li>
</ul>
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
<a class="user-list-more-link" href="/<?= $link_url ?>">and <?= (count($rows) - $row_limit) ?> more items&hellip;</a>
<?php } ?>