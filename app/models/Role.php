<?php

class Role extends Model
{
    public $errors= [];
    protected $table = 'roles';
    protected $allowedColumns = [
        'role',
        'disabled',
       
        
    ];
    protected $afterSelect = [
        'get_permissions',
      ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty(trim($data['role'])))
        {
            $this->errors['role']='Please enter role name';
        }
    

        if(empty($this->errors))
        {
            return true;
        }
        return false;
    }


protected function get_permissions($data)
{
    
    if(!empty($data[0]->id) && !empty($data[0]->role))
    {
        foreach($data as $key => $row)
        {

            $sql = "select permission from permission_table where role_id = :role_id && disabled = 0";
            $arr['role_id']= $row->id;
            $result = $this->query($sql, $arr);

            if($result)
            { 
                $data[$key]->permissions = array_column( $result,'permission');

               
            }
        }
    }
  
    return $data;
}

}