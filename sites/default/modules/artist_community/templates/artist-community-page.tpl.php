<style>
/* article-thing */
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
.the-list-of-articles-container ul li a {
	text-decoration: none;
	display: block;
	width: 100%;
	height: 100%;
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

/* user-thing */
.user-thing {
	float: left;
	width: 100%;
}
.user-thing ul,
.user-thing ul li {
	list-style: none;
	margin: 0; padding: 0;
}
.user-thing ul li {
	margin-bottom: 1em;
}
.user-thing ul li img {
	border-radius: 50%;
}
.user-thing ul li img,
.user-thing-labels {
	float: left;
}
.user-thing-labels {
}
.user-thing-name {
	font-family: "adobe-text-pro", "Times New Roman", Times, serif;
	font-weight: bold;
}
.user-thing-practice {
	color: #adadad;
}
.panel-panel > div,
.user-thing ul li {
	clear: both;
}

/* twitter-thing */
.twitter-thing {
	height: 200px;
	overflow-y: auto;
}

/* event-thing */
.event-thing {

}
.event-thing-event-block {
	margin-bottom: 1em;
}
.event-thing-event-block img,
.event-thing-event-tite {
	margin: 0;
	padding: 0;
}

.sidebar-right > div {
	margin-bottom: 2em;
}
</style>

<script>
(function($) {
    $(function () {
    	// setup, grab the relevant elements
    	var articleThing = $('.article-thing');
    	var allTopStoryLinks = articleThing.find('.the-list-of-articles-container ul li a');
    	var articleBlocks = articleThing.find('.article-detail');
    	var startingArticle = $(articleBlocks[0]);
    	var pairedLink = articleThing.find('a[href=#' + startingArticle.attr('id') + ']').parent();

    	// attach click events for the list items
    	allTopStoryLinks.click(function (evt) {
    		evt.preventDefault();
    		var targetElId = evt.currentTarget.href.split('#')[1];
    		var articleBlocks = $('.article-thing').find('.article-detail');
    		var articleListEls = $('.article-thing').find('.the-list-of-articles-container ul li');
    		articleListEls.removeClass('active');
    		$(evt.currentTarget).parent().addClass('active');
    		articleBlocks.hide();
    		$('#' + targetElId).show();
    	});

    	// show/make active the first item
    	startingArticle.show();
    	pairedLink.addClass('active');
    });
}(jQuery));
</script>
<?php
	// if there are any, get og params from url to
	// preserve them in links below
	$og_get_string = '';
	if (!(empty($_GET['og']))) {
		$og_get_string_arr = array();
		foreach($_GET['og'] as $og_id => $terms) {
			$og_get_string_arr[] = "og[$og_id]=$terms";
		}
		$og_get_string = implode('&', $og_get_string_arr);
	}
?>
<div class="panel-2col layout-a">
	<div class="panel-panel panel-col-first main-content">
		<?php if (!empty($articles)) { ?>
			<div class="article-thing">
				<h3>Top Stories</h3>
				<?php foreach($articles as $article) { ?>
					<div class="article-detail" id="article-detail-<?= $article->nid ?>" style="display: none;">
						<img src="<?= $article->image_uri ?>">
						<div class="article-detail-byline">by <?= $article->author ?></div>
						<a href="#">FLAG</a><!-- @TODO add real flag block here -->
						<div class="article-detail-excerpt"><?= $article->excerpt ?></div>
						<a class="article-detail-excerpt-more" href="/node/<?= $article->nid ?>">More &gt;</a>
						<div class="article-detail-photo-credit"><?= $article->photo_credit ?></div>
					</div>
				<?php } ?>

				<div class="the-list-of-articles-container">
					<ul>
						<?php foreach($articles as $article) { ?>
							<li>
								<a href="#article-detail-<?= $article->nid ?>">
									<h4><?= $article->category ?></h4>
									<p><?= $article->title ?></p>
								</a>
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
		<?php if (!empty($latest_users)) { ?>
			<div class="user-thing widget-standard widget">
				<h3>Newest Artists</h3>
				<div class="widget-content">
				<ul>
					<?php foreach($latest_users as $context_user) { ?>
						<li>
							<a href="/users/<?= $context_user->username ?>">
								<img src="<?= $context_user->image_uri ?>" width="68" height="68">
								<div class="user-thing-labels">
									<div class="user-thing-name"><?= $context_user->full_name ?></div>
									<div class="user-thing-practice"><?= $context_user->practice ?></div>
								</div>
							</a>
						</li>
					<?php } ?>
					<!-- @TODO replace with actual downward arrow -->
					<li class="user-thing-more"><a href="/community?content[0]=artists<?php if ($og_get_string != '') { echo "&$og_get_string"; } ?>" style="font-size: 4em;">&#709;</a></li>
				</ul>
				</div>
			</div>
		<?php } ?>

		<div class="twitter-thing widget widget-reverse">
			<h3>Tweets &amp; Posts</h3>
			<?php $block = module_invoke('mnartist_twitter', 'block_view', 'mna_twitter_create');
				  print render($block['content']);
			?>
			<a href="#" class="more-link">More...</a>
		</div>

		<div class="event-thing widget-standard widget">
			<h3>This Week</h3>
			<div class="widget-content">
			<?php foreach ($events as $event) { ?>
				<div class="event-thing-event-block">
					<a href="/node/<?= $event->nid ?>">
						<img src="<?= $event->image_uri ?>">
						<div class="event-thing-event-title"><?= $event->title ?></div>
					</a>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>