<div class = "blogs_container">
    <div id ="blog_show" class = "blog">
    
        <img src="<?="/uploads/".$blog['image_data'] ?>" alt="No Image">

        <div class="blog_body">
           <p> <?= esc($blog['body']) ?></p>
           <p>By- <?= esc($blog['created_by']) ?></p>
        </div>
        
    </div>
</div>