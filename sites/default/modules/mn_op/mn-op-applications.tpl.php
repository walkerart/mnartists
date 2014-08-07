<?php
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
	drupal_add_css(drupal_get_path('module', 'mn_op') . '/css/mn-op.css');
	drupal_add_js(drupal_get_path('module', 'mn_op') . '/js/mn-op.js');
	dpm($rows);
?>


<?php if(count($rows['juries']) > 0) : ?>
<h1>For Your Review</h1>
<div class="panel panel-default">
	<div class="panel-heading"><span class="h4">Juries</span></div>
	<table class="table">
		<thead>
			<tr>
				<th>Opportunity Name</th>
				<th>Deadline for Applications</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($rows['juries'] as $jury): ?>
			<tr>
				<td><?php echo $jury->title; ?></td>
				<td><?php echo $jury->op_dates_value2; ?></td>
				<td><a class="btn btn-default btn-xs btn-op" href="<?php echo url('opportunity/' . $jury->nid . '/submissions'); ?>">Review Submissions</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>


<?php if($rows['started'] || $rows['completed']) : ?>
<h1>Your Applications</h1>
<?php endif; ?>

<?php if($rows['reopened']) : ?>
<div class="panel panel-default">
	<div class="panel-heading"><span class="h4">Reopened</span></div>
	<table class="table">
		<thead>
			<tr>
				<th>Opportunity Name</th>
				<th>Completed On</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($rows['reopened'] as $reopen): ?>
			<tr>
				<td><?php echo $reopen->title; ?></td>
				<td><?php echo $reopen->updated_at; ?></td>
				<td><a class="btn btn-default btn-xs btn-op" href="<?php echo url('opportunity/' . $reopen->nid . '/apply'); ?>">Resume Application</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>


<?php if($rows['started']) : ?>
<div class="panel panel-default">
	<div class="panel-heading"><span class="h4">In Progress</span></div>
	<table class="table">
		<thead>
			<tr>
				<th>Opportunity Name</th>
				<th>Deadline</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($rows['started'] as $start): ?>
			<tr>
				<td><?php echo $start->title; ?></td>
				<td><?php echo $start->op_dates_value2; ?></td>
				<td><a class="btn btn-default btn-xs btn-op" href="<?php echo url('opportunity/' . $start->nid . '/apply'); ?>">Return to Application</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>

<?php if($rows['completed']) : ?>
<div class="panel panel-default">
	<div class="panel-heading"><span class="h4">Completed</span></div>
	<table class="table">
		<thead>
			<tr>
				<th>Opportunity Name</th>
				<th>Completed On</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($rows['completed'] as $complete): ?>
			<tr>
				<td><?php echo $complete->title; ?></td>
				<td><?php echo $complete->updated_at; ?></td>
				<td><a class="btn btn-default btn-xs btn-op" href="<?php echo url('application/' . $complete->nid); ?>">View Application</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>
