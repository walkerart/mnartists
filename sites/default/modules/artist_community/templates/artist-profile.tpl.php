<div class="artist-profile">
    <h3><?php echo (isset($user->roles[ORG_ROLE])) ? 'Organization' : 'Artist' ?></h3>
    <a href="<?php print $url; ?>">
        <?php
            // @TODO better default fallback here
            $image_uri = (isset($user->picture->uri)) ? image_style_url('square_thumbnail', $user->picture->uri) : 'http://mnartist.imalab.us/sites/default/files/styles/square_thumbnail/public/pictures/picture-default.jpg';
        ?>
        <img src="<?= $image_uri ?>" width="100" height="100">
    </a>

    <div class="username">
        <a href="<?php print $url; ?>">
            <?php print mnartist_profiles_collective_or_fullname_or_username($user->uid); ?>
        </a>
    </div>
</div>
