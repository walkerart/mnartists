<?php
/**
 * @file
 * MNArtists template for displaying venue node (teaser only, full node is handled by panelizer)
 */

if ($teaser) {

  hide($content['comments']);
  hide($content['links']);
?>
<h3><?php print $type; ?></h3>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>

  <?php if ($title && !$page): ?>
    <header<?php print $header_attributes; ?>>
      <?php if ($title): ?>
        <h1<?php print $title_attributes; ?>>
          <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        </h1>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php if(!empty($user_picture) || $display_submitted): ?>
    <footer<?php print $footer_attributes; ?>>
      <?php print $user_picture; ?>
      <?php if ($node->type !== 'venue') { ?>
        <p class="author-datetime"><?php print $submitted; ?></p>
      <?php } ?>
    </footer>
  <?php endif; ?>

  <div<?php print $content_attributes; ?>>
    <?php print render($content); ?>
  </div>


</article>
<?php } ?>