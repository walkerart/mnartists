<?php
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/styles.css');

//dpm($rows); ?>


<div class="container">
	<div id="ap-resume">
		<?php echo file_get_contents(file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/resume.html'))); ?>
	</div>
</div>