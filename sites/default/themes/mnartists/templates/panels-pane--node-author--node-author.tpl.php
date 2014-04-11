<?php
	$article_node = node_load($display->args[0]);
	$article_author = user_load($article_node->uid);
	$full_name = mnartist_profiles_collective_or_fullname_or_username($article_author->uid);
	$author_image_uri = image_style_url('square_thumbnail', $article_author->picture->uri);
?>
<?php if ($title) { ?>
  <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
<?php } ?>
<img src="<?= $author_image_uri ?>" alt="$full_name">
<?= $full_name ?>