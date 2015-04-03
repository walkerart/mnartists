<?php
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
    drupal_add_css(drupal_get_path('module', 'mn_op') . '/css/mn-op.css');
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/ekko-lightbox.min.css');
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/dark.css');
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/styles.css');

    drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/bootstrap.min.js');
    drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/ekko-lightbox.min.js');
    drupal_add_js(drupal_get_path('module', 'mn_op') . '/js/view-script.js');

?>
<div class="container" id="appContent">
    <br>
    <div class="row">
        <div class="col-md-12">
            <a class="prev" href="/applications">Back to Applications</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>
                <?php echo $rows['opportunity']['title']; ?>
                <br><small>Application submited: <?php echo date("F d, Y h:i a", strtotime($rows['application']['updated_at'])); ?></small>
            </h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-10">
            <h3 class="clearPadding clearMargin">
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
                <h3 class="clearPadding clearMargin">Statement</h3>
                <p><?php echo $rows['application']['statement']; ?></p>
            <?php endif; ?>
            <?php if ($rows['application']['proposal'] != '' && in_array("proposal", $rows['areas'])) : ?>
                <h3 class="clearPadding clearMargin">Proposal</h3>
                <p><?php echo $rows['application']['proposal']; ?></p>
            <?php endif; ?>
            <?php if ($rows['application']['bio'] != '' && in_array("bio", $rows['areas'])) : ?>
                <h3 class="clearPadding clearMargin">Bio</h3>
                <p><?php echo $rows['application']['bio']; ?></p>
            <?php endif; ?>
            <?php if (in_array("resume", $rows['areas'])) : ?>
                <a href="<?php echo url('application/' . $rows['application']['nid'] . '/resume'); ?>" class="btn btn-default ap-btn" target="_blank">View Resume</a>
            <?php endif; ?>
        </div>
    </div>
    <?php if(in_array('work', $rows['steps'])) : ?>
    <div class="lightbox-parent">
        <?php foreach($rows['artworks'] as $artwork) : ?>
        <hr>
        <div class="row">
            <div class="col-sm-4 artwork-info">
                <div><em><?php echo $artwork->title; ?></em></div>
                <div><?php echo $artwork->date; ?></div>
                <div>
                    <?php $mediums3 = json_decode($artwork->medium3); //this is the meduim field
                        foreach (json_decode($artwork->medium3) as $medium3) {
                        echo $medium3;
                        if (next($mediums3)) echo ', ';
                    } ?>
                </div>
                <div>
                    <?php $mediums = json_decode($artwork->medium);  //this is the category field
                        foreach (json_decode($artwork->medium) as $medium) {
                        echo $medium;
                        if (next($mediums)) echo ', ';
                    } ?>
                </div>
                <div>
                    <?php $roles = json_decode($artwork->roles);  //the is the role field
                        foreach (json_decode($artwork->roles) as $role) {
                        echo $role;
                        if (next($roles)) echo ', ';
                    } ?>
                </div>
                <div><?php echo $artwork->dimensions; ?></div>
                <div class="ap-body">
                    <?php if($artwork->excerpt != '') : ?>
                    <div>
                        Excerpt: <?php echo $artwork->excerpt; ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($artwork->venue != '') : ?>
                    <div>
                        Venue: <?php echo $artwork->venue ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($artwork->other_artists != '') : ?>
                    <div>
                        Others Artists Involved:
                        <?php $other_artists = json_decode($artwork->other_artists);
                        foreach (json_decode($artwork->other_artists) as $others) {
                            echo $others ;
                            if (next($other_artists)) echo ', ';
                        } ?>
                    </div>
                    <?php endif; ?>
                </div>
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
                    <iframe class="img-responsive" src="<?php echo $artwork->file; ?>&amp;showinfo=0&amp;badge=0" id="ytplayer" frameborder="0"></iframe>
                <?php endif; ?>
                <?php if($artwork->file_type == 'soundcloud' && $artwork->fid > 0) : ?>
                    <?php $scfile = file_load($artwork->fid); //load file to get uri for sound cloud theme function ?>
                  <?php print theme('media_soundcloud_audio', array('uri' => $scfile->uri)); ?>
                <?php endif; ?>
                <?php if ($artwork->file_type == 'document') : ?>
                    <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . $artwork->file)); ?>" target="_blank">
                        <div class="img-responsive doc-icon"></div><?php echo urldecode($artwork->file); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if(in_array('fields-uploads', $rows['steps'])) : ?>
        <hr>
        <h3 class="clearPadding clearMargin">Additional Materials</h3>
        <?php sort($rows['areas']);
        foreach($rows['areas'] as $area) : ?>
            <?php if(substr($area, 0, 5) == 'field' && $rows['application'][$area] != '') : ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="clearPadding clearMargin"><?php   $field = "field_op_custom_".substr($area, -1);
                            $title =  $rows['opportunity'][$field];
                            echo 'Field: ' . $title['und'][0]['value'];  ?></h2>
                        <p><?php echo $rows['application'][$area];  ?></p>
                    </div>
                </div>
            <?php elseif (substr($area, 0, 6) == 'upload' && $rows['application'][$area] != '') : ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="clearPadding clearMargin"><?php   $field = 'field_op_custom_upload_' . substr($area, -1);
                            $title =  $rows['opportunity'][$field];
                            echo 'Upload: ' . $title['und'][0]['value'];  ?></h2>
                        <p>
                            <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . $rows['application'][$area])); ?>" target="_blank"><?php echo $rows['application'][$area];  ?></a>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
