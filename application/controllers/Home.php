<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('homemodel');
    }


	// Home
	public function index()
	{	
		$this->mViewData['data'] = array(
        //    'businessdatalist' => $this->homemodel->getbusinessdatalist(),
            'period' => "",
         );
        $this->mPageTitle = 'Login';
		$this->render('registration');
	}

    public function vendorDashboard($profile_tab = "home",$rider_id="" )
    {   
         $this->is_logged_in();
        $userInfo = $this->session->userdata('login_data');
        $model_data = array(
            'id' => $userInfo->user_id
        );

        if(!empty($rider_id)) {  
            $riderData = $this->homemodel->getRiderOrderDataById($rider_id);
            $this->mViewData['data'] = array(
                'profile_tab' => $profile_tab,
                'rider_id' => $rider_id,
                'ongoingRiderList' => $this->homemodel->getongoingRiderList($model_data),
                'riderData' => $riderData,
                'riderLocation' => $this->homemodel->getAddress($riderData->latitude,$riderData->longitude),
                'orderData' => $this->homemodel->getOrderData($rider_id),
                'orderdatalist' => $this->homemodel->getorderdatalist($model_data),
                'vendordatainfo' => $this->homemodel->getvendordatainfo($model_data),
                'ongoingorderlist' => $this->homemodel->getongoingorderlist($model_data),
                'completetaskorderlist' => $this->homemodel->getcompletetaskorderlist($model_data),
                'period' => "",
            );                
        } else {
            $this->mViewData['data'] = array(
                'profile_tab' => $profile_tab,
                'rider_id' => $rider_id,
                'ongoingRiderList' => $this->homemodel->getongoingRiderList($model_data),
                'riderData' => "",                
                'riderLocation' => "",
                'orderData' => array(),
                'orderdatalist' => $this->homemodel->getorderdatalist($model_data),
                'vendordatainfo' => $this->homemodel->getvendordatainfo($model_data),
                'ongoingorderlist' => $this->homemodel->getongoingorderlist($model_data),
                'completetaskorderlist' => $this->homemodel->getcompletetaskorderlist($model_data),
                'period' => "",
            ); 
        }

        
        $this->mPageTitle = 'VENDORDASHBOARD';
        $this->render('vendor_dashboard');
    }


// =============================  Forget Password Controller Request ====================================//    

    public function resetNewPassword()
    {
        $this->mViewData['data'] = array(
            'token' => $this->input->get('token'),
         );
        $this->mPageTitle = 'Lost Password';
        $this->render('lost_password');
    }

    // function for forgot password
    public function forgotpassword() 
    {
        $model_data = array(
            'email' => $this->input->post('email'),
            //'token' => bin2hex(random_bytes(25)),
            'token' => "vgr3vb3g54fewvbetg34fvebtg34fwvebg34fegr34ef",
        );

        $email_check = $this->homemodel->checkEmail($model_data['email']);
        if(!$email_check) {
            redirect('home');
        }

        $status = $this->homemodel->addToken($model_data);
        if($status) {
            $to_email = $model_data['email'];
            $token = $model_data['token'];
            $subject = "Reset your password of My deliver to you";
            $url = site_url('home/resetNewPassword'."?token=".$token);
            $message = "Reset your password of My deliver to you by clicking on link<br/>".$url;

            $this->sendEmail($to_email,$subject,$message);            
        }
    }

    public function sendEmail($to,$subject,$message)
    {        
        $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'mr.ashwin15@gmail.com';
        $config['smtp_pass'] = 'ashwin8109775011';
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $this->email->initialize($config); 
        $this->email->from('mr.ashwin15@gmail.com', 'My Deliver to you');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()){
            $this->session->set_flashdata('success_msg', 'Mail Successfully Send ');
            redirect('home');
        }else{
            $this->session->set_flashdata('error_msg', 'Warning Mail Not  Send ');
            redirect('home');
        }       
    }

    // function for reseting password
    public function resetpassword() {
        $model_data = array(
            'token' => $this->input->post('token'),
            'password' => $this->input->post('password'),
        );
       
        $status = $this->homemodel->resetPassword($model_data);
          if($status == "true") {
            $this->session->set_flashdata('success_msg', 'password has been changed successfully Please Login');
             redirect('home');
        } else {
            $this->session->set_flashdata('error_msg','Reset password link is expried! Please try again');
             redirect('home');
        }
    }

//============================================= Add Controller Data Request ============================//   



    // add Vendor Info
      public function vendorregistration()
    {

        $config['upload_path'] = './images/vendor';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
             $model_data = array(
                'user_type_id' => $this->input->post('user_type_id'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'number' => $this->input->post('number'),
                'business_nature' => $this->input->post('business_nature'),
                'address' => $this->input->post('address'),
                'name' => $this->input->post('name'),
            );
            $this->homemodel->vendorregistrationwithoutimgInfo($model_data);
            $this->session->set_flashdata('success_msg', 'Vendor Registration Successful...');
            redirect('home');
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $model_data = array(
                'user_type_id' => $this->input->post('user_type_id'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'number' => $this->input->post('number'),
                'business_nature' => $this->input->post('business_nature'),
                'address' => $this->input->post('address'),
                'name' => $this->input->post('name'),
                'image' => $data1['upload_data']['file_name'],
            );
            $this->homemodel->vendorregistrationimage($model_data);
            $this->session->set_flashdata('success_msg', 'Vendor Registration Successful...');
            redirect('home');
        }
    }


    // vendor registration
    public function addorder()
    {
        $model_data = array(
            'orderno' => $this->input->post('orderno'),
            'vendorid' => $this->input->post('vendorid'),
            'customername' => $this->input->post('customername'),
            'customercontact' => $this->input->post('customercontact'),
            'details' => $this->input->post('details'),
            'instruction' => $this->input->post('instruction'),
            'contact' => $this->input->post('contact'),
            'pickupaddline1' => $this->input->post('pickupaddline1'),
            'pickupaddline2' => $this->input->post('pickupaddline2'),
            'pickuppostcode' => $this->input->post('pickuppostcode'),
            'pickupstate' => $this->input->post('pickupstate'),
            'dropofaddline1' => $this->input->post('dropofaddline1'),
            'dropofaddline2' => $this->input->post('dropofaddline2'),
            'dropofpostcode' => $this->input->post('dropofpostcode'),
            'dropofstate' => $this->input->post('dropofstate'),
            // 'deliverytime' => $this->input->post('deliverytime'),
            'pickupcity' => $this->input->post('pickupcity'), 
            'dropcity' => $this->input->post('dropcity'),
            // 'quanity' => $this->input->post('quanity'),
            'ordertype' => $this->input->post('ordertype'), 
            'pickuptime' => $this->input->post('pickuptime'), 
            'pickupdate' => $this->input->post('pickupdate'),
            'dropoftime' => $this->input->post('dropoftime'), 
            'dropofdate' => $this->input->post('dropofdate'), 
            'ordername' => $this->input->post('ordername'), 
            'amount' => $this->input->post('amount'), 
        );

        $this->homemodel->addorder($model_data); 
        redirect('home/vendorDashboard/insert_order');
    }

    

    public function vendorchangepassword()
    {
         $model_data = array(
            'id' => $this->input->post('id'),
            'password' => $this->input->post('password'),
            'newpassword' => $this->input->post('newpassword'),
        );

        $this->homemodel->vendorchangepassword($model_data);
        $this->session->set_flashdata('success_msg', 'Password Changed  Successful...');
        redirect('home/vendorDashboard/change_password'); 
    }



// ===========================================  Import Order Files ===============================//


    // import customers
    public function importorders()
    {
        $config['upload_path'] = './import_files/';
        $config['allowed_types'] = 'xls|xlsx|ods';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['max_filename'] = 0;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file-1')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $filepath = $data1['upload_data']['file_name'];

            $file = APPPATH . "../import_files/" . $filepath;
            //load the excel library
            $this->load->library('excel');
            //read file from path
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            //get only the Cell Collection
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
            //extract to a PHP readable array format
            foreach ($cell_collection as $cell) {
                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                //header will/should be in row 1 only. of course this can be modified to suit your need.
                if ($row == 1) {
                    $header[$row][$column] = $data_value;
                } else {
                    $arr_data[$row][$column] = $data_value;
                }
            }
            //send the data in an array format
            //$data['header'] = $header;
            $data['values'] = $arr_data;

            $data['status'] = $this->homemodel->importorders($data);
            if ($data['status'] == true) {
                redirect('home/vendorDashboard/insert_order', 'refresh');
            }
        }
    }


    public function maplocation()
    {
        $userInfo = $this->session->userdata('login_data');
        $data['pageName'] = "MAPLOCATION";
        $data['user_id'] = $userInfo->user_id;
        $this->load->view('map_content_handler', $data);
    }



    public function vendorreportfororderquality($profile_tab = "report")
    {
        $userInfo = $this->session->userdata('login_data');
        $model_data = array(
            'vendorid' => $userInfo->user_id,
            'period' => $this->input->post('period'),
            'fromdate' => $this->input->post('fromdate'),
            'todate' => $this->input->post('todate'),
            'id' => $userInfo->user_id,
        );
   
        $totalquatity = $this->homemodel->vendorreportfororderquality($model_data);
        $totaldistance = $this->homemodel->vendorreportfordistance($model_data);
        $totalcancelled = $this->homemodel->vendorreportforcancelledorder($model_data);
        $totalamount = $this->homemodel->vendorreportforpriceorder($model_data);

        if (!empty($model_data['period'])) {         
            $date_date = $this->homemodel->getPeriodDetails($model_data);
            $currentdate = $date_date['currentdate'];
            $fromdate = date("m-d-Y",strtotime($date_date['fromdate']));
            $todate = date("m-d-Y",strtotime($date_date['todate']));
        } else {
            $currentdate = "";
            $fromdate = $model_data['fromdate'];
            $todate = $model_data['todate'];
        }
      
        $this->mViewData['data'] = array(            

            // 'ordertypedatalist' => $this->homemodel->getordertypedatalist(),
            'orderdatalist' => $this->homemodel->getorderdatalist($model_data),
            'vendordatainfo' => $this->homemodel->getvendordatainfo($model_data),
            'ongoingorderlist' => $this->homemodel->getongoingorderlist($model_data),
            'completetaskorderlist' => $this->homemodel->getcompletetaskorderlist($model_data),
            // 'riderlocationlist' => $this->homemodel->getriderlocationlist(),


            'profile_tab' => $profile_tab,
            'totalquatity' => $totalquatity,
            'totaldistance' => $totaldistance,
            'totalcancelled' => $totalcancelled,
            'totalamount' => $totalamount,
            'period' => $model_data['period'],
            'currentdate' => $currentdate,
            'fromdate' => $fromdate,
            'todate' => $todate,
        );

        if (!empty($totalquatity) || !empty($totaldistance) || !empty($totalcancelled) || !empty($totalamount) ) {
            $this->session->set_flashdata('report_msg', '');  
        }
        else {
            $this->session->set_flashdata('report_msg', 'No Data Available');
        } 
        $this->mPageTitle = 'VENDORDASHBOARD';
        $this->render('vendor_dashboard');       
    }    

    public function getRiderOrderData()
    {
        $model_data = array(
            'user_id' => $_POST['id'],
        );
        $this->homemodel->getRiderOrderData($model_data);
    }
      

 }
