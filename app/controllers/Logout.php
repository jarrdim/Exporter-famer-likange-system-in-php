<?php
class Logout
{
   
    public function index()
    {
        $time = date("Y:m:d H:i:s");
        $activity['user_id'] = Auth::getId() ?? " ";
        $activity['action'] = "This user logged Out at ".$time;
        $activity['date'] = $time;

        $activities = new Activity();  
        $activities->insert($activity); 
        Auth::logout();

        
        redirect('home');
        
      
    }
}
