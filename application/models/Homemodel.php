<?php

Class Homemodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

//================================================== Get Model Data Method ========================================//


    public function getongoingRiderList($model_data)
    {  
        $this->db->select('*');
        $this->db->from('group_order');
        $this->db->join('group_order_conn', 'group_order_conn.group_order_id = group_order.group_order_id');
        $this->db->join('order', 'order.order_id = group_order_conn.order_id');
        $this->db->join('users', 'users.user_id = group_order.rider_id');
        $this->db->where('order.vendor_id',$model_data['id']);
        $this->db->group_by('group_order.group_order_id');
        $this->db->where('order.order_status_id !=',4);
        return $this->db->get()->result();
    } 

    public function getRiderOrderDataById($rider_id="")
    {  
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('group_order', 'group_order.rider_id = users.user_id','left');
        $this->db->where('user_id',$rider_id);
        return $this->db->get()->row();
    } 

    public function getOrderData($rider_id="")
    {  
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('group_order_conn', 'group_order_conn.order_id = order.order_id');
        $this->db->join('group_order', 'group_order.group_order_id = group_order_conn.group_order_id');
        $this->db->join('users', 'users.user_id = group_order.rider_id');
        $this->db->where('group_order.rider_id',$rider_id);
        return $this->db->get()->result();
    } 

      // Get Business data List
    public function getorderdatalist($model_data)
    {   $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',1);
        $this->db->where('vendor_id', $id);
        return $this->db->get()->result();
    } 

    // Get Business data List
    public function getvendordatainfo($model_data)
    {   $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id', $id);
        return $this->db->get()->row();
    } 

    // Get On Going Order List
    public function getongoingorderlist($model_data)
    {   $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',2);
        $this->db->join('users', 'users.user_id = order.vendor_id');
        $this->db->join('group_order_conn', 'group_order_conn.order_id = order.order_id');
        $this->db->where('users.user_id', $id);
        return $this->db->get()->result();
    } 

    // Get On Going Order List
    public function getcompletetaskorderlist($model_data)
    {   $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',4);
        $this->db->join('users', 'users.user_id = order.vendor_id');
        $this->db->join('group_order_conn', 'group_order_conn.order_id = order.order_id');
        $this->db->where('users.user_id', $id);
        return $this->db->get()->result();
    } 












//================================================== Map Location ========================================//


    public function getAddress($latitude,$longitude){
        if(!empty($latitude) && !empty($longitude)){
            //Send request and receive json data by address

            //$geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false'); 

            // jSON String for request
            $json_string = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false';
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false';
             
            // Initializing curl
            $ch = curl_init( $url );
             
            // Configuring curl options
            $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
            CURLOPT_POSTFIELDS => $json_string
            );
             
            // Setting curl options
            curl_setopt_array( $ch, $options );
             
            // Getting results
            $geocodeFromLatLong =  curl_exec($ch); // Getting jSON result string

            $output = json_decode($geocodeFromLatLong);
            
            $status = $output->status;
            //Get address from json data
            $address = ($status=="OK")?$output->results[0]->formatted_address:'';
            //Return address of the given latitude and longitude
            if(!empty($address)){
                return $address;
            }else{
                return false;
            }
        }else{
            return false;   
        }
    }

    // update rder data
    public function getRiderOrderData($model_data)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id',$model_data['user_id']);
        $rider_data = $this->db->get()->row();
        $address = $this->getAddress($rider_data->latitude,$rider_data->longitude);


        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('group_order_conn', 'group_order_conn.order_id = order.order_id');
        $this->db->join('group_order', 'group_order.group_order_id = group_order_conn.group_order_id');
        $this->db->join('users', 'users.user_id = group_order.rider_id');
        $this->db->where('group_order.rider_id',$model_data['user_id']);
        $order_data = $this->db->get()->result();

        $riderInfo = array(
            'rider' => $rider_data,
            'order' => $order_data,
            'address' => $address,
        );

        echo json_encode($riderInfo);
        
    }



















    public function getPeriodDetails($model_data)
    {
        $period = $model_data['period'];
        $fromdate = "";
        $todate = "";
        $currentdate = "";

        if($period == "Daliy") {

            $currentdate = date('Y-m-d');

        } else if($period == "Weekly") {

            $monday = strtotime("last monday");
            $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
            $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
            $fromdate = date("Y-m-d",$monday);
            $todate = date("Y-m-d",$sunday);

        } else if($period == "Monthly") {

            $fromdate = date('Y-m-01');
            $todate = date('Y-m-t');

        } else if($period == "Yearly") {

            $fromdate = date('Y-01-01');
            $todate = date('Y-12-t');

        }

        $date_data = array(
            'currentdate' => $currentdate,
            'fromdate' => $fromdate,
            'todate' => $todate,
        );

        return $date_data;
    }


    public function vendorreportfororderquality($model_data)
    {

        $vendorid = $model_data['vendorid'];
        $period = $model_data['period'];

        if (!empty($model_data['period'])) {         
            $date_date = $this->getPeriodDetails($model_data);
            $currentdate = $date_date['currentdate'];
            $fromdate = $date_date['fromdate'];
            $todate = $date_date['todate'];
        } else {
            $fromdate = date("Y-m-d",strtotime($model_data['fromdate']));
            $todate = date("Y-m-d",strtotime($model_data['todate']));
        }


        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',4);
        $this->db->where('vendor_id', $vendorid);
        if($period != "Daliy") {  
            $this->db->where('pickup_date >=', $fromdate);
            $this->db->where('dropoff_date <=', $todate);
        } else {
            $this->db->where('dropoff_date', $currentdate);             
        }
        $totalquatity = $this->db->get()->num_rows();
        return $totalquatity;
    }

    public function vendorreportfordistance($model_data)
    {
        $vendorid = $model_data['vendorid'];
        $period = $model_data['period'];

        if (!empty($model_data['period'])) {         
            $date_date = $this->getPeriodDetails($model_data);
            $currentdate = $date_date['currentdate'];
            $fromdate = $date_date['fromdate'];
            $todate = $date_date['todate'];
        } else {
            $fromdate = date("Y-m-d",strtotime($model_data['fromdate']));
            $todate = date("Y-m-d",strtotime($model_data['todate']));
        }

        $this->db->select_sum('distance');
        $this->db->from('order');
        $this->db->where('order_status_id',4);
        $this->db->where('vendor_id', $vendorid);
        if($period != "Daliy") {  
            $this->db->where('pickup_date >=', $fromdate);
            $this->db->where('dropoff_date <=', $todate);
        } else {
            $this->db->where('dropoff_date', $currentdate);             
        }
        $totaldistance = $this->db->get()->row()->distance;
        return $totaldistance;
    }

    public function vendorreportforcancelledorder($model_data)
    {
        $vendorid = $model_data['vendorid'];
        $period = $model_data['period'];

        if (!empty($model_data['period'])) {         
            $date_date = $this->getPeriodDetails($model_data);
            $currentdate = $date_date['currentdate'];
            $fromdate = $date_date['fromdate'];
            $todate = $date_date['todate'];
        } else {
            $fromdate = date("Y-m-d",strtotime($model_data['fromdate']));
            $todate = date("Y-m-d",strtotime($model_data['todate']));
        }

        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',3);
        $this->db->where('vendor_id', $vendorid);
        if($period != "Daliy") {  
            $this->db->where('pickup_date >=', $fromdate);
            $this->db->where('dropoff_date <=', $todate);
        } else {
            $this->db->where('dropoff_date', $currentdate);             
        }
        $totalcancelled = $this->db->get()->num_rows();
        return $totalcancelled;
    }

    public function vendorreportforpriceorder($model_data)
    {
        $vendorid = $model_data['vendorid'];
        $period = $model_data['period'];

        if (!empty($model_data['period'])) {         
            $date_date = $this->getPeriodDetails($model_data);
            $currentdate = $date_date['currentdate'];
            $fromdate = $date_date['fromdate'];
            $todate = $date_date['todate'];
        } else {
            $fromdate = date("Y-m-d",strtotime($model_data['fromdate']));
            $todate = date("Y-m-d",strtotime($model_data['todate']));
        }

        $this->db->select_sum('amount');
        $this->db->from('order');
        $this->db->where('order_status_id',4);
        $this->db->where('vendor_id', $vendorid);
        if($period != "Daliy") {  
            $this->db->where('pickup_date >=', $fromdate);
            $this->db->where('dropoff_date <=', $todate);
        } else {
            $this->db->where('dropoff_date', $currentdate);             
        }
        $totalamount = $this->db->get()->row()->amount;
        return $totalamount;
    }


    // public function getriderlocationlist()
    // {  
    //     $this->db->select('*');
    //     $this->db->from('order_location');
    //     return $this->db->get()->result();
    // }  





































//========================================== Add Model Data Request ======================================//

	//   vendor registration 
    public function vendorregistrationwithoutimgInfo($model_data) 
    {
        $user_type_id = $model_data['user_type_id'];
        $number = $model_data['number'];
        $business_nature = $model_data['business_nature'];
        $username = $model_data['username'];
        $email = $model_data['email'];
        $address = $model_data['address'];
        $name = $model_data['name'];
        $temppassword = $model_data['password']; 
        $password = password_hash($temppassword, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users(`username`,`email`,`password`,`mobile`,`user_type`,`business_nature`,`address`,`name`)  VALUES('$username','$email','$password','$number','$user_type_id','$business_nature','$address','$name')";
        $result = $this->db->query($sql);
        return true;
    }

    //   vendor registration 
    public function vendorregistrationimage($model_data) 
    {
        $user_type_id = $model_data['user_type_id'];
        $number = $model_data['number'];
        $business_nature = $model_data['business_nature'];
        $username = $model_data['username'];
        $email = $model_data['email'];
        $address = $model_data['address'];
        $image = $model_data['image'];
        $name = $model_data['name'];
        $temppassword = $model_data['password']; 
        $password = password_hash($temppassword, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users(`username`,`email`,`password`,`mobile`,`user_type`,`business_nature`,`image_url`,`address`,`name`)  VALUES('$username','$email','$password','$number','$user_type_id','$business_nature','$image','$address','$name')";
        $result = $this->db->query($sql);
        return true;
    }

    // public function for adding token

    public function addToken($model_data) {
        $email = $model_data['email'];
        $token = $model_data['token'];
        $sql = "INSERT INTO token VALUES ('$token','$email')";
        $this->db->query($sql);
        return true;
    }

    //   vendor registration 
    public function addorder($model_data) 
    {
        $vendorid = $model_data['vendorid'];

        $orderno        = $model_data['orderno'];
        $ordername      = $model_data['ordername']; 
        $customername   = $model_data['customername'];
        $customercontact = $model_data['customercontact'];
        $details        = $model_data['details'];
        $instruction        = $model_data['instruction'];
        $contact        = $model_data['contact'];
        $amount         = $model_data['amount']; 
        $ordertype      = $model_data['ordertype']; 

        $pickup_lat         = $model_data['pickup_lat'];
        $pickup_lng         = $model_data['pickup_lng'];
        $pickup_street_number = $model_data['pickup_street_number'];
        $pickup_route       = $model_data['pickup_route'];
        $pickup_sublocality_level_1 = $model_data['pickup_sublocality_level_1'];
        $pickup_locality    = $model_data['pickup_locality'];
        $pickup_administrative_area_level_1 = $model_data['pickup_administrative_area_level_1'];
        $pickup_country     = $model_data['pickup_country'];
        $pickup_postal_code = $model_data['pickup_postal_code'];
        $pickup_time        = $model_data['pickup_time'];
        $pickup_date        = $model_data['pickup_date']; 

        $dropoff_lat        = $model_data['dropoff_lat'];
        $dropoff_lng        = $model_data['dropoff_lng'];
        $dropoff_street_number = $model_data['dropoff_street_number'];
        $dropoff_route      = $model_data['dropoff_route'];
        $dropoff_sublocality_level_1 = $model_data['dropoff_sublocality_level_1'];
        $dropoff_locality   = $model_data['dropoff_locality']; 
        $dropoff_administrative_area_level_1 = $model_data['dropoff_administrative_area_level_1'];
        $dropoff_country    = $model_data['dropoff_country'];
        $dropoff_postal_code = $model_data['dropoff_postal_code'];
        $dropoff_time       = $model_data['dropoff_time'];
        $dropoff_date       = $model_data['dropoff_date'];


        $order_status_id = 1;

        // if ($ordertype == "Backdated") {
        //     $order_status_id = 4;
        // }

        $sql = "INSERT INTO `order`(`order_no`,`order_name`,`vendor_id`,`order_type`,`contact`,`pickup_address_1`,`pickup_address_2`,`pickup_city`,`pickup_state`,`pickup_zip`,`pickup_lat`,`pickup_lng`,`pickup_date`,`pickup_time`,`dropoff_address_line_1`,`dropoff_address_line_2`,`dropoff_city`,`dropoff_state`,`dropoff_zip`,`dropoff_lat`,`dropoff_lng`,`dropoff_date`,`dropoff_time`,`detail`,`instruction`,`order_status_id`,`amount`,`customer_name`,`customer_contact`)  
            VALUES('$orderno','$ordername','$vendorid','$ordertype','$contact','$pickup_street_number'+'$pickup_route','$pickup_sublocality_level_1','$pickup_locality','$pickup_administrative_area_level_1','$pickup_postal_code','$pickup_lat','$pickup_lng','$pickup_date','$pickup_time','$dropoff_street_number'+'$dropoff_route','$dropoff_sublocality_level_1','$dropoff_locality','$dropoff_administrative_area_level_1','$dropoff_postal_code','$dropoff_lat','$dropoff_lng','$dropoff_date','$dropoff_time','$details','$instruction','$order_status_id','$amount','$customername','$customercontact')";
        $result = $this->db->query($sql);
        return true;

    }



// ================================================= Forget Password Model Request ===========================//

    // check Email for forget password
     public function checkEmail($email_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email_id);
        $result = $this->db->get();
        $numrows =$result->num_rows();
        if ($numrows == 1) {
            return true;
        } 
        return false;
    }


      // function for reseting password
    public function resetPassword($model_data) {
        $token = $model_data['token'];
        $temppassword = $model_data['password'];
        $password = password_hash($temppassword, PASSWORD_BCRYPT);


        // if($cpassword != $temppassword){
        //     return "notmatched";        
        // }

        $sql = "SELECT email from token WHERE token='$token'";
        $row = $this->db->query($sql)->row();
        if(empty($row)) {
            return "false";
        }

        $email = $row->email;
        $sql1 = "UPDATE users SET password = '$password' WHERE email='$email'";
        $this->db->query($sql1);

        $sql3 = "DELETE FROM token WHERE token='$token'";
        $this->db->query($sql3);

        return "true";
    }


 //======================================= Update Model Request ======================================//
 
    
     //  Assign  Order To Rider 
    public function vendorchangepassword($model_data) 
    {
        $id = $model_data['id'];
        $temppassword = $model_data['password']; 
        $password = password_hash($temppassword, PASSWORD_BCRYPT);


        $sql = "UPDATE `users` SET `password` = '$password' WHERE user_id = '$id'";
        $this->db->query($sql);
        return true;
    }    


//===========================================                       ====================================//



// import customers from excel sheet
    public function importorders($data) {

        $data1 = $data['values'];
        foreach ($data1 as $values) {

            $order_id = $values['A'];
            $order_no = $values['B'];
            $order_name = $values['C'];
            $customer_contact = $values['D'];
            $vendor_id = $values['E'];
            $order_type = $values['F'];
            $pickup_address_1 = $values['G'];
            $pickup_address_2 = $values['H'];

            $pickup_city = $values['I'];
            $pickup_state = $values['J'];
            $pickup_zip = $values['K'];
            $pickup_date = $values['L'];
            $pickup_time = $values['M'];
            $contact = $values['N'];
            $dropoff_address_line_1 = $values['O'];
            $dropoff_address_line_2 = $values['P'];

            $dropoff_city = $values['Q'];
            $dropoff_state = $values['R'];
            $dropoff_zip = $values['S'];
            $dropoff_date = $values['T'];
            $dropoff_time = $values['U'];
            $customer_name = $values['V'];
            $detail = $values['W'];
            $instruction = $values['X'];

            $distance = $values['Y'];
            $order_status_id = $values['Z'];
            $amount = $values['AA'];


            $sql = "INSERT INTO `order`(`order_id`,`order_no`,`order_name`, `customer_contact`, `vendor_id`, `order_type`, `pickup_address_1`, `pickup_address_2`, `pickup_city`, `pickup_state`, `pickup_zip`,`pickup_date`,`pickup_time`,`contact`, `dropoff_address_line_1`, `dropoff_address_line_2`, `dropoff_city`, `dropoff_state`, `dropoff_zip`, `dropoff_date`, `dropoff_time`, `customer_name`,`detail`,`instruction`,`distance`, `order_status_id`, `amount` ) 
                            VALUES ('$order_id','$order_no','$order_name','$customer_contact','$vendor_id','$order_type','$pickup_address_1','$pickup_address_2','$pickup_city','$pickup_state','$pickup_zip','$pickup_date','$pickup_time','$contact','$dropoff_address_line_1','$dropoff_address_line_2','$dropoff_city','$dropoff_state','$dropoff_zip','$dropoff_date','$dropoff_time','$customer_name','$detail','$instruction','$distance','$order_status_id','$amount') ";
            $result = $this->db->query($sql);

        }
        return true;
    }    





}