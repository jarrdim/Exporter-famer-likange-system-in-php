<?php

class Categories extends Model
{
    public $errors= [];
    protected $table = 'categories';
    protected $allowedColumns = [
        'category_name',
        'active',
        'slug',
        
    ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty(trim($data['category_name'])))
        {
            $this->errors['category_name']='Please enter category name';
        }
    

        if(empty($this->errors))
        {
            return true;
        }
        return false;
    }
}