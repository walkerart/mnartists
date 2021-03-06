<?php
// this template renders the 'list of lists' collections view
// (see views-view-fields--flag-lists-user-lists.tpl.php) for
// the rendering of the individual lists in the list

// first, build a 'collection' of uncollected but favorited
// items
global $user;

// include the collections js
ctools_add_js('collections', 'mnartist_collections');

// get uncollected content
$uncollected_result = mnartist_collections_get_uncollected_favorites($user->uid);

$my_bin_noun = (arg(1) === $user->uid) ? 'My' : mnartist_profiles_collective_or_fullname_or_username(arg(1))."'s";
?>
<h2>My Collections</h2>
<p class="intro-text">Collect artwork you like, bookmark articles to read, and gather opportunities and events that interest you. Hover over the gray star by any artwork, article, event, or opportunity to add it to a public or private collection.</p>
<div class="user-list-wrap">
    <h2><?= $my_bin_noun ?> Bin</h2>
    <ul class="user-list">
<?php

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
        $uncoll_image_uri = (!is_null($uncoll_working_uri)) ? image_style_url('square_thumbnail', $uncoll_working_uri) : '';
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
            if (isset($context_node->field_media[LANGUAGE_NONE])) {
                $uncoll_working_uri = $context_node->field_media[LANGUAGE_NONE][0]['uri'];
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
            $uncoll_image_uri = (!is_null($uncoll_working_uri)) ? image_style_url('medium', $uncoll_working_uri) : '';
        } else {
            if ($context_node->type === 'opportunity') {
                $uncoll_working_uri = (isset($context_node->op_cover_image[LANGUAGE_NONE])) ? $context_node->op_cover_image[LANGUAGE_NONE][0]['uri'] : null;
            } else {
                $uncoll_working_uri = (isset($context_node->field_images[LANGUAGE_NONE])) ? $context_node->field_images[LANGUAGE_NONE][0]['uri'] : null;
            }
            $uncoll_image_uri = (!is_null($uncoll_working_uri)) ? image_style_url('collection_thumbnail', $uncoll_working_uri) : '';
        }
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
