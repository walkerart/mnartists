<?php
    // template for user collections block on profile page
?>
<section class="collections">
    <dl>
    <?php if (count($collections) > 0) { ?>
        <?php foreach ($collections as $collection) { ?>
            <?php if (!empty($collection->items)) { ?>
                <dt><a href="<?= $collection->uri ?>"><?= $collection->title ?></a></dt>
                <dd>
                    <ul>
                        <?php foreach ($collection->items as $item) { ?>
                            <li>
                                <a href="<?= $item->uri ?>" title="<?= $item->title ?>">
                                    <img src="<?= $item->image_uri ?>">
                                    <span class="title"><?= $item->title ?>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($collection->has_more) { ?>
                            <a href="<?= $collection->uri ?>">see more items in this collection</a>
                        <?php } ?>
                    </ul>
                </dd>
        <?php }
        }
    } else { ?>
        <dt>This user has no collections.</dt>
    <?php } ?>
    </dl>
</section>