<div class="clear"></div>
<?php if($has_filters) { ?>
    <div class="search-results-status">
        <h2>Search Results (<?= $total_num_results ?>)</h2>
        <?php if ($total_num_results === 0) { ?>
            <div>Your search returned no results.</div>
        <?php } ?>
    </div>
<?php } ?>
<div class="search-results content-all<?= (isset($_GET['content']['event'])) ? ' content-events' : '' ?>" id="search-results">
    <?php if(!empty($all_event_results) && isset($_GET['event_date'])) { ?>
        <div class="date-block">
            <?php if (!empty($all_event_results) &&
                        count($all_event_results) > 0) {
                // grab today's date
                $today = new DateTime();
                $today->setTime(0,0,0);

                // get event category info for use below...
                // get event category facet counts
                global $search_facets;
                $event_category_facets_rec = array();
                $event_category_facets = $search_facets->getFacet('node_category');
                foreach ($event_category_facets as $value => $count) {
                    $event_category_facets_rec[$value] = $count;
                }

                // and build sub-items for categories
                $event_category_vocab_tree = taxonomy_get_tree(EVENT_CATEGORY_VID);

                // loop through, make blocks by date
                foreach($all_event_results as $date_index => $date_group) {
                    $context_date = new DateTime($date_index);
                    $date_heading = ($context_date === $today) ? 'Today' : $context_date->format('l M jS');
                ?>
                    <div class="item item-date">
                        <div class="event-date">
                            <span class="date-display-single">
                            <span class="month"><?= $context_date->format('M') ?></span>
                            <?= $context_date->format('j') ?>
                            </span>
                        </div>
                        <ul class="item-event-facets">
                            <?php foreach ($event_category_vocab_tree as $term) {
                                if (isset($event_category_facets_rec[intval($term->tid)]) &&
                                    $event_category_facets_rec[intval($term->tid)] !== 0) { ?>
                                <li>
                                    <a href="/community?content[event][0]=<?= $term->tid ?>">
                                        <?= $term->name ?> (<?= $event_category_facets_rec[intval($term->tid)] ?>)
                                    </a>
                                </li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                    <?php foreach($date_group as $index => $the_thing) { ?>
                        <div class="item item-event">
                            <?= render(node_view($the_thing['item'], 'teaser')); ?>
                        </div>
                    <?php }
                }
            } else { ?>
                <div class="item item-date">
                    No events on that day.
                </div>
            <?php } ?>
        </div>
    <?php } else {
        $current_start = (isset($_GET['start'])) ? intval($_GET['start']) : 0;
        $current_rows = (isset($_GET['rows'])) ? intval($_GET['rows']) : intval(SEARCH_DEFAULT_ROWS);

        if (count($content) > 0) {
            foreach($content as $item) {
                $the_thing = $item['item'];
                $the_class_suffix = ($item['type'] === 'user') ? 'users' : $the_thing->type;
                ?>
                <div class="item item-<?= $the_class_suffix ?>">
                    <?php if ($item['type'] === 'node') { ?>
                        <?php $node_view = node_view($the_thing, 'teaser'); echo render($node_view); ?>
                    <?php } else if ($item['type'] === 'user') { ?>
                        <?= theme('artist_community_artist_profile', array('user' => $the_thing)) ?>
                    <?php } ?>
                </div>
            <?php }

            // check if we need to show the 'show more' anchor, and if so then show it
            $new_start = (!is_null($current_start) && !is_null($current_rows)) ? $current_start + $current_rows : 0;

            $new_get = array(
                'og' => (isset($_GET['og'])) ? $_GET['og'] : null,
                'content' => (isset($_GET['content'])) ? $_GET['content'] : null,
                'rows' => (isset($_GET['rows'])) ? $_GET['rows'] : SEARCH_DEFAULT_ROWS,
                'start' => $new_start,
            );

            ?>
            <?php if (!(count($content) < $current_rows)) { ?>
              <div class="item item-more"><a href="/community?<?= http_build_query($new_get) ?>">Show me more!</a></div>
            <?php } ?>
        <?php } else { ?>
            <li class="feed-item infinify-terminator"></li>
        <?php }
    } ?>
</div>