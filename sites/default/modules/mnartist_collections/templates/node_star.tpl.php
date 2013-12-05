<?php
    $flags = _mnartist_collections_get_user_flags(array('node' => '', 'create' => false, 'use_flags' => false, 'ops' => false));
    $node = node_load($node_id);
    $node_url = url("node/$node->nid", array('absolute' => TRUE));
?>
<ul class='menu'>
    <li class='first'>
        <a href='#' class='star-link'><img src='/sites/default/themes/mnartists/images/fav-star.svg' class='star-icon' alt="flag this" /></a>
        <ul>
            <li class='collect-this'><?= flag_create_link('collections', $node_id) ?></li>
            <hr>
            <li class='add-this'>ADD TO:</li>
            <?php if(is_array($flags)) {
                foreach($flags as $row) { ?>
                    <li class='flag-this'><?= $row ?></li>
                <?php }
            } ?>
            <li class='add-this last'><?= l(t('START A NEW @name', array('@name' => strtoupper(variable_get('flag_lists_name', t('list'))))), 'flag-lists/add/' . $node->type, array('query' => drupal_get_destination())) ?></li>
            <hr>
            <li class='share-this'>SHARE VIA:</li>
            <li class='share-this'><a href='#' onclick=\"window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(<?= $node_url ?>), 'facebook-share-dialog', 'width=626,height=436'); return false;\">FACEBOOK</a></li>
            <li class='share-this'><a href='#' onclick=\"window.open('https://twitter.com/share?url='+encodeURIComponent(<?= $node_url ?>), 'twitter-share-dialog', 'width=626,height=436'); return false;\">TWITTER</a></li>
            <li><a href='#'>ADD A NETWORK&hellip;</a></li>
        </ul>
    </li>
</ul>