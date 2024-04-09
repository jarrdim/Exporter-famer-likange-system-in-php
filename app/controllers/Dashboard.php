<?php

class Dashboard extends Controller
{
    public function index()
    {
      if(!Auth::logged_in())
      {
        redirect('login');die;
      }
     $data['title'] = 'Dashboard';
       $this->view('admin/dashboard',$data);
    }



    
    public function categories($action='', $id='')
    {
      if(!Auth::logged_in())
      {
        redirect('login');die;
      }
     
   
      $categories = new Categories();
      $action = $data['action']  = trim($action);

      if($action == "add")
      {
        if(Auth::user_can('add_category'))
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
          // show($_POST);die;
          // INSERT INTO `categories` (`id`, `category_name`, `active`) VALUES (NULL, 'fruits', '0'), (NULL, 'cereals', '0');
            if($categories->validate($_POST))
          {

            $data = $_POST;
            $data['slug'] = str_to_url($_POST['category_name']);
          
            $categories->insert($data);
            
        
              redirect('dashboard/categories');   
              
          }

          }
        }else{
          $data['errors']=$categories->errors['category_name']='You dont have permission to perform this action';
        }
         
      }
      else if($action == "delete")
      {
        if(Auth::user_can('add_category'))
        {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
          $arr['id'] = $id;
          $categories->delete($arr);
          redirect('dashboard/categories');
          }
        }
       }
      
      else if($action == "edit")
      {
        $arr['id'] = $id;
        $data['row'] = $row = $categories->first($arr);
        
        
        if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST) && $row)
        {
        
        if(Auth::user_can('add_category'))
        {
          if($categories->validate($_POST))
          {
            $data = $_POST;
            $data['slug'] = str_to_url($_POST['category_name']);
    
            $nn = $categories->update($row->id, $data);
            $info['message'] = "successufly updated";
          }
          
            $info['errors'] = $categories->errors;
            echo json_encode($info);die;
        }
        else{
          $info['message'] = "You dont have permission to edit this page!";
          echo json_encode($info);die;
        }
        }
    
       
      }

  
        $data['errors']= $categories->errors;
     
        //$data['rows'] = $ads->where(['user_id'=>$user_id]);
       $data['categories'] = $rows = $categories->findAll();
      
      $data['title'] = 'Categories';
      $this->view('admin/categories', $data);die;
      
      
    
    }
    public function products($action = '', $id='')
    {
       if(!Auth::logged_in())
      {
        redirect('login');die;
      }

      $categories = new Categories();
      $product = new Products();
      $user = new User();
      $action = $data['action'] = trim($action);
      $user_id = Auth::getid() ?? '';
       $_POST['user_id']  = $user_id;
      if($action== 'add')
      {
          $data['categories'] = $rows = $categories->findAll();
          
          if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

          //show($_POST);die;
           if(Auth::user_can('add_product') )
          {
            if($product->validate($_POST))
            {
                //1 role stands for user and 2 admin
           
              
                $_POST['date'] = date('Y:m:d H:i:s');

                if(!empty($_FILES['image']))
                {
                  if($_FILES['image']['error'] == 0)
                  {
                    $allowed = ['img','png','jpg','jpeg'];
                    
                    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    if(in_array($ext,$allowed))
                    {
                      $folder = "uploads/";
                      if(!file_exists($folder))
                      {
                        mkdir($folder,0777,true);
                        file_put_contents($folder.'index.php','');
                      }
                      $destination = $folder.time().$_FILES['image']['name'];
                      if( move_uploaded_file($_FILES['image']['tmp_name'], $destination))
                      {
                        $_POST['image'] = $destination;
                  
                        //show($_POST);die;
                        $product->insert($_POST);
                     
                         

                        //$data['rows'] = $rows = $product->where(['user_id'=>$user_id, 'approved'=>0]);
                        
                        //$this->view('admin/products',$data);  
                        redirect("dashboard/products");
          
                        
                      }
                      
                    }
                    else
                    { 
                        $data['errors']['image'] = "invalid image extension";
                    }
                    
                  
                  }
                  else
                  {
                    $data['errors']['image'] = "invalid image";
                  }
                  
                }
                else
                {
                  $data['errors']['image'] = "invalid image";
                }
               
                  
            } 

            $data['errors'] = $product->errors;
          }
          else{
            $data['errors']=$product->errors['product_name']="You dont have permission to perform this action";
          }
            
        }
         
         

      }
      else if($action == 'edit')
      {
        //issue
        $data['product']  = $product->first(['user_id'=>$user_id,'id'=>$id]);
         if(Auth::user_can('edit_product') )
        {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
           $row = $product->first(['user_id'=>$user_id,'id'=>$id]);
          if(!empty($_FILES['image']['name'])){
               if($_FILES['image']['error'] == 0)
                  {
                    $allowed = ['png','jpg','jpeg'];
                    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    
                    if(in_array($ext, $allowed))
                    {
                      $folder = "uploads/";
                      if(!file_exists($folder))
                      {
                        mkdir($folder,0777,true);
                        file_put_contents($folder.'index.php','');
                      }
                        $destination = $folder.time().$_FILES['image']['name'];

                        if(move_uploaded_file($_FILES['image']['tmp_name'], $destination))
                        {
                         
                            if(file_exists($row->image))
                            {
                            
                                unlink($row->image);
                                
                            }
                            $_POST['image'] = $destination;
                          
                        }
                       
                    }
                    else{
                      $info['errors']="image extension is not allowed";
                      echo json_encode($info);die;
                    }

                   
                  }
                  else{
                     echo json_encode("image not valid");die;
                    $data['errors'] = "image not valid";
                  }

             
          }
          else{
            unset($_POST['image']);
          }
          
       
          if($product->validate($_POST))
          {         
                  $arr['id']  = Auth::getid();
                    $id = $row->id ?? $id;
            
                 $product->update($id,$_POST);
                
                   $info['message'] = "updated successfully";
                    echo json_encode($info);
                 die;
                
          }
      
          else{
            $data['errors'] = $product->errors;
 
            $info = $product->errors;
            echo json_encode($info);die;
          }
        
            //can happen here
        }
      }
      }
      else if($action == 'delete')
      {
        $user_id = $arr['id']  = Auth::getid();
        $product = new Products();
        $product_row = $product->first(['user_id'=>$user_id,'id'=>$id]);
     
        $row = $user->first($arr);
          if(Auth::user_can('delete_product') )
        {
        if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
        {
          //echo $product_row->image;die; 
           if(file_exists($product_row->image))
            {
            
                unlink($product_row->image);
            }
         $product->delete(['id'=>$id,'user_id'=>$row->id]);
            message('Successfully deleted');
            redirect('dashboard/products');
  
          
        }
        }
        //redirect('dashboard/products/delete');

      }
    
        //$data['rows'] = $rows = $product->findall();
       
         if(Auth::is_admin())
         {
              //$data['rows'] = $rows = $product->findAll();
              $sql = "select * from products";
              
              $data['rows'] = $product->query($sql);
         }
         else{
          $data['rows'] = $rows = $product->where(['user_id'=>$user_id, 'approved'=>0]);
         }
    

       

       
    
       // $data['categories'] = $categories->findAll();//first($arr);
       $data['categories'] = $categories->where(['active'=>1]);

        $data['title'] = 'Products';
       $data['errors'] = $product->errors;
        $this->view('admin/products',$data);
      
    
    }
    public function users($action='',$id='')
    {
       if(!Auth::logged_in())
      {
        redirect('login');die;
      }
     
      $activities = new Activity();
      $user = new User();
      $data=[];
      $data['action'] = $action;
      if(!Auth::logged_in())
      {
         //redirect('login');die;
      }
        if(!Auth::is_admin())
        {
         // redirect('login');die;

        }
        if($action == "add")
        {  if(Auth::user_can('add_user') )
        {

        }
        }
        elseif($action == "delete")
        {
        if(Auth::user_can('delete_user') )
        {
          if($_SERVER['REQUEST_METHOD'] == "POST")
          {
             $arr['id'] = $id;
             $user->delete($arr);
             message("deleted succefully");
             redirect("dashboard/users");
          }
        }
         
        }
        elseif($action == "edit")
        {
            if(Auth::user_can('edit_user') )
        {
        }
        }
        elseif($action == "activity")
        {
            if(Auth::user_can('view_activity') )
        {
           
          $query33 = "SELECT activities.*, user.username 
          FROM activities 
          JOIN user ON user.id = activities.user_id 
          WHERE activities.user_id = :user_id";
          //$activityResult = $activities->where(['user_id'=>$id]);
          $activityResult = $activities->query($query33, ['user_id'=>$id]);
          $data['activity'] = $activityResult;

          $_SESSION['USER_INFO']->activity_user_id = $id;

          //show($data['activity'] );die;
        }
        }
        elseif($action == "deleteActivity")
        {
          if(Auth::user_can('delete_activity') )
          {
            $activities->delete(['id'=>$id]);

           // show($_SESSION['USER_INFO']);die;
            $user_id_activity = $_SESSION['USER_INFO']->activity_user_id ?? " " ;
            redirect('dashboard/users/activity/'.$user_id_activity);
            message("deleted successfuly");
          }  
        }


      $rows = $user->findAll();
      $data['rows']= $rows;
      $this->view('admin/users',$data);

      
  
    }
    public function about($action='',$id='')
    {
     
    
      $data=[];
      $data['action'] = $action;
      if(!Auth::logged_in())
      {
        redirect('login');die;
      }
        if(!Auth::is_admin())
        {
         redirect('login');die;

        }
        if($action == "add")
        {
           if(Auth::user_can('add_about') )
        {
        }
        }
        elseif($action == "delete")
        {
        if(Auth::user_can('delete_about') )
        {
          if($_SERVER['REQUEST_METHOD'] == "POST")
          {
            // $arr['id'] = $id;
             //$user->delete($arr);
             //message("deleted succefully");
            // redirect("dashboard/users");
          }
        }
        }
        elseif($action == "edit")
        {
          if(Auth::user_can('edit_about') )
        {

        }
        }
      $this->view('admin/about',$data);

    }
    //ROLES 
    public function roles($action='', $id='')
    {
         if(!Auth::logged_in())
      {
        redirect('login');die;
      }
     
   
      $role = new Role();
      $action = $data['action']  = trim($action);

      if($action == "add")
      {
        if(Auth::user_can('add_role') )
        {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
         // INSERT INTO `role` (`id`, `category_name`, `active`) VALUES (NULL, 'fruits', '0'), (NULL, 'cereals', '0');
          if($role->validate($_POST))
         {

          $data = $_POST;
        
         
           $role->insert($data);
           
      
            redirect('dashboard/roles');   
            
         }
        
        }
      }
      }
      else if($action == "delete")
      {
      if(Auth::user_can('delete_role') )
        {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
          $arr['id'] = $id;
          $role->delete($arr);
          redirect('dashboard/roles');
          }
       }
      }
      else if($action == "edit")
      {
        $arr['id'] = $id;
        $data['row'] = $row = $role->first($arr);
        
       if(Auth::user_can('edit_role') )
        {
        if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST) && $row)
        {
      
         
          
          if($role->validate($_POST))
          {
            $data = $_POST;
         // show($_POST);die;
    
            $nn = $role->update($row->id, $data);
            $data['message'] = "successufly updated";
             $data['errors'] = $role->errors;
             redirect('dashboard/roles');
          }
          
           
            
            
    
        }
      }
       
      }
      else
      {
        $data['errors']= $role->errors;
     
       // $data['role'] = $role->where(['user_id'=>$user_id]);
        $data['rows'] = $role->findALL();
    
       if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
          
              $sql = "update permission_table set disabled = 1 where id > 0";
              $role->query($sql);
         
          if(!empty($_POST["example_length"]))
          {
              unset($_POST["example_length"]);
          }
          //disable permissions before we do anything
       

          foreach ($_POST as $key => $permission)
          {
            
              if(preg_match("/[0-9]+\_[0-9]+/", $key))
              {
                  $row_id = preg_replace("/\_[0-9]+/", "",$key);
                   //if record exist
                  $datas=[];
                  $datas['role_id'] = $row_id;
                  $datas['permission']= $permission;
                  //show($permission);
                  
                  $sql = "select id from permission_table where permission = :permission and role_id = :role_id limit 1";
                  $chck = $role->query($sql, $datas);
                  if($chck)
                    {                 
                      //we update if the record is found
                      $sql = "update  permission_table  set disabled = 0 where  permission = :permission  &&  role_id = :role_id limit 1";

                    }
                    else
                    {
                        //then int database permission_role table if record not found
                    $sql = "insert into permission_table (role_id, permission) values (:role_id, :permission)";
                  
                    }
                    $role->query($sql, $datas);
                    
              }
          }
         // die;
          redirect("dashboard/roles");
        }
      }
    
        $this->view('admin/roles', $data);
    }


    //ORDERS
    public function orders($action='', $id='')
    {
     
      if(!Auth::logged_in())
      {
        redirect('login');die;
      }

  
        
      
      $data= [];
      $data['title']= "admin - Orders";
      $data['action'] = $action;


      $order = new Order();
      $user = new User();

    // $query = "select * from payments order by id desc";
    // $payment = $order->query($query);
   
    // $data['payment'] = $payment;



        
    if(Auth::user_can('view_order'))
    {

   
            $orders = $order->get_all_Orders();

        }

        $data['orders'] = $orders;
       $this->view('admin/orders', $data);
    }
    
   
  }
