<!-- @TODO: think about what you want to actually go here -->
<ul class="user-feed">
    <?php foreach ($feed_data as $feed_event) { ?>
        <li class="feed-item">
            <img src="<?= file_create_url($feed_event->user_picture_uri) ?>" width="50" height="50">
            <div class="user-feed-message-container">
                <?= $feed_event->message ?>
                <div class="user-feed-message-star"><?= theme("mnartist_collections_star", array('node_id' => $feed_event->entity_id)) ?></div>
            </div>
        </li>
    <? } ?>
    <li class="feed-item feed-item-more">
        <div class="user-feed-message-container">
            <a href="/user/feed/more?offset=<?= FEED_DEFAULT_ROW_LIMIT ?>">Show me more</a>
        </div>
    </li>
</ul>