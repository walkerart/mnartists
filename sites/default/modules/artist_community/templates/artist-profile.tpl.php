<div class="artist-profile">
    <h3><?php echo (isset($user->roles[ORG_ROLE])) ? 'Org' : 'Artist' ?></h3>
    <a href="<?php print $url; ?>">
        <?php
            // @TODO better default fallback here
            $image_uri = (isset($user->picture->uri)) ? image_style_url('community_user_thumb', $user->picture->uri) : 'http://mnartist.imalab.us/sites/default/files/styles/square_thumbnail/public/pictures/picture-default.jpg';
        ?>
        <img src="<?= $image_uri ?>" width="100" height="100">
    </a>

    <?php if(user_is_logged_in()) { ?>
        <ul class="menu follow-menu">
            <li class="first">
                <?= flag_create_link('usercollections', $user->uid) ?>
                <ul>
                    <li class="follow-this"><a href="#"><span class="flag-verb">Follow</span> this <?php echo (isset($user->roles[ORG_ROLE])) ? 'Organization' : 'Artist' ?></a></li>
                    <li class='share-this collect-title'>SHARE VIA:</li>
                    <li class='share-this'><a href='#' onclick='window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent("<?= $base_url.$url ?>"), "facebook-share-dialog", "width=626,height=436"); return false;'>FACEBOOK</a></li>
                    <li class='share-this'><a href='#' onclick='window.open("https://twitter.com/share?url=" + encodeURIComponent("<?= $base_url.$url ?>"), "twitter-share-dialog", "width=626,height=436"); return false;'>TWITTER</a></li>
                </ul>
            </li>
        </ul>
    <?php } ?>
    <div class="username">
        <a href="<?php print $url; ?>">
            <?php print mnartist_profiles_collective_or_fullname_or_username($user->uid); ?>
        </a>
    </div>
    <div class="roles"><?php print implode(', ', mnartist_profiles_get_artwork_roles_for_user($user->uid)); ?></div>
</div>
