<h2>MY FILTERS</h2>
<p class="intro-text">Create new Saved Filters to bookmark and store your searches on MN Artists to create personalized homepages of the content that most interests you.</p>



<?php if($filters) : ?>
<div id="listContent" class="filterWidth">
    <div class="user-feed">
        <table class="table op-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Filters</th>
                    <th>Options</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($filters as $filter) : ?>
                    <tr>
                        <td>
                            <div class="rename-filter-static-state">
                                <a class="rename-filter-static-title" href="<?= urldecode($filter->url) ?>"><?= $filter->title ?></a>
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
                            <a href="#" class="icon edit-icon filter-rename-button" id="rename">Rename</a>
                            <a href="/user/saved-filters/delete?fid=<?= $filter->fid ?>" class="icon remove-icon" id="delete">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php else : ?>
    <br>
    <br>
    <p class="intro-text">You have no saved filters. After filtering content and communities, click on the Star above the search box to save a filter.</p>
<?php endif; ?>