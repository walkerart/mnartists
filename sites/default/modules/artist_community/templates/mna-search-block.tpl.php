<p class="site-description">
    Make your own MN Artists homepage by filtering communities and content.
</p>
<div class="search-container">
    <input placeholder="Search" type="search" name="search" id="search" />
</div>
<div class="item-list">
    <ul class="artist-community-menu">
    <?php

        // @TODO improve this implementation
        $near_me_uri = '';
        $near_me_class = '';
        $new_get = array();

        if (isset($_GET['near_me'])) {
            foreach($_GET as $key => $val) {
                if ($key === 'q' || $key === 'near_me') {
                    continue;
                } else {
                    $new_get[$key] = $val;
                }
            }
            $near_me_class = 'active active-trail selected';
        } else {
            foreach($_GET as $key => $val) {
                if ($key === 'q') {
                    continue;
                } else {
                    $new_get[$key] = $val;
                }
            }
            $new_get['near_me'] = 1;
            $near_me_class = 'active';
        }
        $near_me_uri = '/community?'.urldecode(http_build_query($new_get));
    ?>
        <li class="even first"><a href="<?= $near_me_uri ?>" class="<?= $near_me_class ?>">Near Me</a></li>
    </ul>
</div>