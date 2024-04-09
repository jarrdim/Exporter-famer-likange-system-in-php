
<?php

class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';

       $products = new Products();
       $products->limit = 6;
       $data['products'] = $products->where(['approved'=>0]);

       //show($data);
        
        
       $this->view('home',$data);
    }

}