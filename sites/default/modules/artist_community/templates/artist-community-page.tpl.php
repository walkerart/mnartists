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
		<? /* don't show this block if we're not on the community landing page */ ?>
		<?php if (count($_GET) <= 1) { ?>
			<div class="community-intro">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ornare ultrices ante, eget ultricies arcu dapibus in. Nunc placerat tincidunt mauris quis rhoncus. Vivamus varius nunc ac tellus egestas ullamcorper. In consectetur, sem non lobortis interdum, erat quam volutpat tellus, in pellentesque ipsum felis vitae neque. Vivamus cursus tempor iaculis. Cras euismod suscipit nunc. Vestibulum viverra hendrerit sem tempor eleifend. Donec at sodales erat. Fusce vel ante ultrices, laoreet lacus at, dictum neque. Nunc vel nunc semper, pulvinar ante eget, interdum sem. Aenean porta viverra magna, sed tempus nisi dictum non. Curabitur at accumsan nibh. Duis convallis neque non bibendum dapibus. Duis non eros turpis.</p>
			</div>
		<?php } ?>

		<?php 
            $banner_block = module_invoke('artist_community', 'block_view', 'banner');
            print($banner_block['content']);
        ?>

		<?php if (!empty($articles)) { ?>
			<div class="article-thing widget">
				<h3>Top Stories</h3>
				<?php foreach($articles as $article) { ?>
					<div class="article-detail" id="article-detail-<?= $article->nid ?>" style="display: none;">
						<img src="<?= $article->image_uri ?>">
						<div class="article-content">
							<div class="article-detail-byline">by <?= $article->author ?></div>
							<div class="article-detail-flag pane-mnartist-collections-mna-collections-star"><?= theme("mnartist_collections_star", array('node_id' => $article->nid)) ?></div>
							<div class="article-detail-excerpt"><?= trim($article->excerpt) ?>&hellip;</div>
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
		<div class="search-results content-all">

		    <?php
		    	if(!is_null($all_event_results)) {

		    		// grab today's date
		    		$today = new DateTime();
		    		$today->setTime(0,0,0);

		    		// loop through, make blocks by date
		    		foreach($all_event_results as $date_index => $date_group) {
		    			$context_date = new DateTime($date_index);
		    			$date_heading = ($context_date === $today) ? 'Today' : $context_date->format('l M jS');
		    		?>
		    			<div class="date-block">
		    				<h2><?= $date_heading ?></h2>
		    				<div class="item item-date">
								<div class="event-date">
									<span class="date-display-single">
									<span class="month"><?= $context_date->format('M') ?></span>
									<?= $context_date->format('j') ?>
									</span>
								</div>
		    				    <ul class="item-event-facets">
		    				        <li><a href="">Performances (count)</a></li>
		    				        <li><a href="">Classes (count)</a></li>
		    				        <li><a href="">Exhibitions (count)</a></li>
		    				    </ul>
		    				</div>
		    				<?php foreach($date_group as $index => $the_thing) { ?>
								<div class="item item-event">
									<?= render(node_view($the_thing['item'], 'teaser')); ?>
								</div>
		    				<?php } ?>
		    			</div>
		    		<?php }

				} else {
				    	foreach($content as $item) {
				    		$the_thing = $item['item'];
				    		$the_class_suffix = ($item['type'] === 'user') ? 'users' : $the_thing->type;
				    ?>
				    	<div class="item item-<?= $the_class_suffix ?>">
				    		<?php if ($item['type'] === 'node') { ?>
			    				<?= render(node_view($the_thing, 'teaser')); ?>
				    		<?php } else if ($item['type'] === 'user') { ?>
			    				<?= theme('artist_community_artist_profile', array('user' => $the_thing)) ?>
				    		<?php } ?>
				    	</div>
					<?php }

						// check if we need to show the 'show more' anchor, and if so then show it
						$current_start = (isset($_GET['start'])) ? intval($_GET['start']) : 0;
						$current_rows = (isset($_GET['rows'])) ? intval($_GET['rows']) : intval(SEARCH_DEFAULT_ROWS);
						$new_start = (!is_null($current_start) && !is_null($current_rows)) ? $current_start + $current_rows : 0;

			    		if (count($content) >= $current_rows) {
							$new_get = array(
								'og' => (isset($_GET['og'])) ? $_GET['og'] : null,
								'content' => (isset($_GET['content'])) ? $_GET['content'] : null,
								'rows' => (isset($_GET['rows'])) ? $_GET['rows'] : SEARCH_DEFAULT_ROWS,
								'start' => $new_start,
							);

						?>
						<div class="item item-more"><a href="/community?<?= http_build_query($new_get) ?>">Show me more!</a></div>
					<?php }
				} ?>
		</div>
	</div>
	<div class="panel-panel panel-col-last sidebar-right">
		<?php if(!is_null($all_event_results)) { ?>
			<div class="widget-standard widget">
				<a href="/node/add/event">Create an event</a>
			</div>
		<?php } ?>
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
									<div class="user-thing-roles"><?= implode(', ', mnartist_profiles_get_artwork_roles_for_user($context_user->uid)) ?></div>
								</div>
							</a>
						</li>
					<?php } ?>
					<li class="user-thing-more"><a href="/community?content[0]=artists<?php if ($og_get_string != '') { echo "&$og_get_string"; } ?>" style="font-size: 4em;">&#709;</a></li>
				</ul>
				</div>
			</div>
		<?php } ?>

		<?php
		$block = module_invoke('mnartist_twitter', 'block_view', 'mna_twitter_create');
		if ($block['content'] !== false) { ?>
			<div class="twitter-thing widget widget-reverse">
				<h3>Tweets &amp; Posts</h3>
				<?= render($block['content']) ?>
				<a href="#" class="more-link">More...</a>
			</div>
		<?php } ?>

		<?php if (!empty($events)) { ?>
			<div class="event-thing widget-standard widget">
				<h3>This Week</h3>
				<div class="widget-content">
					<div class="event-thing-event-block event-thing-event-block-hero">
						<a href="/node/<?= $events['hero']->nid ?>">
							<img src="<?= $events['hero']->image_uri ?>">
							<div class="event-thing-event-title"><?= $events['hero']->title ?></div>
						</a>
					</div>
					<?php foreach ($events['others'] as $event) { ?>
						<div class="event-thing-event-block">
							<a href="/node/<?= $event->nid ?>">
								<div class="event-thing-event-title"><?= $event->title ?></div>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>