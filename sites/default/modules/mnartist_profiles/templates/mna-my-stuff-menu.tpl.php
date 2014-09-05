<?php
    // template for rendering a user's my stuff sidebar menu
    global $user;
?>
<div id="my-stuff-menu">
    <p class="site-description">Hi <?php print mnartist_profiles_collective_or_fullname_or_username($user->uid); ?>, use the left-hand menu to manage your account, profile, artwork, events, collections, resume and applications.</p>
    <?php print $links; ?>
    <?php print $editLinks; ?>
</div>
