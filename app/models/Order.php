<?php

class Order extends Model
{
    //protected $table = 'order_details';
    protected $table = 'orders';

    // public function save_order($post, $rows, $userid, $sessionid)
    // {   
    //     $userid = $userid ?? 0;
    //     if(!Auth::logged_in())
    //   {
    //     redirect('login');die;
    //   }
    //     $total = 0;
    //     foreach($rows as $key => $row)
    //     {
    //         $total += $row->cart_qty * $row->price;
    //     }
    //     if(is_array($rows))
    //     {

    //         $country = new Country();
  

    //         $db = new Db();
    //         $data['username'] = $_POST['username'];
    //         $data['email']= $_POST['email'];
    //         $data['user_id'] = $userid;
    //         $data['order_id'] = $code = rand(10000000, 99999999);
    //         $data['session_id'] = $sessionid;
    //         $data['delivery_address'] = $_POST['address'];
    //         $data['total'] = $total;
    //         $county_obj =  $country->getCountry($_POST['country']);
  
    //         $data['country'] = $county_obj->country;
         
    //         $state_obj = $country->getState($_POST['state']);
         
    //         $data['state'] =$state_obj->state;
    //         $data['phone'] = $_POST['phone'];
    //         $data['tax'] = 0;
    //         $data['shipping'] = 0;
    //         $data['date'] = date("Y-m-d h:i:s");

    //         $sql = "INSERT INTO orders (user_id, order_id, session_id, delivery_address, total, country, username, email, phone, state, tax, shipping, date) VALUES (:user_id, :order_id, :session_id, :delivery_address, :total, :country, :username, :email, :phone, :state, :tax, :shipping, :date)";
      
         
    //         $result = $db->query($sql, $data);

    //         //save details
            
    //         $order_id = 0;
    //         $sql = 'select order_id from orders order by id desc limit 1';
    //         $result = $db->query($sql);

    //         if(is_array($result))
    //         {
    //             $order_id = $result[0]->order_id;
    //         }
    //         foreach($rows as $row)
    //         {
    //             $data = [];
    //             $data['order_id'] = $order_id;
    //             $data['qty']= $row->cart_qty;
    //             $data['amount']= $row->total_price;
    //             $data['product_id']= $row->id;
    //             $data['description']=$row->description;
    //             $data['total']= $row->cart_qty * $row->total_price;
    //             $sql = 'insert into order_details(order_id, product_id, qty, description ,amount ,total) values (:order_id, :product_id, :qty, :description ,:amount ,:total)';
    //             $result = $db->query($sql,$data);
    //             //show($data);die;

         
    //         }
    //     }
    // } 

    // public function getOrders_by_users($userid)
    // {
    //     if(!Auth::logged_in())
    //   {
    //     redirect('login');die;
    //   }
    //     $orders = false;
    //     $db = new Db();
    //     $data['user_id'] = $userid;
    //     $sql = 'select * from orders where user_id = :user_id order by id desc  limit 100';
    //     $orders = $db->query($sql,$data);


    //     return $orders;
    // }

    public function get_all_Orders()
    {
         if(!Auth::logged_in())
      {
        redirect('login');die;
      }
        $orders = false;
        $db = new Db();

        $dd['seller'] = Auth::getId();
        $sql = 'select * from orders where seller = :seller order by id desc limit 100';
        $orders = $db->query($sql, $dd);


        return $orders;
    }

  

}
