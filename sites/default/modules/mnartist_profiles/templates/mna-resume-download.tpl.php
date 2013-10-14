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
            .education-block {
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
            <?= $resume_data['field_general_statement'] ?>
        </section>

        <section class="resume-block biography">
            <h2>Biography</h2>
            <?= $resume_data['field_biography'] ?>
        </section>

        <section class="resume-block education">
            <h2>Education</h2>
            <?php
                foreach ($resume_data['field_education'] as $field) {?>
                    <div class="education-block">
                        <p><label>school</label><?=$field['field_school']?></p>
                        <p><label>degree</label><?=$field['field_degree']?></p>
                        <p><label>year</label><?=$field['field_year']?></p>
                        <p><label>or dates attended</label><?=$field['field_or_dates_attended']?></p>
                        <p><label>areas of study</label><?=$field['field_areas_of_study']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block work-experience">
            <h2>Work Experience</h2>
            <?php
                foreach ($resume_data['field_work_experience'] as $field) {?>
                    <div class="experience-block">
                        <p><label>employer</label><?=$field['field_employer']?></p>
                        <p><label>position</label><?=$field['field_position']?></p>
                        <p><label>years</label><?=$field['field_years']?></p>
                        <p><label>description</label><?=$field['field_description_of_position']?></p>
                        <p><label>url</label><?=$field['field_url']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block teaching-experience">
            <h2>Teaching Experience</h2>
            <?php
                foreach ($resume_data['field_teaching_experience'] as $field) {?>
                    <div class="experience-block">
                        <p><label>teaching venue</label><?=$field['field__teaching_venue']?></p>
                        <p><label>course</label><?=$field['field_course']?></p>
                        <p><label>year</label><?=$field['field_year']?></p>
                        <p><label>url</label><?=$field['field_url']?></p>
                        <p><label>description</label><?=$field['field_description_of_position']?></p>
                        <p><label>position</label><?=$field['field_position']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block awards">
            <h2>Awards</h2>
            <?php
                foreach ($resume_data['field_awards'] as $field) {?>
                    <div class="award-block">
                        <p><label>award name</label><?=$field['field_award_name']?></p>
                        <p><label>year</label><?=$field['field_year']?></p>
                        <p><label>organization</label><?=$field['field_award_organization']?></p>
                        <p><label>url</label><?=$field['field_url']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block exhibition-and-performance">
            <h2>Exhibition and Performance</h2>
            <?php
                foreach ($resume_data['field_exhibition_and_performance'] as $field) {?>
                    <div class="exhibition-block">
                        <p><label>title</label><?=$field['field_title']?></p>
                        <p><label>venue</label><?=$field['field_exhibition_venue']?></p>
                        <p><label>group/individual</label><?=$field['field_group_individual']?></p>
                        <p><label>url</label><?=$field['field_url']?></p>
                        <p><label>venue url</label><?=$field['field_venue_url']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block publications">
            <h2>Publications</h2>
            <?php
                foreach ($resume_data['field_publications'] as $field) {?>
                    <div class="publication-block">
                        <p><label>publication</label><?=$field['field_publication']?></p>
                        <p><label>title</label><?=$field['field_publication_title']?></p>
                        <p><label>author/editor</label><?=$field['field_author_editor']?></p>
                        <p><label>description</label><?=$field['field_description']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block galleries">
            <h2>Galleries</h2>
            <?php
                foreach ($resume_data['field_galleries'] as $field) {?>
                    <div class="gallery-block">
                        <p><label>gallery name</label><?=$field['field_gallery_name']?></p>
                        <p><label>contact name</label><?=$field['field_contact_name']?></p>
                        <p><label>url</label><?=$field['field_url']?></p>
                    </div>
                <?}
            ?>
        </section>

        <section class="resume-block collections">
            <h2>Collections</h2>
            <?php
                foreach ($resume_data['field_collections'] as $field) {?>
                    <div class="collection-block">
                        <p><label>collection name</label><?=$field['field_collection_name']?></p>
                        <p><label>works</label><?=$field['field_works']?></p><!-- @TODO this (and any other plural value) isn't getting pulled into template_data correctly -->
                        <p><label>url</label><?=$field['field_url']?></p>
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
                // @TODO rework this to cooperate with new format
                foreach ($resume_data['field_websites'] as $site) {?>
                    <li><?= $site ?></li>
                <?}
            ?>
            </ul>
        </section>

    </body>
</html>