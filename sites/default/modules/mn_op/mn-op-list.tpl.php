<?php
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/DT_bootstrap.css');
	drupal_add_css(drupal_get_path('module', 'mn_op') . '/css/mn-op.css');
	drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.dataTables.js');
	drupal_add_js(drupal_get_path('module', 'mn_op') . '/js/mn-op.js');
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
	//dpm($rows); ?>
=======
	dpm($rows); ?>
>>>>>>> Stashed changes
=======
	dpm($rows); ?>
>>>>>>> Stashed changes
=======
	dpm($rows); ?>
>>>>>>> Stashed changes
=======
	dpm($rows); ?>
>>>>>>> Stashed changes
=======
	dpm($rows); ?>
>>>>>>> Stashed changes
<?php if (user_access('administrator') || $row['owner']) : ?>
<h1>Opportunities</h1>
<table class="table" id="opList">
	<thead>
		<tr>
			<th>Title</th>
			<th>Announce Date</th>
			<th>Open Date</th>
			<th>Close Date</th>
			<th>Submissions</th>
			<th>Application</th>
			<th>Created By</th>
			<th>Status</th>
			<th>Unsubmit</th>
			<th>Jury</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($rows as $row): ?>
		<tr>
			<td>
				<a href ="<?php echo url('node/' . $row['nid'], array()); ?>"><?php echo $row['title']; ?></a>
			</td>
			<td><?php echo $row['announce_date']; ?></td>
			<td><?php echo $row['start_date']; ?></td>
			<td><?php echo $row['end_date']; ?></td>
			<td><?php echo ($row['submissions'] != 0 && $row['apply_on_site'] == 1) ? '<a href ="' . url('opportunity/' . $row['nid'] . '/submissions', array()) . '"><span class="badge">' . $row['submissions'] . '</span></a>' : 'N/A'; ?></td>
			<td><?php echo ($row['apply_on_site'] == 1) ? '<a href ="' . url('opportunity/' . $row['nid'] . '/apply/', array()) . '">MnArtists</a>' : 'External'; ?></td>
			<td><?php echo $row['user']; ?></td>
			<td>
				<?php if ($row['status'] == '0') : ?>
					<form name="input" action="<?php echo url('opportunities/', array()); ?>" method="POST">
						<input type="hidden" id="node_id" name="node_id" value="<?php echo $row['nid']; ?>">
						<input type="hidden" id="status" name="status" value="1">
						<input class="btn btn-default" type="submit" value="Publish">
					</form>
				<?php else : ?>
					<form name="input" action="<?php echo url('opportunities/', array()); ?>" method="POST">
						<input type="hidden" id="node_id" name="node_id" value="<?php echo $row['nid']; ?>">
						<input type="hidden" id="status" name="status" value="0">
						<input class="btn btn-default" type="submit" value="Unpublish">
					</form>
				<?php endif; ?>
			</td>
			<td>
				<?php if ($row['apply_on_site'] == '1') : ?>
					<?php if ($row['reopen'] == '0' || $row['reopen'] == '') : ?>
						<form name="input" action="<?php echo url('opportunities/', array()); ?>" method="POST">
							<input type="hidden" id="node_id" name="node_id" value="<?php echo $row['nid']; ?>">
							<input type="hidden" id="reopen" name="reopen" value="0">
							<input class="btn btn-default" type="submit" value="Unsubmit All">
						</form>
					<?php else : ?>
						<form name="input" action="<?php echo url('opportunities/', array()); ?>" method="POST">
							<input type="hidden" id="node_id" name="node_id" value="<?php echo $row['nid']; ?>">
							<input type="hidden" id="reopen" name="reopen" value="1">
							<input class="btn btn-default" type="submit" value="Close All">
						</form>
					<?php endif; ?>
				<?php else : ?>
				N/A
				<?php endif; ?>
			</td>
			<td>
				<?php if ($row['apply_on_site'] == 1) : ?>
				<a href ="<?php echo url('opportunity/' . $row['nid'] . '/jury-settings', array()); ?>">Settings</a>
				<?php else : ?>
				N/A
				<?php endif; ?>
			</td>
			<td><a href ="<?php echo url('node/' . $row['nid'] . '/edit', array()); ?>">Edit</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>