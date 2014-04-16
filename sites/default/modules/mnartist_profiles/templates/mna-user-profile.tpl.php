<?php
    // template for rendering a user's or organization's profile
    $is_org = (isset($fieldset['field_organization_name']));
    $top_name = ($is_org) ? $fieldset['field_organization_name'][0]['value']['#markup'] : $top_name;
    $picture_uri = (!is_null($user->picture)) ? image_style_url('artist-profile-photo',$user->picture->uri) : '';
?>

<h1><?= $top_name ?></h1>
<?= flag_create_link('usercollections', arg(1)) ?>
<div class='user-profile'>
    <div class='user-profile-data'>
        <div class='left'>
            <div class='profile-image-wrapper'><img src='<?= $picture_uri ?>'></div>
        </div>
        <div class='right'>
            <?php if($is_org && isset($fieldset['field_organization_type'])) { ?>
                <div class='profile-org-type'>
                    <?= $fieldset['field_organization_type'][0]['value']['#title'] ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_address'])) { ?>
                <div class='profile-city-address'>
                    <?= $fieldset['field_address'][0]['value']['#markup'] ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_city']) && isset($fieldset['field_state'])) { ?>
                <div class='profile-city-state'>
                    <?= $fieldset['field_city'][0]['value']['#markup'] ?>, <?= $fieldset['field_state'][0]['value']['#markup'] ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_full_name'])) { ?>
                <div class='profile-full-name'>
                    <span class='profile-title'>Contact Name:</span> <?= $fs['field_first_name'][0]['#markup'] ?> <?= $fs['field_last_name'][0]['#markup'] ?>
                </div>
            <? } ?>
            <?php if(isset($fieldset['field_phone'])) { ?>
                <div class='profile-phone'>
                    <span class='profile-title'>Phone:</span> <?= $fieldset['field_phone'][0]['value']['#markup'] ?>
                </div>
            <? } ?>
            <?php if(isset($fieldset['field_public_email'])) { ?>
                <div class='profile-email'>
                    <span class='profile-title'>E-Mail:</span> <?= $fieldset['field_public_email'][0]['value']['#markup'] ?>
                </div>
            <? } else if(isset($fieldset['field_email'])) { ?>
                <div class='profile-email'>
                    <span class='profile-title'>E-Mail:</span> <?= $fieldset['field_email'][0]['value']['#markup'] ?>
                </div>
            <? } ?>
            <?php if(isset($fieldset['field_twitter']) || isset($fieldset['field_facebook'])) { ?>
                <div class='social-links'>
                    <?php if(isset($fieldset['field_twitter'])) { ?>
                        <div class='profile-twitter'>
                            <a class='twitter' href='http://www.twitter.com/<?= $fieldset['field_twitter'][0]['value']['#markup'] ?>'>
                                <?= $fieldset['field_twitter'][0]['value']['#markup'] ?>
                            </a>
                        </div>
                    <?php }
                    if(isset($fieldset['field_facebook'])) { ?>
                        <div class='profile-facebook'>
                            <a class='facebook' href='http://www.facebook.com/<?= $fieldset['field_facebook'][0]['value']['#markup'] ?>'>
                                <?= $fieldset['field_facebook'][0]['value']['#markup'] ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php }
                $all_roles = mnartist_profiles_get_artwork_roles_for_user($user->uid);
                if (!empty($all_roles)) { ?>
                <div class="roles"><?= implode(', ', $all_roles) ?></div>
            <? } ?>
        </div>
    </div>
</div>
<?php if (!$is_org) { ?>
    <div id='tabs'>
        <ul>
            <li><a href='#tabs-1'>About <?= $top_name ?></a></li>
            <?php
                $i = 1;
                if(isset($fieldset['field_awards'])) {
                    $i++;
                    $ia = $i; ?>
                    <li><a href='#tabs-<?= $i ?>'>Awards &amp; Exhibitions</a></li>
            <?php }
            if(isset($fieldset['field_galleries'])) {
                $i++;
                $ig = $i; ?>
                <li><a href='#tabs-<?= $i ?>'>Galleries Etc.</a></li>
            <?php } ?>
        </ul>
        <div id="tabs-1">
        <?php if(isset($fieldset['field_general_statement'])) { ?>
            <div class='wrap artist-statement'>
                <h5 class='profile-title'>Artist Statement</h5>
                <p><?= $fieldset['field_general_statement'][0]['value']['#markup'] ?></p></div>
        <?php }
        if(isset($fieldset['field_education'])) {
            $education_data = array();
            foreach($fieldset['field_education'] as $edu) {
                $fevalue = array_values($edu['value']['entity']['field_collection_item']);
                $fe = array_shift($fevalue);
                if(isset($fe['field_education_date_range']) && isset($fe['field_degree']) && isset($fe['field_school']) && isset($fe['field_areas_of_study'])) {
                    $education_data[] = $fe;
                }
            }
            if (!empty($education_data)) { ?>
                <div class='wrap education'>
                    <h5 class='profile-title'>Education</h5>
                    <?php foreach($education_data as $edu) {
                        if (!empty($fe['field_education_date_range']['#items'])) {
                            $entity = field_collection_item_load($edu['field_education_date_range']['#items'][0]['value']);
                            $instances = field_info_instances('field_collection_item', 'field_education_date_range');
                            $context_data = array();
                            foreach ($instances as $instance_field_name => $instance_field) {
                                $context_data[$instance_field_name] = array(
                                    'label' => $instances[$instance_field_name]['label'],
                                    'item' => (isset($entity->{$instance_field_name}['und'])) ? $entity->{$instance_field_name}['und'] : null
                                );
                            }
                            $start_year = $context_data['field_work_start_date']['item'][0]['from']['year'];
                            $end_year = $context_data['field_work_end_date']['item'][0]['from']['year'];
                            ?>
                            <p><?= $start_year ?> to <?= $end_year ?>  <?= $edu['field_degree'][0]['#markup'] ?>, <?= $edu['field_areas_of_study'][0]['#markup'] ?>, <?= $edu['field_school'][0]['#markup'] ?></p>
                    <?php }
                    } ?>
                </div>
            <?php }
            }
            if(isset($fieldset['field_bio']) || isset($fieldset['field_country'])) { ?>
                <div class='wrap biography'>
                    <h5 class='profile-title'>Biography</h5>
                    <?php if(isset($fieldset['field_bio'])) { ?>
                        <p><?= $fieldset['field_bio'][0]['value']['#markup'] ?></p>
                    <?php }
                    if(isset($fieldset['field_country'])) { ?>
                        <div class='field_country'>
                            <div class='profile-label'>Country</div>
                            <p><?= $fieldset['field_country'][0]['value']['#markup'] ?></p>
                        </div>
                    <?php }
                    if(isset($fieldset['field_birthplace'])) { ?>
                        <div class='field_birthplace'>
                            <div class='profile-label'>Birthplace</div>
                            <p><?= $fieldset['field_birthplace'][0]['value']['#markup'] ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <?php if(isset($fieldset['field_awards'])) { ?>
            <div id='tabs-<?= $ia ?>'>
                <?php foreach($fieldset['field_awards'] as $award1) {
                    $awardkey = array_values($award1['value']['entity']['field_collection_item']);
                    $award = array_shift($awardkey);
                    ?>
                    <?= (isset($award['field_award_year'])) ? $award['field_award_year']['#items'][0]['from']['year'] . ' ' : '' ?>
                    <?= (isset($award['field_award_name'])) ? $award['field_award_name'][0]['#markup'] : '' ?>
                    <?= (isset($award['field_award_organization'])) ? ' ' . $award['field_award_organization'][0]['#markup'] . '<br />' . PHP_EOL : '' ?>
                <?php } ?>
            </div>
        <?php }
        if(isset($fieldset['field_galleries'])) { ?>
            <div id='tabs-<?= $ig ?>'>
                <?php foreach($fieldset['field_galleries'] as $gal) {
                    $galkey = array_values($gal['value']['entity']['field_collection_item']);
                    $gallery = array_shift($galkey); ?>
                    <?= $gallery['field_gallery_name'][0]['#markup'] ?>, <?= $gallery['field_contact_name'][0]['#markup'] ?><br />
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div id='tabs'>
        <ul>
            <li><a href='#tabs-1'>About <?= $top_name ?></a></li>
        </ul>
    </div>
    <div id="tabs-1">
    <?php if(isset($fieldset['field_description'])) { ?>
        <div class='wrap org-statement'>
            <h5 class='profile-title'>Organization Description/Mission</h5>
            <p><?= $fieldset['field_description'][0]['value']['#markup'] ?></p></div>
        </div>
    <?php }
} ?>

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" />
<script>
jQuery(function() {
    jQuery("#tabs").tabs();
});
</script>