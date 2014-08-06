<?php
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
	drupal_add_css(drupal_get_path('module', 'mn_op') . '/css/mn-op.css');
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/ekko-lightbox.min.css');
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/dark.css');
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/styles.css');

    drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/bootstrap.min.js');
	drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/ekko-lightbox.min.js');
	drupal_add_js(drupal_get_path('module', 'mn_op') . '/js/view-script.js');
	drupal_add_js('//connect.soundcloud.com/sdk.js', 'external');
    drupal_add_js('(function ($) { $(document).ready(function() {
        	SC.initialize({
      			client_id: "29800bb0ab961280619c6721dca3aa3d",
    			});
        		window.CKEDITOR_BASEPATH = "/sites/all/libraries/ckeditor";
    		}); })(jQuery);', 'inline' );
	//dpm($rows);
?>

<div class="container">
	<br>
	<div class="row">
		<a class="prev" href="/applications">Back to Applications</a>
	</div>
	<div class="row">
		<h1><?php echo $rows['opportunity']['title']; ?> Application submited: <?php echo $rows['application']['updated_at']; ?></h1>
	</div>
	<div class="row">
      	<div class="col-md-8">
      		<h3>
      			<?php echo $rows['application']['first_name'] . ' ' . $rows['application']['last_name']; ?>
      		</h3>
      		<p><?php echo $rows['application']['address']; ?></br>
      		<?php echo $rows['application']['city'] . ', ' . $rows['application']['state'] . ' ' . $rows['application']['zip']; ?></p>
      		<?php echo (in_array("county", $rows['areas'])) && $rows['application']['county'] != '' ? '<p>County: ' . $rows['application']['country'] . '</p>' : ''; ?>
      		<?php echo (in_array("country", $rows['areas'])) && $rows['application']['country'] != '' ? '<p>Country: ' . $rows['application']['country'] . '</p>' : ''; ?>
      		<?php echo '<p>Email: ' . $rows['application']['email'] . '</p>'; ?>
      		<?php echo $rows['application']['phone'] != '' ? '<p>Phone: ' . $rows['application']['phone'] . '</p>' : ''; ?>
      		<?php echo (in_array("website", $rows['areas']) && $rows['application']['website'] != '') ? '<p>Website: ' . $rows['application']['website'] . '</p>' : ''; ?>
      		<?php echo (in_array("gender", $rows['areas']) && $rows['application']['gender'] != '') ? '<p>Gender: ' . $rows['application']['gender'] . '</p>' : ''; ?>
      		<?php echo (in_array("ethnicity", $rows['areas']) &&  $rows['application']['ethnicity'] != '') ? '<p>Ethnicity: ' . $rows['application']['ethnicity'] . '</p>' : ''; ?>
			<?php echo (in_array("age", $rows['areas']) && $rows['application']['age'] != '0') ? '<p>Age: ' . $rows['application']['age'] . '</p>' : ''; ?>
			<?php if ($rows['application']['statement'] != '' && in_array("statement", $rows['areas'])) : ?>
				<h3>Statement</h3>
				<p><?php echo $rows['application']['statement']; ?></p>
			<?php endif; ?>
			<?php if ($rows['application']['proposal'] != '' && in_array("proposal", $rows['areas'])) : ?>
				<h3>Proposal</h3>
				<p><?php echo $rows['application']['proposal']; ?></p>
			<?php endif; ?>
			<?php if ($rows['application']['bio'] != '' && in_array("bio", $rows['areas'])) : ?>
				<h3>Bio</h3>
				<p><?php echo $rows['application']['bio']; ?></p>
			<?php endif; ?>
			<?php if (in_array("resume", $rows['areas'])) : ?>
				<a href="<?php echo url('user/' . $rows['application']['uid'] . '/resume/download'); ?>" class="btn btn-default ap-btn" target="_blank">View Resume</a>
			<?php endif; ?>
		</div>
	</div>
	<?php if(in_array('work', $rows['steps'])) : ?>
	<div class="lightbox-parent">
		<?php $sci = "0"; //used to increment soundcloud embeds ?>
		<?php foreach($rows['artworks'] as $artwork) : ?>
		<hr>
		<div class="row">
			<div class="col-sm-4 artwork-info">
				<div><em><?php echo $artwork->title; ?></em></div>
            	<div><?php echo $artwork->date; ?></div>
            	<div><?php foreach(json_decode($artwork->medium) as $medium) { echo $medium . ' '; } ?></div>
            	<div><?php echo $artwork->dimensions; ?></div>
            	<div class="ap-artwork-body"><?php echo $artwork->description; ?></div>
            	<?php if(strlen($artwork->description) > 300) : ?>
                  <div class="ap-more text-center">View More</div>
                <?php endif; ?>
			</div>
			<div class="col-sm-6">
				<?php if($artwork->file_type == 'image') : ?>
					<a href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . $artwork->file)); ?>" data-toggle="lightbox" data-gallery="multiimages" data-title="<?php echo $artwork->title; ?>" data-parent=".lightbox-parent">
					<img class="img-responsive" src="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . urlencode($artwork->file))); ?>">
					</a>
				<?php endif; ?>
				<?php if($artwork->file_type == 'vimeo') : ?>
					<iframe class="img-responsive" src="<?php echo $artwork->file; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<?php endif; ?>
				<?php if($artwork->file_type == 'youtube') : ?>
					<iframe class="img-responsive" src="<?php echo $artwork->file; ?>" id="ytplayer" frameborder="0"></iframe>
				<?php endif; ?>
				<?php if($artwork->file_type == 'soundcloud') : ?>
					<span id="url<?php echo $sci; // populated by soundcloud embed iframe ?>"></span>
					<?php	drupal_add_js(array('soundcloud_url' => array('url' . $sci => $artwork->file)), 'setting');
						drupal_add_js('(function ($) { $(document).ready(function() {
						urls = Drupal.settings.soundcloud_url;
							$.each(urls, function(index, value){
								//console.log("INDEX: " + index + " VALUE: " + value);
								SC.oEmbed(value, {iframe: "true", show_comments:"false", maxheight:"150px", class:"img-responsive"},  document.getElementById(index));
							});
						}); })(jQuery);', 'inline' )
					?>
					<?php $sci++; ?>
				<?php endif; ?>
				<?php if ($artwork->file_type == 'document') : ?>
                	<a href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . urlencode($artwork->file))); ?>" target="_blank">
                		<div class="img-responsive doc-icon"></div><?php echo urldecode($artwork->file); ?>
                	</a>
				<?php endif; ?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>

	<?php if(in_array('fields-uploads', $rows['steps'])) : ?>
		<h3>Additional Materials</h3>
        <?php sort($rows['areas']);
        foreach($rows['areas'] as $area) : ?>
            <?php if(substr($area, 0, 5) == 'field' && $rows['application'][$area] != '') : ?>
            	<div class="row">
            		<h2><?php   $field = "field_op_custom_".substr($area, -1);
                        $title =  $rows['opportunity'][$field];
                        echo 'Field: ' . $title['und'][0]['value'];  ?></h2>
                    <p><?php echo $rows['application'][$area];  ?></p>
                </div>
			<?php elseif (substr($area, 0, 6) == 'upload' && $rows['application'][$area] != '') : ?>
				<div class="row">
                	<h2><?php   $field = 'field_op_custom_upload_' . substr($area, -1);
                        $title =  $rows['opportunity'][$field];
                        echo 'Upload: ' . $title['und'][0]['value'];  ?></h2>
                    <p>
                    	<a href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . $rows['application'][$area])); ?>" target="_blank"><?php echo $rows['application'][$area];  ?></a>
                    </p>
                </div>
			<?php endif; ?>
        <?php endforeach; ?>
	<?php endif; ?>
</div>
