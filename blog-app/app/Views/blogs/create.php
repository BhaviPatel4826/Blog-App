<div class="create_container">

    <h2><?= esc($page) ?></h2>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>

    <form action = "/success" method = "post" enctype = "multipart/form-data">
        <?= csrf_field() ?>

        <div class = "form_rows">
            <label for="title">Title:</label>
            <input type="input" name="title" value="<?= set_value('title') ?>" required>
        </div>

        <div class = "form_rows">
            <label for="tag">Tag:</label>
            <input type="input" name="tag" value="<?= set_value('tag') ?>" required>
        </div> 
        
        <div class = "form_rows_des">
            <label for="body">Description:</label>
            <textarea name="body" cols="45" rows="10" required><?= set_value('body') ?></textarea>
        </div>

        <div class = "form_rows">
            <label>Author's Name: </label>
            <input type="input" name="created_by" value="<?= set_value('created_by') ?>" required>
        </div>

        <div class = "form_rows">
            <label>Insert Image: </label>
            <input type="file" name="image_data" required>
        </div>
        <div class = "form_submit">
            <input type="submit" name="submit" value="Post">
        </div>
    </form>
</div>