<?php
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
	drupal_add_css(drupal_get_path('module', 'mn_op') . '/css/mn-op.css');
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/DT_bootstrap.css');
	drupal_add_js(drupal_get_path('module', 'mn_op') . '/js/applications.js');
	//dpm($rows);
?>

<div class="stuffWidth">
	<div class="intro-section">
		<h2>My Applications</h2>
	</div>


	<div class="container" id="listContent">
		<?php if(count($rows['juries']) > 0) : ?>
		<h3>Juries</h3>
		<table class="table op-table">
			<thead>
				<tr>
					<th class="half-width">Opportunity Name</th>
					<th class="quarter-width">Application Deadline</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($rows['juries'] as $jury): ?>
				<tr>
					<td><?php echo $jury->title; ?></td>
					<td><?php echo date("F d, Y h:i a", strtotime($jury->op_dates_value2)); ?></td>
					<td><a class="btn ap-btn pull-right" href="<?php echo url('opportunity/' . $jury->nid . '/submissions'); ?>">Review</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php endif; ?>


		<?php if($rows['started'] || $rows['completed']) : ?>
		<?php endif; ?>

		<?php if($rows['reopened']) : ?>
		<h3>Reopened Applications</h3>
		<table class="table op-table">
			<thead>
				<tr>
					<th class="half-width">Opportunity Name</th>
					<th class="quarter-width">Completed On</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($rows['reopened'] as $reopen): ?>
				<tr>
					<td><?php echo $reopen->title; ?></td>
					<td><?php echo date("F d, Y h:i a", strtotime($reopen->updated_at)); ?></td>
					<td><a class="btn ap-btn pull-right" href="<?php echo url('opportunity/' . $reopen->nid . '/apply'); ?>">Resume</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php endif; ?>

		<?php if($rows['started']) : ?>
		<h3>In Progress Applications</h3>
		<table class="table op-table">
			<thead>
				<tr>
					<th class="half-width">Opportunity Name</th>
					<th class="quarter-width">Deadline</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($rows['started'] as $start): ?>
				<tr>
					<td><?php echo $start->title; ?></td>
					<td><?php echo date("F d, Y h:i a", strtotime($start->op_dates_value2)); ?></td>
					<td><a class="btn ap-btn pull-right" href="<?php echo url('opportunity/' . $start->nid . '/apply'); ?>">Resume</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php endif; ?>

		<?php if($rows['completed']) : ?>
		<h3>Completed Applications</h3>
		<table class="table op-table">
			<thead>
				<tr>
					<th class="half-width">Opportunity Name</th>
					<th class="quarter-width">Completed On</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($rows['completed'] as $complete): ?>
				<tr>
					<td><?php echo $complete->title; ?></td>
					<td><?php echo date("F d, Y h:i a", strtotime($complete->updated_at)); ?></td>
					<td><a class="btn ap-btn pull-right" href="<?php echo url('application/' . $complete->nid); ?>">View</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php endif; ?>
	</div>
</div>
