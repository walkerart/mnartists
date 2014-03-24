<div class="container">

    <?php if (!empty($resume_data['field_general_statement']['item'])) { ?>
        <section class="resume-block resume-block-simple general-statement">
            <h2><?= $resume_data['field_general_statement']['label'] ?></h2>
            <?= $resume_data['field_general_statement']['item'][0]['value'] ?>
        </section>
    <?php } ?>

    <?php if (!empty($resume_data['field_biography']['item'])) { ?>
        <section class="resume-block resume-block-simple biography">
            <h2><?= $resume_data['field_biography']['label'] ?></h2>
            <?= $resume_data['field_biography']['item'][0]['value'] ?>
        </section>
    <?php } ?>

    <?php if (!empty($resume_data['field_education']['item'])) { ?>
        <section class="resume-block resume-block-complex education">
            <h2><?= $resume_data['field_education']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_education']['item'] as $field) { ?>
                    <div class="education-block">
                        <p><label><?= $field['field_school']['label'] ?></label><?=$field['field_school']['item'][0]['value']?></p>
                        <?php if (!empty($field['field_institution_url']['item'])) { ?>
                            <p><label><?= $field['field_institution_url']['label'] ?></label><?=$field['field_institution_url']['item'][0]['value']?></p>
                        <?php } ?>
                        <?php if (!empty($field['field_degree']['item'])) { ?>
                            <p><label><?=$field['field_degree']['label']?></label><?=$field['field_degree']['item'][0]['value']?></p>
                        <?php } ?>
                        <?php
                            if ($field['field_education_date_range']['item'] !== null) { ?>
                                <?
                                $entity = field_collection_item_load($field['field_education_date_range']['item'][0]['value']);
                                $instances = field_info_instances('field_collection_item', 'field_education_date_range');
                                $context_data = array();
                                foreach ($instances as $instance_field_name => $instance_field) {
                                    $context_data[$instance_field_name] = array(
                                        'label' => $instances[$instance_field_name]['label'],
                                        'item' => (isset($entity->{$instance_field_name}['und'])) ? $entity->{$instance_field_name}['und'] : null
                                    );
                                }
                                if (isset($context_data['field_work_start_date']['item']) &&
                                        !is_null($context_data['field_work_start_date']['item'])) {

                                        $start_date = $context_data['field_work_start_date']['item'][0]['from'];
                                        $start_date_string_arr = array();
                                        if (!is_null($start_date['month'])) { $start_date_string_arr[] = $start_date['month']; }
                                        if (!is_null($start_date['year'])) { $start_date_string_arr[] = $start_date['year']; }
                                        $start_date_string = implode('/', $start_date_string_arr);

                                        if ($context_data['field_current_position']['item'][0]['value'] === '1') {
                                            $end_date_string = 'present';
                                        } else {
                                            $end_date = $context_data['field_work_end_date']['item'][0]['from'];
                                            $end_date_string_arr = array();
                                            if (!is_null($end_date['month'])) { $end_date_string_arr[] = $end_date['month']; }
                                            if (!is_null($end_date['year'])) { $end_date_string_arr[] = $end_date['year']; }
                                            $end_date_string = implode('/', $end_date_string_arr);
                                        }
                                    ?>
                                        <label><?=$field['field_education_date_range']['label']?></label>
                                        <?= $start_date_string ?> &ndash; <?= $end_date_string ?>
                                <?php }
                            }
                        ?>
                        <?php if (!empty($field['field_areas_of_study']['item'])) { ?>
                            <p>
                                <label><?=$field['field_areas_of_study']['label']?></label><ul>
                                <?php
                                    if (isset($field['field_areas_of_study']['item']) &&
                                        !(empty($field['field_areas_of_study']['item']))) {
                                        foreach ($field['field_areas_of_study']['item'] as $inner_field) {?>
                                            <li><?=$inner_field['value']?></li>
                                    <?}}
                                ?>
                            </ul></p>
                        <?php } ?>
                    </div>
                <?php } ?>
        </section>
    <?php } ?>
    <?php if (!empty($resume_data['field_work_experience']['item'])) { ?>
        <section class="resume-block resume-block-complex work-experience">
            <h2><?= $resume_data['field_work_experience']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_work_experience']['item'] as $field) {?>
                    <div class="experience-block">
                        <p><label><?=$field['field_employer']['label']?></label><?=$field['field_employer']['item'][0]['value']?></p>
                        <?php if (!empty($resume_data['field_position']['item'])) { ?>
                            <p><label><?=$field['field_position']['label']?></label><?=$field['field_position']['item'][0]['value']?></p>
                        <?php } ?>
                        <p>
                            <?php
                                $entity = field_collection_item_load($field['field_work_date_range']['item'][0]['value']);
                                $instances = field_info_instances('field_collection_item', 'field_work_date_range');
                                $context_data = array();
                                foreach ($instances as $instance_field_name => $instance_field) {
                                    $context_data[$instance_field_name] = array(
                                        'label' => $instances[$instance_field_name]['label'],
                                        'item' => (isset($entity->{$instance_field_name}['und'])) ? $entity->{$instance_field_name}['und'] : null
                                    );
                                }
                                if (isset($context_data['field_work_start_date']['item']) &&
                                    !is_null($context_data['field_work_start_date']['item'])) {

                                    $start_date = $context_data['field_work_start_date']['item'][0]['from'];
                                    $start_date_string_arr = array();
                                    if (!is_null($start_date['month'])) { $start_date_string_arr[] = $start_date['month']; }
                                    if (!is_null($start_date['year'])) { $start_date_string_arr[] = $start_date['year']; }
                                    $start_date_string = implode('/', $start_date_string_arr);

                                    if ($context_data['field_current_position']['item'][0]['value'] === '1') {
                                        $end_date_string = 'present';
                                    } else {
                                        $end_date = $context_data['field_work_end_date']['item'][0]['from'];
                                        $end_date_string_arr = array();
                                        if (!is_null($end_date['month'])) { $end_date_string_arr[] = $end_date['month']; }
                                        if (!is_null($end_date['year'])) { $end_date_string_arr[] = $end_date['year']; }
                                        $end_date_string = implode('/', $end_date_string_arr);
                                    }
                                ?>
                                    <label><?=$field['field_work_date_range']['label']?></label>
                                    <?= $start_date_string ?> &ndash; <?= $end_date_string ?>
                            <?php } ?>
                        </p>
                        <?php if (!empty($field['field_description_of_position']['item'])) { ?>
                            <p><label><?=$field['field_description_of_position']['label']?></label><?=$field['field_description_of_position']['item'][0]['value']?></p>
                        <?php } ?>
                        <?php if (!empty($field['field_url']['item'])) { ?>
                            <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                        <?php } ?>
                    </div>
                <?}
            ?>
        </section>
    <?php } ?>

    <?php if (!empty($resume_data['field_teaching_experience']['item'])) { ?>
        <section class="resume-block resume-block-complex teaching-experience">
            <h2><?= $resume_data['field_teaching_experience']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_teaching_experience']['item'] as $field) { ?>
                    <div class="experience-block">
                        <p><label><?=$field['field__teaching_venue']['label']?></label><?=$field['field__teaching_venue']['item'][0]['value']?></p>
                        <?php if(!empty($field['field_course']['item'])) { ?>
                            <p><label><?=$field['field_course']['label']?></label><?=$field['field_course']['item'][0]['value']?></p>
                        <?php } ?>
                        <?php if(!empty($field['field_work_date_range']['item'])) { ?>
                            <p>
                                <?php
                                    $entity = field_collection_item_load($field['field_work_date_range']['item'][0]['value']);
                                    $instances = field_info_instances('field_collection_item', 'field_work_date_range');
                                    $context_data = array();
                                    foreach ($instances as $instance_field_name => $instance_field) {
                                        $context_data[$instance_field_name] = array(
                                            'label' => $instances[$instance_field_name]['label'],
                                            'item' => (isset($entity->{$instance_field_name}['und'])) ? $entity->{$instance_field_name}['und'] : null
                                        );
                                    }
                                    if (isset($context_data['field_work_start_date']['item']) &&
                                        !is_null($context_data['field_work_start_date']['item'])) {

                                        $start_date = $context_data['field_work_start_date']['item'][0]['from'];
                                        $start_date_string_arr = array();
                                        if (!is_null($start_date['month'])) { $start_date_string_arr[] = $start_date['month']; }
                                        if (!is_null($start_date['year'])) { $start_date_string_arr[] = $start_date['year']; }
                                        $start_date_string = implode('/', $start_date_string_arr);

                                        if ($context_data['field_current_position']['item'][0]['value'] === '1') {
                                            $end_date_string = 'present';
                                        } else {
                                            $end_date = $context_data['field_work_end_date']['item'][0]['from'];
                                            $end_date_string_arr = array();
                                            if (!is_null($end_date['month'])) { $end_date_string_arr[] = $end_date['month']; }
                                            if (!is_null($end_date['year'])) { $end_date_string_arr[] = $end_date['year']; }
                                            $end_date_string = implode('/', $end_date_string_arr);
                                        }
                                    ?>
                                        <label><?=$field['field_work_date_range']['label']?></label>
                                        <?= $start_date_string ?> &ndash; <?= $end_date_string ?>
                                <?php } ?>
                            </p>
                        <?php } ?>
                        <?php if(!empty($field['field_url']['item'])) { ?>
                            <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                        <?php } ?>
                        <?php if(!empty($field['field_description_of_position']['item'])) { ?>
                            <p><label><?=$field['field_description_of_position']['label']?></label><?=$field['field_description_of_position']['item'][0]['value']?></p>
                        <?php } ?>
                        <?php if(!empty($field['field_position']['item'])) { ?>
                            <p><label><?=$field['field_position']['label']?></label><?=$field['field_position']['item'][0]['value']?></p>
                        <?php } ?>
                    </div>
                <?}
            ?>
        </section>
    <?php } ?>

    <?php if (!empty($resume_data['field_awards']['item'])) { ?>
        <section class="resume-block resume-block-complex awards">
            <h2><?= $resume_data['field_awards']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_awards']['item'] as $field) {
                    if (!empty($field)) { ?>
                        <div class="award-block">
                            <p><label><?=$field['field_award_name']['label']?></label><?=$field['field_award_name']['item'][0]['value']?></p>
                            <?php if(!empty($field['field_description']['item'])) { ?>
                                <p><label><?=$field['field_description']['label']?></label><?=$field['field_description']['item'][0]['value']?></p>
                            <?php } ?>
                            <?php if(!empty($field['field_award_year']['item'])) { ?>
                                <p><label><?=$field['field_award_year']['label']?></label><?=date_format(new DateTime($field['field_award_year']['item'][0]['timestamp']), 'Y')?></p>
                            <?php } ?>
                            <?php if(!empty($field['field_award_organization']['item'])) { ?>
                                <p><label><?=$field['field_award_organization']['label']?></label><?=$field['field_award_organization']['item'][0]['value']?></p>
                            <?php } ?>
                            <?php if(!empty($field['field_url']['item'])) { ?>
                                <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                            <?php } ?>
                        </div>
                    <?php }
                }
            ?>
        </section>
    <?php } ?>

    <?php if (!empty($resume_data['field_exhibition_and_performance']['item'])) { ?>
        <section class="resume-block resume-block-complex exhibition-and-performance">
            <h2><?= $resume_data['field_exhibition_and_performance']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_exhibition_and_performance']['item'] as $field) {
                    if (!empty($field)) { ?>
                        <div class="exhibition-block">
                            <p><label><?=$field['field_title']['label']?></label><?=$field['field_title']['item'][0]['value']?></p>
                            <?php if(!empty($field['field_description']['item'])) { ?>
                                <p><label><?=$field['field_description']['label']?></label><?=$field['field_description']['item'][0]['value']?></p>
                            <?php } ?>
                            <?php if(!empty($field['field_url']['item'])) { ?>
                                <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                            <?php } ?>
                            <?php if(!empty($field['field_venue_url']['item'])) { ?>
                                <p><label><?=$field['field_venue_url']['label']?></label><?=$field['field_venue_url']['item'][0]['value']?></p>
                            <?php } ?>
                            <?php if(!empty($field['field_exhibition_date']['item'])) { ?>
                                <p>
                                    <label><?=$field['field_exhibition_date']['label']?></label>
                                    <?php
                                        $date_string_arr = array();
                                        if (!is_null($field['field_exhibition_date']['item'][0]['from']['day'])) {
                                            $date_string_arr[] = $field['field_exhibition_date']['item'][0]['from']['day'];
                                        }
                                        if (!is_null($field['field_exhibition_date']['item'][0]['from']['month'])) {
                                            $date_string_arr[] = $field['field_exhibition_date']['item'][0]['from']['month'];
                                        }
                                        if (!is_null($field['field_exhibition_date']['item'][0]['from']['year'])) {
                                            $date_string_arr[] = $field['field_exhibition_date']['item'][0]['from']['year'];
                                        }
                                    ?>
                                    <?= implode('/', $date_string_arr) ?>
                                </p>
                            <?php } ?>
                            <?php if(!empty($field['field_group_individual']['item'])) { ?>
                                <p><label><?=$field['field_group_individual']['label']?></label><?=$field['field_group_individual']['item'][0]['value']?></p>
                            <?php } ?>
                        </div>
                    <?php }
                }
            ?>
        </section>
    <?php } ?>

    <?php if (!empty($resume_data['field_publications']['item'])) { ?>
        <section class="resume-block resume-block-complex publications">
            <h2><?= $resume_data['field_publications']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_publications']['item'] as $field) {
                    if (!empty($field)) { ?>
                        <div class="publication-block">
                            <p><label><?=$field['field_publication_title']['label']?></label><?=$field['field_publication_title']['item'][0]['value']?></p>
                            <?php if(!empty($field['field_url']['item'])) { ?>
                                <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                            <?php } ?>
                            <?php if(!empty($field['field_author_editor']['item'])) { ?>
                                <p><label><?=$field['field_author_editor']['label']?></label><?=$field['field_author_editor']['item'][0]['value']?></p>
                            <?php } ?>
                            <?php if(!empty($field['field_publication_date']['item'])) { ?>
                                <p>
                                    <label><?=$field['field_publication_date']['label']?></label>
                                    <?php
                                        $date_string_arr = array();
                                        if (!is_null($field['field_publication_date']['item'][0]['from']['day'])) {
                                            $date_string_arr[] = $field['field_publication_date']['item'][0]['from']['day'];
                                        }
                                        if (!is_null($field['field_publication_date']['item'][0]['from']['month'])) {
                                            $date_string_arr[] = $field['field_publication_date']['item'][0]['from']['month'];
                                        }
                                        if (!is_null($field['field_publication_date']['item'][0]['from']['year'])) {
                                            $date_string_arr[] = $field['field_publication_date']['item'][0]['from']['year'];
                                        }
                                    ?>
                                    <?= implode('/', $date_string_arr) ?>
                                </p>
                            <?php } ?>
                            <?php if(!empty($field['field_description']['item'])) { ?>
                                <p><label><?=$field['field_description']['label']?></label><?=$field['field_description']['item'][0]['value']?></p>
                            <?php } ?>
                        </div>
                    <?php }
                } ?>
        </section>
    <?php } ?>

    <?php if (!empty($resume_data['field_galleries']['item'])) { ?>
        <section class="resume-block resume-block-complex galleries">
            <h2><?= $resume_data['field_galleries']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_galleries']['item'] as $field) {
                    if (!empty($field)) { ?>
                    <div class="gallery-block">
                        <p><label><?=$field['field_gallery_name']['label']?></label><?=$field['field_gallery_name']['item'][0]['value']?></p>
                        <?php if(!empty($field['field_contact_name']['item'])) { ?>
                          <p><label><?=$field['field_contact_name']['label']?></label><?=$field['field_contact_name']['item'][0]['value']?></p>
                        <?php } ?>
                        <?php if(!empty($field['field_url']['item'])) { ?>
                            <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                        <?php } ?>
                    </div>
                <?php }
            } ?>
        </section>
    <?php } ?>

    <?php if (!empty($resume_data['field_collections']['item'])) { ?>
        <section class="resume-block resume-block-complex collections">
            <h2><?= $resume_data['field_collections']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_collections']['item'] as $field) {
                    if (!empty($field)) { ?>
                        <div class="collection-block">
                            <p><label><?=$field['field_collection_name']['label']?></label><?=$field['field_collection_name']['item'][0]['value']?></p>
                            <?php if(!empty($field['field_url']['item'])) { ?>
                                <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                            <?php } ?>
                        </div>
                <?php }
            } ?>
        </section>
    <?php } ?>

    <?php if (!empty($resume_data['field_related_organizations']['item'])) { ?>
        <section class="resume-block resume-block-complex related-organizations">
            <h2><?= $resume_data['field_related_organizations']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_related_organizations']['item'] as $field) {
                    if (!empty($field)) { ?>
                        <div class="organization-block">
                            <p><label><?=$field['field_organization']['label']?></label><?=$field['field_organization']['item'][0]['value']?></p>
                            <?php if(!empty($field['field_membership_date_range']['item'])) { ?>
                                <p>
                                    <?php
                                        $entity = field_collection_item_load($field['field_membership_date_range']['item'][0]['value']);
                                        $instances = field_info_instances('field_collection_item', 'field_work_date_range');
                                        $context_data = array();
                                        foreach ($instances as $instance_field_name => $instance_field) {
                                            $context_data[$instance_field_name] = array(
                                                'label' => $instances[$instance_field_name]['label'],
                                                'item' => (isset($entity->{$instance_field_name}['und'])) ? $entity->{$instance_field_name}['und'] : null
                                            );
                                        }

                                        if (isset($context_data['field_work_start_date']['item']) &&
                                            !is_null($context_data['field_work_start_date']['item'])) {

                                            $start_date = $context_data['field_work_start_date']['item'][0]['from'];
                                            $start_date_string_arr = array();
                                            if (!is_null($start_date['month'])) { $start_date_string_arr[] = $start_date['month']; }
                                            if (!is_null($start_date['year'])) { $start_date_string_arr[] = $start_date['year']; }
                                            $start_date_string = implode('/', $start_date_string_arr);

                                            if ($context_data['field_current_position']['item'][0]['value'] === '1') {
                                                $end_date_string = 'present';
                                            } else {
                                                $end_date = $context_data['field_work_end_date']['item'][0]['from'];
                                                $end_date_string_arr = array();
                                                if (!is_null($end_date['month'])) { $end_date_string_arr[] = $end_date['month']; }
                                                if (!is_null($end_date['year'])) { $end_date_string_arr[] = $end_date['year']; }
                                                $end_date_string = implode('/', $end_date_string_arr);
                                            }
                                        ?>
                                            <label><?=$field['field_membership_date_range']['label']?></label>
                                            <?= $start_date_string ?> &ndash; <?= $end_date_string ?>
                                    <?php } ?>
                                </p>
                            <?php } ?>
                        </div>
                    <?php }
                } ?>
        </section>
    <?php } ?>

    <?php if (!empty($resume_data['field_websites']['item'])) { ?>
        <section class="resume-block resume-block-complex websites">
            <h2><?= $resume_data['field_websites']['label'] ?></h2>
            <ul>
            <?php
                if (isset($resume_data['field_websites']['item']) &&
                    !(empty($resume_data['field_websites']['item']))) {
                    foreach ($resume_data['field_websites']['item'] as $site) {?>
                        <li><?=$site['title'] ?> - <a href="<?=$site['value'] ?>"><?=$site['value'] ?></a></li>
                <?}}
            ?>
            </ul>
        </section>
    <?php } ?>
</div>