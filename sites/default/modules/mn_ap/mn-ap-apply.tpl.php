<?php   drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
    drupal_add_css(drupal_get_path('theme', 'mnartists') . '/css/chosen.min.css');
        drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/styles.css');

        drupal_add_js(drupal_get_path('libraries', 'ckeditor') . '/sites/all/libraries/ckeditor/ckeditor.js');
        drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/mustache.js');
        drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.validate.min.js');
        drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.history2.js');
        drupal_add_js(drupal_get_path('theme', 'mnartists') . '/scripts/chosen.jquery.min.js');

        //inline javascript to limit # of selected artworks to the maximum defined in opportunity content type
        drupal_add_js('(function ($) { $(document).ready(function() {
            window.CKEDITOR_BASEPATH = "/sites/all/libraries/ckeditor";
            }); })(jQuery);', 'inline' );
        drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/scripts2.js');
        //dpm($rows); ?>
<div class="container" id="content">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $rows['op_title']; ?></h1>
            <?php echo "Application Deadline: " . $rows['opportunity']['end_date']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul id="ap-menu" class="nav nav-pills nav-justified">
                <li class="active"><a role="button" id="gotoStep1" href="#/step1">Step 1<br>Profile and Contact Info<span class="arrow-right"></span></a></li>

                <?php  if (in_array('statement-proposal', $rows['opportunity']['steps'])) : ?>
                    <li class="disabled"><a role="button" id="gotoStep<?php echo array_search('statement-proposal', $rows['opportunity']['steps']) + 3; ?>" href="#/step<?php echo array_search('statement-proposal', $rows['opportunity']['steps']) + 2; ?>" disabled="disabled">Step <?php echo array_search('statement-proposal', $rows['opportunity']['steps']) + 2; ?>
                    <br><?php echo $rows['opportunity']['step_titles']['statement-proposal']; ?><span class="arrow-right"></span></a></li>
                <?php endif; ?>

                <?php  if (in_array('bio-resume', $rows['opportunity']['steps'])) : ?>
                    <li class="disabled"><a role="button" id="gotoStep<?php echo array_search('bio-resume', $rows['opportunity']['steps']) + 3; ?>" href="#/step<?php echo array_search('bio-resume', $rows['opportunity']['steps']) + 2; ?>" disabled="disabled">Step <?php echo array_search('bio-resume', $rows['opportunity']['steps']) + 2; ?>
                    <br><?php echo $rows['opportunity']['step_titles']['bio-resume']; ?><span class="arrow-right"></span></a></li>
                <?php endif; ?>

                <?php if (in_array('work', $rows['opportunity']['steps'])) : ?>
                    <li class="disabled" id="gotoStep<?php echo array_search('work', $rows['opportunity']['steps']) + 3; ?>"><a role="button" href="#/step<?php echo array_search('work', $rows['opportunity']['steps']) + 2; ?>" disabled="disabled">Step <?php echo array_search('work', $rows['opportunity']['steps']) + 2; ?>
                    <br>Select Work<span class="arrow-right"></span></a></li>
                <?php endif; ?>

                <?php  if (in_array('fields-uploads', $rows['opportunity']['steps'])) : ?>
                    <li class="disabled" id="gotoStep<?php echo array_search('fields-uploads', $rows['opportunity']['steps']) + 3; ?>"><a role="button" href="#/step<?php echo array_search('fields-uploads', $rows['opportunity']['steps']) + 2; ?>" disabled="disabled">Step <?php echo array_search('fields-uploads', $rows['opportunity']['steps']) + 2; ?>
                    <br>Additional Materials<span class="arrow-right"></span></a></li>
                <?php endif; ?>

                <li class="disabled" id="gotoStep<?php echo count($rows['opportunity']['steps']) + 2; ?>"><a role="button" href="#/step<?php echo count($rows['opportunity']['steps']) + 2; ?>" disabled="disabled">Step <?php echo count($rows['opportunity']['steps']) + 2; ?><br>Confirmation</a></li>
            </ul>
            <form role="form" name="input" id="ApplicationForm" action="<?php echo url('opportunity/' . $rows['nid'] . '/apply/submit', array()); ?>" method="POST" enctype="multipart/form-data">
                <div id="ap-content">
                    <div id="step1">
                        <input type="hidden" id="nid" name="nid" value="<?php echo $rows['nid']; ?>">
                        <input type="hidden" id="title" name="title" value="<?php echo $rows['op_title']; ?>">
                        <?php if (isset($rows['reopen'])) : ?>
                        <input type="hidden" id="reopen" name="reopen" value="<?php echo $rows['reopen']; ?>">
                        <?php endif; ?>
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <legend class="text-center">Contact Info</legend>
                                </div>
                                <div class="col-sm-2">
                                    <div class="next" id="gotoStep2" role="button">Next</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="first_name">First Name*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $rows['first_name']; ?>" required>
                                    </div>
                                    <label class="col-sm-2 control-label" for="last_name">Last Name*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $rows['last_name']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="email">Email*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $rows['email']; ?>" required>
                                    </div>

                                    <label class="col-sm-2 control-label" for="phone">Phone*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $rows['phone']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="address">Address*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $rows['address']; ?>" required>
                                    </div>

                                    <label class="col-sm-2 control-label" for="city">City*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="city" id="city" value="<?php echo $rows['city']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="state">State*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="state" id="state" value="<?php echo $rows['state']; ?>" required>
                                    </div>

                                    <label class="col-sm-2 control-label" for="zip">Zip*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="zip" id="zip" value="<?php echo $rows['zip']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <?php if ($rows['opportunity']['additional_fields'] != '') : ?>
                                <?php $count = 1; ?>
                                <?php foreach ($rows['opportunity']['additional_fields'] as $field) : ?>
                                    <?php if($count == 1): ?>
                                        <div class="row">
                                            <div class="form-group">
                                    <?php endif; ?>
                                                <label class="col-sm-2 control-label" for="<?php echo $field; ?>"><?php echo ucfirst($field); ?><?php if(is_array($rows['opportunity']['required']) && in_array($field, $rows['opportunity']['required'])) echo '*'; ?></label>
                                                <div class="col-sm-4">
                                                <?php if($field == 'gender') : ?>
                                                    <select class="form-control form-select" name="<?php echo $field; ?>" id="<?php echo $field; ?>" <?php if(is_array($rows['opportunity']['required']) && in_array($field, $rows['opportunity']['required'])) echo 'required'; ?>>
                                                        <option disabled <?php if ($rows[$field] == '') echo 'selected'; ?> value="">Select Gender</option>
                                                        <option value="Man" <?php if ($rows[$field] == 'Man') echo 'selected'; ?>>Man</option>
                                                        <option value="Woman" <?php if ($rows[$field] == 'Woman') echo 'selected'; ?>>Woman</option>
                                                        <option value="Trans" <?php if ($rows[$field] == 'Trans') echo 'selected'; ?>>Trans</option>
                                                        <option value="Non-Binary" <?php if ($rows[$field] == 'Non-Binary') echo 'selected'; ?>>Non-Binary</option>
                                                    </select>
                                                <?php elseif($field == 'ethnicity') : ?>
                                                    <select class="form-control form-select" name="<?php echo $field; ?>" id="<?php echo $field; ?>" <?php if(is_array($rows['opportunity']['required']) && in_array($field, $rows['opportunity']['required'])) echo 'required'; ?>>
                                                        <option disabled <?php if ($rows[$field] == '') echo 'selected'; ?> value="">Select Ethnicity</option>
                                                        <option value="African-American/African/Black" <?php if ($rows[$field] == 'African-American/African/Black') echo 'selected'; ?>>African-American/African/Black</option>
                                                        <option value="Caucasian/White" <?php if ($rows[$field] == 'Caucasian/White') echo 'selected'; ?>>Caucasian/White</option>
                                                        <option value="Native American" <?php if ($rows[$field] == 'Native American') echo 'selected'; ?>>Native American</option>
                                                        <option value="Asian-American/Pacific Islander" <?php if ($rows[$field] == 'Asian-American/Pacific Islander') echo 'selected'; ?>>Asian-American/Pacific Islander</option>
                                                        <option value="Hispanic/Latino/Latina" <?php if ($rows[$field] == 'Hispanic/Latino/Latina') echo 'selected'; ?>>Hispanic/Latino/Latina</option>
                                                        <option value="Multiracial" <?php if ($rows[$field] == 'Multiracial') echo 'selected'; ?>>Multiracial</option>
                                                    </select>
                                                <?php else : ?>
                                                    <input type="text" class="form-control" name="<?php echo $field; ?>" id="<?php echo $field; ?>" value="<?php echo $rows[$field]; ?>" <?php if(is_array($rows['opportunity']['required']) && in_array($field, $rows['opportunity']['required'])) echo 'required'; ?>>
                                                <?php endif; ?>
                                                </div>
                                    <?php if($count == 2): ?>
                                            </div>
                                        </div>
                                        <?php $count = 1; ?>
                                    <?php else : ?>
                                        <?php $count++; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="next" id="gotoStep2" role="button">Next</div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <?php  if (in_array('statement-proposal', $rows['opportunity']['steps'])) : ?>
                    <div id="step<?php echo array_search('statement-proposal', $rows['opportunity']['steps']) + 2; ?>">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="prev" id="gotoStep<?php echo array_search('statement-proposal', $rows['opportunity']['steps']) + 1; ?>" role="button">Back</div>
                                </div>
                                <div class="col-sm-8">
                                    <legend class="text-center"><?php echo $rows['opportunity']['step_titles']['statement-proposal']; ?></legend>
                                </div>
                                <div class="col-sm-2">
                                    <div class="next" id="gotoStep<?php echo array_search('statement-proposal', $rows['opportunity']['steps']) + 3; ?>" role="button">Next</div>
                                </div>
                            </div>
                            <?php if (in_array('statement', $rows['opportunity']['areas'])) : ?>
                            <div class="form-group">
                                <label for="statement">Statement <?php if(is_array($rows['opportunity']['required']) && in_array('statement', $rows['opportunity']['required'])) echo '*'; ?>
                                    <?php if ($rows['opportunity']['statement_length'] != '') : ?>
                                        <div class="small">Maximum <?php echo $rows['opportunity']['statement_length']; ?> Words.</div>
                                    <?php endif; ?>
                                    <div class="small"><?php echo $rows['opportunity']['statement_desc']; ?></div>
                                </label>
                                <div class="form-textarea-wrapper">
                                    <textarea class="form-control ap-textarea" id="statementEditor" name="statementEditor"><?php echo $rows['resume_statement']; ?></textarea>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if (in_array('proposal', $rows['opportunity']['areas'])) : ?>
                            <div class="form-group">
                                <label for="proposal">Proposal<?php if(is_array($rows['opportunity']['required']) && in_array('proposal', $rows['opportunity']['required'])) echo '*'; ?>
                                    <div class="small"><?php echo $rows['opportunity']['proposal_desc']; ?></div>
                                </label>
                                <input class="hidden" id="proposalHide" name="proposalHide" value="">
                                <div class="form-textarea-wrapper">
                                    <textarea class="form-control ap-textarea" id="proposalEditor" name="proposalEditor"><?php echo $rows['proposal']; ?></textarea>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="prev" id="gotoStep<?php echo array_search('statement-proposal', $rows['opportunity']['steps']) + 1; ?>" role="button">Back</div>
                                    <div class="next" id="gotoStep<?php echo array_search('statement-proposal', $rows['opportunity']['steps']) + 3; ?>" role="button">Next</div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <?php endif; ?>

                    <?php  if (in_array('bio-resume', $rows['opportunity']['steps'])) : ?>
                    <div id="step<?php echo array_search('bio-resume', $rows['opportunity']['steps']) + 2; ?>">
                        <fieldset id="ap-resume">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="prev" id="gotoStep<?php echo array_search('bio-resume', $rows['opportunity']['steps']) + 1; ?>" role="button">Back</div>
                                </div>
                                <div class="col-sm-8">
                                    <legend class="text-center"><?php echo $rows['opportunity']['step_titles']['bio-resume']; ?></legend>
                                </div>
                                <div class="col-sm-2">
                                    <div class="next" id="gotoStep<?php echo array_search('bio-resume', $rows['opportunity']['steps']) + 3; ?>" role="button">Next</div>
                                </div>
                            </div>
                            <?php if (in_array('bio', $rows['opportunity']['areas'])) : ?>
                            <div class="form-group">
                                <label for="bio">Bio<?php if(is_array($rows['opportunity']['required']) && in_array('bio', $rows['opportunity']['required'])) echo '*'; ?> <div class="small"><?php echo $rows['opportunity']['bio_desc']; ?></div></label>
                                <div class="form-textarea-wrapper">
                                    <textarea class="form-control ap-textarea" id="bioEditor" name="bioEditor"><?php echo $rows['resume_bio']; ?></textarea>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (in_array('resume', $rows['opportunity']['areas'])) : ?>
                            <a class="ap-button" href="<?php echo url('user/' . $rows['uid'] . '/edit/resume', array()); ?>" target="_blank">Edit Resume</a>
                            <input type="hidden" name="resumeMarkup" value="">
                            <div id="resumeContent">
                                <?php echo $rows['resume']['content']['#markup']; ?>
                            </div>
                            <?php endif; ?>
                            <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="prev" id="gotoStep<?php echo array_search('bio-resume', $rows['opportunity']['steps']) + 1; ?>" role="button">Back</div>
                                    <div class="next" id="gotoStep<?php echo array_search('bio-resume', $rows['opportunity']['steps']) + 3; ?>" role="button">Next</div>
                                </div>
                            </div>
                            </div>
                        </fieldset>
                    </div>
                    <?php endif; ?>

                    <?php if (in_array('work', $rows['opportunity']['steps'])) : ?>
                    <div id="step<?php echo array_search('work', $rows['opportunity']['steps']) + 2; ?>">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="prev" id="gotoStep<?php echo array_search('work', $rows['opportunity']['steps']) + 1; ?>" role="button">Back</div>
                                </div>
                                <div class="col-sm-8">
                                    <legend class="text-center">Select Work</legend>
                                </div>
                                <div class="col-sm-2">
                                    <div class="next" id="gotoStep<?php echo array_search('work', $rows['opportunity']['steps']) + 3; ?>" role="button">Next</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Artwork Guidelines: <div class="small"><?php echo $rows['opportunity']['artwork_desc']; ?></div></label><br>
                                    <?php if($rows['opportunity']['min_works'] != $rows['opportunity']['max_works']): ?>
                                    <label id="artHelp">Choose at least <?php echo $rows['opportunity']['min_works']; ?> and no more than <?php echo $rows['opportunity']['max_works']; ?> pieces of documentation to represent your work.</label>
                                    <?php else: ?>
                                    <label id="artHelp">Choose <?php echo $rows['opportunity']['min_works']; ?> pieces of documentation to represent your work.</label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php foreach ($rows['artworks'] as $artwork) : ?>
                                <div class="row ap-row">
                                    <hr>
                                    <?php if (isset($artwork['images']) && $artwork['images'] != '') : ?>
                                    <div class="col-sm-2 artwork-info">
                                        <div><em><?php echo $artwork['title']; ?></em></div>
                                        <div><?php echo $artwork['date']; ?></div>
                                        <div>
                                            <?php $mediums = $artwork['medium'];
                                                foreach ($artwork['medium'] as $medium) {
                                                echo $medium;
                                                if (next($mediums)) echo ', ';
                                            } ?>
                                        </div>
                                        <div><?php echo $artwork['dimensions']; ?></div>
                                        <div class="ap-body">
                                            <?php if($artwork['excerpt'] != '') : ?>
                                            <div>
                                                Excerpt: <?php echo $artwork['excerpt']; ?>
                                            </div>
                                            <?php endif; ?>
                                            <?php if ($artwork['venue'] != '') : ?>
                                            <div>
                                                Venue: <?php echo $artwork['venue'] ?>
                                            </div>
                                            <?php endif; ?>
                                            <?php if ($artwork['other_artists'] != '') : ?>
                                            <div>
                                                Others Artists Involved:
                                                <?php $other_artists = $artwork['other_artists'];
                                                foreach ($artwork['other_artists'] as $others) {
                                                    echo $others ;
                                                    if (next($other_artists)) echo ', ';
                                                } ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="ap-artwork-body"><?php echo $artwork['body']; ?></div>
                                        <?php if(strlen($artwork['body']) > 144) : ?>
                                        <div class="ap-more text-center">View More</div>
                                        <?php endif; ?>
                                        <div><a class="ap-button btn" href="<?php echo url('node/' . $artwork['vid'] . '/edit', array()); ?>" target="_blank">Edit / Add</a></div>
                                    </div>
                                    <div class="col-sm-10">
                                        <?php $noneOfTypes = 'true'; //non of work_types ?>
                                        <?php foreach ($artwork['images'] as $image) : ?>
                                        <?php if ($image['type'] == 'image' && in_array('image', $rows['opportunity']['work_types'])) : ?>
                                        <?php $noneOfTypes = 'false'; ?>
                                        <div class="ap-image col-sm-4">
                                            <div class="thumbnail ap-artwork-thumbnail">
                                                <img class="img-responsive" src="<?php echo image_style_url('large', $image['file']); ?>">
                                                <div class="caption">
                                                    <span class="ap-icheck pull-left">
                                                        <input type="checkbox" class="ap-check" data-id="f<?php echo $image['fid']; ?>" name="artwork['<?php echo $image['fid']; ?>']" value="<?php echo $image['fid']; ?>" data-vid="v<?php echo $artwork['vid']; ?>" <?php echo isset($rows['ap_artworks']) && $rows['ap_artworks'] != '' && in_array($image['fid'], $rows['ap_artworks']) ? 'checked' : ''; ?>>
                                                        <label for="ap-icheck"></label>
                                                    </span>
                                                    <span><?php echo $image['filename']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <?php elseif ($image['type'] == 'soundcloud' && in_array('sound', $rows['opportunity']['work_types'])) : ?>
                                        <?php $noneOfTypes = 'false'; ?>
                                        <div class="ap-image col-sm-4">
                                            <div class="thumbnail ap-artwork-thumbnail">
                                                <div class="img-responsive">
                                                    <?php print theme('media_soundcloud_audio', array('uri' => $image['uri'])); ?>
                                                </div>
                                                <div class="caption">
                                                    <div>
                                                        <input type="checkbox" class="ap-check" data-id="f<?php echo $image['fid']; ?>" name="artwork['<?php echo $image['fid']; ?>']" value="<?php echo $image['fid']; ?>" data-vid="v<?php echo $artwork['vid']; ?>" <?php echo isset($rows['ap_artworks']) && $rows['ap_artworks'] != '' && in_array($image['fid'], $rows['ap_artworks']) ? 'checked' : ''; ?>>
                                                        <?php echo $image['filename']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php elseif ($image['type'] == 'youtube' && in_array('video', $rows['opportunity']['work_types'])) : ?>
                                        <?php $noneOfTypes = 'false'; ?>
                                        <div class="ap-image col-sm-4">
                                            <div class="thumbnail ap-artwork-thumbnail">
                                                <iframe class="img-responsive" src="<?php echo $image['file']; ?>" id="ytplayer" frameborder="0"></iframe>
                                                <div class="caption">
                                                    <div>
                                                        <input type="checkbox" class="ap-check" data-id="f<?php echo $image['fid']; ?>" name="artwork['<?php echo $image['fid']; ?>']" value="<?php echo $image['fid']; ?>" data-vid="v<?php echo $artwork['vid']; ?>" <?php echo isset($rows['ap_artworks']) && $rows['ap_artworks'] != '' && in_array($image['fid'], $rows['ap_artworks']) ? 'checked' : ''; ?>>
                                                        <?php echo $image['filename']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php elseif ($image['type'] == 'vimeo' && in_array('video', $rows['opportunity']['work_types'])) : ?>
                                        <?php $noneOfTypes = 'false'; ?>
                                        <div class="ap-image col-sm-4">
                                            <div class="thumbnail ap-artwork-thumbnail">
                                                <iframe class="img-responsive" src="<?php echo $image['file']; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                <div class="caption">
                                                    <div>
                                                        <input type="checkbox" class="ap-check" data-id="f<?php echo $image['fid']; ?>" name="artwork['<?php echo $image['fid']; ?>']" value="<?php echo $image['fid']; ?>" data-vid="v<?php echo $artwork['vid']; ?>" <?php echo isset($rows['ap_artworks']) && $rows['ap_artworks'] != '' && in_array($image['fid'], $rows['ap_artworks']) ? 'checked' : ''; ?>>
                                                        <?php echo $image['filename']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php elseif ($image['type'] == 'document' && in_array('text', $rows['opportunity']['work_types'])) : ?>
                                        <?php $noneOfTypes = 'false'; ?>
                                        <div class="ap-image col-sm-4">
                                            <div class="thumbnail ap-artwork-thumbnail">
                                                <div class="img-responsive doc-icon"></div>
                                                <div class="caption">
                                                    <div>
                                                        <input type="checkbox" class="ap-check" data-id="f<?php echo $image['fid']; ?>" name="artwork['<?php echo $image['fid']; ?>']" value="<?php echo $image['fid']; ?>" data-vid="v<?php echo $artwork['vid']; ?>" <?php echo isset($rows['ap_artworks']) && $rows['ap_artworks'] != '' && in_array($image['fid'], $rows['ap_artworks']) ? 'checked' : ''; ?>>
                                                        <a href="<?php echo file_create_url($image['file']); ?>" target="_blank"><?php echo $image['filename']; ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($noneOfTypes == 'true' && $artwork['title'] != '') : ?>
                                        <p>You have not added any documentation of the proper type for this work.</p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                            <div class="row">
                                <div class="col-sm-2">
                                    <a class="ap-button btn" href="<?php echo url('node/add/artwork', array()); ?>">Add More Work</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="help-text">After you 'Add More Work' or 'Edit/Add' documentation for a work, return to this tab and refresh your page to see and select newly added work.</p>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="prev" id="gotoStep<?php echo array_search('work', $rows['opportunity']['steps']) + 1; ?>" role="button">Back</div>
                                        <div class="next" id="gotoStep<?php echo array_search('work', $rows['opportunity']['steps']) + 3; ?>" role="button">Next</div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <?php endif; ?>

                    <?php  if (in_array('fields-uploads', $rows['opportunity']['steps'])) : ?>
                        <div id="step<?php echo array_search('fields-uploads', $rows['opportunity']['steps']) + 2; ?>">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="prev" id="gotoStep<?php echo array_search('fields-uploads', $rows['opportunity']['steps']) + 1; ?>" role="button">Back</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <legend class="text-center">Additional Materials</legend>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="next" id="gotoStep<?php echo array_search('fields-uploads', $rows['opportunity']['steps']) + 3; ?>" role="button">Next</div>
                                    </div>
                                </div>
                                <?php if (in_array('field1', $rows['opportunity']['areas'])) : ?>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="field1"><?php echo $rows['opportunity']['custom_1_title']; ?><?php if(in_array('field1', $rows['opportunity']['required'])) echo '*'; ?> <div class="small"><?php echo $rows['opportunity']['custom_1_desc']; ?></div></label>
                                        <div class="form-textarea-wrapper">
                                            <textarea class="form-control ap-textarea custom-field" id="field1Editor" name="field1Editor"><?php echo $rows['field1']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (in_array('field2', $rows['opportunity']['areas'])) : ?>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="field2"><?php echo $rows['opportunity']['custom_2_title']; ?><?php if(in_array('field2', $rows['opportunity']['required'])) echo '*'; ?> <div class="small"><?php echo $rows['opportunity']['custom_2_desc']; ?></div></label>
                                        <div class="form-textarea-wrapper">
                                            <textarea class="form-control ap-textarea custom-field" id="field2Editor" name="field2Editor"><?php echo $rows['field2']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (in_array('field3', $rows['opportunity']['areas'])) : ?>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="field3"><?php echo $rows['opportunity']['custom_3_title']; ?><?php if(in_array('field3', $rows['opportunity']['required'])) echo '*'; ?> <div class="small"><?php echo $rows['opportunity']['custom_3_desc']; ?></div></label>
                                        <div class="form-textarea-wrapper">
                                            <textarea class="form-control ap-textarea custom-field" id="field3Editor" name="field3Editor"><?php echo $rows['field3']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (in_array('field4', $rows['opportunity']['areas'])) : ?>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="field4"><?php echo $rows['opportunity']['custom_4_title']; ?><?php if(in_array('field4', $rows['opportunity']['required'])) echo '*'; ?> <div class="small"><?php echo $rows['opportunity']['custom_4_desc']; ?></div></label>
                                        <div class="form-textarea-wrapper">
                                            <textarea class="form-control ap-textarea custom-field" id="field4Editor" name="field4Editor"><?php echo $rows['field4']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (in_array('upload1', $rows['opportunity']['areas'])) : ?>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3" for="upload1"><?php echo $rows['opportunity']['custom_up_1_title']; ?><?php if(in_array('upload1', $rows['opportunity']['required'])) echo '*'; ?> <div class="small"><?php echo $rows['opportunity']['custom_up_1_desc']; ?></div></label>
                                        <div class="col-sm-9">
                                        <?php if ($rows['upload1'] == '' || ! in_array('upload1', $rows['opportunity']['required'])) : ?>
                                            <div class="col-sm-6">
                                                <input class="custom-upload" type="file" id="upload1" name="upload1[]">
                                                <?php if ($rows['upload1'] != '') : ?>
                                                    <p class="pull-right">
                                                        You previously uploaded: <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload1'])); ?>" target="_blank"><?php echo $rows['upload1'];  ?></a>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                            <div id="upload1Display" class="col-sm-3"></div>
                                        <?php else : ?>
                                            <div class="col-sm-6">
                                                <p class="pull-right">
                                                    You previously uploaded: <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload1'])); ?>" target="_blank"><?php echo $rows['upload1'];  ?></a>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php endif; ?>

                                <?php if (in_array('upload2', $rows['opportunity']['areas'])) : ?>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3" for="upload2"><?php echo $rows['opportunity']['custom_up_2_title']; ?><?php if(in_array('upload2', $rows['opportunity']['required'])) echo '*'; ?> <div class="small"><?php echo $rows['opportunity']['custom_up_2_desc']; ?></div></label>
                                        <div class="col-sm-9">
                                        <?php if ($rows['upload2'] == '' || ! in_array('upload2', $rows['opportunity']['required'])) : ?>
                                            <div class="col-sm-6">
                                                <input class="custom-upload" type="file" id="upload2" name="upload2[]">
                                                <?php if ($rows['upload2'] != '') : ?>
                                                    <p class="pull-right">
                                                        You previously uploaded: <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload2'])); ?>" target="_blank"><?php echo $rows['upload2'];  ?></a>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                            <div id="upload2Display" class="col-sm-3"></div>
                                        <?php else : ?>
                                            <div class="col-sm-6">
                                                <p class="pull-right">
                                                    You previously uploaded: <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload2'])); ?>" target="_blank"><?php echo $rows['upload2'];  ?></a>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php endif; ?>

                                <?php if (in_array('upload3', $rows['opportunity']['areas'])) : ?>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3" for="upload3"><?php echo $rows['opportunity']['custom_up_3_title']; ?><?php if(in_array('upload3', $rows['opportunity']['required'])) echo '*'; ?> <div class="small"><?php echo $rows['opportunity']['custom_up_3_desc']; ?></div></label>
                                        <div class="col-sm-9">
                                        <?php if ($rows['upload3'] == '' || ! in_array('upload3', $rows['opportunity']['required'])) : ?>
                                            <div class="col-sm-6">
                                                <input class="custom-upload" type="file" id="upload3" name="upload3[]">
                                                <?php if ($rows['upload3'] != '') : ?>
                                                    <p class="pull-right">
                                                        You previously uploaded: <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload3'])); ?>" target="_blank"><?php echo $rows['upload3'];  ?></a>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                            <div id="upload3Display" class="col-sm-3"></div>
                                        <?php else : ?>
                                            <div class="col-sm-6">
                                                <p class="pull-right">
                                                    You previously uploaded: <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload3'])); ?>" target="_blank"><?php echo $rows['upload3'];  ?></a>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php endif; ?>

                                <?php if (in_array('upload4', $rows['opportunity']['areas'])) : ?>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3" for="upload4"><?php echo $rows['opportunity']['custom_up_4_title']; ?><?php if(in_array('upload4', $rows['opportunity']['required'])) echo '*'; ?> <div class="small"><?php echo $rows['opportunity']['custom_up_4_desc']; ?></div></label>
                                        <div class="col-sm-9">
                                        <?php if ($rows['upload4'] == '' || ! in_array('upload4', $rows['opportunity']['required'])) : ?>
                                            <div class="col-sm-6">
                                                <input class="custom-upload" type="file" id="upload4" name="upload4[]">
                                                <?php if ($rows['upload4'] != '') : ?>
                                                    <p class="pull-right">
                                                        You previously uploaded: <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload4'])); ?>" target="_blank"><?php echo $rows['upload4'];  ?></a>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                            <div id="upload4Display" class="col-sm-3"></div>
                                        <?php else : ?>
                                            <div class="col-sm-6">
                                                <p class="pull-right">
                                                    You previously uploaded: <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload4'])); ?>" target="_blank"><?php echo $rows['upload4'];  ?></a>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php endif; ?>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="prev" id="gotoStep<?php echo array_search('fields-uploads', $rows['opportunity']['steps']) + 1; ?>" role="button">Back</div>
                                            <div class="next" id="gotoStep<?php echo array_search('fields-uploads', $rows['opportunity']['steps']) + 3; ?>" role="button">Next</div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    <?php endif; ?>

                    <div id="step<?php echo count($rows['opportunity']['steps']) + 2; ?>">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="prev" id="gotoStep<?php echo count($rows['opportunity']['steps']) + 1; ?>" role="button">Back</div>
                            </div>
                            <div class="col-sm-8">
                                <legend class="text-center">Confirm Submission</legend>
                            </div>
                            <div class="col-sm-2">
                                <button id="SaveApplication" type="submit" class="pull-right ap-btn" value="Submit">Submit</button>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <div id="ConfirmView">
                                    <div id="profileAjax"></div>
                                </div>
                            </div>
                        </div>
                        <script id="confirmTpl" type="text/template">
                            <h3 class="clearPadding clearMargin">Profile and Info</h3>
                            <p>{{first_name}} {{last_name}}<br>
                            {{address}}; {{city}}, {{state}} {{zip}}<br>
                            {{#county}}County: {{county}}<br>{{/county}}
                            {{#country}}Country: {{country}}<br>{{/country}}
                            {{#email}}Email: {{email}}<br>{{/email}}
                            {{#phone}}Phone: {{phone}}<br>{{/phone}}
                            {{#gender}}Gender: {{gender}}<br>{{/gender}}
                            {{#ethnicity}}Ethnicity: {{ethnicity}}<br>{{/ethnicity}}
                            {{#age}}Age: {{age}}<br>{{/age}}
                            </p>

                            {{#steps.statement-proposal}}
                            <br><br>
                            <h3 class="clearPadding clearMargin">{{titles.statement-proposal}}</h3>
                            {{#statement}}Statement: {{&statement}}<br>{{/statement}}
                            {{#proposal}}Proposal: {{&proposal}}{{/proposal}}
                            {{/steps.statement-proposal}}

                            {{#steps.bio-resume}}
                            <h3 class="clearPadding clearMargin">{{titles.bio-resume}}</h3>
                            {{#bio}}Bio: {{&bio}}<br>{{/bio}}
                            {{#resume}}<div id="ap-resume"> {{&resume}} </div>{{/resume}}
                            {{/steps.bio-resume}}
                        </script>
                        <?php if (in_array('work', $rows['opportunity']['steps'])) : ?>
                        <div id="worksView">
                            <h3 class="clearPadding clearMargin">Selected Work</h3>
                            <?php foreach ($rows['artworks'] as $artwork) : ?>
                            <div class="ap-artrow row" id="v<?php echo $artwork['vid']; ?>">
                                <hr>
                                <?php if ($artwork['images'] != '') : ?>
                                <div class="col-sm-2 artwork-info">
                                    <div><em><?php echo $artwork['title']; ?></em></div>
                                    <div><?php echo $artwork['date']; ?></div>
                                    <div>
                                        <?php $mediums = $artwork['medium'];
                                            foreach ($artwork['medium'] as $medium) {
                                            echo $medium;
                                            if (next($mediums)) echo ', ';
                                        } ?>
                                    </div>
                                    <div><?php echo $artwork['dimensions']; ?></div>
                                    <div class="ap-body">
                                        <?php if($artwork['excerpt'] != '') : ?>
                                        <div>
                                            Excerpt: <?php echo $artwork['excerpt']; ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php if ($artwork['venue'] != '') : ?>
                                        <div>
                                            Venue: <?php echo $artwork['venue'] ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php if ($artwork['other_artists'] != '') : ?>
                                        <div>
                                            Others Artists Involved:
                                            <?php $other_artists = $artwork['other_artists'];
                                            foreach ($artwork['other_artists'] as $others) {
                                                echo $others ;
                                                if (next($other_artists)) echo ', ';
                                            } ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="ap-artwork-body"><?php echo $artwork['body']; ?></div>
                                    <?php if(strlen($artwork['body']) > 144) : ?>
                                        <div class="ap-more text-center">View More</div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-10">
                                <?php foreach ($artwork['images'] as $image) : ?>
                                    <?php if ($image['type'] == 'image' && in_array('image', $rows['opportunity']['work_types'])) : ?>
                                    <span class="ap-artwork hidden" id="f<?php echo $image['fid']; ?>">
                                        <div class="ap-image col-sm-6">
                                            <label for="artwork"></label>
                                            <img class="img-responsive" src="<?php echo image_style_url('large', $image['file']); ?>">
                                        </div>
                                    </span>

                                    <?php elseif ($image['type'] == 'soundcloud' && in_array('sound', $rows['opportunity']['work_types'])) : ?>
                                    <span class="ap-artwork hidden" id="f<?php echo $image['fid']; ?>">
                                        <div class="ap-image col-sm-6">
                                            <label for="artwork['<?php echo $image['fid']; ?>']"></label>
                                            <iframe class="img-responsive" scrolling="no" frameborder="no" width="" height="150" src="//w.soundcloud.com/player/?url=<?php echo $image['file']; ?>&amp;show_user=false&amp;show_artwork=false"></iframe>
                                        </div>
                                    </span>

                                    <?php elseif ($image['type'] == 'youtube' && in_array('video', $rows['opportunity']['work_types'])) : ?>
                                    <span class="ap-artwork hidden" id="f<?php echo $image['fid']; ?>">
                                        <div class="ap-image col-sm-6">
                                            <label for="artwork['<?php echo $image['fid']; ?>']"></label>
                                            <iframe class="img-responsive" src="<?php echo $image['file']; ?>" id="ytplayer" frameborder="0"></iframe>
                                        </div>
                                    </span>

                                    <?php elseif ($image['type'] == 'vimeo' && in_array('video', $rows['opportunity']['work_types'])) : ?>
                                    <span class="ap-artwork hidden" id="f<?php echo $image['fid']; ?>">
                                        <div class="ap-image ap-artwork col-sm-6" id="<?php echo $image['fid']; ?>">
                                            <label for="artwork['<?php echo $image['fid']; ?>']"></label>
                                            <iframe class="img-responsive" src="<?php echo $image['file']; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        </div>
                                    </span>

                                    <?php elseif ($image['type'] == 'document' && in_array('text', $rows['opportunity']['work_types'])) : ?>
                                    <?php $noneOfTypes = 'false'; ?>
                                    <span class="ap-artwork hidden" id="f<?php echo $image['fid']; ?>">
                                        <div class="ap-image col-sm-4">
                                            <div class="img-responsive doc-icon"></div>
                                            <a href="<?php echo file_create_url($image['file']); ?>" target="_blank"><?php echo $image['filename']; ?></a>
                                        </div>
                                    </span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <?php  if (in_array('fields-uploads', $rows['opportunity']['steps'])) : ?>
                                <hr>
                                <h3 class="clearPadding clearMargin">Additional Materials</h3>
                                <div class="addFieldsView">
                                    <div id="additionalAjax"></div>
                                </div>
                                <script id="additionalTpl" type="text/template">
                                    {{#field1}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="clearPadding clearMargin"><?php echo $rows['opportunity']['custom_1_title']; ?>:</label>
                                                {{&field1}}
                                            </div>
                                        </div>
                                    {{/field1}}
                                    {{#field2}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="clearPadding clearMargin"><?php echo $rows['opportunity']['custom_2_title']; ?>:</label>
                                                {{&field2}}
                                            </div>
                                        </div>
                                    {{/field2}}
                                    {{#field3}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="clearPadding clearMargin"><?php echo $rows['opportunity']['custom_3_title']; ?>:</label>
                                                {{&field3}}
                                            </div>
                                        </div>
                                    {{/field3}}
                                    {{#field4}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="clearPadding clearMargin"><?php echo $rows['opportunity']['custom_4_title']; ?>:</label>
                                                {{&field4}}
                                            </div>
                                        </div>
                                    {{/field4}}
                                </script>
                                <div id="addUploadsView">
                                <div class="row">
                                    <div id="upload1View">
                                    <?php if (isset($rows['ap_artworks']) && $rows['upload1'] != '') : ?>
                                        <div class="col-sm-12">
                                            <label class="col-sm-4" for="upload1">Upload: <?php echo $rows['opportunity']['custom_up_1_title']; ?></label>
                                            <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload1'])); ?>" target="_blank"><?php echo $rows['upload1'];  ?></a>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="upload2View">
                                    <?php if (isset($rows['ap_artworks']) && $rows['upload2'] != '') : ?>
                                        <div class="col-sm-12">
                                            <label class="col-sm-4" for="upload2">Upload: <?php echo $rows['opportunity']['custom_up_2_title']; ?></label>
                                            <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload2'])); ?>" target="_blank"><?php echo $rows['upload2'];  ?></a>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="upload3View">
                                    <?php if (isset($rows['ap_artworks']) && $rows['upload3'] != '') : ?>
                                        <div class="col-sm-12">
                                            <label class="col-sm-4" for="upload3">Upload: <?php echo $rows['opportunity']['custom_up_3_title']; ?></label>
                                            <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload3'])); ?>" target="_blank"><?php echo $rows['upload3'];  ?></a>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="upload4View">
                                    <?php if (isset($rows['ap_artworks']) && $rows['upload4'] != '') : ?>
                                        <div class="col-sm-12">
                                            <label class="col-sm-4" for="upload4">Upload: <?php echo $rows['opportunity']['custom_up_4_title']; ?></label>
                                            <a href="<?php  print file_create_url(file_build_uri('opportunity/' . $rows['nid'] . '/' . $rows['uid'] . '/' . $rows['upload4'])); ?>" target="_blank"><?php echo $rows['upload4'];  ?></a>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="prev" id="gotoStep<?php echo count($rows['opportunity']['steps']) + 1; ?>" role="button">Back</div>
                                    <button id="SaveApplication" type="submit" class="pull-right btn ap-btn" value="Submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (in_array('statement', $rows['opportunity']['areas'])) {
  drupal_add_js('(function ($) { $(document).ready(function() {
    CKEDITOR.replace( "statementEditor", {
      customConfig: CKEDITOR_BASEPATH + "/custom/config.js"
    });
    var statementEditor = CKEDITOR.instances["statementEditor"];
    statementEditor.on("instanceReady", function(){
      this.document.on("keyup", function(){
        $(window).on("beforeunload", function(){
          return "You will lose the changes made in the editor.";
        });
      });
    });
   }); })(jQuery);', 'inline' );
}
if (in_array('bio', $rows['opportunity']['areas'])) {
  drupal_add_js('(function ($) { $(document).ready(function() {
    CKEDITOR.replace( "bioEditor", {
      customConfig: CKEDITOR_BASEPATH + "/custom/config.js"
    });
    var bioEditor = CKEDITOR.instances["bioEditor"];
    bioEditor.on("instanceReady", function(){
      this.document.on("keyup", function(){
        $(window).on("beforeunload", function(){
          return "You will lose the changes made in the editor.";
        });
      });
    });
  }); })(jQuery);', 'inline' );
}
if (in_array('proposal', $rows['opportunity']['areas'])) {
  drupal_add_js('(function ($) { $(document).ready(function() {
    CKEDITOR.replace( "proposalEditor", {
      customConfig: CKEDITOR_BASEPATH + "/custom/config.js"
    });
    var proposalEditor = CKEDITOR.instances["proposalEditor"];
    proposalEditor.on("instanceReady", function(){
      this.document.on("keyup", function(){
        $(window).on("beforeunload", function(){
          return "You will lose the changes made in the editor.";
        });
      });
    });
  }); })(jQuery);', 'inline' );
}
if (in_array('field1', $rows['opportunity']['areas'])) {
  drupal_add_js('(function ($) { $(document).ready(function() {
    CKEDITOR.replace( "field1Editor", {
      customConfig: CKEDITOR_BASEPATH + "/custom/config.js"
    });
    var field1Editor = CKEDITOR.instances["field1Editor"];
    field1Editor.on("instanceReady", function(){
      this.document.on("keyup", function(){
        $(window).on("beforeunload", function(){
          return "You will lose the changes made in the editor.";
        });
      });
    });
  }); })(jQuery);', 'inline' );
}
if (in_array('field2', $rows['opportunity']['areas'])) {
  drupal_add_js('(function ($) { $(document).ready(function() {
    CKEDITOR.replace( "field2Editor", {
      customConfig: CKEDITOR_BASEPATH + "/custom/config.js"
    });
    var field2Editor = CKEDITOR.instances["field2Editor"];
    field2Editor.on("instanceReady", function(){
      this.document.on("keyup", function(){
        $(window).on("beforeunload", function(){
          return "You will lose the changes made in the editor.";
        });
      });
    });
  }); })(jQuery);', 'inline' );
}
if (in_array('field3', $rows['opportunity']['areas'])) {
  drupal_add_js('(function ($) { $(document).ready(function() {
    CKEDITOR.replace( "field3Editor", {
      customConfig: CKEDITOR_BASEPATH + "/custom/config.js"
    });
    var field3Editor = CKEDITOR.instances["field3Editor"];
    field3Editor.on("instanceReady", function(){
      this.document.on("keyup", function(){
        $(window).on("beforeunload", function(){
          return "You will lose the changes made in the editor.";
        });
      });
    });
  }); })(jQuery);', 'inline' );
}
if (in_array('field4', $rows['opportunity']['areas'])) {
  drupal_add_js('(function ($) { $(document).ready(function() {
    CKEDITOR.replace( "field4Editor", {
      customConfig: CKEDITOR_BASEPATH + "/custom/config.js"
    });
    var field4Editor = CKEDITOR.instances["field4Editor"];
    field4Editor.on("instanceReady", function(){
      this.document.on("keyup", function(){
        $(window).on("beforeunload", function(){
          return "You will lose the changes made in the editor.";
        });
      });
    });
  }); })(jQuery);', 'inline' );
}
drupal_add_js(array('areas' => $rows['opportunity']['areas']), 'setting');
drupal_add_js(array('statement_length' => $rows['opportunity']['statement_length']), 'setting');
drupal_add_js(array('required' => $rows['opportunity']['required']), 'setting');
drupal_add_js(array('steps' =>  $rows['opportunity']['steps']), 'setting');
drupal_add_js(array('titles' =>  $rows['opportunity']['step_titles']), 'setting');
drupal_add_js(array('works' => array('max' => $rows['opportunity']['max_works'], 'min' => $rows['opportunity']['min_works'])), 'setting');
if (isset($rows['ap_artworks'])) {
    drupal_add_js(array('ap_artworks' => $rows['ap_artworks']), 'setting');
}
?>
