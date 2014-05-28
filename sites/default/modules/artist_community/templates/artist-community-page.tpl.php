<?php
    // if there are any, get og params from url to
    // preserve them in links below
    $og_get_string = '';
    if (!(empty($_GET['og']))) {
        $og_get_string_arr = array();
        foreach($_GET['og'] as $og_id => $terms) {
            if (is_array($terms)) {
                for ($n = 0; $n < count($terms); $n++) {
                    $og_get_string_arr[] = "og[$og_id][$n]=$terms[$n]";
                }
            } else {
                $og_get_string_arr[] = "og[$og_id]=$terms";
            }
        }
        $og_get_string = implode('&', $og_get_string_arr);
    }
?>
<div class="panel-2col layout-a">
    <div class="panel-panel panel-col-first main-content<?php if (!$featured_articles_will_show) { ?> has-featured-articles<?php } ?>">

        <!-- banner -->
        <header class="organization-header<?php if (count($_GET) <= 1) { ?> has-taglines<?php } ?>">
            <h1><a class="organization" href="/">Mn Artists<?= (isset($banner_string) && $banner_string !== '') ? " $banner_string" : '' ?></a></h1>
        </header>

        <div class="sort-thing sort-thing-fully-retracted">
            <div class="wrap">
                <h2>SORT</h2>
                <?php
                    // take existing query string, if there's a sort
                    // clean it out
                    $qs = $_SERVER['QUERY_STRING'];
                    if ($qs !== '') {
                        $qs = preg_replace("/(&)?sort=.*((?=&))?/u", '', $qs);
                        $qs = preg_replace("/(&)?sort_direction=.*((?=&))?/u", '', $qs);
                        if (!empty($qs)) { $qs .= '&'; }
                    }
                ?>

                <ul class="sort-thing-sort-options">
                    <?php
                        $sort_terms = array(
                            'alpha' => 'Alphabetical',
                            'date' => 'Date',
                            'recent' => 'New/Recent',
                            'collected' => 'Most Collected'
                        );

                        foreach ($sort_terms as $sort_term => $sort_label) {
                            $class = '';
                            if (isset($_GET['sort']) && $_GET['sort'] === $sort_term) {
                                $class = "active";
                            }
                            $st_href = $qs.'sort='.$sort_term;
                            ?>
                            <li class="<?= $class ?>">
                                <a href="?<?= $st_href ?>&sort_direction=ASC"><?= $sort_label ?></a> <a href="?<?= $st_href ?>&sort_direction=DESC">&#8595;</a>
                            </li>
                    <?php } ?>
                </ul>

            </div>
            <div class="sort-thing-current-sort" id="sort-thing-opener">SORT</div>
        </div>

        <?php if (!isset($_GET['global_search'])) { ?>
            <?php if (!empty($articles)) { ?>
                <div class="article-thing widget">
                    <h3>Top Stories</h3>
                    <?php foreach($articles as $article) { ?>
                        <div class="article-detail" id="article-detail-<?= $article->nid ?>" style="display: none;">
                            <a href="/node/<?= $article->nid ?>"><img src="<?= $article->image_uri ?>"></a>
                            <div class="article-content">
                                <div class="article-detail-byline">by <?= $article->author ?></div>
                                <div class="article-detail-flag pane-mnartist-collections-mna-collections-star"><?= theme("mnartist_collections_star", array('node_id' => $article->nid)) ?></div>
                                <div class="article-detail-excerpt"><?= trim($article->excerpt) ?>&hellip;</div>
                                <a class="article-detail-excerpt-more" href="/node/<?= $article->nid ?>">More</a>
                                <div class="article-detail-photo-credit"><?= $article->photo_credit ?></div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="the-list-of-articles-container">
                        <ul>
                            <?php foreach($articles as $article) { ?>
                                <li class="<?= strtolower($article->category) ?>" data-target-article="article-detail-<?= $article->nid ?>">
                                    <a href="/node/<?= $article->nid ?>">
                                        <h4><?= $article->category ?></h4>
                                        <p><?= $article->title ?></p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php }
            if (!empty($from_the_network_posts)) { ?>
                <div class="from-the-network-thing widget">
                    <h3>From The Network</h3>
                    <?php foreach($from_the_network_posts as $post) { ?>
                        <div class="network-post">
                            <a href="<?= $post->url ?>" target="_blank">
                                <img src="<?= $post->image_url ?>" title="<?= $post->title ?>">
                            </a>
                            <div class="network-source"><?= $post->source ?></div>
                            <div class="network-title"><a href="<?= $post->url ?>" target="_blank"><?= $post->title ?></a></div>
                        </div>
                    <?php } ?>
                </div>
            <?php }
            if (!$featured_articles_will_show && $sidebar_will_show) {
                print theme('artist_community_page_search_results', array(
                    'total_num_results' => $total_num_results,
                    'all_event_results' => $all_event_results,
                    'content' => $content,
                ));
            }
        } ?>
    </div>
    <?php if (!isset($_GET['global_search']) && $sidebar_will_show) { ?>
        <div class="panel-panel panel-col-last sidebar-right">
            <?php if(!is_null($all_event_results)) { ?>
                <div class="widget-standard widget my-events">
                    <h3>My Events</h3>
                    <div class="widget-content">
                        <a href="/node/add/event">Create an event</a>
                    </div>
                </div>

                <div class="widget-standard widget highlighted-event-thing">
                    <h3><?= $highlighted_event->date->format('F'); ?> Highlight</h3>
                    <div class="widget-content">
                        <div class="event-date">
                            <span class="month"><?= $highlighted_event->date->format('M'); ?></span> <?= $highlighted_event->date->format('d'); ?>
                        </div>
                        <div class="event-title"><a href="$highlighted_event->uri"><?= $highlighted_event->title ?></a></div>
                        <div class="event-image">
                            <a href="<?= $highlighted_event->uri ?>"><img src="<?= $highlighted_event->image_uri ?>" title="<?= $highlighted_event->title ?>"></a>
                        </div>
                        <div class="event-venue-and-star"><?= $highlighted_event->venue_name ?> | <?= theme("mnartist_collections_star", array('node_id' => $highlighted_event->nid)) ?></div>
                        <div class="event-excerpt"><?= $highlighted_event->body ?></div>
                    </div>
                </div>
            <?php } ?>

            <?php if (is_null($all_event_results)) { ?>
                <?php if (!empty($latest_users)) { ?>
                    <div class="user-thing widget-standard widget">
                        <h3>Newest Artists</h3>
                        <div class="widget-content">
                        <ul>
                            <?php foreach($latest_users as $context_user) { ?>
                                <li>
                                    <a href="/user/<?= $context_user->uid ?>">
                                        <img src="<?= $context_user->image_uri ?>" width="68" height="68">
                                        <div class="user-thing-labels">
                                            <div class="user-thing-name"><?= $context_user->full_name ?></div>
                                            <div class="user-thing-roles"><?= implode(', ', mnartist_profiles_get_artwork_roles_for_user($context_user->uid)) ?></div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="user-thing-more"><a href="/community?content[artists]=1&?sort=recent&sort_direction=DESC<?php if ($og_get_string != '') { echo "&$og_get_string"; } ?>" style="font-size: 4em;">More</a></li>
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
                    </div>
                <?php } ?>
            <?php } ?>

            <?php if (!empty($event_widget_items)) { ?>
                <div class="event-thing widget-standard widget">
                    <h3>This Week</h3>
                    <div class="widget-content">
                        <div class="event-thing-event-block event-thing-event-block-hero">
                            <a href="/node/<?= $event_widget_items['hero']->nid ?>">
                                <img src="<?= $event_widget_items['hero']->image_uri ?>">
                                <div class="event-thing-event-title"><?= $event_widget_items['hero']->title ?></div>
                            </a>
                        </div>
                        <?php foreach ($event_widget_items['others'] as $event) { ?>
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
    <?php }
        if ((!$featured_articles_will_show && !$sidebar_will_show) || ($featured_articles_will_show && $sidebar_will_show)) {
            print theme('artist_community_page_search_results', array(
                'total_num_results' => $total_num_results,
                'all_event_results' => $all_event_results,
                'content' => $content,
            ));
        }
    ?>
</div>
