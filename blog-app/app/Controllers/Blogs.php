<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

use App\Models\BlogsModel;
use App\Models\TagsModel;

class Blogs extends BaseController
{   
    # Home page 
    public function index()
    {
        $model = model(BlogsModel::class);

        $data = [
            'blogs'  => $model->getBlogs(),
            'title'  => 'Blog Application',
            'page'   => 'Top 5 Blogs'
        ];

        #$data is send to header.php, index.php and foot.php
        return view('templates/header', $data)
            . view('blogs/index')
            . view('templates/footer');
    }

    # Blog List page
    public function blogList(){
        
        $model = model(BlogsModel::class);
        $data = [
            'blogs'  => $model->getBlogsPagination(),
            'title' => 'Blog Application',
            'page' => 'Blogs',
            'pager' => $model->pager()
        ];

        return view('templates/header', $data)
        . view('blogs/blogList')
        . view('templates/footer');
    }

    #shows a particular blog based on slug
    public function show($slug = null)
    {
        $model = model(BlogsModel::class);

        $data['blog'] = $model->getBlogs($slug);
        
        if (empty($data['blog'])) {
            throw new PageNotFoundException('Cannot find the Blog: ' . $slug);
        }

        $data['blog']['view'] = $data['blog']['view'] + 1;
        $model->update($data['blog']['id'], $data['blog']);
        $data['title'] = $data['blog']['title'];

        return view('templates/header', $data)
            . view('blogs/view')
            . view('templates/footer');
    }

    # Create a blog page
    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Blog Application', 'page' => 'Post your Blog'])
            . view('blogs/create')
            . view('templates/footer');
    }

     #addes the new blog to database
    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['title', 'tag', 'body', 'created_by']);
        $file = $this->request->getFile('image_data');
        $data['image_data'] = $file;
        
       
        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
            'tag'  => 'required',
            'created_by' => 'required',
            'image_data' => 'required',
        ]) || !$data['image_data']->isValid() || $data['image_data']->hasMoved()) {
            
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();
        
        //adding image file to uploads file
        $fileName = $data['image_data']->getRandomName();
        $file->move('uploads/',$fileName);

        if($data['image_data']->isValid()){
            $fileName = $data['image_data']->getRandomName();
            $file->move('uploads/',$fileName);
        }

        $model = model(BlogsModel::class);
        
        $tag_model = model(TagsModel::class);
        $tag = $tag_model->getTag($post['tag']);
        
        //adding the new tag to database
        if(empty($tag)){
            $tag_model->save(['title' => $post['tag']]);
            $tag = $tag_model->getTag($post['tag']);
        }
        
        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], $post['tag'] , '-', true).strtotime(date('Y-m-d H:i:s')),
            'body'  => $post['body'],
            'tag_id'   => $tag['id'],
            'created_by' => $post['created_by'],
            'image_data' => $fileName,

        ]);

        return view('templates/header', ['title' => 'Blog Application', 'page' => 'Successfully Posted'])
            . view('blogs/success')
            . view('templates/footer');
    }
}
