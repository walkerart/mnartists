<?php
    global $user, $base_url;

    // add follow-menu js
    ctools_add_js('follow-menu', 'artist_community');

    // template for rendering a user's or organization's profile
    $is_org = (isset($fieldset['field_organization_name']));
    $top_name = mnartist_profiles_collective_or_fullname_or_username($context_user->uid);
    $working_uri = (!is_null($context_user->picture)) ? $context_user->picture->uri : variable_get('user_picture_default');
    $picture_uri = image_style_url('artist-profile-photo', $working_uri);

    $profile_type_display = 'User';
    if (isset($context_user->roles[ARTIST_ROLE])) {
        $profile_type_display = 'Artist';
    } else if (isset($context_user->roles[ORG_ROLE])) {
        $profile_type_display = 'Org';
    }

    $is_flagged = FALSE;
    $context_user_flag = flag_get_flag('usercollections');
    if ($context_user_flag && $context_user_flag->is_flagged($context_user->uid)) {
        $is_flagged = TRUE;
    }
?>
<h2 class="pane-title block-title"><?php print  $profile_type_display ?></h2>
<h1><?php print  $top_name ?></h1>
<?php if(user_is_logged_in()) { ?>
    <div class="pane-mnartist-collections-mna-collections-star">
        <ul class="menu follow-menu<?php if ($is_flagged) { ?> collected<?php } ?>">
            <li class="first">
                <a class='star-link'><img src='/<?php print  drupal_get_path('theme', 'mnartists') ?>/images/fav-star.svg' class='star-icon' alt="flag this" /></a>
                <ul>
                    <li class='follow-this'><?php print  flag_create_link('usercollections', $context_user->uid) ?></li>
                    <hr>
                    <li class='share-this collect-title'>SHARE VIA:</li>
                    <li class='share-this'><a href='#' onclick='window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent("<?php print  "$base_url/".current_path() ?>"), "facebook-share-dialog", "width=626,height=436"); return false;'>FACEBOOK</a></li>
                    <li class='share-this'><a href='#' onclick='window.open("https://twitter.com/share?url=" + encodeURIComponent("<?php print  "$base_url/".current_path() ?>"), "twitter-share-dialog", "width=626,height=436"); return false;'>TWITTER</a></li>
                </ul>
            </li>
        </ul>
    </div>
<?php } ?>

<div class='user-profile'>
    <div class='user-profile-data'>
        <div class='left'>
            <div class='profile-image-wrapper'><img src='<?php print  $picture_uri ?>'></div>
        </div>
        <div class='right'>
            <?php if($is_org && isset($fieldset['field_organization_type'])) { ?>
                <div class='profile-org-type'>
                    <?php print  $fieldset['field_organization_type'][0]['value']['#title'] ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_address'])) { ?>
                <div class='profile-city-address'>
                    <?php print  $fieldset['field_address'][0]['value']['#markup'] ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_city']) && isset($fieldset['field_state'])) { ?>
                <div class='profile-city-state'>
                    <?php print  $fieldset['field_city'][0]['value']['#markup'] ?>, <?php print  $fieldset['field_state'][0]['value']['#markup'] ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_county'])) { ?>
                <div class='profile-county'>
                    <span class='profile-title'>County:</span> <?php print  $fieldset['field_county'][0]['value']['#markup'] ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_full_name'])) { ?>
                <div class='profile-full-name'>
                    <span class='profile-title'>Contact Name:</span> <?php print  (isset($fs['field_first_name'])) ? $fs['field_first_name'][0]['#markup'] : '' ?> <?php print  ($fs['field_last_name']) ? $fs['field_last_name'][0]['#markup'] : '' ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_phone'])) { ?>
                <div class='profile-phone'>
                    <span class='profile-title'>Phone:</span> <?php print  $fieldset['field_phone'][0]['value']['#markup'] ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_public_email'])) { ?>
                <div class='profile-email'>
                    <span class='profile-title'>E-Mail:</span> <?php print  $fieldset['field_public_email'][0]['value']['#markup'] ?>
                </div>
            <?php } else if(isset($fieldset['field_email'])) { ?>
                <div class='profile-email'>
                    <span class='profile-title'>E-Mail:</span> <?php print  $fieldset['field_email'][0]['value']['#markup'] ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_websites'])) { ?>
                <div class='profile-websites'>
                    <span class='profile-title'>Websites:</span>
                    <?php
                        $websites_display = array();
                        foreach ($fieldset['field_websites'] as $website) {
                            if (preg_match('#https?://#', $website['value']['#href']) === 0) {
                                $website['value']['#href'] = 'http://' . $website['value']['#href'];
                            }
                            $websites_display[] = '<a href="'.$website['value']['#href'].'" target="_blank">'.$website['value']['#title'].'</a>';

                        }
                    ?>
                    <?php print  implode(', ', $websites_display) ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_twitter']) || isset($fieldset['field_facebook'])) { ?>
                <div class='social-links'>
                    <?php if(isset($fieldset['field_twitter'])) { ?>
                        <div class='profile-twitter'>
                            <a class='twitter' href='http://www.twitter.com/<?php print  $fieldset['field_twitter'][0]['value']['#markup'] ?>'>
                                <?php print  $fieldset['field_twitter'][0]['value']['#markup'] ?>
                            </a>
                        </div>
                    <?php }
                    if(isset($fieldset['field_facebook'])) { ?>
                        <div class='profile-facebook'>
                            <a class='facebook' href='http://www.facebook.com/<?php print  $fieldset['field_facebook'][0]['value']['#markup'] ?>'>
                                <?php print  $fieldset['field_facebook'][0]['value']['#markup'] ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php }
                $all_roles = mnartist_profiles_get_artwork_roles_for_user($context_user->uid);
                if (!empty($all_roles)) { ?>
                <div class="roles"><?php print  implode(', ', $all_roles) ?></div>
            <?php } ?>
            <?php if ($user->uid === $context_user->uid || in_array('administrator', $user->roles)) { ?>
                <div class="edit-button">
                    <a href="/user/<?php print  $context_user->uid ?>/edit">Edit</a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php if (!$is_org) { ?>
    <div id='tabs'>
        <ul>
            <li><a href='#tabs-1'>About <?php print  $top_name ?></a></li>
            <?php
                $i = 1;
                if(isset($fieldset['field_education']) || isset($fieldset['field_work_experience'])
                 || isset($fieldset['field_teaching_experience']) || isset($fieldset['field_exhibition_and_performance']) ) {
                    $i++;
                    $iexperience = $i; ?>
                    <li><a href='#tabs-<?php print  $i ?>'>Experience</a></li>
            <?php }
                if(isset($fieldset['field_galleries']) || isset($fieldset['field_collections']) || isset($fieldset['field_related_organizations'])) {
                    $i++;
                    $iassociation = $i; ?>
                    <li><a href='#tabs-<?php print  $i ?>'>Associations</a></li>
            <?php }
                if(isset($fieldset['field_publications'])) {
                    $i++;
                    $ipresspub = $i; ?>
                    <li><a href='#tabs-<?php print  $i ?>'>Press</a></li>
            <?php } ?>
        </ul>
        <div id="tabs-1">
            <?php if(isset($fieldset['field_bio']) || isset($fieldset['field_country'])) { ?>
                <div class='wrap biography'>
                    <h5 class='profile-title'>Biography</h5>
                    <?php if(isset($fieldset['field_bio'])) { ?>
                        <p><?php print  $fieldset['field_bio'][0]['value']['#markup'] ?></p>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if(isset($fieldset['field_general_statement'])) {  ?>
                <div class='wrap artist-statement'>
                    <h5 class='profile-title'>Artist Statement</h5>
                    <p><?php print  $fieldset['field_general_statement'][0]['value']['#markup'] ?></p>
                </div>
            <?php } ?>
            <?php 
                foreach($fieldset['field_awards'] as $award) {
                    print '<p>' . render($award['value']) . '</p>';
                    break;
                } 
            ?>
            <h5 class='profile-title'>Info</h5>
            <div class='info_container'>
                <?php if(isset($fieldset['field_country'])) { ?>
                    <div class='info_block'>
                        <div class='profile-label'>COUNTRY OF CITIZENSHIP</div>
                        <?php if(isset($fieldset['field_country'])) {
                            print '<p>' . render($fieldset['field_country']) . '</p>';
                        } ?>
                    </div>
                <?php } ?>
                <?php if(isset($fieldset['field_city']) || isset($fieldset['field_state'])) { ?>
                    <div class='info_block'>
                        <div class='profile-label'>ACTIVE PLACE</div>
                        <?php
                            if(isset($fieldset['field_city']) && isset($fieldset['field_state'])) {
                                print '<p>' . render($fieldset['field_city']) . ', ' . render($fieldset['field_state']) . '</p>';
                            } else if(isset($fieldset['field_city'])) {
                                print '<p>' . render($fieldset['field_city']) . '</p>';
                            } else {
                                print '<p>' . render($fieldset['field_state']) . '</p>';
                            }
                        ?>
                    </div>
                <?php } ?>
                <?php if(isset($fieldset['field_birthplace'])) { ?>
                    <div class='info_block'>
                        <div class='profile-label'>BIRTHPLACE</div>
                        <?php if(isset($fieldset['field_birthplace'])) {
                            print '<p>' . render($fieldset['field_birthplace']) . '</p>';
                        } ?>
                    </div>
                <?php } ?>
                <?php if(isset($fieldset['field_county'])) { ?>
                    <div class='info_block'>
                        <div class='profile-label'>COUNTY</div>
                        <?php if(isset($fieldset['field_county'])) {
                            print '<p>' . render($fieldset['field_county']) . '</p>';
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        
        <?php if(isset($fieldset['field_education']) || isset($fieldset['field_work_experience'])
                 || isset($fieldset['field_teaching_experience']) || isset($fieldset['field_exhibition_and_performance']) ) {
            // Experience Tab
            ?>
            <div id='tabs-<?php print  $iexperience ?>'>
                <p><?php print  $fieldset['field_exhibition_and_performance'][0]['value'] ?></p>
                <p><?php print  $fieldset['field_work_experience'][0]['value'] ?></p>
                <p><?php print  $fieldset['field_teaching_experience'][0]['value'] ?></p>
                <div class='wrap education'>
                    <p><?php print  $fieldset['field_education'][0]['value'] ?></p>
                </div>
            </div>
        <?php } ?>

        
        <?php if(isset($fieldset['field_galleries']) || isset($fieldset['field_collections']) || isset($fieldset['field_related_organizations'])) {
            // Associations Tab
            ?>
            <div id='tabs-<?php print  $iassociation ?>'>
                <?php
                    foreach($fieldset['field_galleries'] as $gal) {
                        print '<p>' . render($gal['value']) . '</p>';
                    }
                    foreach($fieldset['field_collections'] as $col) {
                        print '<p>' . render($col['value']) . '</p>';
                    }
                    foreach($fieldset['field_related_organizations'] as $org) {
                        print '<p>' . render($org['value']) . '</p>';
                        break;
                    }
                ?>
            </div>
        <?php } ?>
        
        <?php if(isset($fieldset['field_publications'])) {
            // Press/Publications Tab
            ?>
            <div id='tabs-<?php print  $ipresspub ?>'>
                <div class='field_resume'>
                    <p><?php
                        foreach($fieldset['field_publications'] as $pub) {
                            print '<p>' . render($pub['value']) . '</p>';
                        }
                        ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div id='tabs'>
        <ul>
            <li><a href='#tabs-1'>About <?php print  $top_name ?></a></li>
        </ul>
        <div id="tabs-1">
            <?php if(isset($fieldset['field_description'])) { ?>
                <div class='wrap org-statement'>
                    <h5 class='profile-title'>Organization Description/Mission</h5>
                    <p><?php print  $fieldset['field_description'][0]['value']['#markup'] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" />
<script>
jQuery(function() {
    jQuery("#tabs").tabs();
});
</script>




