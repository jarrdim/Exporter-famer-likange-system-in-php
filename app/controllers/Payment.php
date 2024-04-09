<?php

class Payment extends Controller
{
    public function index()
    {
        
        if(!Auth::logged_in())
        {
            redirect('login');die;
        }
        $data = [];


        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //START
            $db= new Db();
            $da['user_id'] = $_SESSION['USER_INFO']->id;
           
            $sql = "SELECT * FROM orders where user_id = :user_id  ORDER BY ID DESC LIMIT 1";
            $s = $db->query($sql,$da);
            if(is_array($s))
            {
                foreach($s as $row)
                {
                 $total =  $row->total;
                }
            }
            else{
                redirect('shop');die;
            }
            
      
      
          
            //END


            
            
          if(isset($_POST['submit'])){


            date_default_timezone_set('Africa/Nairobi');

          # access token
          $consumerKey = 'gmPdxWl9x6KnJjU4G9XwS9KGBw57Woz1'; //Fill with your app Consumer Key
          $consumerSecret = 'KbwIoygaCSpC3Abs'; // Fill with your app Secret
        
          # define the variales
          # provide the following details, this part is found on your test credentials on the developer account
          $BusinessShortCode = '174379';
          $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';  
           
                    
            /*
                This are your info, for
                $PartyA should be the ACTUAL clients phone number or your phone number, format 2547********
                $AccountRefference, it maybe invoice number, account number etc on production systems, but for test just put anything
                TransactionDesc can be anything, probably a better description of or the transaction
                $Amount this is the total invoiced amount, Any amount here will be 
                actually deducted from a clients side/your test phone number once the PIN has been entered to authorize the transaction. 
                for developer/test accounts, this money will be reversed automatically by midnight.
            */
            
            $PartyA = $_POST['phone']; 

                $phone = $_POST['phone'];
                if(empty($phone))
                {
                     $data['errors']['phone'] = 'Enter phone number';
                }
                else{
                $phone = (substr($phone, 0, 1) == "+") ? str_replace("+", "", $phone) : $phone;
                $phone = (substr($phone, 0, 1) == "0") ? preg_replace("/^0/", "254", $phone) : $phone;
                $phone = (substr($phone, 0, 1) == "7") ? "254{$phone}" : $phone;

                }
                $orderNo =$row->order_id;
            
            
            
            
            // This is your phone number, 
            $AccountReference = '2255';
            $TransactionDesc = 'Test Payment';
            $Amount = $total ;
          
            //$Amount = 1;
            # Get the timestamp, format YYYYmmddhms -> 20181004151020
            $Timestamp = date('YmdHis');    
            
            # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
            $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

            # header for access token
            $headers = ['Content-Type:application/json; charset=utf8'];

                # M-PESA endpoint urls
            $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
            $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

            # callback url
            #$CallBackURL = 'https://morning-forest-72309.herokuapp.com/callback_url.php';  
            //$CallBackURL = 'https://cyber-mentor1.000webhostapp.com/callback_url.php';  
            $CallBackURL = 'https://cyber-mentor1.000webhostapp.com/confirm'; 
            
            $curl = curl_init($access_token_url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_HEADER, FALSE);
            curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
            $result = curl_exec($curl);
            if(empty($result))
            {
                $data['errors']['phone'] = "error occured";
            }

            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $result = json_decode($result);
            $access_token = $result->access_token;  
            curl_close($curl);

            # header for stk push
            $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

            # initiating the transaction
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $initiate_url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header

            $curl_post_data = array(
                //Fill in the request parameters with valid values
                'BusinessShortCode' => $BusinessShortCode,
                'Password' => $Password,
                'Timestamp' => $Timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $Amount,
                'PartyA' => $PartyA,
                'PartyB' => $BusinessShortCode,
                'PhoneNumber' => $PartyA,
                'CallBackURL' => $CallBackURL,
                'AccountReference' => $AccountReference,
                'TransactionDesc' => $TransactionDesc
            );

            $data_string = json_encode($curl_post_data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            $curl_response = curl_exec($curl);
            //print_r($curl_response);

            //echo $curl_response;
            };



      
        $result = json_decode(json_encode(json_decode($curl_response)), true);
        if(!preg_match('/^[0-9]{10}+$/', $phone) && array_key_exists('errorMessage', $result)){
            $data['errors']['phone'] = $result["errorMessage"];
            //show($data['errors']);
        }

        //STK Push request successful
         elseif(isset($result['ResponseCode']) && $result['ResponseCode'] === "0"){   
            
            
            //{ "MerchantRequestID":"17920-24556818-1", "CheckoutRequestID":"ws_CO_19032023175606584745378674", "ResponseCode": "0", "ResponseDescription":"Success. Request accepted for processing", "CustomerMessage":"Success. Request accepted for processing" } 17920-24556818-1
          
          
           $db = new Db();
            $arr = array();
            
            
//	PhoneNumber	Amount	MerchantRequestID	CheckoutRequestID	order_id	status	TransactionDate
            $arr['PhoneNumber'] = $phone;
            $arr['MerchantRequestID']=$result['MerchantRequestID'];
            $arr['CheckoutRequestID']=$result['CheckoutRequestID'];
            $arr['order_id']=$orderNo;
            $arr['amount'] = $Amount ;
            $arr['status'] = "processing";
            $arr['user_id'] = $_SESSION['USER_INFO']->id;
            $arr['TransactionDate']=date('Y:m:d H:i:s');
            $sql = "insert into payments (
                PhoneNumber, MerchantRequestID,CheckoutRequestID,user_id, status, order_id,amount, TransactionDate )
                values
                (:PhoneNumber,:MerchantRequestID,:CheckoutRequestID,:user_id, :status, :order_id,:amount,:TransactionDate )";
            
            $re = $db->query($sql, $arr);
            
   
           if($re)
           {
               redirect("thanks");die;
           }
           else
           {
               redirect("thanks");die;
           }
           
               //redirect("confirm");die;
         
            
           
        } 
   
        
    

        }
     

        
       
        $data['title'] = 'Payment';
        
        $db= new Db();
        $da['user_id'] = $_SESSION['USER_INFO']->id;
       
        $sql = "SELECT * FROM orders where user_id = :user_id  ORDER BY ID DESC LIMIT 1";
        $s = $db->query($sql,$da);
        if(is_array($s))
        {
             foreach($s as $row)
         {
             $total =  $row->total;
        }
  
        $data['total'] =$total;
        }
        
        

       $this->view('payment',$data);
    }


}