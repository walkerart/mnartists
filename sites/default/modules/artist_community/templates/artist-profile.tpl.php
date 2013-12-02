<?php
    $main_profile = profile2_load_by_user($user->uid, 'main');
    if ($main_profile !== false) {
        // @TODO move this back into a profile method maybe? we're doing this in two places now
        $practice = '';
        if (isset($main_profile->field_practice['und'])) {
            $practice_value = $main_profile->field_practice['und'][0]['value'];
            $field_info = field_info_field('field_practice');
            if (isset ($field_info['settings']['allowed_values'][$practice_value])) {
                $practice = $field_info['settings']['allowed_values'][$practice_value];
            }
        }
    }
?>
<div class="artist-profile">
    <h3><?php echo (isset($user->roles[ORG_ROLE])) ? 'Org' : 'Artist' ?></h3>
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
    <?php if (isset($practice) && $practice !== '') { ?>
        <div class="practice"><?php print $practice ?></div>
    <?php } ?>
</div>
