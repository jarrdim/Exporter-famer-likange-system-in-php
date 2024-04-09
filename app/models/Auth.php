<?php

class Auth
{
    public static function authenticate($row)
    {
        if(is_object($row))
        {
            $_SESSION['USER_INFO'] = $row;
           
        }
    }
    public static function logged_in()
     {
        if(!empty($_SESSION['USER_INFO']))
        {
         
            return  true;
        }
        else
        {
            return false;
        }
     }
    public static function is_admin()
     {
        if(!empty($_SESSION['USER_INFO']))
        {
            if(!empty($_SESSION['USER_INFO']->role_name));
            {
                if(strtolower($_SESSION['USER_INFO']->role_name) == 'admin')
                {
                    return true;
                }  
            }   
        }
        else
        {
            return false;
        }
     }

    public static function __callstatic($function, $kk)
     {
        $key = str_replace('get','',$function);
    
        $key = strtolower($key);
    
        if(!empty($_SESSION['USER_INFO']->$key))
        {
            return $_SESSION['USER_INFO']->$key;
        }
      
     }

    public static function logout()
     {
        if(!empty($_SESSION['USER_INFO']))
        {
            unset($_SESSION['USER_INFO']);
            //unset($_SESSION['CART']);
            unset($_SESSION['PhoneNumber']);
        }
   
     }

    
    public static function valide_email($email)
     {
        $user = new User();
        $arr['email'] = addslashes($email);

        $sql = "select * from user where  email = :email limit 1";
        $result = $user->query($sql,$arr);
  
        if($result)
        {   
            if(count($result) > 0)
            {
                return true;
            }   
        }

        return false;
    }
     
    public static function is_code_correct($code)
    {
        $reset = new Reset();
        
        $arr['code'] = addslashes($code);
        $expire = time();
        $arr['email'] = addslashes($_SESSION['email']);

       $sql = "select * from reset where  email = :email && code = :code  order by id desc limit 1";
        $result = $reset->query($sql,$arr);
  
        if($result)
        {   
            if(count($result) > 0 && $result[0]->expire > $expire)
            {
                 return "success";
            }
            else{
                return "code is expired";
            }
            
           
        }

        return "incorret code";
    }

    public static function save_password($password)
    {
        $user = new User();
        $data['password'] = $password;
        $data['email'] = $_SESSION['email'];

        $sql = "update user set password = :password where email = :email";
        $user->query($sql,$data);
        
        
    }
   //PERMISSION FUNCTION naeza place it in Auth class lakini let it stay here 
public static function user_can(string $permission):bool
{ 
    strtolower($permission);

   $role = Auth::getRole();
   if(Auth::is_admin())
   {
      return true;
   }
   $db = new Db();
   if(Auth::logged_in())
   { 
       //return true;
       $sql = "select permission from permission_table where disabled = 0 && role_id  = :role";
      $myroles = $db->query($sql,['role'=>$role]);
      if($myroles){
         $myroles = array_column($myroles, 'permission');
      }
      else
      {
         $myroles = [];
      }
   
      if(in_array($permission,$myroles))
      {
                  return true;
      }

   }
  return false;

}


}
