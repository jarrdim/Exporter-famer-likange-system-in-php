<?php

class Product extends Controller
{
   

    public function index($id='')
    {
        $data = [];

        $id = esc($id);
        $product = new Products();

        $row = $product->first(['id'=>$id]);
        $product_name1 = $row->product_name;
      
        $time = date("Y:m:d H:i:s");
        $activity['user_id'] = Auth::getId() ?? " ";
        $activity['action'] = "This user Accessed ".$product_name1. " at ".$time;
        $activity['date'] = $time;

        $activities = new Activity();  
        $activities->insert($activity); 

        $data['product'] = $row;

        //show($row);

   
        
  
       $this->view('products', $data);
    }
  
}