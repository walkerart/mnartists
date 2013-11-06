<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Download Resume</title>

        <link rel="stylesheet" href="/<?= drupal_get_path('theme', 'mnartists') ?>/css/resume-download.css">

    </head>

    <body>
        <section class="resume-block resume-block-simple general-statement">
            <h2><?= $resume_data['field_general_statement']['label'] ?></h2>
            <?= $resume_data['field_general_statement']['item'][0]['value'] ?>
        </section>

        <section class="resume-block resume-block-simple biography">
            <h2><?= $resume_data['field_biography']['label'] ?></h2>
            <?= $resume_data['field_biography']['item'][0]['value'] ?>
        </section>

        <section class="resume-block resume-block-complex education">
            <h2><?= $resume_data['field_education']['label'] ?></h2>

            <?php
                foreach ($resume_data['field_education']['item'] as $field) {?>
                    <div class="education-block">
                        <p><label><?= $field['field_school']['label'] ?></label><?=$field['field_school']['item'][0]['value']?></p>
                        <p><label><?= $field['field_institution_url']['label'] ?></label><?=$field['field_institution_url']['item'][0]['value']?></p>
                        <p><label><?=$field['field_degree']['label']?></label><?=$field['field_degree']['item'][0]['value']?></p>
                        <p><label><?=$field['field_year']['label']?></label><?=$field['field_year']['item'][0]['value']?></p>
                        <p><label><?=$field['field_or_dates_attended']['label']?></label><?=$field['field_or_dates_attended']['item'][0]['value']?></p>
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
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block resume-block-complex work-experience">
            <h2><?= $resume_data['field_work_experience']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_work_experience']['item'] as $field) {?>
                    <div class="experience-block">
                        <p><label><?=$field['field_employer']['label']?></label><?=$field['field_employer']['item'][0]['value']?></p>
                        <p><label><?=$field['field_position']['label']?></label><?=$field['field_position']['item'][0]['value']?></p>
                        <p>
                            <label><?=$field['field_years_worked']['label']?></label>
                            <?=$field['field_years_worked']['item'][0]['value']?>
                            <?php if (isset($field['field_years_worked']['item'][0]['value2'])) { ?>
                                &ndash;
                                <!-- @TODO reevaluate this logic, it is based on the
                                    assumption that drupal will always provide a value2,
                                    and if the user has not set a value for it that it
                                    will be equal to value -->
                                <?php if ($field['field_years_worked']['item'][0]['value'] === $field['field_years_worked']['item'][0]['value2']) { ?>
                                    present
                                <?php } else { ?>
                                    <?= $field['field_years_worked']['item'][0]['value2'] ?>
                                <?php } ?>
                            <?php }?>
                        </p>
                        <p><label><?=$field['field_description_of_position']['label']?></label><?=$field['field_description_of_position']['item'][0]['value']?></p>
                        <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block resume-block-complex teaching-experience">
            <h2><?= $resume_data['field_teaching_experience']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_teaching_experience']['item'] as $field) {?>
                    <div class="experience-block">
                        <p><label><?=$field['field__teaching_venue']['label']?></label><?=$field['field__teaching_venue']['item'][0]['value']?></p>
                        <p><label><?=$field['field_course']['label']?></label><?=$field['field_course']['item'][0]['value']?></p>
                        <!-- @TODO this may not work quite the same way now, double check with some data -->
                        <p><label><?=$field['field_date']['label']?></label><?=$field['field_date']['item'][0]['value']?></p>
                        <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                        <p><label><?=$field['field_description_of_position']['label']?></label><?=$field['field_description_of_position']['item'][0]['value']?></p>
                        <p><label><?=$field['field_position']['label']?></label><?=$field['field_position']['item'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block resume-block-complex awards">
            <h2><?= $resume_data['field_awards']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_awards']['item'] as $field) {?>
                    <div class="award-block">
                        <p><label><?=$field['field_award_name']['label']?></label><?=$field['field_award_name']['item'][0]['value']?></p>
                        <p><label><?=$field['field_description']['label']?></label><?=$field['field_description']['item'][0]['value']?></p>
                        <p><label><?=$field['field_year']['label']?></label><?=$field['field_year']['item'][0]['value']?></p>
                        <p><label><?=$field['field_award_organization']['label']?></label><?=$field['field_award_organization']['item'][0]['value']?></p>
                        <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block resume-block-complex exhibition-and-performance">
            <h2><?= $resume_data['field_exhibition_and_performance']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_exhibition_and_performance']['item'] as $field) { ?>
                    <div class="exhibition-block">
                        <p><label><?=$field['field_title']['label']?></label><?=$field['field_title']['item'][0]['value']?></p>
                        <p><label><?=$field['field_description']['label']?></label><?=$field['field_description']['item'][0]['value']?></p>
                        <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                        <p><label><?=$field['field_venue_url']['label']?></label><?=$field['field_venue_url']['item'][0]['value']?></p>
                        <p><label><?=$field['field_year']['label']?></label><?=$field['field_year']['item'][0]['value']?></p>
                        <p><label><?=$field['field_group_individual']['label']?></label><?=$field['field_group_individual']['item'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block resume-block-complex publications">
            <h2><?= $resume_data['field_publications']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_publications']['item'] as $field) {?>
                    <div class="publication-block">
                        <p><label><?=$field['field_publication_title']['label']?></label><?=$field['field_publication_title']['item'][0]['value']?></p>
                        <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                        <p><label><?=$field['field_author_editor']['label']?></label><?=$field['field_author_editor']['item'][0]['value']?></p>
                        <p><label><?=$field['field_description']['label']?></label><?=$field['field_description']['item'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block resume-block-complex galleries">
            <h2><?= $resume_data['field_galleries']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_galleries']['item'] as $field) {?>
                    <div class="gallery-block">
                        <p><label><?=$field['field_gallery_name']['label']?></label><?=$field['field_gallery_name']['item'][0]['value']?></p>
                        <p><label><?=$field['field_contact_name']['label']?></label><?=$field['field_contact_name']['item'][0]['value']?></p>
                        <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block resume-block-complex collections">
            <h2><?= $resume_data['field_collections']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_collections']['item'] as $field) {?>
                    <div class="collection-block">
                        <p><label><?=$field['field_collection_name']['label']?></label><?=$field['field_collection_name']['item'][0]['value']?></p>
                        <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block resume-block-complex related-organizations">
            <h2><?= $resume_data['field_related_organizations']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_related_organizations']['item'] as $field) {?>
                    <div class="organization-block">
                        <p><label><?=$field['field_organization']['label']?></label><?=$field['field_organization']['item'][0]['value']?></p>
                        <p><label><?=$field['field_years']['label']?></label><?=$field['field_years']['item'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block resume-block-complex websites">
            <h2><?= $resume_data['field_websites']['label'] ?></h2>
            <ul>
            <?php
                if (isset($field['field_websites']['item']) &&
                    !(empty($field['field_websites']['item']))) {
                    foreach ($resume_data['field_websites']['item'] as $site) {?>
                        <li><?=$site['title'] ?> - <a href="<?=$site['value'] ?>"><?=$site['value'] ?></a></li>
                <?}}
            ?>
            </ul>
        </section>

    </body>
</html>