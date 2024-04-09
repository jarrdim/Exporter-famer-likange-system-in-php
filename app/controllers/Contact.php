<?php

class Contact extends Controller
{
    public function index($id = "")
    {
      if(!Auth::logged_in())
      {
        redirect('login');
      }
        $data = [];
     $data['title'] = 'Contact Us';

      $user = new User();
    $data['row'] = $user->first(['id'=>$id]);


    $seller = $data['row']->username;

    $time = date("Y:m:d H:i:s");
    $activity['user_id'] = Auth::getId() ?? " ";
    $activity['action'] = "This user accessed   ".$seller ."'s contact page at ".$time;
    $activity['date'] = $time;
    $activities = new Activity();  
    $activities->insert($activity); 

     
     if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['phone']) && !empty($_POST['name']) && !empty($_POST['subject']) )
     {
        
                 //send notification
                        
            $db = new Db();
      
            $data2['username'] = $_POST['name'] ?? Auth::getUsername();
            $data2['email']= $_POST['email'] ?? Auth::getEmail();
            $data2['user_id'] = Auth::getid();
            $data2['order_id'] = $code = rand(10000000, 99999999);
            $data2['session_id'] = $_SERVER['UNIQUE_ID'];
            $data2['seller'] = $id;
            $data2['phone'] = $_POST['phone'];
                
            $data2['date'] = date("Y-m-d h:i:s");

            $sql = "INSERT INTO orders (user_id, order_id, seller, session_id, username, email, phone, date) VALUES (:user_id, :order_id, :seller, :session_id, :username, :email, :phone,  :date)";
            $result = $db->query($sql, $data2);

            //message('contact');
         

        //SEND EMAIL
        // $name = trim($_POST['name'])." :AgriTech-Online-Shop";
        // $from= Auth::getEmail();//trim($_POST['email']);
        // $to = "jackmutiso37@gmail.com" ;
        // $subject = "AgriTech-Online-Shop ". trim($_POST['subject']);
        // $message= trim($_POST['message']);
        // if (!(filter_var($to, FILTER_VALIDATE_EMAIL) && filter_var($from, FILTER_VALIDATE_EMAIL))) 
        // {
        // 		$data['errors']= "Email address inputs invalid";
        // 		 //die();
        // } 
        
        // $header = "From: " .  $name . " <" . $from . ">\r\nMIME-Version: 1.0\r\nContent-type: text/html\r\n";
        
        
        // $retval = true;// mail($to,$subject,$message,$header);
        
        //     if ($retval) 
        //     {
    		//     $data['message'] = " Your message has been sent. Thank you!";
        //         //send notification
        //     $db = new Db();
      
        //     $data2['username'] = $_POST['name'] ?? Auth::getUsername();
        //     $data2['email']= $_POST['email'] ?? Auth::getEmail();
        //     $data2['user_id'] = Auth::getid();
        //     $data2['order_id'] = $code = rand(10000000, 99999999);
        //     $data2['session_id'] = $_SERVER['UNIQUE_ID'];
        //   $data2['to'] = $id;
        //     $data2['phone'] = $_POST['phone'];
                
        //     $data2['date'] = date("Y-m-d h:i:s");

        //     $sql = "INSERT INTO orders (user_id, order_id,to, session_id, username, email, phone, date) VALUES (:user_id, :order_id, :to, :session_id, :username, :email, :phone,  :date)";
        //     $result = $db->query($sql, $data2);
    		//     //redirect('contact');
    		   
    	  //   }
    	  //   else 
    	  //   {
    		//    $data['errors'] = "Email did not send. Error: " . $retval;
    	  //   }
        }
    
         

       
     

     
       $this->view('contact',$data);
    }

}