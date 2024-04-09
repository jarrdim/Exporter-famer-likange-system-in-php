
<?php

class Services extends Controller
{
    public function index()
    {
        $data['title'] = 'Services';
       $this->view('services',$data);
    }

}