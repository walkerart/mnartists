<?php
    $is_flagged = FALSE;
    $context_user_flag = flag_get_flag('usercollections');
    if ($context_user_flag && $context_user_flag->is_flagged($user->uid)) {
        $is_flagged = TRUE;
    }
?>
<div class="artist-profile">
    <h3><?php echo (isset($user->roles[ORG_ROLE])) ? 'Org' : 'Artist' ?></h3>
    <a href="<?php print $url; ?>">
        <?php
            // @TODO better default fallback here
            $working_uri = (isset($user->picture->uri)) ? $user->picture->uri : variable_get('user_picture_default');
            $image_uri = image_style_url('community_user_thumb', $working_uri);
        ?>
        <img src="<?= $image_uri ?>" width="100" height="100">
    </a>

    <?php if(user_is_logged_in()) { ?>
        <div class="pane-mnartist-collections-mna-collections-star">
            <ul class="menu follow-menu<?php if ($is_flagged) { ?> collected<? } ?>">
                <li class="first">
                    <a class='star-link'><img src='/<?= drupal_get_path('theme', 'mnartists') ?>/images/fav-star.svg' class='star-icon' alt="flag this" /></a>
                    <ul>
                        <li class='follow-this'><?= flag_create_link('usercollections', $user->uid) ?></li>
                        <hr>
                        <li class='share-this collect-title'>SHARE VIA:</li>
                        <li class='share-this'><a href='#' onclick='window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent("<?= $base_url.$url ?>"), "facebook-share-dialog", "width=626,height=436"); return false;'>FACEBOOK</a></li>
                        <li class='share-this'><a href='#' onclick='window.open("https://twitter.com/share?url=" + encodeURIComponent("<?= $base_url.$url ?>"), "twitter-share-dialog", "width=626,height=436"); return false;'>TWITTER</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    <?php } ?>
    <div class="username">
        <a href="<?php print $url; ?>">
            <?php print mnartist_profiles_collective_or_fullname_or_username($user->uid); ?>
        </a>
    </div>
    <div class="roles"><?php print implode(', ', mnartist_profiles_get_artwork_roles_for_user($user->uid)); ?></div>
</div>
