<?php
/**
 * @file
 * MNArtists template for displaying opportunity node (teaser only, full node is handled by panelizer)
 */

if ($teaser) {

  hide($content['comments']);
  hide($content['links']);

  $image_uri = '';
    if (isset($node->op_cover_image[LANGUAGE_NONE])) {
        $target_image = $node->op_cover_image[LANGUAGE_NONE][0];
        $image_uri = image_style_url('community_content_thumb', $target_image['uri']);
        $known_width = 220;
        $computed_height = ($known_width * $target_image['height']) / $target_image['width'];
    }

  $text_excerpt = '';
  if (isset($node->op_short_description[LANGUAGE_NONE])) {
      $text_excerpt = trim(text_summary(strip_tags($node->op_short_description[LANGUAGE_NONE][0]['value']), 'text', 120));
  }

  $end_date = null;
  $date_string = '';
  if (isset($node->op_dates[LANGUAGE_NONE]) && isset($node->op_dates[LANGUAGE_NONE][0]['value2'])) {
    $date_utc = format_date(strtotime($node->op_dates[LANGUAGE_NONE][0]['value2']), 'custom', 'Y-m-d\TH:i:s\Z');
    $date_string = format_date(strtotime($date_utc), 'custom', 'l, M jS Y, g:ia');
  }
  ?>
  <div class="item-inside">
    <h3><?php print $type; ?></h3>
    <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
      <?php if (isset($node->op_cover_image[LANGUAGE_NONE])) { ?>
          <a href="<?= $node_url ?>" class="item-image"><img src="<?= $image_uri ?>" width="<?= $known_width ?>" height="<?=$computed_height ?>"></a>
      <?php } ?>
      <div class="item-info-container">
        <p class="item-info-author"><a href="/user/<?= $node->uid ?>"><?php print mnartist_profiles_collective_or_fullname_or_username($node->uid); ?></a></p>
        <p class="item-info-title"><a href="<?= $node_url ?>"><?php print $node->title; ?></a></p>
        <?php if ($date_string !== '') : ?>
        <p class="item-info-deadline">Closes: <?= $date_string ?></p>
        <div<?php print $content_attributes; ?>>
          <?php if ($text_excerpt !== '') { ?><?= $text_excerpt ?> <a href="<?= $node_url ?>" class="item-more-button-link-indicator">&gt;</a><?php } ?>
        </div>
        <?php endif; ?>
        <?php if(user_is_logged_in()) { ?>
          <div class="item-info-flag pane-mnartist-collections-mna-collections-star"><?= theme("mnartist_collections_star", array('node_id' => $node->nid)) ?></div>
        <?php } ?>
      </div>
    </article>
  </div>
<?php } ?>
