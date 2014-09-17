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
                            <input type="hidden" name="<?= htmlentities(urldecode($pair[0])) ?>" value="<?= htmlentities(urldecode($pair[1])) ?>">
                    <?php }
                    }
                }
            }
        ?>
        <input placeholder="Search" type="search" name="global_search" id="search" value="<?= htmlentities(urldecode($globalSearchValue)) ?>">
        <button type="submit"></button>
    </form>
</div>

<p class="site-description site-description-after">
    Explore Minnesota's art scene by browsing communities and content.
</p>


<?php if($rows->uid && $url_query_string !== '' || drupal_is_front_page() && user_is_logged_in()) : ?>
<p class="site-description">
    Save your search; create a personalized homepage.
</p>
<?php endif; ?>