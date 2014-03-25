<table>
    <thead>
        <tr>
            <td>Name</td>
            <td>Filters</td>
            <td>Options</td>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($filters as $filter) { ?>
            <tr>
                <td>
                    <div class="rename-filter-static-state">
                        <a class="rename-filter-static-title" href="<?= urldecode($filter->url) ?>"><?= $filter->title ?></a>
                        <a class="rename-filter-rename-link">rename</a>
                    </div>
                    <div class="rename-filter-editing-state" style="display: none">
                        <form action="/user/saved-filters/rename" method="post">
                            <input type="hidden" name="fid" value="<?= $filter->fid ?>">
                            <input type="text" name="newtitle" value="<?= $filter->title ?>">
                            <button type="submit">Submit</button>
                            <button type="button" class="rename-filter-cancel-button">Cancel</button>
                        </form>
                    </div>
                </td>
                <td>
                    <a href="<?= urldecode($filter->url) ?>"><?= $filter->communities_fragment ?></a>
                </td>
                <td>
                    <a href="<?= urldecode($filter->url) ?>">Go</a> - <a href="/user/saved-filters/delete?fid=<?= $filter->fid ?>">Delete</a>
                </td>
        <?php } ?>

    </tbody>
</table>