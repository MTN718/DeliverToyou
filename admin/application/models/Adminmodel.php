<?php

Class Adminmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

//============================================== Get Model Request =======================================//
    
    // Get Vendor List data
    public function getvendordatalist()
    {  
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_type', 'vendor');
        $this->db->where('status !=', 'deleted');
        return $this->db->get()->result();
    }

    // Get Vendor data
    public function getvendordata($model_data)
    {   $id = $model_data['id'];

        $this->db->select('*');
        $this->db->where('user_id',$id);
        $this->db->from('users');
        return $this->db->get()->row();
    } 

    // Get Rider data
    public function getriderdata($model_data)
    {   $id = $model_data['id'];

        $this->db->select('*');
        $this->db->where('user_id',$id);
        $this->db->from('users');
        return $this->db->get()->row();
    } 

    // Get Rider data
    public function getriderdataById($id)
    {   
        $this->db->select('*');
        $this->db->where('user_id',$id);
        $this->db->from('users');
        return $this->db->get()->row();
    } 

    // Get Avaliable Rider List data
    public function getriderdatalist()
    {  
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_type', 'rider');
        $this->db->where('status', 'avaliable');
        return $this->db->get()->result();
    }  

     // Get All Rider List data
    public function getallriderdatalist()
    {  
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_type', 'rider');
        $this->db->where('status !=', 'deleted');
        return $this->db->get()->result();
    }  

    // Get Order data list
    public function getmanageorderdatalist()
    {   
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',1);
        $this->db->where('group_status','ungroup');
        $this->db->group_by('pickup_time');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        return $this->db->get()->result();
    } 

    // Get Order data list
    public function getorderdatalist()
    {   
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',1);
        $this->db->where('group_status','ungroup');
        $this->db->group_by('vendor_id');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        return $this->db->get()->result();
    } 

    // Get Vendor Order List data
    public function getvendororderlist($model_data)
    {   $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('vendor_id',$id);
        $this->db->where('order_status_id',1);
        $this->db->where('group_status','ungroup');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        return $this->db->get()->result();
    }   

    // Get Task Order data list
    public function gettaskorderlist()
    {   
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',1);
        $this->db->group_by('group_order_id');
        $this->db->join('group_order_conn', 'group_order_conn.order_id = order.order_id');
        return $this->db->get()->result();
    } 

    // Get On Going Order List
    public function getongoingorderlist()
    {   
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',2);
        $this->db->group_by('group_order_id');
        $this->db->join('group_order_conn', 'group_order_conn.order_id = order.order_id');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        return $this->db->get()->result();
    } 

    // Get On Going Order List
    public function getcompletetaskorderlist()
    {   
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        $this->db->join('group_order_conn', 'group_order_conn.order_id = order.order_id');
        $this->db->join('group_order', 'group_order.group_order_id = group_order_conn.group_order_id');
        $this->db->where('order_status_id',4);
        return $this->db->get()->result();
    }

    // Get On Going Order List
    public function getcompletelistondashborad()
    {   
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',4);
        $this->db->group_by('vendor_id');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        $this->db->limit(4);
        return $this->db->get()->result();
    }    

     // Get On Going Order List
    public function getongoingorderlistondashborad()
    {   
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',2);
        $this->db->group_by('vendor_id');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        $this->db->limit(4);
        return $this->db->get()->result();
    }    

     // Get On Going Order List
    public function getunassignorderlistondashborad()
    {   
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',1);
        $this->db->group_by('vendor_id');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        $this->db->limit(4);
        return $this->db->get()->result();
    }   

    // Get On Going Order List
    public function getcancelorderlistondashborad()
    {   
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order_status_id',3);
        $this->db->group_by('vendor_id');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        $this->db->limit(4);
        return $this->db->get()->result();
    }     

    public function getavaliableriderlistondashborad()
    {   
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_type','rider');
        $this->db->where('status', 'avaliable');
        $this->db->limit(4);
        return $this->db->get()->result();
    }     

    public function getonlineriderlistondashborad()
    {   
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_type','rider');
        $this->db->where('login_status', 1);
        $this->db->limit(4);
        return $this->db->get()->result();
    }     

    public function getvendorandriderdatalist()
    {  
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_type !=',"admin");
        return $this->db->get()->result();
    }  

    public function getTypeOfUser($user_id="")
    {  
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id',$user_id);
        return $this->db->get()->row()->user_type;
    } 









    // get report by date duration
    public function vendorandriderreport($model_data)
    {
        $vendorandriderid = $model_data['vendorandriderid'];
        $selected_type = $model_data['selected_type'];
        $fromdate = date("Y-m-d",strtotime($model_data['fromdate']));
        $todate = date("Y-m-d",strtotime($model_data['todate']));

        $this->db->select('*');

        if($selected_type == "vendor") {
            $this->db->from('order');
            $this->db->where('order.vendor_id', $vendorandriderid);
        } else {
            $this->db->from('group_order');
            $this->db->join('group_order_conn', 'group_order_conn.group_order_id = group_order.group_order_id');
            $this->db->join('order', 'order.order_id = group_order_conn.order_id');
            $this->db->where('group_order.rider_id', $vendorandriderid);
        }
        $this->db->where('order.order_status_id',4);
        $this->db->where('pickup_date >=', $fromdate);
        $this->db->where('dropoff_date <=', $todate);
        return $this->db->get()->result();
    }   




    // get report by period
    public function vendorandriderreportbyperiod($model_data)
    {
        $vendorandriderid = $model_data['vendorandriderid'];
        $selected_type = $model_data['selected_type'];
        $period = $model_data['period'];
        $currentdate = "";
        $fromdate = "";
        $todate = "";

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

        $this->db->select('*');
        
        if($selected_type == "vendor") {
            $this->db->from('order');
            $this->db->where('order.vendor_id', $vendorandriderid);
        } else {
            $this->db->from('group_order');
            $this->db->join('group_order_conn', 'group_order_conn.group_order_id = group_order.group_order_id');
            $this->db->join('order', 'order.order_id = group_order_conn.order_id');
            $this->db->where('group_order.rider_id', $vendorandriderid);
        }
        $this->db->where('order.order_status_id',4);
        if($period != "Daliy") {   
            $this->db->where('pickup_date >=', $fromdate);         
            $this->db->where('dropoff_date <=', $todate);
        } else {
            $this->db->where('dropoff_date', $currentdate);             
        }
        return $this->db->get()->result();
    }




     public function getriderreportlist()
    {
        $this->db->select('*');
        $this->db->from('group_order');
        $this->db->group_by('rider_id');
        return $this->db->get()->result();
    }


    // public function getongoingorderlistsindividual($model_data)
    // {   $id = $model_data['id'];

    //     $this->db->select('order.*,group_order_conn.*');
    //     $this->db->from('group_order_conn');
    //     $this->db->where('group_order_conn.group_order_id',$id);
    //     $this->db->join('order', 'order.order_id = group_order_conn.order_id');
    //     $this->db->where('order.order_status_id !=',1);
    //     return $this->db->get()->result();
 
    // }

    public function getongoingorderlistsindividual($model_data)
    {   $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('group_order_conn');
        $this->db->join('order', 'order.order_id = group_order_conn.order_id');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        $this->db->where('group_order_conn.group_order_id',$id);
        $this->db->where('order.order_status_id !=',1);
        return $this->db->get()->result();
 
    }

    public function gettaskorderlistsindividual($model_data)
    {   $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('group_order_conn');
        $this->db->join('order', 'order.order_id = group_order_conn.order_id');
        $this->db->join('users', 'users.user_id = order.vendor_id');
        $this->db->where('group_order_conn.group_order_id',$id);
        $this->db->where('order.order_status_id !=',4);
        $this->db->where('order.order_status_id !=',2);
        return $this->db->get()->result();
    }  


    public function checkridertask($model_data)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id',$model_data['id']);
        $this->db->where('status','ontask');
        return $this->db->get()->result();
    }

    public function checkvendororder($model_data)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('order', 'order.vendor_id = users.user_id');
        $this->db->where('users.user_id',$model_data['id']);
        $this->db->where('order.order_status_id !=',4);
        return $this->db->get()->result();
    }



























//============================================= Add Model Request ======================================//

    //   Add vendor Data with out  Image  
    public function addvendorwithoutimgInfo($model_data) 
    {
        $user_type_id = $model_data['user_type'];
        $number = $model_data['number'];
        $business_nature = $model_data['business_nature'];
        $username = $model_data['username'];
        $email = $model_data['email'];
        $address = $model_data['address']; 
        $businessname = $model_data['businessname']; 
        $temppassword = $model_data['password']; 
        $password = password_hash($temppassword, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users(`username`,`email`,`password`,`mobile`,`user_type`,`business_nature`,`name`,`address`)  VALUES('$username','$email','$password','$number','$user_type_id','$business_nature','$businessname','$address')";
        $result = $this->db->query($sql);
        return true;
    }

     //  Add vendor Image And data 
    public function addvendorimage($model_data) 
    {
        $id = $model_data['id'];
        $user_type_id = $model_data['user_type'];
        $number = $model_data['number'];
        $business_nature = $model_data['business_nature'];
        $username = $model_data['username'];
        $email = $model_data['email'];
        $address = $model_data['address'];
        $businessname = $model_data['businessname'];
        $temppassword = $model_data['password'];
        $password = password_hash($temppassword, PASSWORD_BCRYPT);
        $image = $model_data['image'];

        $sql = "INSERT INTO users(`username`,`email`,`password`,`mobile`,`user_type`,`business_nature`,`image_url`,`name`,`address`)  VALUES('$username','$email','$password','$number','$user_type_id','$business_nature','$image','$businessname','$address')";
        $result = $this->db->query($sql);
        return true;
    }

    //   Add Rider data without image  
    public function addriderwithoutimgInfo($model_data) 
    {
        $id = $model_data['id'];
        $user_type_id = $model_data['user_type_id'];
        $username = $model_data['username'];
        $id_proof = $model_data['id_proof'];
        $email = $model_data['email'];
        $license_no = $model_data['license_no'];
        $number = $model_data['number'];
        $emergency_contact_no = $model_data['emergency_contact_no'];
        $name = $model_data['name'];
        $address = $model_data['address'];
        $status = $model_data['status']; 
        $temppassword = $model_data['password']; 
        $password = password_hash($temppassword, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users(`username`,`email`,`password`,`mobile`,`user_type`,`id_proof`,`license_no`,`emergency_contact_no`,`name`,`address`,`status`)  VALUES('$username','$email','$password','$number','$user_type_id','$id_proof','$license_no','$emergency_contact_no','$name','$address','$status')";
        $result = $this->db->query($sql);
        return true;

    }

     //   Add Rider image and data 
    public function addriderimage($model_data) 
    {
        $id = $model_data['id'];
        $user_type_id = $model_data['user_type_id'];
        $username = $model_data['username'];
        $id_proof = $model_data['id_proof'];
        $email = $model_data['email'];
        $license_no = $model_data['license_no'];
        $number = $model_data['number'];
        $emergency_contact_no = $model_data['emergency_contact_no'];
        $name = $model_data['name'];
        $address = $model_data['address'];
        $status = $model_data['status']; 
        $temppassword = $model_data['password']; 
        $password = password_hash($temppassword, PASSWORD_BCRYPT);
        $image = $model_data['image'];

        $sql = "INSERT INTO users(`username`,`email`,`password`,`mobile`,`user_type`,`id_proof`,`license_no`,`emergency_contact_no`,`image_url`,`address`,`name`,`status`)  VALUES('$username','$email','$password','$number','$user_type_id','$id_proof','$license_no','$emergency_contact_no','$image','$address','$name','$status')";
        $result = $this->db->query($sql);
        return true;
    }


    //  Assign  Order To Rider 
    public function assigngroupordertorider($model_data) 
    {
        $group_id = $model_data['group_id'];
        $rider_id = $model_data['rider_id'];

        $this->db->select('order_id');
        $this->db->from('group_order_conn');
        $this->db->where('group_order_id',$group_id);
        $order_id = $this->db->get()->result();

        $sql = "UPDATE `group_order` SET `rider_id` = '$rider_id' WHERE group_order_id = '$group_id'";
        $result = $this->db->query($sql);

        $sql = "UPDATE `users` SET `status` = 'ontask' WHERE user_id = '$rider_id'";
        $result = $this->db->query($sql);

        foreach ($order_id as $id) {
            $id = $id->order_id;

            $sql = "UPDATE `order` SET `order_status_id` = '2' WHERE order_id = '$id'";
            $this->db->query($sql);
        }    

        return true;
    } 

    //   Assign Back Date Order To Rider 
    public function assignbackdateordertorider($model_data) 
    {
        $group_id = $model_data['group_id'];
        $rider_id = $model_data['rider_id'];
        $date = $model_data['date'];

        $this->db->select('order_id');
        $this->db->from('group_order_conn');
        $this->db->where('group_order_id',$group_id);
        $order_id = $this->db->get()->result();

        $sql = "UPDATE `group_order` SET `rider_id` = '$rider_id' WHERE group_order_id = '$group_id'";
        $this->db->query($sql);

        foreach ($order_id as $id) {
            $id = $id->order_id;

            $sql = "UPDATE `order` SET `order_status_id` = '4', `dropoff_date` = '$date' WHERE order_id = '$id'";
            $this->db->query($sql);
        }    
        return true;
    } 

    //  Create Group Id
    public function create_group($model_data) 
    {   
        $order_id = $model_data['order_id'];
        $rider_id = "00000";

        $sql = "INSERT INTO group_order(`rider_id`)  VALUES('$rider_id')";
        $result = $this->db->query($sql);
        return $this->db->insert_id();

    } 

    //  Insert Group Id and Order Id   
    public function create_group_data($model_data) 
    {   
        $order_id = $model_data['order_id'];
        $group_id = $model_data['group_id'];

        foreach ($order_id as $id) {

            $sql = "INSERT INTO group_order_conn(`order_id`,`group_order_id`)  VALUES('$id','$group_id')";
            $result = $this->db->query($sql);

            $sql = "UPDATE `order` SET `group_status` = 'group' WHERE order_id = '$id'";
            $this->db->query($sql);
        }
        return true;
    } 



    //  Group Change to ungroup 
    public function ungroup($model_data) 
    {   
        $group_id = $model_data['group_id'];

        $this->db->select('order_id');
        $this->db->from('group_order_conn');
        $this->db->where('group_order_id',$group_id);
        $order_id = $this->db->get()->result();


        foreach ($order_id as $id) {
            $id = $id->order_id;
            $sql = "UPDATE `order` SET `group_status` = 'ungroup' WHERE order_id = '$id'";
            $this->db->query($sql);
        }

        $sql = "DELETE FROM group_order_conn WHERE group_order_id = '$group_id'";
        $this->db->query($sql);

        $sql = "DELETE FROM group_order WHERE group_order_id = '$group_id'";
        $this->db->query($sql);
        return true;
    } 

    //  Assign  Order To Rider 
    public function reassigngroupordertorider($model_data) 
    {
        $group_id = $model_data['group_id'];
        $rider_id = $model_data['rider_id'];

        $sql = "UPDATE `group_order` SET `rider_id` = '$rider_id' WHERE group_order_id = '$group_id'";
        $this->db->query($sql);

        $sql = "UPDATE `users` SET `status` = 'ontask' WHERE user_id = '$rider_id'";
        $result = $this->db->query($sql);

        return true;
    } 




// ====================================== Update Vendor Model Request ======================================//


    // Update vendor data
    public function updatevendorInfoimage($model_data)
    {
        $id = $model_data['id'];
        $user_type_id = $model_data['user_type_id'];
        $number = $model_data['number'];
        $business_nature = $model_data['business_nature'];
        $username = $model_data['username'];
        $email = $model_data['email'];
        $address = $model_data['address']; 
        $businessname = $model_data['businessname']; 
        $temppassword = $model_data['password']; 
        $password = password_hash($temppassword, PASSWORD_BCRYPT);
        $image = $model_data['image'];


        $sql = "UPDATE `users` SET `username` = '$username', `email` = '$email',`password` = '$password',`mobile` = '$number',`user_type` = '$user_type_id',`business_nature` = '$business_nature',`image_url` = '$image' ,`name` = '$businessname',`address` = '$address' WHERE user_id = '$id'";
        $this->db->query($sql);
    }


    // Update vendor data
    public function updatevendorInfowithoutimgInfo($model_data)
    {
        $id = $model_data['id'];
        $user_type_id = $model_data['user_type_id'];
        $number = $model_data['number'];
        $business_nature = $model_data['business_nature'];
        $username = $model_data['username'];
        $email = $model_data['email'];
        $address = $model_data['address']; 
        $businessname = $model_data['businessname'];
        $temppassword = $model_data['password']; 
        $password = password_hash($temppassword, PASSWORD_BCRYPT);

        $sql = "UPDATE `users` SET `username` = '$username', `email` = '$email',`password` = '$password',`mobile` = '$number',`user_type` = '$user_type_id',`business_nature` = '$business_nature' ,`name` = '$businessname',`address` = '$address' WHERE user_id = '$id'";
        $this->db->query($sql);
    }


    // Update vendor data
    public function updateriderInfoimage($model_data)
    {
        $id = $model_data['id'];
        $user_type_id = $model_data['user_type_id'];
        $username = $model_data['username'];
        $id_proof = $model_data['id_proof'];
        $email = $model_data['email'];
        $license_no = $model_data['license_no'];
        $number = $model_data['number'];
        $emergency_contact_no = $model_data['emergency_contact_no'];
        $name = $model_data['name'];
        $address = $model_data['address'];
        $temppassword = $model_data['password']; 
        $password = password_hash($temppassword, PASSWORD_BCRYPT);
        $image = $model_data['image'];

        $sql = "UPDATE `users` SET `username` = '$username', `email` = '$email',`password` = '$password',`mobile` = '$number',`user_type` = '$user_type_id',`id_proof` = '$id_proof',`license_no` = '$license_no',`image_url` = '$image',`emergency_contact_no` = '$emergency_contact_no',`name`= '$name',`address` = '$address' WHERE user_id = '$id'";
        $this->db->query($sql);

    }


    // Update vendor data
    public function updateriderInfowithoutimgInfo($model_data)
    {
        $id = $model_data['id'];
        $user_type_id = $model_data['user_type_id'];
        $username = $model_data['username'];
        $id_proof = $model_data['id_proof'];
        $email = $model_data['email'];
        $license_no = $model_data['license_no'];
        $number = $model_data['number'];
        $emergency_contact_no = $model_data['emergency_contact_no'];
        $name = $model_data['name'];
        $address = $model_data['address'];
        $temppassword = $model_data['password']; 
        $password = password_hash($temppassword, PASSWORD_BCRYPT);

        $sql = "UPDATE `users` SET `username` = '$username', `email` = '$email',`password` = '$password',`mobile` = '$number',`user_type` = '$user_type_id',`id_proof` = '$id_proof',`license_no` = '$license_no',`emergency_contact_no` = '$emergency_contact_no',`name`= '$name',`address` = '$address' WHERE user_id = '$id'";
        $this->db->query($sql);
    }

    //  Canecl Order
    public function cancelongoingtaskorder($model_data) 
    {
        $order_id = $model_data['order_id'];

        $sql = "UPDATE `order` SET `order_status_id` = '3' WHERE order_id = '$order_id'";
        $this->db->query($sql);
        return true;
    }     

    
    public function reassignorder($model_data) 
    {
        $order_id = $model_data['order_id'];

        $sql = "UPDATE `order` SET `order_status_id` = '1',`group_status` = 'ungroup' WHERE order_id = '$order_id'";
        $this->db->query($sql);

        $sql = "DELETE FROM group_order_conn WHERE order_id = '$order_id'";
        $this->db->query($sql);

        return true;
    }    

    //  Canecl Order
    public function canceltaskorder($model_data) 
    {
        $order_id = $model_data['order_id'];

        $sql = "UPDATE `order` SET `order_status_id` = '3' WHERE order_id = '$order_id'";
        $this->db->query($sql);
        return true;
    }     



//===================================== UPdate Inline Model Request =========================//
    
    // Update clients Inline data
    public function updateriderdelete($model_data) {
        $columns = array(
            1 => 'delete',
        );
        $colVal = '';
        $colIndex = $rowid = 0;

        $riderresult = $this->checkridertask($model_data);
         
        if(empty($riderresult)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }
            //    $sql = "DELETE FROM users WHERE user_id='".$rowid."'";
                $sql = "UPDATE `users` SET `status` = 'deleted' WHERE user_id = '".$rowid."'";

            $this->db->query($sql);
            return true;
        }
        return false;
    } 


     // Update clients Inline data
    public function updatevendordelete($model_data) {
        $columns = array(
            1 => 'delete',
        );
        $colVal = '';
        $colIndex = $rowid = 0;


        $vendorresult = $this->checkvendororder($model_data);
         
        if(empty($vendorresult)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }
            //  $sql = "DELETE FROM users WHERE user_id='".$rowid."'";
                $sql = "UPDATE `users` SET `status` = 'deleted' WHERE user_id = '".$rowid."'"; 

            $this->db->query($sql);
            return true;
        }
        return false;
    } 



    public function getAddress($latitude,$longitude){
        if(!empty($latitude) && !empty($longitude)){
            //Send request and receive json data by address
            //&sensor=false
            $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude)); 
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
    public function getMapRiderData($model_data)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('group_order', 'group_order.rider_id = users.user_id','left');
        $this->db->where('users.user_id',$model_data['user_id']);
        $rider_data = $this->db->get()->row();
        $address = $this->getAddress($rider_data->latitude,$rider_data->longitude);

        $riderInfo = array(
            'location' => $rider_data,
            'address' => $address,
        );

        echo json_encode($riderInfo);
        
    }





}
