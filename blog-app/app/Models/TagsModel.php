<?php

namespace App\Models;

use CodeIgniter\Model;

class TagsModel extends Model
{
    protected $table = 'tags';
    
    protected $allowedFields = ['id', 'title'];

    //returns the row where title is the given title
    public function getTag($title)
    {
        return $this->where(['title' => $title])->first();
    }
    
}

