<?php

class Activity extends Model
{
    public $errors= [];
    protected $table = 'activities';
    protected $allowedColumns = [
        'user_id',
        'action',
        'date',
        
    ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty(trim($data['action'])))
        {
            $this->errors['action']='cant be empty';
        }
    

        if(empty($this->errors))
        {
            return true;
        }
        return false;
    }
}