<!doctype html>
<html>
<head>
    <title>Blog Application</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style.css'); ?>">
</head>

<body>
    <div id="menu">
        <a href = "<?php echo base_url('home'); ?>">Home</a>
        <a href = "<?php echo base_url('page'); ?>">All the Blogs</a>
        <a href = "<?php echo base_url('new_blog'); ?>">Post your own Blog</a>
    </div>
    <div id = "title">
    <h1><?= esc($title) ?></h1>
    </div>