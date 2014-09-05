<?php
/**
 * @file
 * MNArtists template for displaying event node (teaser only, full node is handled by panelizer)
 */

if ($teaser) {
    hide($content['comments']);
    hide($content['links']);

    $image_uri = '';
    if (isset($node->field_images[LANGUAGE_NONE])) {
        $target_image = $node->field_images[LANGUAGE_NONE][0];
        $image_uri = image_style_url('community_content_thumb', $target_image['uri']);
        $known_width = 220;
        $computed_height = ($known_width * $target_image['height']) / $target_image['width'];
    }
    $text_excerpt = '';
    if (isset($node->body[LANGUAGE_NONE])) {
        $text_excerpt = trim(text_summary(strip_tags($node->body[LANGUAGE_NONE][0]['safe_value']), 'htmlcorrector', 120));
    }

    // get date(s) for this event, make a handy
    // little string out of it
    $start_date = null;
    $end_date = null;
    $date_string = '';
    if (isset($node->field_date[LANGUAGE_NONE])) {
        $start_date = new DateTime($node->field_date[LANGUAGE_NONE][0]['value']);
        $date_string .= $start_date->format('D, M jS Y');
        if (isset($node->field_date[LANGUAGE_NONE][1])) {
            $end_date = new DateTime($node->field_date[LANGUAGE_NONE][1]['value']);
            $date_string .= ' &ndash; '.$end_date->format('D, M jS Y');
        }
    }
    ?>
    <div class="item-inside">
        <h3><?php print $type; ?></h3>
        <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
            <?php if (isset($node->field_images[LANGUAGE_NONE])) { ?>
                <a href="<?= $node_url ?>" class="item-image"><img src="<?= $image_uri ?>" width="<?= $known_width ?>" height="<?=$computed_height ?>"></a>
            <?php } ?>
            <div class="item-info-container">
                <p class="item-info-title"><a href="<?= $node_url ?>"><?php print $node->title; ?></a></p>
                <?php if (!isset($_GET['event_date'])) { ?><p class="item-info-date"><?= $date_string ?></p><?php } ?>
                <p class="item-info-excerpt">
                    <?= $text_excerpt ?> <a href="<?= $node_url ?>" class="item-more-button-link-indicator">&gt;</a>
                </p>
                <?php if(user_is_logged_in()) { ?>
                    <div class="item-info-flag pane-mnartist-collections-mna-collections-star"><?= theme("mnartist_collections_star", array('node_id' => $node->nid)) ?></div>
                <?php } ?>
            </div>
        </article>
    </div>
<?php } ?>