<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogsModel extends Model
{
    protected $table = 'blogs';
    
    protected $allowedFields = ['id','title', 'slug', 'body', 'tag_id', 'created_by', 'image_data', 'view'];

    //Gets all the row if slug is not provided else return the particular row
    public function getBlogs($slug = false)
    {
        if ($slug === false) {
            return $this->orderBy('view', 'DESC')->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    //Pagination functions
    public function getBlogsPagination($slug = false)
    {
        if ($slug === false) {
            return $this->paginate();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function pager()
    {
        return $this->pager;
    }


}

