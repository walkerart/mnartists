<form method="get" action="<?= $action_url ?>" class="nearme-filter <?= $form_class ?>">
    <?php
        $url_query_string = $_SERVER['QUERY_STRING'];
        if ($url_query_string !== '') {
            $url_params_work = explode('&', $url_query_string);
            if (!empty($url_params_work)) {
                $url_params = array();
                foreach ($url_params_work as $item) {
                    if (!empty($item)) {
                        $pair = explode('=', $item);
                    ?>
                        <input type="hidden" name="<?= urldecode($pair[0]) ?>" value="<?= urldecode($pair[1]) ?>">
                <?php }
                }
            }
        } ?>
    <label>Near Me:</label>
    <input type="search" name="<?= $search_input_name ?>" placeholder="CITY/ZIP" value="<?= $search_field_value ?>">
</form>