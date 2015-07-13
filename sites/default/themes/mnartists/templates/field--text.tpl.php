<?php
/**
 * field.tpl.php
 * specifically here in this case to override : after field
 * titles when venue is rendered in event panelizer layout
 */
?>
<<?php print $tag; ?> class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <div class="field-items"<?php print $content_attributes; ?>>
    <?php foreach ($items as $delta => $item) : ?>
      <div class="field-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>>
        <?php print render($item); ?>
      </div>
    <?php endforeach; ?>
  </div>

</<?php print $tag; ?>>
