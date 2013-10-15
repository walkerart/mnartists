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
        <section class="resume-block general-statement">
            <h2>General Statement</h2>
            <?= $resume_data['field_general_statement'][0]['value'] ?>
        </section>

        <section class="resume-block biography">
            <h2>Biography</h2>
            <?= $resume_data['field_biography'][0]['value'] ?>
        </section>

        <section class="resume-block education">
            <h2>Education</h2>
            <?php
                foreach ($resume_data['field_education'] as $field) {?>
                    <div class="education-block">
                        <p><label>school</label><?=$field['field_school'][0]['value']?></p>
                        <p><label>degree</label><?=$field['field_degree'][0]['value']?></p>
                        <p><label>year</label><?=$field['field_year'][0]['value']?></p>
                        <p><label>or dates attended</label><?=$field['field_or_dates_attended'][0]['value']?></p>
                        <p>
                            <label>areas of study</label><ul>
                            <?php
                                foreach ($field['field_areas_of_study'] as $inner_field) {?>
                                    <li><?=$inner_field['value']?></li>
                                <?}
                            ?>
                        </ul></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block work-experience">
            <h2>Work Experience</h2>
            <?php
                foreach ($resume_data['field_work_experience'] as $field) {?>
                    <div class="experience-block">
                        <p><label>employer</label><?=$field['field_employer'][0]['value']?></p>
                        <p><label>position</label><?=$field['field_position'][0]['value']?></p>
                        <p><label>years</label><?=$field['field_years'][0]['value']?></p>
                        <p><label>description</label><?=$field['field_description_of_position'][0]['value']?></p>
                        <p><label>url</label><?=$field['field_url'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block teaching-experience">
            <h2>Teaching Experience</h2>
            <?php
                foreach ($resume_data['field_teaching_experience'] as $field) {?>
                    <div class="experience-block">
                        <p><label>teaching venue</label><?=$field['field__teaching_venue'][0]['value']?></p>
                        <p><label>course</label><?=$field['field_course'][0]['value']?></p>
                        <p><label>year</label><?=$field['field_year'][0]['value']?></p>
                        <p><label>url</label><?=$field['field_url'][0]['value']?></p>
                        <p><label>description</label><?=$field['field_description_of_position'][0]['value']?></p>
                        <p><label>position</label><?=$field['field_position'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block awards">
            <h2>Awards</h2>
            <?php
                foreach ($resume_data['field_awards'] as $field) {?>
                    <div class="award-block">
                        <p><label>award name</label><?=$field['field_award_name'][0]['value']?></p>
                        <p><label>year</label><?=$field['field_year'][0]['value']?></p>
                        <p><label>organization</label><?=$field['field_award_organization'][0]['value']?></p>
                        <p><label>url</label><?=$field['field_url'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block exhibition-and-performance">
            <h2>Exhibition and Performance</h2>
            <?php
                foreach ($resume_data['field_exhibition_and_performance'] as $field) {?>
                    <div class="exhibition-block">
                        <p><label>title</label><?=$field['field_title'][0]['value']?></p>
                        <p><label>venue</label><?=$field['field_exhibition_venue'][0]['value']?></p>
                        <p><label>group/individual</label><?=$field['field_group_individual'][0]['value']?></p>
                        <p><label>url</label><?=$field['field_url'][0]['value']?></p>
                        <p><label>venue url</label><?=$field['field_venue_url'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block publications">
            <h2>Publications</h2>
            <?php
                foreach ($resume_data['field_publications'] as $field) {?>
                    <div class="publication-block">
                        <p><label>publication</label><?=$field['field_publication'][0]['value']?></p>
                        <p><label>title</label><?=$field['field_publication_title'][0]['value']?></p>
                        <p><label>author/editor</label><?=$field['field_author_editor'][0]['value']?></p>
                        <p><label>description</label><?=$field['field_description'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block galleries">
            <h2>Galleries</h2>
            <?php
                foreach ($resume_data['field_galleries'] as $field) {?>
                    <div class="gallery-block">
                        <p><label>gallery name</label><?=$field['field_gallery_name'][0]['value']?></p>
                        <p><label>contact name</label><?=$field['field_contact_name'][0]['value']?></p>
                        <p><label>url</label><?=$field['field_url'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block collections">
            <h2>Collections</h2>
            <?php
                foreach ($resume_data['field_collections'] as $field) {?>
                    <div class="collection-block">
                        <p><label>collection name</label><?=$field['field_collection_name'][0]['value']?></p>
                        <p>
                            <label>works</label><ul>
                            <?php
                                foreach ($field['field_works'] as $inner_field) {?>
                                    <li><?=$inner_field['value']?></li>
                                <?}
                            ?>
                        </ul></p>
                        <p><label>url</label><?=$field['field_url'][0]['value']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block related-organizations">
            <h2>Organizations</h2>
            <?php
                foreach ($resume_data['field_related_organizations'] as $field) {?>
                    <div class="organization-block">
                        <p><label>organization</label><?=$field['field_organization']?></p>
                        <p><label>years</label><?=$field['field_years']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block websites">
            <h2>Websites</h2>
            <ul>
            <?php
                foreach ($resume_data['field_websites'] as $site) {?>
                    <li><?=$site['title'] ?> - <a href="<?=$site['value'] ?>"><?=$site['value'] ?></a></li>
                <?}
            ?>
            </ul>
        </section>

    </body>
</html>