<?php
    drupal_add_css(drupal_get_path('module', 'mn_ap') . '/css/bootstrap.min.css');
    drupal_add_js(drupal_get_path('theme', 'mnartists') . '/scripts/jquery.icheck.min.js');
    drupal_add_css(drupal_get_path('theme', 'mnartists') . '/css/opportunity-node-form.css');
    drupal_add_js(drupal_get_path('module', 'mn_ap') . '/js/bootstrap.min.js');
    drupal_add_js(drupal_get_path('theme', 'mnartists') . '/scripts/opportunity-node-form.js');
    drupal_add_js(drupal_get_path('theme', 'mnartists') . '/scripts/javascript.js');
    $form['op_dates']['und'][0]['value']['date']['#description'] = '';
    $form['op_dates']['und'][0]['value2']['date']['#description'] = '';
    $form['field_op_custom_1']['und'][0]['value']['#title'] = '';
    $form['field_op_custom_2']['und'][0]['value']['#title'] = '';
    $form['field_op_custom_3']['und'][0]['value']['#title'] = '';
    $form['field_op_custom_4']['und'][0]['value']['#title'] = '';
    $form['field_op_custom_upload_1']['und'][0]['value']['#title'] = '';
    $form['field_op_custom_upload_2']['und'][0]['value']['#title'] = '';
    $form['field_op_custom_upload_3']['und'][0]['value']['#title'] = '';
    $form['field_op_custom_upload_4']['und'][0]['value']['#title'] = '';
    $form['field_op_uri']['und']['0']['title']['#title'] = 'Website Title';
    $form['field_op_uri']['und']['0']['value']['#title'] = 'Website';
    $form['field_op_uri']['und']['#title'] = '';
    //dpm($form);
?>
<div class="row">
    <div class="form-group">
        <?php print drupal_render($form['title']); ?>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <?php print drupal_render_children($form['op_short_description']); ?>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <?php print drupal_render_children($form['op_application_type']); ?>
    </div>
</div>

<div class="row">
    <div class="form-group body-margin">
        <?php print drupal_render_children($form['body']); ?>
    </div>
</div>

<div class="row row-margin-top">
    <div class="form-group">
        <label class="col-md-4 control-label">Open Date</label>
        <?php print drupal_render_children($form['op_dates']['und']['0']['value']); //start date ?>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label class="col-md-4 control-label">Close Date</label>
        <?php print drupal_render_children($form['op_dates']['und']['0']['value2']); //start date ?>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label class="col-md-4 control-label">Announce Date</label>
        <?php print drupal_render_children($form['field_announce_date']['und']['0']['value']); //start date ?>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <?php print drupal_render_children($form['op_cover_image']); ?>
    </div>
</div>
<div class="row row-margin-top">
    <div class="form-group">
        <?php print drupal_render_children($form['op_email']); ?>
    </div>
</div>
<div class="row row-margin-top">
    <div class="form-group">
        <?php print drupal_render_children($form['field_op_uri']); ?>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <?php print drupal_render_children($form['field_op_type']); ?>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <?php print drupal_render_children($form['og_group_ref']); ?>
    </div>
</div>
<br><br>
<div id="mn_ap" class="hidden">
    <div class="row">
        <div class="form-group textarea">
            <?php print drupal_render($form['op_guidelines']); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <?php print drupal_render_children($form['op_work_types']); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <?php print drupal_render_children($form['op_min_works']); ?>
        </div>
    </div>
        <div class="row">
        <div class="form-group">
            <?php print drupal_render_children($form['op_max_works']); ?>
        </div>
    </div>
    <div class="row row-margin-top">
        <div class="form-group form-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Application Sections</th>
                        <th>Required</th>
                        <th>Optional</th>
                        <th>Not Included</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Proposal</td>
                        <td><input type="radio" name="proposal" id="proposalReq" value=""></td>
                        <td><input type="radio" name="proposal" id="proposalOpt" value=""></td>
                        <td><input type="radio" name="proposal" id="proposalNon" checked value=""></td>
                    </tr>
                    <tr class="hidden" id="proposal">
                        <td colspan="4">
                            <div class="form-group"><?php print drupal_render($form['field_op_proposal_desc']['und'][0]['value']); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Statement</td>
                        <td><input type="radio" name="statement" id="statementReq" value=""></td>
                        <td><input type="radio" name="statement" id="statementOpt" value=""></td>
                        <td><input type="radio" name="statement" id="statementNon" checked value=""></td>
                    </tr>
                    <tr class="hidden" id="statement">
                        <td colspan="4">
                            <div class="form-group"><?php print drupal_render($form['field_op_statement_desc']['und'][0]['value']); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Bio</td>
                        <td><input type="radio" name="bio" id="bioReq" value=""></td>
                        <td><input type="radio" name="bio" id="bioOpt" value=""></td>
                        <td><input type="radio" name="bio" id="bioNon" checked value=""></td>
                    </tr>
                    <tr class="hidden" id="bio">
                        <td colspan="4">
                            <div class="form-group"><?php print drupal_render($form['field_op_bio_desc']['und'][0]['value']); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Resume</td>
                        <td><input type="radio" name="resume" id="resumeReq" value=""></td>
                        <td><input type="radio" name="resume" id="resumeOpt" value=""></td>
                        <td><input type="radio" name="resume" id="resumeNon" checked value=""></td>
                    </tr>
                    <tr class="hidden" id="resume">
                        <td colspan="4">
                            <div class="form-group"><?php print drupal_render($form['field_op_resume_desc']['und'][0]['value']); ?></div>
                        </td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>Additional Profile Fields</th>
                        <th>Required</th>
                        <th>Optional</th>
                        <th>Not Included</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Website</td>
                        <td><input type="radio" name="website" id="websiteReq" value=""></td>
                        <td><input type="radio" name="website" id="websiteOpt" value=""></td>
                        <td><input type="radio" name="website" id="websiteNon" checked value=""></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><input type="radio" name="gender" id="genderReq" value=""></td>
                        <td><input type="radio" name="gender" id="genderOpt" value=""></td>
                        <td><input type="radio" name="gender" id="genderNon" checked value=""></td>
                    </tr>
                    <tr>
                        <td>Ethnicity</td>
                        <td><input type="radio" name="ethnicity" id="ethnicityReq" value=""></td>
                        <td><input type="radio" name="ethnicity" id="ethnicityOpt" value=""></td>
                        <td><input type="radio" name="ethnicity" id="ethnicityNon" checked value=""></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><input type="radio" name="age" id="ageReq" value=""></td>
                        <td><input type="radio" name="age" id="ageOpt" value=""></td>
                        <td><input type="radio" name="age" id="ageNon" checked value=""></td>
                    </tr>
                    <tr>
                        <td>County</td>
                        <td><input type="radio" name="county" id="countyReq" value=""></td>
                        <td><input type="radio" name="county" id="countyOpt" value=""></td>
                        <td><input type="radio" name="county" id="countyNon" checked value=""></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><input type="radio" name="country" id="countryReq" value=""></td>
                        <td><input type="radio" name="country" id="countryOpt" value=""></td>
                        <td><input type="radio" name="country" id="countryNon" checked value=""></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row row-margin-top">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="panel-title">
                        <h4 class="panel-title">Add Custom Textarea Fields</h4>
                    </a>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Custom Textarea Titles</th>
                                <th>Required</th>
                                <th>Optional</th>
                                <th>Not Included</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="form-group"><?php print drupal_render($form['field_op_custom_1']['und'][0]['value']); ?></div></td>
                                <td><input type="radio" name="field1" id="field1Req" value=""></td>
                                <td><input type="radio" name="field1" id="field1Opt" value=""></td>
                                <td><input type="radio" name="field1" id="field1Non" checked value=""></td>
                            </tr>
                            <tr id="field1" class="hidden">
                                <td colspan="4">
                                    <div class="form-group"><?php print drupal_render($form['field_op_custom_desc_1']['und'][0]['value']); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td><div class="form-group"><?php print drupal_render($form['field_op_custom_2']['und'][0]['value']); ?></div></td>
                                <td><input type="radio" name="field2" id="field2Req" value=""></td>
                                <td><input type="radio" name="field2" id="field2Opt" value=""></td>
                                <td><input type="radio" name="field2" id="field2Non" checked value=""></td>
                            </tr>
                            <tr id="field2" class="hidden">
                                <td colspan="4">
                                    <div class="form-group"><?php print drupal_render($form['field_op_custom_desc_2']['und'][0]['value']); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td><div class="form-group"><?php print drupal_render($form['field_op_custom_3']['und'][0]['value']); ?></div></td>
                                <td><input type="radio" name="field3" id="field3Req" value=""></td>
                                <td><input type="radio" name="field3" id="field3Opt" value=""></td>
                                <td><input type="radio" name="field3" id="field3Non" checked value=""></td>
                            </tr>
                            <tr id="field3" class="hidden">
                                <td colspan="4">
                                    <div class="form-group"><?php print drupal_render($form['field_op_custom_desc_3']['und'][0]['value']); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td><div class="form-group"><?php print drupal_render($form['field_op_custom_4']['und'][0]['value']); ?></div></td>
                                <td><input type="radio" name="field4" id="field4Req" value=""></td>
                                <td><input type="radio" name="field4" id="field4Opt" value=""></td>
                                <td><input type="radio" name="field4" id="field4Non" checked value=""></td>
                            </tr>
                            <tr id="field4" class="hidden">
                                <td colspan="4">
                                    <div class="form-group"><?php print drupal_render($form['field_op_custom_desc_4']['und'][0]['value']); ?></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="panel-title">
                        <h4 class="panel-title">Add Custom Upload Fields</h4>
                    </a>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Custom Upload Titles</th>
                                <th>Required</th>
                                <th>Optional</th>
                                <th>Not Included</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="form-group"><?php print drupal_render($form['field_op_custom_upload_1']['und'][0]['value']); ?></div></td>
                                <td><input type="radio" name="upload1" id="upload1Req" value=""></td>
                                <td><input type="radio" name="upload1" id="upload1Opt" value=""></td>
                                <td><input type="radio" name="upload1" id="upload1Non" checked value=""></td>
                            </tr>
                            <tr id="upload1" class="hidden">
                                <td colspan="4">
                                    <div class="form-group"><?php print drupal_render($form['field_op_custom_up_desc_1']['und'][0]['value']); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td><div class="form-group"><?php print drupal_render($form['field_op_custom_upload_2']['und'][0]['value']); ?></div></td>
                                <td><input type="radio" name="upload2" id="upload2Req" value=""></td>
                                <td><input type="radio" name="upload2" id="upload2Opt" value=""></td>
                                <td><input type="radio" name="upload2" id="upload2Non" checked value=""></td>
                            </tr>
                            <tr id="upload2" class="hidden">
                                <td colspan="4">
                                    <div class="form-group"><?php print drupal_render($form['field_op_custom_up_desc_2']['und'][0]['value']); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td><div class="form-group"><?php print drupal_render($form['field_op_custom_upload_3']['und'][0]['value']); ?></div></td>
                                <td><input type="radio" name="upload3" id="upload3Req" value=""></td>
                                <td><input type="radio" name="upload3" id="upload3Opt" value=""></td>
                                <td><input type="radio" name="upload3" id="upload3Non" checked value=""></td>
                            </tr>
                            <tr id="upload3" class="hidden">
                                <td colspan="4">
                                    <div class="form-group"><?php print drupal_render($form['field_op_custom_up_desc_3']['und'][0]['value']); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td><div class="form-group"><?php print drupal_render($form['field_op_custom_upload_4']['und'][0]['value']); ?></div></td>
                                <td><input type="radio" name="upload4" id="upload4Req" value=""></td>
                                <td><input type="radio" name="upload4" id="upload4Opt" value=""></td>
                                <td><input type="radio" name="upload4" id="upload4Non" checked value=""></td>
                            </tr>
                            <tr id="upload4" class="hidden">
                                <td colspan="4">
                                    <div class="form-group"><?php print drupal_render($form['field_op_custom_up_desc_4']['und'][0]['value']); ?></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-margin-top">
        <div class="form-group textarea">
            <?php print drupal_render($form['field_op_juror_note']['und'][0]['value']); ?>
        </div>
    </div>
    <div class="hidden">
        <?php   print drupal_render_children($form['field_op_required']);
                print drupal_render_children($form['field_op_optional']); ?>
    </div>
</div>
<div class="row">
    <?php print drupal_render_children($form); ?>
</div>

