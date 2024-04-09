<?php

class Products extends Model
{
    public $errors= [];
    protected $table = 'products';
    protected $allowedColumns = [
        'user_id' ,
        'category_id',
        'product_name', 	
        'description',
       
        'image', 
        'approved' ,
        'phone'	     ,
        'quantity',
        'date', 	
    ];
    protected $afterSelect = [
        'get_user',
        'get_category',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty(trim($data['product_name'])))
        {
            $this->errors['product_name']='Please enter your product name';
        }
     
        if(empty(trim($data['description'])))
        {
            $this->errors['description'] = "Please, enter your description";
        }
  
           if(empty(trim($data['quantity'])) && !is_numeric($data['quantity']))
        {
            $this->errors['quantity'] = "Please, enter your quantity";
        }

   

        if(empty($this->errors))
        {
            return true;
        }
        return false;
    }

    protected function get_user($row)
    {
  
        $db = new Db();
   
        foreach ($row as $key1 => $value) {
    
            if(!empty($row))
            {   $user_id = $row[0]->user_id ??  Auth::getid();
                $sql = "select username, role,id from user WHERE id=:id limit 1";
                
                $rows = $db->query($sql,['id'=>$user_id]);
            foreach($rows as $key => $value)
            {
                if (!empty($row[$key])) {
                    $row[$key1]->user_row_name = $value;
                }
            }

                }
            }
        
        return $row;
    }
    protected function get_category($rows)
    {
        $db = new Db();
       
         
       if(!empty($rows[0]->category_id))
        { 
            foreach ($rows as $key => $row) 
            {

                $data['id'] = $row->category_id;
               
                    $sql = "select * from categories WHERE id = :id limit 1";
                    
                $categ = $db->query($sql,$data);
   
               if(!empty($categ))
               {
                $rows[$key]->category_row_name = $categ[0];
                 
               }

                }
            }
                   
        return $rows;
    }
}