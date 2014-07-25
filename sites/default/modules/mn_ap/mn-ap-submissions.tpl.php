<?php
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/DT_bootstrap.css');
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/ekko-lightbox.min.css');
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/dark.css');
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/styles.css');

      drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/bootstrap.min.js');
      drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery-vimeothumb.min.js');
      drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.dataTables.js');
      drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/ekko-lightbox.min.js');
      drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/subScript.js');

dpm($rows); ?>
<div class="container">
      <div class="row">
            <div class="col-md-6">
                  <h1><?php echo $rows['opportunity']->title; ?></h1>
            </div>
      </div>
      <?php //admin table ?>
      <?php if(user_access('administrator') || $rows['owner']) : ?>
      <div class="row">
        <div class="col-md-12">
          <a class="pull-right" href="<?php echo url('opportunity/' . $rows['opportunity']->vid . '/submissions/' . drupal_html_id($rows['opportunity']->title) . '/xls', array()); ?>">Download XLS</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <table id="subTable" class="table">
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
                          <ul class="list-inline thumb-list">
                          <div class="lightbox-parent-<?php echo $review['uid']; ?>">
                          <?php if(isset($review['artworks'])) : ?>
                          <?php foreach ($review['artworks'] as $artwork) : ?>
                            <?php if($artwork->file_type == 'image') : ?>
                              <li class="thumb-list">
                                <a href="<?php  print $GLOBALS['base_url'] . '/sites/default/files/opportunity/'. $artwork->nid . '/' . $artwork->uid . '/' . $artwork->file; ?>" data-toggle="lightbox" data-gallery="multiimages" data-title="<?php echo $artwork->title; ?>" data-parent=".lightbox-parent-<?php echo $artwork->uid; ?>">
                                  <img src="<?php  print $GLOBALS['base_url'] . '/sites/default/files/opportunity/'. $artwork->nid . '/' . $artwork->uid . '/thumb_' . $artwork->file; ?>">
                                </a>
                              </li>
                            <?php endif; ?>
                            <?php if($artwork->file_type == 'youtube') : ?>
                            <li class="video thumb-list">
                              <a href="<?php echo $artwork->file; ?>" data-toggle="lightbox" data-gallery="multiimages" data-title="<?php echo $artwork->title; ?>" data-parent=".lightbox-parent-<?php echo $artwork->uid; ?>">
                                <img src="http://img.youtube.com/vi/<?php echo substr($artwork->file, -22, 11); ?>/default.jpg" style="width:60px;">
                              </a>
                            </li>
                            <?php endif; ?>
                            <?php if($artwork->file_type == 'vimeo') : ?>
                            <li class="video thumb-list">
                              <a href="<?php echo $artwork->file; ?>" data-toggle="lightbox" data-gallery="multiimages" data-title="<?php echo $artwork->title; ?>" data-parent=".lightbox-parent-<?php echo $artwork->uid; ?>">
                                <img src="http://placehold.it/60x60" data-vimeo-id="<?php echo substr($artwork->file, -8, 8); ?>" class="small" style="width:60px;">
                              </a>
                            </li>
                            <?php endif; ?>
                            <?php if($artwork->file_type == 'soundcloud') : ?>
                              <li class="sound thumb-list">
                                <a class="btn btn-default btn-sound" href="<?php echo urlencode($artwork->file); ?>" target="_blank">
                                  <span class="glyphicon glyphicon-volume-up"></span> Listen
                                </a>
                              </li>
                            <?php endif; ?>
                            <?php if ($artwork->file_type == 'document') : ?>
                              <li class="document thumb-list">
                                <a class="btn btn-default btn-document" href="<?php  print $GLOBALS['base_url'] . '/sites/default/files/opportunity/'. $artwork->nid . '/' . $artwork->uid . '/' . urlencode($artwork->file); ?>" target="_blank">
                                  <span class="glyphicon glyphicon-file"></span> Read
                                </a>
                              </li>
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
                            <?php if($review['accept'] != 1) : ?>
                                <input class="ap-btn-margin" type="submit" value="Out">
                            <?php else : ?>
                                <input class="ap-btn-margin" type="submit" value="In">
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
              <a class="prev" href="<?php echo url('opportunities/', array()); ?>">Back to Opportunities</a>
          </div>
      </div>
      <?php endif; ?>

      <?php if($rows['juror']) : ?>
      <div class="row">
            <div class="col-md-12">
                  <hr>
                  <h3><?php echo $rows['juror'] ? '<p>Welcome Juror.</p>' : ''; ?></h3>
                  <p class="help-block"><?php echo isset($rows['opportunity']->field_op_juror_note['und'][0]['value']) ? $rows['opportunity']->field_op_juror_note['und'][0]['value'] : ''; ?></p>
            </div>
      </div>
      <div class="row">
            <div class="col-md-12">
                  <table id="juryTable" class="table table-hover">
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
                                      <ul class="list-inline thumb-list">
                                      <div class="jury-parent-<?php echo $review['uid']; ?>">
                                      <?php foreach ($review['artworks'] as $artwork) : ?>
                                        <?php if($artwork->file_type == 'image') : ?>
                                          <li class="thumb-list">
                                            <a href="<?php  print $GLOBALS['base_url'] . '/sites/default/files/opportunity/'. $artwork->nid . '/' . $artwork->uid . '/' . $artwork->file; ?>" data-toggle="lightbox" data-gallery="multiimages" data-title="<?php echo $artwork->title; ?>" data-parent=".jury-parent-<?php echo $artwork->uid; ?>">
                                              <img src="<?php  print $GLOBALS['base_url'] . '/sites/default/files/opportunity/'. $artwork->nid . '/' . $artwork->uid . '/thumb_' . $artwork->file; ?>">
                                            </a>
                                          </li>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                      </div>
                                      </ul>
                                    </td>
                                    <?php endif; ?>
                                    <td><?php echo isset($review['comment']) ? $review['comment'] : 'None'; ?></td>
                                    <td><?php echo isset($review['rating']) ? $review['rating'] : 'None'; ?></td>
                                    <td>
                                      <?php if(isset($review['comment']) && isset($review['rating']) && $review['round'] == $rows['settings']['round']) : ?>
                                        <a class="btn ap-btn btn-success" href="<?php echo url('opportunity/' . $rows['opportunity']->vid . '/submission/' . $review['uid'], array()); ?>">Reviewed</a>
                                      <?php else : ?>
                                        <a class="btn ap-btn btn-danger" href="<?php echo url('opportunity/' . $rows['opportunity']->vid . '/submission/' . $review['uid'], array()); ?>">Review</a>
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
            <a class="prev" href="<?php echo url('applications/', array()); ?>">Back to Applications</a>
        </div>
    </div>
      <?php endif; ?>
</div>