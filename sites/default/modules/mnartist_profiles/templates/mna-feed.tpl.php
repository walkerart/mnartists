<?php
    // template for rendering a user's feed
?>

<?php if (count($feed_data) > 0) { ?>
    <ul class="user-feed">
        <?php foreach ($feed_data as $feed_event) { ?>
            <li class="feed-item">
                <a href="<?= $feed_event->entity_id ?>"><img src="<?= file_create_url($feed_event->user_picture_uri) ?>" width="50" height="50"></a>
                <div class="user-feed-message-container">
                    <?= $feed_event->message ?>
                    <div class="user-feed-message-star"><?= theme("mnartist_collections_star", array('node_id' => $feed_event->entity_id)) ?></div>
                </div>
            </li>
        <? } ?>
        <li class="feed-item feed-item-more">
            <div class="user-feed-message-container">
                <a href="/user/feed?offset=<?= $current_offset + FEED_DEFAULT_ROW_LIMIT ?>">Show me more</a>
            </div>
        </li>
    </ul>
<?php } else { ?>
    <!--
        handle the I've tried all these things thing somehow? and then go back to showing old messge
        <li class="feed-item infinify-terminator">There are no items in your feed. Favorite/Star an artist to see updates here.</li>
    -->
    <div class="user-welcome">
        <h2>Now that you've joing MN Artists, here are some fun ways to start exploring and better using the site</h2>
        <ul class="welcome-list">
            <li class="welcome-artists">Find new artists in your area</li>
            <li class="welcome-collect">Start collecting artists, artworks, or articles</li>
            <li class="welcome-articles">Read up on current arts articles</li>
            <li class="welcome-artwork">Add new work to your profile</li>
            <li class="welcome-opportunities">Find Opportunities to advance your career</li>
            <li class="welcome-events">Learn about what art events are happening this week</li>
        </ul>
        <a class="done-link"><input type="checkbox" name="no-welcome">I've tried all these things</a></a>
    </div>
<?php } ?>