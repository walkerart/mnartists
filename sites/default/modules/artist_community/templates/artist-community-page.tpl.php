<?php foreach($content as $type => $item): ?>
    <div class="search-results content-<?php print $type; ?>">
        <?php foreach($item as $node): ?>
            <div class="item">
            	<h3><?php print $type; ?></h3>
            	<?php print $node; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
