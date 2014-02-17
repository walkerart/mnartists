<p class="site-description">
    Make your own MN Artists homepage by filtering communities and content.
</p>
<div class="search-container">
    <form method="get" action="/community">
        <?php
            // @TODO probably should filter this down to just OUR params, but this is good for now
            $url_query_string = $_SERVER['QUERY_STRING'];
            $globalSearchValue = null;
            if ($url_query_string !== '') {
                $url_params_work = explode('&', $url_query_string);
                if (!empty($url_params_work)) {
                    $url_params = array();
                    foreach ($url_params_work as $item) {
                        if (!empty($item)) {
                            $pair = explode('=', $item);
                            if ($pair[0] === 'global_search') {
                                $globalSearchValue = $pair[1];
                                continue;
                            }
                        ?>
                            <input type="hidden" name="<?= urldecode($pair[0]) ?>" value="<?= urldecode($pair[1]) ?>">
                    <?php }
                    }
                }
            } ?>
        <input placeholder="Search" type="search" name="global_search" id="search" value="<?php print $globalSearchValue; ?>"/>
        <button type="submit"></button>
    </form>
</div>