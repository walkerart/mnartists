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

      drupal_add_js('//connect.soundcloud.com/sdk.js', 'external');
      drupal_add_js('(function ($) { $(document).ready(function() {
            SC.initialize({
                client_id: "29800bb0ab961280619c6721dca3aa3d",
                });
                window.CKEDITOR_BASEPATH = "/sites/all/libraries/ckeditor";
            }); })(jQuery);', 'inline' );
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
        <div class="col-md-8">
            <h1 class="clearPadding"><?php echo $rows['reviews']['first_name'] . ' ' . $rows['reviews']['last_name']; ?></h1>
            <p>
                <?php echo $rows['reviews']['address']; ?></br>
                <?php echo $rows['reviews']['city'] . ', ' . $rows['reviews']['state'] . ' ' . $rows['reviews']['zip'] ; ?>
            </p>

            <?php echo (in_array("county", $rows['areas']) && $rows['reviews']['county'] != '') ? '<p>County: ' . $rows['reviews']['county'] . '</p>' : ''; ?>
            <?php echo (in_array("country", $rows['areas']) && $rows['reviews']['country'] != '') ? '<p>Country: ' . $rows['reviews']['country'] . '</p>' : ''; ?>
            <?php echo '<p>Email: ' . $rows['reviews']['email'] . '</p>'; ?>
            <?php echo ($rows['reviews']['phone'] != '') ? '<p>Phone: ' . $rows['reviews']['phone'] . '</p>' : ''; ?>
            <?php echo (in_array("website", $rows['areas']) && $rows['reviews']['website'] != '') ? '<p>Website: ' . $rows['reviews']['website'] . '</p>' : ''; ?>
            <?php echo (in_array("gender", $rows['areas']) && $rows['reviews']['gender'] != '') ? '<p>Gender: ' . $rows['reviews']['gender'] . '</p>' : ''; ?>
            <?php echo (in_array("ethnicity", $rows['areas']) && $rows['reviews']['ethnicity'] != '') ? '<p>Ethnicity: ' . $rows['reviews']['ethnicity'] . '</p>' : ''; ?>
            <?php echo (in_array("age", $rows['areas']) && $rows['reviews']['age'] != '0') ? '<p>Age: ' . $rows['reviews']['age'] . '</p>' : ''; ?>
            <?php if ($rows['reviews']['statement'] != '' && in_array("statement", $rows['areas'])) : ?>
                <h3 class="clearPadding clearMargin">Statement</h3>
                <p><?php echo $rows['reviews']['statement']; ?></p>
            <?php endif; ?>
            <?php if ($rows['reviews']['proposal'] != '' && in_array("proposal", $rows['areas'])) : ?>
                <h3 class="clearPadding clearMargin">Proposal</h3>
                <p><?php echo $rows['reviews']['proposal']; ?></p>
            <?php endif; ?>
            <?php if ($rows['reviews']['bio'] != '' && in_array("bio", $rows['areas'])) : ?>
                <h3 class="clearPadding clearMargin">Bio</h3>
                <p><?php echo $rows['reviews']['bio']; ?></p>
            <?php endif; ?>
            <?php if (in_array("resume", $rows['areas'])) : ?>
                <a href="<?php echo url('user/' . $rows['reviews']['uid'] . '/resume/download'); ?>" class="btn btn-default ap-btn" target="_blank">View Resume</a>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <h1 class="clearPadding"><?php echo isset($rows['reviews']['voteCount']) ? $rows['reviews']['voteCount'] . '/' . count($rows['jurors'])  : '0/'. count($rows['jurors']); ?> Reviews Complete</h1>
            <?php if(array_search( $rows['reviews']['uid'], $rows['paging'])+1 < count($rows['paging'])) : ?>
            <input type="hidden" name="next" id="next" value="<?php echo $rows['paging'][array_search($rows['reviews']['uid'], $rows['paging'])+1]; ?>">
            <?php endif; ?>
            <h3 class="clearPadding clearMargin">Average Rating</h3>
            <input type="number" name="rating" id="input-star" data-disabled="true" class="rating" min="0" max="<?php echo isset($rows['settings']['scale']) ? $rows['settings']['scale'] : '10'; ?>" data-stars="<?php echo isset($rows['settings']['scale']) ? $rows['settings']['scale'] : '10'; ?>" data-size="sm" data-show-clear="false" step="0.5" value="<?php echo isset($rows['reviews']['avgRating']) ? $rows['reviews']['avgRating'] : ''; ?>"></input>

            <?php if(isset($rows['reviews']['reviews'])) : ?>
            <hr>
                <h3 class="clearPadding clearMargin">Reviews</h3>
                <?php foreach($rows['reviews']['reviews'] as $review) : ?>
                    <p><?php echo 'Juror: ' . $review->r_uid . '<br>Rating: ' . $review->rating . '<br>Comment: ' . $review->comment; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <hr>
            <form class="form form-review" action="<?php echo url('opportunity/' . $rows['reviews']['nid'] . '/submission/' . $rows['reviews']['uid'] . '/admin', array()); ?>" method="POST">
                <input type="hidden" name="status" value="<?php echo $rows['reviews']['accept']; ?>">
                <?php if($rows['reviews']['accept'] != 1) : ?>
                    <p>Application has not been accepted.
                    <input class="btn btn-default pull-right" type="submit" value="Accept">
                    </p>
                <?php else : ?>
                    <p>Application is currently accepted.
                    <input class="btn btn-default pull-right" type="submit" value="Unaccept">
                    </p>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <?php if(in_array('work', $rows['steps'])) : ?>
    <div class="lightbox-parent">
        <?php $sci = "0"; //used to increment soundcloud embeds ?>
        <?php foreach($rows['artworks'] as $artwork) : ?>
        <hr>
        <div class="row">
            <div class="col-sm-4 artwork-info">
                <div><em><?php echo $artwork->title; ?></em></div>
                <div><?php echo $artwork->date; ?></div>
                <div>
                    <?php if(json_decode($artwork->medium)) : ?>
                        <?php foreach(json_decode($artwork->medium) as $medium) { echo $medium . ' '; } ?>
                    <?php endif; ?>
                </div>
                <div><?php echo $artwork->dimensions; ?></div>
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
                    <iframe class="img-responsive" src="<?php echo $artwork->file; ?>" id="ytplayer" frameborder="0"></iframe>
                <?php endif; ?>
                <?php if($artwork->file_type == 'soundcloud') : ?>
                    <span id="url<?php echo $sci; // populated by soundcloud embed iframe ?>"></span>
                    <?php   drupal_add_js(array('soundcloud_url' => array('url' . $sci => $artwork->file)), 'setting');
                        drupal_add_js('(function ($) { $(document).ready(function() {
                        urls = Drupal.settings.soundcloud_url;
                            $.each(urls, function(index, value){
                                //console.log("INDEX: " + index + " VALUE: " + value);
                                SC.oEmbed(value, {iframe: "true", show_comments:"false", maxheight:"150px", class:"img-responsive"},  document.getElementById(index));
                            });
                        }); })(jQuery);', 'inline' )
                    ?>
                    <?php $sci++; ?>
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
            <?php if(substr($area, 0, 5) == 'field' && $rows['reviews'][$area] != '') : ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="clearPadding clearMargin"><?php   $field = "field_op_custom_".substr($area, -1);
                            $title =  $rows['opportunity'][$field];
                            echo 'Field: ' . $title['und'][0]['value'];  ?></h2>
                        <p><?php echo $rows['reviews'][$area];  ?></p>
                    </div>
                </div>
            <?php elseif (substr($area, 0, 6) == 'upload' && $rows['reviews'][$area] != '') : ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="clearPadding clearMargin"><?php   $field = 'field_op_custom_upload_' . substr($area, -1);
                            $title =  $rows['opportunity'][$field];
                            echo 'Upload: ' . $title['und'][0]['value'];  ?></h2>
                        <p>
                            <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $artwork->nid . '/' . $artwork->uid . '/' . $rows['reviews'][$area])); ?>" target="_blank"><?php echo $rows['reviews'][$area];  ?></a>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>