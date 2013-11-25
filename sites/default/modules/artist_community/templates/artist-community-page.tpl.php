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
		<div class="community-intro">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ornare ultrices ante, eget ultricies arcu dapibus in. Nunc placerat tincidunt mauris quis rhoncus. Vivamus varius nunc ac tellus egestas ullamcorper. In consectetur, sem non lobortis interdum, erat quam volutpat tellus, in pellentesque ipsum felis vitae neque. Vivamus cursus tempor iaculis. Cras euismod suscipit nunc. Vestibulum viverra hendrerit sem tempor eleifend. Donec at sodales erat. Fusce vel ante ultrices, laoreet lacus at, dictum neque. Nunc vel nunc semper, pulvinar ante eget, interdum sem. Aenean porta viverra magna, sed tempus nisi dictum non. Curabitur at accumsan nibh. Duis convallis neque non bibendum dapibus. Duis non eros turpis.</p>
		</div>
		<div class="community-logo">
			logo
		</div>
		<?php if (!empty($articles)) { ?>
			<div class="article-thing widget">
				<h3>Top Stories</h3>
				<?php foreach($articles as $article) { ?>
					<div class="article-detail" id="article-detail-<?= $article->nid ?>" style="display: none;">
						<img src="<?= $article->image_uri ?>">
						<div class="article-content">
							<div class="article-detail-byline">by <?= $article->author ?></div>
							<a href="#">FLAG</a><!-- @TODO add real flag block here -->
							<div class="article-detail-excerpt"><?= $article->excerpt ?></div>
							<a class="article-detail-excerpt-more" href="/node/<?= $article->nid ?>">More &gt;</a>
							<div class="article-detail-photo-credit"><?= $article->photo_credit ?></div>
						</div>
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
		<div class="clear"></div>
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