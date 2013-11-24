<!-- @TODO: think about what you want to actually go here -->
<ul class="user-feed">
    <?php foreach ($feed_data as $feed_event) { ?>
    <li>
        <img src="<?= file_create_url($feed_event->user_picture_uri) ?>" width="50" height="50">
        <div class="user-feed-message-container">
            <p class="user-feed-message"><?= $feed_event->message ?></p>
            <span class="user-feed-interval-summary" title="updated time: <?= date('D, d M Y H:i:s', $feed_event->update_timestamp) ?>">
                <?= $feed_event->interval_summary ?>
            </span>
        </div>
    </li>
    <? } ?>
</ul>