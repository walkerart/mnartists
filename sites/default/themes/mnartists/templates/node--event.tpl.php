<?php
/**
 * @file
 * Adaptivetheme implementation to display a node.
 *
 * Adaptivetheme variables:
 * AT Core sets special time and date variables for use in templates:
 * - $submitted: Submission information created from $name and $date during
 *   adaptivetheme_preprocess_node(), uses the $publication_date variable.
 * - $datetime: datetime stamp formatted correctly to ISO8601.
 * - $publication_date: publication date, formatted with time element and
 *   pubdate attribute.
 * - $datetime_updated: datetime stamp formatted correctly to ISO8601.
 * - $last_update: last updated date/time, formatted with time element and
 *   pubdate attribute.
 * - $custom_date_and_time: date time string used in $last_update.
 * - $header_attributes: attributes such as classes to apply to the header element.
 * - $footer_attributes: attributes such as classes to apply to the footer element.
 * - $links_attributes: attributes such as classes to apply to the nav element.
 * - $is_mobile: Bool, requires the Browscap module to return TRUE for mobile
 *   devices. Use to test for a mobile context.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 * @see adaptivetheme_preprocess_node()
 * @see adaptivetheme_process_node()
 */

/**
 * Hiding Content and Printing it Separately
 *
 * Use the hide() function to hide fields and other content, you can render it
 * later using the render() function. Install the Devel module and use
 * <?php print dsm($content); ?> to find variable names to hide() or render().
 */
hide($content['comments']);
hide($content['links']);

$image_uri = '';
if (isset($node->field_images[LANGUAGE_NONE])) {
    $target_image = $node->field_images[LANGUAGE_NONE][0];
    $image_uri = image_style_url('community_content_thumb', $target_image['uri']);
    $known_width = 220;
    $computed_height = ($known_width * $target_image['height']) / $target_image['width'];
}
$text_excerpt = '';
if (isset($node->body[LANGUAGE_NONE])) {
    $text_excerpt = trim(text_summary(strip_tags($node->body[LANGUAGE_NONE][0]['safe_value']), 'htmlcorrector', 120));
}

// get date(s) for this event, make a handy
// little string out of it
$start_date = null;
$end_date = null;
$date_string = '';
if (isset($node->field_date[LANGUAGE_NONE])) {
    $start_date = new DateTime($node->field_date[LANGUAGE_NONE][0]['value']);
    $date_string .= $start_date->format('D, M jS Y');
    if (isset($node->field_date[LANGUAGE_NONE][1])) {
        $end_date = new DateTime($node->field_date[LANGUAGE_NONE][1]['value']);
        $date_string .= ' &ndash; '.$end_date->format('D, M jS Y');
    }
}
?>
<div class="item-inside">
    <h3><?php print $type; ?></h3>
    <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
        <?php if (isset($node->field_images[LANGUAGE_NONE])) { ?>
            <a href="<?= $node_url ?>" class="item-image"><img src="<?= $image_uri ?>" width="<?= $known_width ?>" height="<?=$computed_height ?>"></a>
        <?php } ?>
        <div class="item-info-container">
            <p class="item-info-title"><a href="<?= $node_url ?>"><?php print $node->title; ?></a></p>
            <?php if (!isset($_GET['event_date'])) { ?><p class="item-info-date"><?= $date_string ?></p><?php } ?>
            <p class="item-info-excerpt">
                <?= $text_excerpt ?> <a href="<?= $node_url ?>" class="item-more-button-link-indicator">&gt;</a>
            </p>
            <?php if(user_is_logged_in()) { ?>
                <div class="item-info-flag pane-mnartist-collections-mna-collections-star"><?= theme("mnartist_collections_star", array('node_id' => $node->nid)) ?></div>
            <?php } ?>
        </div>
    </article>
</div>