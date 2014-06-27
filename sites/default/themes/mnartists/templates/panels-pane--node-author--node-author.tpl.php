<?php
	$article_author = user_load($display->context['panelizer']->data->uid);
    $author_uri = "/user/$article_author->uid";
	$full_name = mnartist_profiles_collective_or_fullname_or_username($article_author->uid);
    $author_image_uri = (isset($article_author->picture->uri)) ? image_style_url('square_thumbnail', $article_author->picture->uri) : 'http://mnartist.imalab.us/sites/default/files/styles/square_thumbnail/public/pictures/picture-default.jpg';
?>
<div<?php print $attributes; ?>>
    <?php if ($title) { ?>
      <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
    <?php } ?>
    <div class="widget-content">
        <a href="<?= $author_uri ?>">
            <img src="<?= $author_image_uri ?>" alt="<?= $full_name ?>">
            <span class="author-full-name"><?= $full_name ?></span>
        </a>
    </div>
</div>
