<?php
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/DT_bootstrap.css');
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/jquery.selectBoxIt.css');
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/ekko-lightbox.min.css');
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/dark.css');
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/styles.css');

	drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/bootstrap.min.js');
	drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery-vimeothumb.min.js');
	drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.dataTables.js');
	drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/ekko-lightbox.min.js');
	drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.selectBoxIt.js');
	drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/subScript.js');
dpm($rows); ?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>
				<?php echo $rows['opportunity']->title; ?>
				<?php if($rows['settings']['round'] > 1) : ?>
					<small> Round <?php echo $rows['settings']['round']; ?></small>
				<?php endif; ?>
			</h1>
		</div>
	</div>
	<?php //admin table ?>
	<?php if(in_array('administrator', $user->roles) || $rows['owner']) : ?>
	<?php for ($i = 1; $rows['settings']['round'] >= $i; $i++) : ?>
	<div class="row">
		<div class="col-md-12">
			<a class="pull-right" href="<?php echo url('opportunity/' . $rows['opportunity']->vid . '/submissions/' . str_replace(" ", "-", $rows['opportunity']->title) . '/xls/' . $i, array()); ?>">Download XLS - Round<?php echo $i; ?></a>
		</div>
	</div>
	<?php endfor; ?>
	<div class="row">
		<div class="col-md-12">
			<table id="subTable" class="table op-table">
				<thead>
					<tr>
						<th>#</th>
						<th>User ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Work</th>
						<th>Num. Ratings</th>
						<th>Avg. Rating</th>
						<th class="work"></th>
						<th>Status</th>
						<th>Unsubmit</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($rows['reviews'] as $review) : ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $review['uid']; ?></td>
						<td><?php echo $review['first_name']; ?></td>
						<td><?php echo $review['last_name']; ?></td>
						<td>
							<div class="row table-thumb lightbox-parent-<?php echo $review['uid']; ?>">
							<?php if(isset($review['artworks'])) : ?>
							<?php foreach ($review['artworks'] as $artwork) : ?>
								<?php if($artwork->file_type == 'image') : ?>
									<span class="thumb-list">
										<a href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . $artwork->file)); ?>" data-toggle="lightbox" data-gallery="mixedgallery" data-title="<?php echo $artwork->title; ?>" data-parent=".lightbox-parent-<?php echo $artwork->uid; ?>">
											<img src="<?php  print file_create_url(file_build_uri('opportunity/'. $artwork->nid . '/' . $artwork->uid . '/thumb_' . $artwork->file)); ?>">
										</a>
									</span>
								<?php endif; ?>
								<?php if($artwork->file_type == 'youtube') : ?>
								<span class="thumb-list video">
									<a href="<?php echo $artwork->file; ?>" data-toggle="lightbox" data-gallery="mixedgallery" data-title="<?php echo $artwork->title; ?>" data-parent=".lightbox-parent-<?php echo $artwork->uid; ?>">
										<img src="http://img.youtube.com/vi/<?php echo substr($artwork->file, -22, 11); ?>/default.jpg" style="width:60px;">
									</a>
								</span>
								<?php endif; ?>
								<?php if($artwork->file_type == 'vimeo') : ?>
								<span class="thumb-list video">
									<a href="<?php echo $artwork->file; ?>" data-toggle="lightbox" data-gallery="mixedgallery" data-title="<?php echo $artwork->title; ?>" data-parent=".lightbox-parent-<?php echo $artwork->uid; ?>">
										<img src="http://placehold.it/60x60" data-vimeo-id="<?php echo substr($artwork->file, -8, 8); ?>" class="small" style="width:60px;">
									</a>
								</span>
								<?php endif; ?>
								<?php if($artwork->file_type == 'soundcloud') : ?>
									<span class="thumb-list sound">
										<a class="btn btn-default btn-sound" href="<?php echo $artwork->file; ?>" target="_blank">
											<span class="glyphicon glyphicon-volume-up"></span> Listen
										</a>
									</span>
								<?php endif; ?>
								<?php if ($artwork->file_type == 'document') : ?>
									<span class="thumb-list document">
										<a class="btn btn-default btn-document" href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . urlencode($artwork->file))); ?>" target="_blank">
											<span class="glyphicon glyphicon-file"></span> Read
										</a>
									</span>
								<?php endif; ?>
							<?php endforeach; ?>
							<?php endif; ?>
							</ul>
							</div>
						</td>
						<td><?php echo isset($review['voteCount']) ? $review['voteCount'] . '/' . $rows['jurorCount']  : '0/'. $rows['jurorCount']; ?></td>
						<td><?php echo isset($review['avgRating']) ? round($review['avgRating'], 3) . '/' . $rows['settings']['scale'] : 'None'; ?></td>
						<td><a href="<?php echo url('opportunity/' . $rows['opportunity']->vid . '/submission/' . $review['uid'] . '/admin', array()); ?>">Show</a></td>
						<td>
							<form action="<?php echo url('opportunity/' . $review['nid'] . '/submissions', array()); ?>" method="POST">
								<input type="hidden" name="status" value="<?php echo $review['accept']; ?>">
								<input type="hidden" name="uid" value="<?php echo $review['uid']; ?>">
								<?php if($review['complete'] == 1 && $review['reopen'] == 0) : ?>
									<?php if($review['accept'] != 1) : ?>
										<input class="ap-btn-margin" type="submit" value="Out">
									<?php else : ?>
										<input class="ap-btn-margin" type="submit" value="In">
									<?php endif; ?>
								<?php elseif ($review['reopen'] == 1) : ?>
									<?php echo "Reopened"; ?>
								<?php else : ?>
									<?php echo "Not complete"; ?>
								<?php endif; ?>
							</form>
						</td>
						<td>
							<form action="<?php echo url('opportunity/' . $review['nid'] . '/submissions', array()); ?>" method="POST">
								<input type="hidden" name="reopen" value="<?php echo $review['reopen']; ?>">
								<input type="hidden" name="uid" value="<?php echo $review['uid']; ?>">
								<?php if($review['reopen'] != 1) : ?>
									<input class="ap-btn-margin" type="submit" value="Unsubmit">
								<?php else : ?>
									<input class="ap-btn-margin" type="submit" value="Close">
								<?php endif; ?>
							</form>
						</td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
				<a class="next" href="<?php echo url('opportunities/', array()); ?>">Back to Opportunities</a>
		</div>
	</div>
	<?php if($rows['juror']) : ?>
	<hr>
	<?php endif; ?>
	<?php endif; ?>

	<?php if($rows['juror']) : ?>
	<div class="row">
		<div class="col-md-6">
			<h1>
				<?php echo $rows['opportunity']->title; ?>
				<?php if($rows['settings']['round'] > 1) : ?>
					<small> Round <?php echo $rows['settings']['round']; ?></small>
				<?php endif; ?>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3><?php echo $rows['juror'] ? '<p>Welcome Juror.</p>' : ''; ?></h3>
			<p class="help-block"><?php echo isset($rows['opportunity']->field_op_juror_note['und'][0]['value']) ? $rows['opportunity']->field_op_juror_note['und'][0]['value'] : ''; ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table id="juryTable" class="table op-table">
				<thead>
					<tr>
						<?php if($rows['settings']['name'] == 1) : ?>
						<th>#</th>
						<th>User ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<?php else : ?>
						<th>Applicant</th>
						<?php endif; ?>
						<?php if($rows['settings']['artwork'] == 1) : ?>
						<th>Work</th>
						<?php endif; ?>
						<th>Comment</th>
						<th>Rating</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($rows['juror_reviews'] as $review) : ?>
					<tr>
						<?php if($rows['settings']['name'] == 1) : ?>
						<td><?php echo $i; ?></td>
						<td><?php echo $review['uid']; ?></td>
						<td><?php echo $review['first_name']; ?></td>
						<td><?php echo $review['last_name']; ?></td>
						<?php else : ?>
						<td>Application <?php echo $i; ?></td>
						<?php endif; ?>
						<?php if($rows['settings']['artwork'] == 1) : ?>
						<td>
							<div class="row table-thumb jury-parent-<?php echo $review['uid']; ?>">
								<?php foreach ($review['artworks'] as $artwork) : ?>
									<?php if($artwork->file_type == 'image') : ?>
										<span class="thumb-list">
											<a href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . $artwork->file)); ?>" data-toggle="lightbox" data-gallery="mixedgallery" data-title="<?php echo $artwork->title; ?>" data-parent=".jury-parent-<?php echo $artwork->uid; ?>">
												<img src="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/thumb_' . $artwork->file)); ?>">
											</a>
										</span>
									<?php endif; ?>
									<?php if($artwork->file_type == 'youtube') : ?>
									<span class="thumb-list video">
										<a href="<?php echo $artwork->file; ?>" data-toggle="lightbox" data-gallery="mixedgallery" data-title="<?php echo $artwork->title; ?>" data-parent=".jury-parent-<?php echo $artwork->uid; ?>">
											<img src="http://img.youtube.com/vi/<?php echo substr($artwork->file, -22, 11); ?>/default.jpg" style="width:60px;">
										</a>
									</span>
									<?php endif; ?>
									<?php if($artwork->file_type == 'vimeo') : ?>
									<span class="thumb-list video">
										<a href="<?php echo $artwork->file; ?>" data-toggle="lightbox" data-gallery="mixedgallery" data-title="<?php echo $artwork->title; ?>" data-parent=".jury-parent-<?php echo $artwork->uid; ?>">
											<img src="http://placehold.it/60x60" data-vimeo-id="<?php echo substr($artwork->file, -8, 8); ?>" class="small" style="width:60px;">
										</a>
									</span>
									<?php endif; ?>
									<?php if($artwork->file_type == 'soundcloud') : ?>
										<span class="thumb-list sound">
											<a class="btn btn-default btn-sound" href="<?php echo $artwork->file; ?>" target="_blank">
												<span class="glyphicon glyphicon-volume-up"></span> Listen
											</a>
										</span>
									<?php endif; ?>
									<?php if ($artwork->file_type == 'document') : ?>
										<span class="thumb-list document">
											<a class="btn btn-default btn-document" href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . urlencode($artwork->file))); ?>" target="_blank">
												<span class="glyphicon glyphicon-file"></span> Read
											</a>
										</span>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</td>
						<?php endif; ?>
						<td><?php echo isset($review['comment']) ? $review['comment'] : 'None'; ?></td>
						<td><?php echo isset($review['rating']) ? $review['rating'] : 'None'; ?></td>
						<td>
							<?php if(isset($review['comment']) && isset($review['rating'])) : ?>
								<a class="ap-btn-table" href="<?php echo url('opportunity/' . $rows['opportunity']->vid . '/submission/' . $review['uid'], array()); ?>">Reviewed</a>
							<?php else : ?>
								<a class="ap-btn-table" href="<?php echo url('opportunity/' . $rows['opportunity']->vid . '/submission/' . $review['uid'], array()); ?>">Review</a>
							<?php endif; ?>
						</td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a class="next" href="<?php echo url('applications/', array()); ?>">Back to Applications</a>
		</div>
	</div>
	<?php endif; ?>
</div>