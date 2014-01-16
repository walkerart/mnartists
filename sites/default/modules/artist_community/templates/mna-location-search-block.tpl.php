<form method="get" action="<?= $action_url ?>" class="<?= $form_class ?>">
    <?php
        if (isset($related_filters[$persistent_key])) {
            if (is_array($related_filters[$persistent_key])) {
                foreach($related_filters[$persistent_key] as $index => $value) { dpm($index); ?>
                    <input type="hidden" name="content[<?= $persistent_key ?>][<?= $index ?>]" value="<?= $value ?>">
                <?php }
            } else { ?>
                <input type="hidden" name="content[<?= $persistent_key ?>]" value="<?= $related_filters[$persistent_key] ?>">
            <?php }
        }
    ?>
    <label>Near Me:</label>
    <input type="search" name="artist_location_search" placeholder="CITY/ZIP" value="<?= $search_field_value ?>">
</form>