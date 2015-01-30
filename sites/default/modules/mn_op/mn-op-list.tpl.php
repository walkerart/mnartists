<?php
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/jquery.selectBoxIt.css');
	drupal_add_css(drupal_get_path('module', 'mn_op') . '/css/mn-op.css');
	drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/DT_bootstrap.css');

	drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.dataTables.min.js');
	drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.selectBoxIt.js');
	drupal_add_js(drupal_get_path('module', 'mn_op') . '/js/mn-op.js');
	//dpm($rows); ?>

<div class="container" id="listContent">
	<h1>Opportunities</h1>
	<div class="table-responsive">
		<table class="table op-table" id="opList">
			<thead>
				<tr>
					<th>Title</th>
					<th>Opportuntiy&nbspDates&nbsp</th>
					<th>Submissions</th>
					<th>Apply</th>
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
					<td>
						Announce:&nbsp<?php echo  str_replace(' ', '&nbsp', $row['announce_date']); ?> <br>
						Start:&nbsp<?php echo str_replace(' ', '&nbsp', $row['start_date']); ?> <br>
						End:&nbsp<?php echo str_replace(' ', '&nbsp', $row['end_date']) ?> <br>
					</td>
					<td><?php echo ($row['submissions'] != '0/0' && $row['apply_on_site'] == 1) ? '<a href ="' . url('opportunity/' . $row['nid'] . '/submissions', array()) . '"><span class="badge">' . $row['submissions'] . '</span></a>' : 'N/A'; ?></td>
					<td><?php echo ($row['apply_on_site'] == 1) ? '<a href ="' . url('opportunity/' . $row['nid'] . '/apply/', array()) . '">MnArtists</a>' : 'External'; ?></td>
					<td><?php echo $row['user']; ?></td>
					<td>
						<?php if ($row['status'] == '0') : ?>
							<form name="input" action="<?php echo url('opportunities/', array()); ?>" method="POST">
								<input type="hidden" id="node_id" name="node_id" value="<?php echo $row['nid']; ?>">
								<input type="hidden" id="status" name="status" value="1">
								<button class="btn ap-btn table-btn" value="Publish">
									Publish
								</button>
							</form>
						<?php else : ?>
							<form name="input" action="<?php echo url('opportunities/', array()); ?>" method="POST">
								<input type="hidden" id="node_id" name="node_id" value="<?php echo $row['nid']; ?>">
								<input type="hidden" id="status" name="status" value="0">
								<button class="btn ap-btn table-btn" value="Unpublish">
									Unpublish
								</button>
							</form>
						<?php endif; ?>
					</td>
					<td>
						<?php if ($row['apply_on_site'] == '1') : ?>
							<?php if ($row['reopen'] == '0' || $row['reopen'] == '') : ?>
								<form name="input" action="<?php echo url('opportunities/', array()); ?>" method="POST">
									<input type="hidden" id="node_id" name="node_id" value="<?php echo $row['nid']; ?>">
									<input type="hidden" id="reopen" name="reopen" value="0">
									<button class="btn ap-btn table-btn" value="Unsubmit All">
										Unsubmit All
									</button>
								</form>
							<?php else : ?>
								<form name="input" action="<?php echo url('opportunities/', array()); ?>" method="POST">
									<input type="hidden" id="node_id" name="node_id" value="<?php echo $row['nid']; ?>">
									<input type="hidden" id="reopen" name="reopen" value="1">
									<button class="btn ap-btn table-btn" value="Close All">
										Close All
									</button>
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
	</div>
</div>
