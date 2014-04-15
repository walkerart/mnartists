<?php
	// template for rendering the 'other articles by this author'
	// block in the sidebar on the single article view
if (count($other_articles) > 0) {
?>
<div class="widget">
	<h2>More By This Author</h2>
	<div class="widget-content">
		<ul>
			<?php foreach ($other_articles as $key => $article)	{ ?>
				<li><a href="<?= $article->node_uri ?>">
					<?php if ($key === 0 && isset($article->image_uri)) { ?>
						<img src="<?= $article->image_uri ?>" alt="<?= $article->title ?>">
					<?php } ?>
					<span class="other-article-title"><?= $article->title ?></span>
				</a></li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php } ?>