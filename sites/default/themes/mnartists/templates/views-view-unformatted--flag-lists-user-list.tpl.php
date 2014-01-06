<?php

// this template renders individual collection lists
// (see views-view-fields--flag-lists-user-list.tpl.php) for
// the rendering of the individual items in the list

reset($rows);
// @TODO: gotta get list title in here, how do we do that?
// @TODO: and then also remove title instance in lists view so that it picks up this one
?>
<h2>(list title would go here?)<?= $title ?></h2>
<ul class="user-list">
    <?php
        foreach ($rows as $index => $item) {
            print $item;
    } ?>
</ul>