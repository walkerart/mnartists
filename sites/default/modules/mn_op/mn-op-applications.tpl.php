<?php
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
	drupal_add_css(drupal_get_path('module', 'mn_op') . '/css/mn-op.css');
	drupal_add_js(drupal_get_path('module', 'mn_op') . '/js/mn-op.js');
	//dpm($rows);
?>

<h1>Your Applications</h1>

<?php if (count($rows['started']) > 0): ?>
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

<?php if (count($rows['completed']) > 0): ?>
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
				<td><?php echo $complete->op_dates_value2; ?></td>
				<td><a class="btn btn-default btn-xs btn-op" href="<?php echo url('application/' . $complete->nid); ?>">View Application</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>
