
<?php

class Profile extends Controller
{
    public function index()
    {
         if(!Auth::logged_in())
              {
                redirect('login');die;
              }

        if(!Auth::logged_in())
        {
            redirect('login');die;
        }
        $user_id = '';
        if(isset($_SESSION['USER_INFO']->id))
        {
            $user_id = $_SESSION['USER_INFO']->id;
        }

        $data['title'] = 'Profile';
       $this->view('profile',$data);
    }

}