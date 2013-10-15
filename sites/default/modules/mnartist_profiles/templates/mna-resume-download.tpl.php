<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <style>
            p {
                margin: 0;
                padding: 0;
            }
            section {
                margin-bottom: 1em;
                padding-bottom: 1em;
                border-bottom: 1px solid #ccc;
            }
            section > div {
                margin-bottom: .5em;
            }
            .resume-block label {
                margin-right: 1em;
            }
            .resume-block label:after {
                content: ": ";
            }
        </style>

    </head>

    <body>

        <section class="resume-block resume-block-simple general-statement">
            <h2><?= $resume_data['field_general_statement']['label'] ?></h2>
            <?= $resume_data['field_general_statement']['item'][0]['value'] ?>
        </section>

        <section class="resume-block resume-block-simple biography">
            <h2><?= $resume_data['field_general_statement']['label'] ?></h2>
            <?= $resume_data['field_biography']['item'][0]['value'] ?>
        </section>

        <section class="resume-block resume-block-complex education">
            <h2><?= $resume_data['field_education']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_education']['item'] as $field) {?>
                    <div class="education-block">
                        <p><label><?= $field['field_school']['label'] ?></label><?=$field['field_school']['item'][0]['value']?></p>
                        <p><label><?=$field['field_degree']['label']?></label><?=$field['field_degree']['item'][0]['value']?></p>
                        <p><label><?=$field['field_year']['label']?></label><?=$field['field_year']['item'][0]['value']?></p>
                        <p><label><?=$field['field_or_dates_attended']['label']?></label><?=$field['field_or_dates_attended']['item'][0]['value']?></p>
                        <p>
                            <label><?=$field['field_areas_of_study']['label']?></label><ul>
                            <?php
                                foreach ($field['field_areas_of_study']['item'] as $inner_field) {?>
                                    <li><?=$inner_field['value']?></li>
                                <?}
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
                        <p><label><?=$field['field_years']['label']?></label><?=$field['field_years']['item'][0]['value']?></p>
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
                        <p><label><?=$field['field_year']['label']?></label><?=$field['field_year']['item'][0]['value']?></p>
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
                foreach ($resume_data['field_exhibition_and_performance']['item'] as $field) {?>
                    <div class="exhibition-block">
                        <p><label><?=$field['field_title']['label']?></label><?=$field['field_title']['item'][0]['value']?></p>
                        <p><label><?=$field['field_exhibition_venue']['label']?></label><?=$field['field_exhibition_venue']['item'][0]['value']?></p>
                        <p><label><?=$field['field_group_individual']['label']?></label><?=$field['field_group_individual']['item'][0]['value']?></p>
                        <p><label><?=$field['field_url']['label']?></label><?=$field['field_url']['item'][0]['value']?></p>
                        <p><label><?=$field['field_venue_url']['label']?></label><?=$field['field_venue_url']['item'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block resume-block-complex publications">
            <h2><?= $resume_data['field_publications']['label'] ?></h2>
            <?php
                foreach ($resume_data['field_publications']['item'] as $field) {?>
                    <div class="publication-block">
                        <p><label><?=$field['field_publication']['label']?></label><?=$field['field_publication']['item'][0]['value']?></p>
                        <p><label><?=$field['field_publication_title']['label']?></label><?=$field['field_publication_title']['item'][0]['value']?></p>
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
                        <p>
                            <label><?=$field['field_works']['label'] ?></label><ul>
                            <?php
                                foreach ($field['field_works']['item'] as $inner_field) {?>
                                    <li><?=$inner_field['value']?></li>
                                <?}
                            ?>
                        </ul></p>
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
                foreach ($resume_data['field_websites']['item'] as $site) {?>
                    <li><?=$site['title'] ?> - <a href="<?=$site['value'] ?>"><?=$site['value'] ?></a></li>
                <?}
            ?>
            </ul>
        </section>

    </body>
</html>