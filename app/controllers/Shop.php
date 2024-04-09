<?php

class Shop extends Controller
{
    public function index()
    {
        $category = new Categories();
        $product = new Products();
        $data['rows'] = $category->where(['active'=>1]);
      //  $product->limit=9;
        $data['products'] = $product->where(['approved'=>0]);
        
       
        //$product->limit=10;
        $product->order='ASC';
        $data['old_product'] = $product->where(['approved'=>0]);
        
       
      
        $data['title'] = 'Shop';

       $this->view('shop',$data);
    }
    public function products($slug)
    {
        $category = new Categories();
        $product = new Products();
       
        $data['rows'] = $category->where(['active'=>1]);

        $data['row'] = $category->first(['active'=>1, 'slug'=>$slug]);
      


        $sql = "SELECT  products.*, categories.category_name, categories.slug as cat_slug FROM `products` join categories on categories.id = products.category_id where categories.slug = :slug AND categories.active = :active";
        $slugs['slug'] = $slug;
        $slugs['active'] = 1;
        $data['products'] = $product->query($sql, $slugs);

        $time = date("Y:m:d H:i:s");
        $activity['user_id'] = Auth::getId() ?? " ";
        $activity['action'] = "This user accessed category ".$slug ." at ".$time;
        $activity['date'] = $time;
        $activities = new Activity();  
        $activities->insert($activity); 
     
        
        //show($data['products']);
     
        $this->view('shop',$data);
    }

}