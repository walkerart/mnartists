<style>
.article-thing {
	clear: both;
	height: 600px;
}
.article-detail,
.the-list-of-articles-container {
	float: left;
	background-color: white;
	height: 100%;
}
.article-detail img {
	max-width: 100%;
	width: 100%;
}
.article-detail {
	width: 63.963963964%;
}
.the-list-of-articles-container {
	width: 36%;
}
.the-list-of-articles-container ul,
.the-list-of-articles-container ul li {
	list-style: none;
}
.the-list-of-articles-container ul,
.the-list-of-articles-container ul li,
.the-list-of-articles-container ul li h4,
.the-list-of-articles-container ul li p {
	margin: 0; padding: 0;
}
.the-list-of-articles-container ul li {
	padding: 1em 0;
	color: #808080;
	height: 80px;
}
.the-list-of-articles-container ul li.active {
	background-color: #e5e5e5;
	color: black;
}
.the-list-of-articles li h4 {
}
.the-list-of-articles-container ul li p,
.article-detail-excerpt {
	font-family: "adobe-text-pro", "Times New Roman", Times, serif;
}
.the-list-of-articles-container ul li p {
	font-size: 1.8em;
}
.article-detail-byline {
	text-transform: uppercase;
}
.article-detail-excerpt {
	font-size: 1.1em;
}
.article-detail-photo-credit {
	border-top: 1px solid #808080;
	padding-top: 1em;
}
</style>
<div class="panel-2col layout-a">
	<div class="panel-panel panel-col-first main-content">
		<?php if (!empty($articles)) { ?>
			<div class="article-thing">
				<h3>Top Stories</h3>
				<?php foreach($articles as $index => $article) {
					$article_image_url = isset($article->field_images['und']) ? file_create_url($article->field_images['und'][0]['uri']) : null;
					if ($article_image_url === null) { continue; }// @TODO: would need to do this in list as well, if you were actually going to do this
					$excerpt = text_summary($article->body['und'][0]['value'], null, 300);
					$article_id = $article->nid;
				?>
					<div class="article-detail" id="article-detail-<?= $article_id ?>"<?php if ($index !== 19) { echo ' style="display: none"'; } ?>>
						<img src="<?= $article_image_url ?>">
						<div class="article-detail-byline">by <?= $article->name ?></div>
						<a href="#">flag</a><!-- @TODO: favorite link block here -->
						<div class="article-detail-excerpt"><?= $excerpt ?></div>
						<a class="article-detail-excerpt-more" href="#">More &gt;</a>
						<div class="article-detail-photo-credit">Video still from BodyCartography Project's &ldquo;Something for Myself&rdquo; Courtesy of Young Dance</div>
					</div>
				<?php } ?>

				<div class="the-list-of-articles-container">
					<ul>
						<?php foreach($articles as $index => $article) {
							$article_category_term = taxonomy_term_load($article->field_article_category['und'][0]['tid']);
							if (!(isset($article->field_images['und']))) { continue; }
						?>
							<li<?php if ($index === 19) { echo ' class="active"'; } ?>>
								<h4><?= $article_category_term->name ?></h4>
								<p><?= $article->title ?></p>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		<?php } ?>

		<?php foreach($content as $type => $item): ?>
		    <div class="search-results content-<?php print $type; ?>">
		        <?php foreach($item as $node): ?>
		            <div class="item item-<?php print $type; ?>">
		            	<h3><?php print $type; ?></h3>
		            	<?php print $node; ?>
		            </div>
		        <?php endforeach; ?>
		    </div>
	    <?php endforeach; ?>
	</div>
	<div class="panel-panel panel-col-last sidebar-right">
		<p>test</p>
		<div class="">
			<?php $block = module_invoke('mnartist_twitter', 'block_view', 'mna_twitter_create');
				  print render($block['content']);
			?>
		</div>
	</div>
</div>

