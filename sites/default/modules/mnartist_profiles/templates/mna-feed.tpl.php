<?php
    // template for rendering a user's feed
    global $user;
    $should_show_welcome = _mnartist_profiles_should_show_welcome();
    $parsed_referrer = parse_url($_SERVER['HTTP_REFERER']);
    $came_from_welcome = ($parsed_referrer['path'] === '/user/welcome');
    $aristsUrl = url("community", array("query" => array("content[artists]" => "1")));
    $orgUrl = url("community", array("query" => array("content[organizations]" => "1")));
?>
<h2>My Feed</h2>
<p class="intro-text">Follow <a href="<?= $aristsUrl ?>">artists</a> and <a href="<?= $orgUrl ?>">orgs</a> by hovering over the gray star by their name, and see updates in your feed about the artwork and events they post.</p>
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
<?php } else {
    if ($should_show_welcome && !$came_from_welcome) {
        drupal_goto('user/welcome');
    } else { ?>
        <li class="feed-item infinify-terminator">There are no items in your feed. Favorite/Star an artist to see updates here.</li>
    <?php }
} ?>
