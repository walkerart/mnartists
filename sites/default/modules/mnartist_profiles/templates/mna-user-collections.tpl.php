<?php
    // template for user collections block on profile page

    // show a max of n collection items per collection
    $collection_items_limit = 4;
?>
<section class="collections">
    <dl>
    <?php foreach ($collections as $collection) { ?>
        <?php if (!empty($collection->items)) { ?>
            <dt><a href="<?= $collection->uri ?>"><?= $collection->title ?></a></dt>
            <dd>
                <ul>
                    <?php foreach ($collection->items as $index => $item) {
                        if ($index >= $collection_items_limit) { break; }
                        ?>
                        <li>
                            <a href="<?= $item->uri ?>" title="<?= $item->title ?>">
                                <img src="<?= $item->image_uri ?>">
                                <span class="title"><?= $item->title ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (count($collection->items) > $collection_items_limit) { ?>
                        <a href="<?= $collection->uri ?>">see more items in this collection</a>
                    <?php } ?>
                </ul>
            </dd>
    <?php }
    } ?>
    </dl>
</section>