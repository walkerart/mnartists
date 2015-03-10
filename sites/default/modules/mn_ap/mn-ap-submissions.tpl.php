<?php
  drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
  drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/DT_bootstrap.css');
  drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/jquery.selectBoxIt.css');
  drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/ekko-lightbox.min.css');
  drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/dark.css');
  drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/styles.css');

  drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/bootstrap.min.js');
  drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery-vimeothumb.min.js');
  drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.dataTables.min.js');
  drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/ekko-lightbox.min.js');
  drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.selectBoxIt.js');
  drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/subScript.js');
// dpm($rows);
?>
<script>
(function ($) {

  Drupal.behaviors.soundCloudWidget = {
    attach: function (context, settings) {
      $('.soundcloudurl').click(function(e) {
        e.preventDefault();
        var soundCloudDiv = $(this);
        var fid = soundCloudDiv.data('fid');

        $.get('/opportunity/soundcloud/' + fid , function(data) {
          soundCloudDiv.attr('href', data);
          soundCloudDiv.ekkoLightbox();
        });
      });
    }
  };

}(jQuery));

</script>
<div class="container">
  <?php
    // admin table
    // ======================================================================
  ?>
  <?php if(in_array('administrator', $user->roles) || $rows['owner']) : ?>
    <div class="row">
      <div class="col-md-6">
        <h1>
          <?php echo $rows['opportunity']->title; ?>
          <?php if(isset($rows['settings']['round']) && $rows['settings']['round'] > 1) : ?>
            - Round <?php echo $rows['settings']['round']; ?>
          <?php endif; ?>
        </h1>
      </div>
    </div>

    <div class="row row-margin-bottom">
      <?php if(isset($rows['settings']['round'])) : ?>
        <?php for ($i = 1; $rows['settings']['round'] >= $i; $i++) : ?>
        <div class="col-md-12">
          <a class="pull-right" href="<?php echo url('opportunity/' . $rows['opportunity']->vid . '/submissions/' . str_replace(" ", "-", $rows['opportunity']->title) . '/xls/' . $i, array()); ?>">Download XLS - Round<?php echo $i; ?></a>
        </div>
        <?php endfor; ?>
      <?php else : ?>
        <div class="col-md-12">
          <a class="pull-right" href="<?php echo url('opportunity/' . $rows['opportunity']->vid . '/submissions/' . str_replace(" ", "-", $rows['opportunity']->title) . '/xls/1', array()); ?>">Download XLS - Round1</a>
        </div>
      <?php endif; ?>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table id="subTable" class="table op-table">
          <thead>
            <tr>
              <th class="id">#</th>
              <th class="app-id">App ID</th>
              <th class="user-id">User ID</th>
              <th class="firstname">First Name</th>
              <th class="lastname">Last Name</th>
              <th class="work">Work</th>
              <th class="num-rating">Num. Ratings</th>
              <th class="avg-rating">Avg. Rating</th>
              <th class="admin"></th>
              <th class="status">Status</th>
              <th class="unsubmit">Unsubmit</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            <?php foreach ($rows['reviews'] as $review) : ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $review['pid']; ?></td>
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
                      <?php
                        // $scfile = file_load($artwork->fid); //load file to get uri for sound cloud theme function
                        // $sciframe = theme('media_soundcloud_audio', array('uri' => $scfile->uri, 'height' => 81, 'extra_params' => 'visual:false, show_user:false, show_artwork:false, show_playcount:false, show_comments:false, show_bpm:false, buying:false, sharing:false, download:false, liking:false'));
                        // preg_match('/src="([^"]+)"/', $sciframe, $match);  //strip all but iframe
                        // $url = $match[1];
                        // preg_match("/(url=)(.*?)$/i", $url, $matches); //remove url from iframe
                        // $scurl = $matches[2];
                      ?>
                    <span class="thumb-list sound">
                      <a class="soundcloudurl" href="" data-title="<?php echo $artwork->title; ?>" data-parent=".lightbox-parent-<?php echo $artwork->uid; ?>" data-fid="<?php echo $artwork->fid ?>">
                        <img src="<?php  print '/'.drupal_get_path('module', 'mn_ap') . '/images/soundcloud.jpg'; ?>" data-soundcloud-id="<?php echo $artwork->file; ?>">
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
        <p class="pull-right"><?php echo $rows['completeCount']; ?></p>
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

  <?php
    // juror table
    // ======================================================================
  ?>
  <?php if($rows['juror']) : ?>
    <div class="row">
      <div class="col-md-6">
        <h1>
          <?php echo $rows['opportunity']->title; ?>
          <?php if(isset($rows['settings']['round']) && $rows['settings']['round'] > 1) : ?>
            - Round <?php echo $rows['settings']['round']; ?>
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
              <?php if(isset($rows['settings']['name']) && $rows['settings']['name'] == 1) : ?>
                <th class="id">#</th>
                <th class="app-id">App ID</th>
                <th class="user-id">User ID</th>
                <th class="firstname">First Name</th>
                <th class="lastname">Last Name</th>
              <?php else : ?>
                <th class="id">#</th>
                <th class="app-id">App ID</th>
              <?php endif; ?>
              <?php if(isset($rows['settings']['artwork']) && $rows['settings']['artwork'] == 1) : ?>
              <th class="work">Work</th>
              <?php endif; ?>
              <th class="comment">Comment</th>
              <th class="rating">Rating</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            <?php foreach ($rows['juror_reviews'] as $review) : ?>
            <tr>
              <?php if(isset($rows['settings']['name']) && $rows['settings']['name'] == 1) : ?>
                <td><?php echo $i; ?></td>
                <td><?php echo $review['pid']; ?></td>
                <td><?php echo $review['uid']; ?></td>
                <td><?php echo $review['first_name']; ?></td>
                <td><?php echo $review['last_name']; ?></td>
              <?php else : ?>
                <td><?php echo $i; ?></td>
                <td><?php echo $review['pid']; ?></td>
              <?php endif; ?>
              <?php if(isset($rows['settings']['artwork']) && $rows['settings']['artwork'] == 1) : ?>
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
                      <?php
                        // $scfile = file_load($artwork->fid); //load file to get uri for sound cloud theme function
                        // $sciframe = theme('media_soundcloud_audio', array('uri' => $scfile->uri, 'height' => 81, 'extra_params' => 'visual:false, show_user:false, show_artwork:false, show_playcount:false, show_comments:false, show_bpm:false, buying:false, sharing:false, download:false, liking:false'));
                        // preg_match('/src="([^"]+)"/', $sciframe, $match);  //strip all but iframe
                        // $url = $match[1];
                        // preg_match("/(url=)(.*?)$/i", $url, $matches); //remove url from iframe
                        // $scurl = $matches[2];
                      ?>
                      <span class="thumb-list sound">
                      <a class="soundcloudurl" href="" data-title="<?php echo $artwork->title; ?>" data-parent=".lightbox-parent-<?php echo $artwork->uid; ?>" data-fid="<?php echo $artwork->fid ?>">
                        <img src="<?php  print '/'.drupal_get_path('module', 'mn_ap') . '/images/soundcloud.jpg'; ?>" data-soundcloud-id="<?php echo $artwork->file; ?>">
                      </a>
                      </span>
                    <?php endif; ?>
                    <?php if ($artwork->file_type == 'document') : ?>
                      <span class="thumb-list document">
                        <a class="btn btn-default btn-document" href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . $artwork->file)); ?>" target="_blank">
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
