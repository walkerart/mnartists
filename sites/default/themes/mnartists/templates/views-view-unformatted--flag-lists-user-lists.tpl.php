<?php
// this template renders the 'list of lists' collections view
// (see views-view-fields--flag-lists-user-lists.tpl.php) for
// the rendering of the individual lists in the list

// first, build a 'collection' of uncollected but favorited
// items

// @TODO this would be a lot nicer if we could just
// take the uncollected data and pipe it through
// views-view-fields--flag-lists-user-list.tpl.php
?>
<div class="user-list-wrap">
    <h2>My Bin</h2>
    <ul class="user-list">

<?php
global $user;
// include the collections js
ctools_add_js('collections', 'mnartist_collections');
// get uncollected content
$uncollected_result = mnartist_collections_get_uncollected_favorites($user->uid);

// iterate and render
foreach ($uncollected_result as $row) {
    $uncoll_working_uri = null;
    $uncoll_uri = null;

    if ($row->content_type === 'user') {
        $context_user = user_load($row->content_id);
        $uncoll_uri = "/user/$context_user->uid";
        if (isset($context_user->picture->uri)) {
            $uncoll_working_uri = $context_user->picture->uri;
        }
        $uncoll_image_uri = (!is_null($uncoll_working_uri)) ? image_style_url('collection_thumbnail', $uncoll_working_uri) : '';
        ?>
        <li>
          <a class="user-collection-item user-collection-user" href="<?= $uncoll_uri ?>">
              <img src="<?= file_create_url($uncoll_image_uri) ?>">
          </a>
        </li>
    <?php } else {
        $context_node = node_load($row->content_id);
        $uncoll_uri = "/node/$context_node->nid";
        if ($context_node->type === 'artwork') {
            if (isset($context_node->field_media['und'])) {
                $uncoll_working_uri = $context_node->field_media['und'][0]['uri'];
                $uncoll_scheme = file_uri_scheme($uncoll_working_uri);
                switch ($uncoll_scheme) {
                  case ('soundcloud'):
                  case ('youtube'):
                  case ('vimeo'):
                    $uncoll_wrapper = file_stream_wrapper_get_instance_by_uri($uncoll_working_uri);
                    $uncoll_working_uri = $uncoll_wrapper->getLocalThumbnailPath();
                    break;
                  case ('public'):
                    break;
                }
            }
        } else {
            if (isset($context_node->field_images['und'])) {
                $uncoll_working_uri = $context_node->field_images['und'][0]['uri'];
            }
        }
        $uncoll_image_uri = (!is_null($uncoll_working_uri)) ? image_style_url('collection_thumbnail', $uncoll_working_uri) : '';
        ?>
        <li>
          <a class="user-collection-item" href="<?= $uncoll_uri ?>">
              <img src="<?= file_create_url($uncoll_image_uri) ?>">
          </a>
        </li>
        <?php
    }
}
?>

    </ul>
</div>

<?php
// now output the rest of the actual collections
foreach ($rows as $list) {
    print $list;
}
?>