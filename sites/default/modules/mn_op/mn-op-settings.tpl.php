<?php
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
    drupal_add_css(drupal_get_path('module', 'mn_op') . '/css/mn-op.css');
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/styles.css');
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/jquery.selectBoxIt.css');
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/DT_bootstrap.css');

    drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/jquery.selectBoxIt.js');
    drupal_add_js(drupal_get_path('theme', 'mnartists') . '/scripts/jquery.icheck.min.js');
    drupal_add_js(drupal_get_path('module', 'mn_op') . '/js/op-settings.js');
    //dpm($rows); ?>
<div class="container" id="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $rows['opportunity']->title; ?>: Jury Settings</h1>
                </div>
            </div>
            <form role="form" action="<?php echo url('opportunity/'. $rows['opportunity']->nid .'/jury-settings', array()); ?>" method="POST">
                <input type="hidden" id="nid" name="nid" value="<?php echo $rows['opportunity']->vid; ?>">
                <input type="hidden" id="settings" name="settings" value="settings">
                <div class="form-group row">
                    <div class="form-type-select">
                        <div class="col-sm-3">
                            <label class="control-label">Star Rating Scale</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-select" name="scale" id="scale">
                                <option <?php echo $rows['settings']['scale'] == 1 ? 'selected' : ''; ?>>1</option>
                                <option <?php echo $rows['settings']['scale'] == 2 ? 'selected' : ''; ?>>2</option>
                                <option <?php echo $rows['settings']['scale'] == 3 ? 'selected' : ''; ?>>3</option>
                                <option <?php echo $rows['settings']['scale'] == 4 ? 'selected' : ''; ?>>4</option>
                                <option <?php echo $rows['settings']['scale'] == 5 ? 'selected' : ''; ?>>5</option>
                                <option <?php echo $rows['settings']['scale'] == 6 ? 'selected' : ''; ?>>6</option>
                                <option <?php echo $rows['settings']['scale'] == 7 ? 'selected' : ''; ?>>7</option>
                                <option <?php echo $rows['settings']['scale'] == 8 ? 'selected' : ''; ?>>8</option>
                                <option <?php echo $rows['settings']['scale'] == 9 ? 'selected' : ''; ?>>9</option>
                                <option <?php echo ($rows['settings']['scale'] == 10 || $rows['settings'] == 0) ? 'selected' : ''; ?>>10</option>
                                <option <?php echo $rows['settings']['scale'] == 11 ? 'selected' : ''; ?>>11</option>
                                <option <?php echo $rows['settings']['scale'] == 12 ? 'selected' : ''; ?>>12</option>
                                <option <?php echo $rows['settings']['scale'] == 13 ? 'selected' : ''; ?>>13</option>
                                <option <?php echo $rows['settings']['scale'] == 14 ? 'selected' : ''; ?>>14</option>
                                <option <?php echo $rows['settings']['scale'] == 15 ? 'selected' : ''; ?>>15</option>
                                <option <?php echo $rows['settings']['scale'] == 16 ? 'selected' : ''; ?>>16</option>
                                <option <?php echo $rows['settings']['scale'] == 17 ? 'selected' : ''; ?>>17</option>
                                <option <?php echo $rows['settings']['scale'] == 18 ? 'selected' : ''; ?>>18</option>
                                <option <?php echo $rows['settings']['scale'] == 19 ? 'selected' : ''; ?>>19</option>
                                <option <?php echo $rows['settings']['scale'] == 20 ? 'selected' : ''; ?>>20</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="note" class="control-label">Instructions for comment box.</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" name="note" id="note"><?php echo isset($rows['settings']['note']) ? $rows['settings']['note'] : ''; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label">Comments Required</label>
                        </div>
                        <div class="col-sm-3">
                            Yes  <input type="radio" name="note_required" value="1" <?php echo ($rows['settings']['note_required'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>>
                        </div>
                        <div class="col-sm-3">
                            No  <input type="radio" name="note_required" value="0" <?php echo $rows['settings']['note_required'] == '0' ? 'checked' : ''; ?>>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                    <table class="table op-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Visible to Jury</th>
                                <th>Hidden from Jury</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td><input type="radio" name="name" id="nameVis" value="1" <?php echo ($rows['settings']['name'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="name" id="nameHid" value="0" <?php echo $rows['settings']['name'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input type="radio" name="address" id="addressVis" value="1" <?php echo ($rows['settings']['address'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="address" id="addressHid" value="0" <?php echo $rows['settings']['address'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php if (in_array('county', $rows['areas'])) : ?>
                            <tr>
                                <td>County</td>
                                <td><input type="radio" name="county" id="countyVis" value="1" <?php echo ($rows['settings']['county'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="county" id="countyHid" value="0" <?php echo $rows['settings']['county'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php if (in_array('country', $rows['areas'])) : ?>
                            <tr>
                                <td>Country</td>
                                <td><input type="radio" name="country" id="countryVis" value="1" <?php echo ($rows['settings']['country'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="country" id="countryHid" value="0" <?php echo $rows['settings']['country'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php endif; ?>
                            <?php endif; ?>
                            <tr>
                                <td>Phone</td>
                                <td><input type="radio" name="phone" id="phoneVis" value="1" <?php echo ($rows['settings']['phone'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="phone" id="phoneHid" value="0" <?php echo $rows['settings']['phone'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="radio" name="email" id="emailVis" value="1" <?php echo ($rows['settings']['email'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="email" id="emailHid" value="0" <?php echo $rows['settings']['email'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php if (in_array('website', $rows['areas'])) : ?>
                            <tr>
                                <td>Website</td>
                                <td><input type="radio" name="website" id="websiteVis" value="1" <?php echo ($rows['settings']['website'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="website" id="websiteHid" value="0" <?php echo $rows['settings']['website'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php endif; ?>
                            <?php if (in_array('gender', $rows['areas'])) : ?>
                            <tr>
                                <td>Gender</td>
                                <td><input type="radio" name="gender" id="genderVis" value="1" <?php echo ($rows['settings']['gender'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="gender" id="genderHid" value="0" <?php echo $rows['settings']['website'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php endif; ?>
                            <?php if (in_array('ethnicity', $rows['areas'])) : ?>
                            <tr>
                                <td>Ethnicity</td>
                                <td><input type="radio" name="ethnicity" id="ethnicityVis" value="1" <?php echo ($rows['settings']['ethnicity'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="ethnicity" id="ethnicityHid" value="0" <?php echo $rows['settings']['ethnicity'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php endif; ?>
                            <?php if (in_array('age', $rows['areas'])) : ?>
                            <tr>
                                <td>Age</td>
                                <td><input type="radio" name="age" id="ageVis" value="1" <?php echo ($rows['settings']['age'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="age" id="ageHid" value="0" <?php echo $rows['settings']['age'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php endif; ?>
                            <?php if (in_array('statement', $rows['areas'])) : ?>
                            <tr>
                                <td>Statement</td>
                                <td><input type="radio" name="statement" id="statementVis" value="1" <?php echo ($rows['settings']['statement'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="statement" id="statementHid" value="0" <?php echo $rows['settings']['statement'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php endif; ?>
                            <?php if (in_array('proposal', $rows['areas'])) : ?>
                            <tr>
                                <td>Proposal</td>
                                <td><input type="radio" name="proposal" id="proposalVis" value="1" <?php echo ($rows['settings']['proposal'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="proposal" id="proposalHid" value="0" <?php echo $rows['settings']['proposal'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php endif; ?>
                            <?php if (in_array('bio', $rows['areas'])) : ?>
                            <tr>
                                <td>Bio</td>
                                <td><input type="radio" name="bio" id="bioVis" value="1" <?php echo ($rows['settings']['bio'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="bio" id="bioHid" value="0" <?php echo $rows['settings']['bio'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php endif; ?>
                            <?php if (in_array('resume', $rows['areas'])) : ?>
                            <tr>
                                <td>Resume</td>
                                <td><input type="radio" name="resume" id="resumeVis" value="1" <?php echo ($rows['settings']['resume'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="resume" id="resumeHid" value="0" <?php echo $rows['settings']['resume'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php endif; ?>
                            <?php sort($rows['areas']);
                            foreach($rows['areas'] as $area) : ?>
                            <tr>
                                <?php if(substr($area, 0, 5) == 'field') : ?>
                                    <td>
                                        <?php   $field = "field_op_custom_".substr($area, -1);
                                                $title =  $rows['opportunity']->$field;
                                                echo 'Field: ' . $title['und'][0]['value'];  ?>
                                    </td>
                                    <td><input type="radio" name="<?php echo $area; ?>" id="<?php echo $area; ?>Vis" value="1" <?php echo ($rows['settings'][$area] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                    <td><input type="radio" name="<?php echo $area; ?>" id="<?php echo $area; ?>Hid" value="0" <?php echo $rows['settings'][$area] == '0' ? 'checked' : ''; ?>></td>
                                <?php elseif (substr($area, 0, 6) == 'upload') : ?>
                                    <td>
                                        <?php   $field = 'field_op_custom_upload_' . substr($area, -1);
                                                $title =  $rows['opportunity']->$field;
                                                echo 'Upload: ' . $title['und'][0]['value'];  ?>
                                    </td>
                                    <td><input type="radio" name="<?php echo $area; ?>" id="<?php echo $area; ?>Vis" value="1" <?php echo ($rows['settings'][$area] == '1' || $rows['settings'] == 0)  ? 'checked' : ''; ?>></td>
                                    <td><input type="radio" name="<?php echo $area; ?>" id="<?php echo $area; ?>Hid" value="0" <?php echo $rows['settings'][$area] == '0' ? 'checked' : ''; ?>></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>

                            <?php if(isset($rows['opportunity']->op_work_types['und'])) : ?>
                            <tr>
                                <td>Artwork</td>
                                <td><input type="radio" name="artwork" id="artworkVis" value="1" <?php echo ($rows['settings']['artwork'] == '1' || $rows['settings'] == 0) ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="artwork" id="artworkHid" value="0" <?php echo $rows['settings']['artwork'] == '0' ? 'checked' : ''; ?>></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-type-select">
                        <div class="col-sm-3">
                            <label class="control-label">Jury Round</label>
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select" name="round" id="round">
                                <option <?php echo $rows['settings']['round'] == 1 ? 'selected' : ''; ?>>1</option>
                                <option <?php echo $rows['settings']['round'] == 2 ? 'selected' : ''; ?>>2</option>
                                <option <?php echo $rows['settings']['round'] == 3 ? 'selected' : ''; ?>>3</option>
                                <option <?php echo $rows['settings']['round'] == 4 ? 'selected' : ''; ?>>4</option>
                                <option <?php echo $rows['settings']['round'] == 5 ? 'selected' : ''; ?>>5</option>
                                <option <?php echo $rows['settings']['round'] == 6 ? 'selected' : ''; ?>>6</option>
                                <option <?php echo $rows['settings']['round'] == 7 ? 'selected' : ''; ?>>7</option>
                                <option <?php echo $rows['settings']['round'] == 8 ? 'selected' : ''; ?>>8</option>
                                <option <?php echo $rows['settings']['round'] == 9 ? 'selected' : ''; ?>>9</option>
                            </select>
                            <p class="help-block">First round shows all applicants. Later rounds only show applicants that you have selected as "In" the applicant pool.</p>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group pull-right">
                                <button class="btn ap-btn" type="submit" value="Submit">Submit</button>
                            </div>
                        </div>
                    </div>
            </form>
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                    <legend>Invite Jurors</legend>
                    <p>
                        Juror Area Link: <a href ="<?php echo url('opportunity/' . $rows['opportunity']->nid . '/submissions', array()); ?>">
                        <?php echo $rows['opportunity']->title; ?> - Submissions</a>
                    </p>
                    <p>
                        Enter the email addresses of jury members below, if the email address does not have an associated MnArtists account it will be
                        highlighted. Unregistered jurors must sign up for an MnArtists account with an email address listed below before they can review submissions.
                    </p>
                </div>
            </div>

            <form role="form" action="<?php echo url('opportunity/'. $rows['opportunity']->nid .'/jury-settings', array()); ?>" method="POST">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Juror Email</label>
                    <div class="col-sm-5">
                        <input type="hidden" id="node_id" name="node_id" value="<?php echo $rows['opportunity']->nid; ?>">
                        <input type="text" id="juror_email" class="form-control" name="juror_email" required>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn ap-btn" type="submit" value="Add">Add</button>
                    </div>
                </div>
            </form>
            <?php if(count($rows['jurors']) != 0) : ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table op-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows['jurors'] as $juror) : ?>
                            <tr <?php echo $juror->uid != 0 ? '' : 'class="danger"'; ?>>
                                <td><?php echo $juror->uid != 0 ? $juror->uid : 'N/A'; ?></td>
                                <td><?php echo $juror->name != '' ? $juror->name : 'Not Registered!'; ?></td>
                                <td><?php echo $juror->mail; ?></td>
                                <td>
                                    <form action="<?php echo url('opportunity/'. $rows['opportunity']->nid .'/jury-settings', array()); ?>" method="POST">
                                        <input type="hidden" id="node_id" name="node_id" value="<?php echo $rows['opportunity']->nid; ?>">
                                        <input type="hidden" id="remove" name="remove" value="remove">
                                        <input type="hidden" id="juror_email" name="juror_email" value="<?php echo $juror->mail; ?>">
                                        <button class="btn ap-btn" type="submit" value="Remove">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <a class="prev" href="<?php echo url('opportunities/', array()); ?>">Back to Opportunities</a>
                </div>
            </div>
        </div>
    </div>
</div>