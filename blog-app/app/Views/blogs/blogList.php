<div class="lists_container">
<?php if (!empty($blogs) && is_array($blogs)): ?>
    <h2><?= esc($page) ?></h2>
    <div class = "table">
        <div class = "row">
        <?php foreach ($blogs as $blog): ?>
            <div class = "blogs_list">
                <a href="/blogs/<?= esc($blog['slug'], 'url') ?>">
                    <ul id="table_title"> <?= esc($blog['title']) ?></ul>
                    <ul id="table_by">By: <?= esc($blog['created_by']) ?></ul>
                </a>
                
            </div>
        <?php endforeach ?>
        </div>
    </div>
    <div id = "pagination">
            <?php echo $pager->links(); ?>
    </div>

<?php else: ?>

    <h3>No Blogs</h3>

    <p>Unable to find any blogs for you.</p>

<?php endif ?>
</div>
