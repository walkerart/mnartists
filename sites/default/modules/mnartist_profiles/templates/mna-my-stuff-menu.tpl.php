<?php
    // template for rendering a user's my stuff sidebar menu
    global $user;
?>
<div id="my-stuff-menu">
    <p class="site-description">
    <?php if($user->uid) : ?>
        <?php $name = mnartist_profiles_collective_or_fullname_or_username($user->uid); ?>
        <?php if($name) : ?>
            Hi <?php print $name; ?>, use the left-hand menu to manage your account, profile, artwork, events, collections, resume and applications.
        <?php else : ?>
            Use the left-hand menu to manage your account, profile, artwork, events, collections, resume and applications.
        <?php endif; ?>
    <?php endif; ?>
    </p>
    <?php if(isset($loginItems)) : ?>
        <ul class="my-stuff-menu">
        <?php foreach ($loginItems as $item) : ?>
            <li><?php print $item; ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if(isset($myLinks)) print $myLinks; ?>
    <?php if(isset($accountLinks)) print $accountLinks; ?>
    <?php if(isset($editLinks)) print $editLinks; ?>
</div>
