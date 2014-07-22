<?php

/**
 * @file
 * MNArtists template for displaying artwork node (teaser only, full node is handled by panelizer)
 */

if ($teaser) {
  hide($content['comments']);
  hide($content['links']);
  $top_title = $type;
  if (!(empty($node->field_medium3))) {
      $term_list = array();
      foreach ($node->field_medium3[LANGUAGE_NONE] as $term) {
          $tterm = taxonomy_term_load($term['tid']);
          $term_list[] = $tterm->name;
      }
      $top_title = implode(', ', $term_list);
  }

  // if non-standard media type get image by scheme,
  // otherwise use image
  if (isset($node->field_media[LANGUAGE_NONE])) {
    $image_uri = artist_community_image_for_artwork_image_uri($node->field_media[LANGUAGE_NONE][0]['uri'], 'community_content_thumb');
    $image_info = image_get_info($image_uri);
    $known_width = 220;
    $computed_height = (!empty($image_info['width'])) ? ($known_width * $image_info['height']) / $image_info['width'] : 0;
  }


  ?>
  <div class="item-inside">
    <h3><?php print $top_title; ?></h3>
    <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
      <?php if (isset($node->field_media[LANGUAGE_NONE])) { ?>
        <a href="<?= $node_url ?>" class="item-image"><img src="<?= $image_uri ?>" width="<?= $known_width ?>" height="<?=$computed_height ?>"></a>
      <?php } ?>
      <div class="item-info-container">
        <p class="item-info-author"><a href="/user/<?= $node->uid ?>"><?php print mnartist_profiles_collective_or_fullname_or_username($node->uid, true); ?></a></p>
        <p class="item-info-title"><a href="<?= $node_url ?>"><?php print $node->title; ?></a></p>
        <?php if(user_is_logged_in()) { ?>
          <div class="item-info-flag pane-mnartist-collections-mna-collections-star"><?= theme("mnartist_collections_star", array('node_id' => $node->nid)) ?></div>
        <?php } ?>
      </div>
    </article>
  </div>
<?php } ?>