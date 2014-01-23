<p class="site-description">
    Make your own MN Artists homepage by filtering communities and content.
</p>
<div class="search-container">
    <form method="get" action="/community">
        <?php
            $url_query_string = $_SERVER['QUERY_STRING'];
            $url_params_work = explode('&', $url_query_string);
            $url_params = array();
            foreach ($url_params_work as $item) {
                $pair = explode('=', $item);
            ?>
                <input type="hidden" name="<?= urldecode($pair[0]) ?>" value="<?= urldecode($pair[1]) ?>">
            <?php }
        ?>

        <input placeholder="Search" type="search" name="global_search" id="search" />
    </form>
</div>