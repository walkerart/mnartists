<?php
    // template for rendering a user's feed
?>
<ul class="user-feed">
    <?php
        if (count($feed_data) > 0) {
            foreach ($feed_data as $feed_event) { ?>
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
    <?php } else { ?>
        <li class="feed-item infinify-terminator">There are no items in your feed. Favorite/Star an artist to see updates here.</li>
    <?php } ?>
</ul>
