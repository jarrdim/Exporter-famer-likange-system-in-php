<?php
function show($arr)
{
    //echo "<br>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
function convert_date($dateString)
{
    $dateTime = DateTime::createFromFormat("YmdHis", $dateString);
    return $dateTime->format("Y-m-d H:i:s"); // Output: 2023-03-19 19:33:52
}
function  check($key, $fromdb='')
{
    if(!empty($_POST[$key]))
    {
        return $_POST[$key];
    }
    elseif(!empty($fromdb))
    {
        return $fromdb;
    }
}
function set_active($data='')
{
    if(!$data)
    {show($data);
        if($data== 1)
        {
             return "Active";
        }
        else{
            return "no";
        }
       
    } 
}
function set_select($key,$value, $def='')
{
    if(!empty($_POST[$key]))
   {
      if($value == $_POST[$key])
      {
         return ' selected ';
      }
      
   }
   else if(!empty($def))
   {
      if($value == $def)
      {
         return ' selected ';
      }
   }
   return '';

}
function selected($data ,$active='')
{
    if(!empty($data))
    {
        if($data == $active )
        {
            return "selected";
        }
        else{
            return "";
        }
    }
}
 //normally ni ya slug so ina..convert category and replaces characters that is SLUg
 function str_to_url($url)
{
    $url = str_replace("'", "", $url);
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);

    return $url;
}

function  redirect($link)
{
    header("Location:".ROOT."/".$link);
    die;
}

function esc($data)
{
    return htmlspecialchars($data);
}

function URL()
{
    $url = $_GET['url']?? 'home';
    return $url;
}
function ads_edit_view_path($path)
{
   
   return "../app/views/".$path.".view.php";
}


function message($message='',$delete = false)
{
    if(!empty($message))
    {
         $_SESSION['message'] = $message;
    }
    else 
        {
            if(!empty($_SESSION['message']))
                {
                    $$message = $_SESSION['message'];
                    if($delete)
                    {
                        unset($_SESSION['message']);
                    }
                
                    return $message;
                }
        }
     return "kk";
}

//if order paid

function is_paid($order)
{
    $db = new Db();
   // $arr['user_id'] = $order->user_id;
    $arr['order_id'] = $order->order_id;
    //$arr['status'] = "canceled";
    //$sql = "select * from payments where status = :status && user_id = :user_id && order_id = :order_id order by id desc";
    //$sql = "select status from payments where user_id = :user_id && order order_id = :order_id order by id desc";
    $sql = "select * from payments where order_id = :order_id ";
    
    $result = $db->query($sql, $arr);
    
    if(is_array($result))
    {
        foreach($result as $row)
        {
            if($row->status == "canceled")
            {
                return  "<span class='badge bg-danger'>canceled</span>";
            }
            elseif($row->status == "success")
            {
                return   "<span class='badge bg-success'>success</span>";
            }
            else{
                return "<span class='badge bg-secondary'>processing</span>";
            }
             
        }
    }

   

       




    
    
    
}



