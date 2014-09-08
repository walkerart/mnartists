<?php
    // template for rendering a user's my stuff sidebar menu
    global $user;
?>
<div id="my-stuff-menu">
    <p class="site-description">
    <?php if($user->uid) : ?>
    	Hi <?php print mnartist_profiles_collective_or_fullname_or_username($user->uid); ?>, use the left-hand menu to manage your account, profile, artwork, events, collections, resume and applications.
    <?php else : ?>
    	Welcome to the new MN Artists! To move your artwork and information from the old site to the new site, <a class="my-stuff-link" href="<?php echo url('user/register', array()); ?>">click here</a>.
    <?php endif; ?>
    </p>
    <?php if(isset($loginItems)) : ?>
    	<ul>
    	<?php foreach ($loginItems as $item) : ?>
    		<li><?php print $item; ?></li>
    	<?php endforeach; ?>
    	</ul>
    <?php endif; ?>
    <?php if(isset($renderedLinks)) print $renderedLinks; ?>
    <?php if(isset($editLinks)) print $editLinks; ?>
</div>
