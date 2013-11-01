<!-- @TODO: think about what you want to actually go here -->
<ul class="user-feed">
    <?php foreach ($feed_data as $feed_event) { ?>
    <li>
        <img src="<?= file_create_url($feed_event->user_picture_uri) ?>" width="50" height="50">
        <?= $feed_event->message ?>
    </li>
    <? } ?>
</ul>