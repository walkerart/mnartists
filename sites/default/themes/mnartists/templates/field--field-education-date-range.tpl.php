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
        <?php
          //print render($item);
          if (isset($item['entity']['field_collection_item'])) {
            foreach ($item['entity']['field_collection_item'] as $thisitem) {
              print $thisitem['field_work_start_date'][0]['#markup'];
              if (strlen($thisitem['field_work_end_date'][0]['#markup']) > 0) {
                print ' - ' . $thisitem['field_work_end_date'][0]['#markup'];
              }
            }
          }
        ?>
      </div>
    <?php endforeach; ?>
  </div>

</<?php print $tag; ?>>
