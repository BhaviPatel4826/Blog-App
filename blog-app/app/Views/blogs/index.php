<div class = "blogs_container">
<?php if (!empty($blogs) && is_array($blogs)): ?>
    <h2><?= esc($page) ?></h2>
        <?php $count = 0;?>
        <?php foreach ($blogs as $blog): ?>
            <?php $count++; ?>
            <div class = "blog">
                <h3><?= esc($blog['title']) ?></h3>
                <img src="<?="/uploads/".$blog['image_data'] ?>" alt="No Image">
                <div class="blog_body">
                    <?= esc($blog['body']) ?>
                </div>
            </div>
            <?php if($count == 5){ break;} ?>
        <?php endforeach ?>
    

<?php else: ?>

    <h2>No Blogs Available</h2>
    <p>Unable to find any blogs for you.</p>
  

<?php endif ?>
</div>