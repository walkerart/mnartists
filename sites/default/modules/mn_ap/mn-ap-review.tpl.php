<?php
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/star-rating.css');
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/ekko-lightbox.min.css');
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/dark.css');
      drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/styles.css');

      drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/bootstrap.min.js');
      drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/star-rating.js');
      drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/ekko-lightbox.min.js');
      drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/reviewScript.js');

//dpm($rows); ?>

<div class="container">
    <div class="row">
        <?php if(isset($rows['paging'][array_search($rows['application']['uid'], $rows['paging'])+1]) && isset($rows['paging'][array_search($rows['application']['uid'], $rows['paging'])-1])) : ?>
            <div class="col-md-4">
                <a class="paging" href="<?php echo url('opportunity/' . $rows['opportunity']['vid'] . '/submission/' . $rows['paging'][array_search($rows['application']['uid'], $rows['paging'])-1], array()); ?>"><span class="glyphicon glyphicon-chevron-left">Previous</a>
            </div>
            <div class="col-md-4 text-center">
                <a href="<?php echo url('opportunity/' . $rows['opportunity']['vid'] . '/submissions'); ?>">
                    Application <?php echo array_search($rows['application']['uid'], $rows['paging']) + 1 . ' of ' . count($rows['paging']); ?>
                </a>
            </div>
            <div class="col-md-4">
                <a class="paging pull-right" href="<?php echo url('opportunity/' . $rows['opportunity']['vid'] . '/submission/' . $rows['paging'][array_search($rows['application']['uid'], $rows['paging'])+1], array()); ?>">Next<span class="glyphicon glyphicon-chevron-right"></a>
            </div>
        <?php elseif(isset($rows['paging'][array_search($rows['application']['uid'], $rows['paging'])+1])) : ?>
            <div class="col-md-4 col-md-offset-4 text-center">
                <a href="<?php echo url('opportunity/' . $rows['opportunity']['vid'] . '/submissions'); ?>">
                    Application <?php echo array_search($rows['application']['uid'], $rows['paging']) + 1 . ' of ' . count($rows['paging']); ?>
                </a>
            </div>
            <div class="col-md-4">
                <a class="paging pull-right" href="<?php echo url('opportunity/' . $rows['opportunity']['vid'] . '/submission/' . $rows['paging'][array_search($rows['application']['uid'], $rows['paging'])+1], array()); ?>">Next<span class="glyphicon glyphicon-chevron-right"></a>
            </div>
        <?php elseif(isset($rows['paging'][array_search($rows['application']['uid'], $rows['paging'])-1])) : ?>
            <div class="col-md-4">
                <a class="paging" href="<?php echo url('opportunity/' . $rows['opportunity']['vid'] . '/submission/' . $rows['paging'][array_search($rows['application']['uid'], $rows['paging'])-1], array()); ?>"><span class="glyphicon glyphicon-chevron-left">Previous</span></a>
            </div>
            <div class="col-md-4 text-center">
                <a href="<?php echo url('opportunity/' . $rows['opportunity']['vid'] . '/submissions'); ?>">
                    Application <?php echo array_search($rows['application']['uid'], $rows['paging']) + 1 . ' of ' . count($rows['paging']); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-lg-5 col-lg-push-7 col-md-12">
            <h1 class="clearPadding">
                <?php echo $rows['opportunity']['title']; ?>
                <?php if(isset($rows['settings']['round']) && $rows['settings']['round'] > 1) : ?> - Round <?php echo $rows['settings']['round']; ?><?php endif; ?>
            </h1>
            <form class="form form-review" action="<?php echo url('opportunity/' . $rows['application']['nid'] . '/submission/' . $rows['application']['uid'], array()); ?>" method="POST">
                <input type="hidden" name="round" id="round" value="<?php echo isset($rows['settings']['round']) ? $rows['settings']['round'] : 1; ?>">
                <?php if(array_search( $rows['application']['uid'], $rows['paging'])+1 < count($rows['paging'])) : ?>
                    <input type="hidden" name="next" id="next" value="<?php echo $rows['paging'][array_search($rows['application']['uid'], $rows['paging'])+1]; ?>">
                <?php endif; ?>
                <input type="number" name="rating" id="input-star" class="rating" min="0" max="<?php echo isset($rows['settings']['scale']) ? $rows['settings']['scale'] : '10'; ?>" data-stars="<?php echo isset($rows['settings']['scale']) ? $rows['settings']['scale'] : '10'; ?>" data-size="sm" data-show-clear="false" step="0.5" value="<?php echo isset($rows['review']) ? $rows['review']['rating'] : ''; ?>" required>
                <div class="form-group">
                    <div class="form-item form-type-textearea">
                        <label>Comment</label>
                        <textarea name="comment" class="form-control text-full form-textarea" rows="3" <?php echo $rows['settings']['note_required'] == 1 ? 'required' : ''; ?>><?php echo isset($rows['review']) ? $rows['review']['comment'] : ''; ?></textarea>
                        <p class="help-block"><?php echo isset($rows['settings']['note']) ? $rows['settings']['note'] : ''; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <hr>
                    <h1 class="clearPadding">Previous Reviews</h1>
                    <?php foreach ($rows['previous_reviews'] as $previous_reviews) : ?>
                        <hr>
                        <h3 class="clearPadding clearMargin">Round <?php echo $previous_reviews['round']; ?></h3>
                        <p>Rating: <?php echo $previous_reviews['rating']; ?><br> Comment: <?php echo $previous_reviews['comment']; ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="form-group pull-right">
                    <button class="btn ap-btn pull-right" type="submit" value="Submit">Submit</button>
                    <br>
                    <div class="help-block pull-right">Next:
                        <?php if(isset($rows['paging'][array_search($rows['application']['uid'], $rows['paging'])+1])) : ?>
                        Application
                    </div>
                        <?php else : ?>
                        Submission List
                    </div>
                        <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="col-lg-7 col-lg-pull-5 col-md-12">
        <h1 class="clearPadding">
            <?php echo ($rows['settings']['name'] == '1' || $rows['settings'] == 0) ? $rows['application']['first_name'] . ' ' . $rows['application']['last_name'] : 'Applicaiton ' . (array_search($rows['application']['uid'], $rows['paging']) + 1); ?>
        </h1>
        <?php if ($rows['settings']['address'] == '1' || $rows['settings'] == 0) : ?>
            <p><?php echo $rows['application']['address']; ?></br>
            <?php echo $rows['application']['city'] . ', ' . $rows['application']['state'] . ' ' . $rows['application']['zip'] ; ?></p>
        <?php endif; ?>
        <?php echo (in_array("county", $rows['areas']) && ($rows['settings']['county'] == 1 || $rows['settings'] == 0) && $rows['application']['county'] != '') ? '<p>County: ' . $rows['application']['county'] . '</p>' : ''; ?>
        <?php echo (in_array("country", $rows['areas']) && ($rows['settings']['country'] == 1 || $rows['settings'] == 0) && $rows['application']['country'] != '') ? '<p>Country: ' . $rows['application']['country'] . '</p>' : ''; ?>
        <?php echo ($rows['settings']['email'] == '1') ? '<p>Email: ' . $rows['application']['email'] . '</p>' : ''; ?>
        <?php echo ($rows['settings']['phone'] == '1' && $rows['application']['phone'] != '') ? '<p>Phone: ' . $rows['application']['phone'] . '</p>' : ''; ?>
        <?php echo (in_array("website", $rows['areas']) && ($rows['settings']['website'] == 1 || $rows['settings'] == 0) && $rows['application']['website'] != '') ? '<p>Website: ' . $rows['application']['website'] . '</p>' : ''; ?>
        <?php echo (in_array("gender", $rows['areas']) && ($rows['settings']['gender'] == 1 || $rows['settings'] == 0) && $rows['application']['gender'] != '') ? '<p>Gender: ' . $rows['application']['gender'] . '</p>' : ''; ?>
        <?php echo (in_array("ethnicity", $rows['areas']) && ($rows['settings']['ethnicity'] == 1 || $rows['settings'] == 0) && $rows['application']['ethnicity'] != '') ? '<p>Ethnicity: ' . $rows['application']['ethnicity'] . '</p>' : ''; ?>
        <?php echo (in_array("age", $rows['areas']) && ($rows['settings']['age'] == '1' || $rows['settings'] == 0) && $rows['application']['age'] != '0') ? '<p>Age: ' . $rows['application']['age'] . '</p>' : ''; ?>
        <?php if ($rows['application']['statement'] != '' && ($rows['settings']['statement'] == 1 || $rows['settings'] == 0) && in_array("statement", $rows['areas'])) : ?>
            <h3 class="clearPadding clearMargin">Statement</h3>
            <p><?php echo $rows['application']['statement']; ?></p>
        <?php endif; ?>
        <?php if ($rows['application']['proposal'] != '' && ($rows['settings']['proposal'] == 1 || $rows['settings'] == 0) && in_array("proposal", $rows['areas'])) : ?>
            <h3 class="clearPadding clearMargin">Proposal</h3>
            <p><?php echo $rows['application']['proposal']; ?></p>
        <?php endif; ?>
        <?php if ($rows['application']['bio'] != '' && in_array("bio", $rows['areas']) && ($rows['settings']['bio'] == 1 || $rows['settings'] == 0)) : ?>
            <h3 class="clearPadding clearMargin">Bio</h3>
            <p><?php echo $rows['application']['bio']; ?></p>
        <?php endif; ?>
        <?php if (in_array("resume", $rows['areas']) && ($rows['settings']['resume'] == 1 || $rows['settings'] == 0)) : ?>
            <a href="<?php echo url('opportunity/' . $rows['application']['nid'] . '/submission/' . $rows['application']['uid'] .'/resume'); ?>" class="btn btn-default ap-btn" target="_blank">View Resume</a>
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
                    <?php $mediums = json_decode($artwork->medium);
                        foreach (json_decode($artwork->medium) as $medium) {
                        echo $medium;
                        if (next($mediums)) echo ', ';
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
                <?php if($artwork->file_type == 'soundcloud') : ?>
                    <iframe class="img-responsive" scrolling="no" frameborder="no" width="" height="150" src="//w.soundcloud.com/player/?url=<?php echo $artwork->file; ?>&amp;show_user=false&amp;show_artwork=false"></iframe>
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
            <?php if(substr($area, 0, 5) == 'field' && ($rows['settings'][$area] == '1' || $rows['settings'] == 0) && $rows['application'][$area] != '') : ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="clearPadding clearMargin"><?php   $field = "field_op_custom_".substr($area, -1);
                            $title =  $rows['opportunity'][$field];
                            echo 'Field: ' . $title['und'][0]['value'];  ?></h2>
                        <p><?php echo $rows['application'][$area];  ?></p>
                    </div>
                </div>
            <?php elseif (substr($area, 0, 6) == 'upload' && ($rows['settings'][$area] == '1' || $rows['settings'] == 0) && $rows['application'][$area] != '') : ?>
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