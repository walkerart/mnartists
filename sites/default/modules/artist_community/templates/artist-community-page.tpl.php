<div class="panel-2col layout-a">
	<div class="panel-panel panel-col-first main-content">
		<?php foreach($content as $type => $item): ?>
		    <div class="search-results content-<?php print $type; ?>">
		        <?php foreach($item as $node): ?>
		            <div class="item item-<?php print $type; ?>">
		            	<h3><?php print $type; ?></h3>
		            	<?php print $node; ?>
		            </div>
		        <?php endforeach; ?>
		    </div>
	    <?php endforeach; ?>
	</div>
	<div class="panel-panel panel-col-last sidebar-right">
		<p>test</p>
		<div class="">
			<?php $block = module_invoke('mnartist_twitter', 'block_view', 'mna_twitter_create');
				  print render($block['content']);
			?>
		</div>
	</div>
</div>

