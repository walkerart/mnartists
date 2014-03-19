<?php
/**
 * @file
 * Template for a 2 column panel layout. this is for community page(s)
 *
 * This template provides a two column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>
<div class="panel-display panel-2col clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-pane panel-col-top">
    <div class="panel-col-first">
      <div class="inside"><?php print $content['top_left']; ?></div>
    </div>
    <div class="panel-col-last">
      <div class="inside"><?php print $content['top_right']; ?></div>
    </div>
  </div>
  <div class="panel-pane panel-col-full">
      <div class="inside"><?php print $content['community_full']; ?></div>
  </div>
  <div class="panel-panel panel-col-first main-content">
    <div class="inside"><?php print $content['left']; ?></div>

    <div class="panel-panel panel-col-first inset-left">
    	<div class="inside"><?php print $content['inset_left']; ?></div>
    </div>
    <div class="panel-panel panel-col-last inset-right">
    	<div class="inside"><?php print $content['inset_right']; ?></div>
    </div>
  </div>

  <div class="panel-panel panel-col-last sidebar-right">
    <div class="inside"><?php print $content['right']; ?></div>
  </div>
</div>
