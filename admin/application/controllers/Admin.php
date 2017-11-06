<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	  public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('loginmodel');
        $this->load->model('adminmodel'); 
    }


// ==================================== Controller Pages Request ===================================//
	

	public function index()
	{
		$this->load->view('contents/login');
	}

	public function home($status="",$id="")
	{
		$this->checklogin();
		if(!empty($id)) {
			$riderData = $this->adminmodel->getriderdataById($id);
			$data['address'] = $this->adminmodel->getAddress($riderData->latitude,$riderData->longitude);
		} else {
			$riderData = "";
			$data['address'] = "";
		}
		$data['status'] = $status;
		$data['riderlist'] = $this->adminmodel->getriderdatalist();
		$data['riderData'] = $riderData;
		$data['rider_id'] = $id;
		$data['pageName'] = "HOME";
		$this->load->view('content_handler', $data);
	}


	public function maplocation($status="")
	{
		$this->checklogin();
		$data['pageName'] = "MAPLOCATION";
		$data['status'] = $status;
		$this->load->view('map_content_handler', $data);
	}

	

	public function dashboard()
	{
		$this->checklogin();
		$data['pageName'] = "DASHBOARD"; 
		$data['completelistondashborad'] = $this->adminmodel->getcompletelistondashborad();
		$data['ongoingorderlistondashborad'] = $this->adminmodel->getongoingorderlistondashborad();
		$data['unassignorderlistondashborad'] = $this->adminmodel->getunassignorderlistondashborad();
		$data['cancelorderlistondashborad'] = $this->adminmodel->getcancelorderlistondashborad();
		$data['avaliableriderlistondashborad'] = $this->adminmodel->getavaliableriderlistondashborad();
	//	$data['onlineriderlistondashborad'] = $this->adminmodel->getonlineriderlistondashborad();
		$this->load->view('content_handler', $data);
	}

	public function manage_orders()
	{
		$this->checklogin();
		$data['manageorderdatalist'] = $this->adminmodel->getmanageorderdatalist();
		$data['pageName'] = "MANAGEORDERS";
		$this->load->view('content_handler', $data);
	}

	public function group_orders()
	{
		$this->checklogin();
		$data['orderdatalist'] = $this->adminmodel->getorderdatalist();
		$data['pageName'] = "GROUPORDERS";
		$this->load->view('content_handler', $data);
	}

	public function vendor_overview()
	{
		$model_data = array(
            'id'=> $this->input->get('vendor_id'),
        );
		$this->checklogin();
		$data['vendororderlist'] = $this->adminmodel->getvendororderlist($model_data);
		$data['pageName'] = "VENDOROVERVIEW";
		$this->load->view('content_handler', $data);
	}

	public function task_list()
	{
		$this->checklogin();
		$data['taskorderlist'] = $this->adminmodel->gettaskorderlist();
		$data['riderdatalist'] = $this->adminmodel->getriderdatalist();
		$data['pageName'] = "TASKLIST";
		$this->load->view('content_handler', $data);
	}

	public function ongoing_tasks()
	{
		$this->checklogin();
		$data['ongoingorderlist'] = $this->adminmodel->getongoingorderlist();
		$data['riderdatalist'] = $this->adminmodel->getriderdatalist();
		$data['pageName'] = "ONGOINGTASKS";
		$this->load->view('content_handler', $data);
	}

	public function completed_tasks()
	{
		$this->checklogin();
		$data['completetaskorderlist'] = $this->adminmodel->getcompletetaskorderlist();
		$data['pageName'] = "COMPLETEDTASKS";
		$this->load->view('content_handler', $data);
	}

	public function rider_report()
	{
		$this->checklogin();
		$data['riderreportlist'] = $this->adminmodel->getriderreportlist();
		$data['pageName'] = "RIDERREPORT";
		$this->load->view('content_handler', $data);
	}

	public function reports($profile_tab = "report")
	{
		$this->checklogin();
		$data['profile_tab'] = $profile_tab;
		$data['vendorandriderdatalist'] = $this->adminmodel->getvendorandriderdatalist();
		$data['pageName'] = "REPORTS";
		$this->load->view('content_handler', $data);
	}

	public function vendors()
	{
		$this->checklogin();
		$data['vendordatalist'] = $this->adminmodel->getvendordatalist();
		$data['pageName'] = "VENDORS";
		$this->load->view('content_handler', $data);
	}

	public function riders()
	{
		$this->checklogin();
		$data['riderdatalist'] = $this->adminmodel->getriderdatalist();
		$data['pageName'] = "RIDERS";
		$this->load->view('content_handler', $data);
	}

	public function edit_riders()
	{
		$model_data = array(
            'id'=> $this->input->get('rider_id'),
        );
		$this->checklogin();
		$data['riderdata'] = $this->adminmodel->getriderdata($model_data);
		$data['vendordatalist'] = $this->adminmodel->getvendordatalist($model_data);
	//	$data['rideraddressdata'] = $this->adminmodel->getrideraddressdata($model_data);
		$data['pageName'] = "EIDTRIDERS";
		$this->load->view('content_handler', $data);
	}

	public function edit_vendor()
	{
		$model_data = array(
            'id'=> $this->input->get('vendor_id'),
        );
		$this->checklogin();
		$data['vendordata'] = $this->adminmodel->getvendordata($model_data);
	//	$data['businessdatalist'] = $this->adminmodel->getbusinessdatalist($model_data);
	//	$data['vendoraddressdata'] = $this->adminmodel->getvendoraddressdata($model_data);
		$data['pageName'] = "EIDTVENDOR";
		$this->load->view('content_handler', $data);
	}


	public function edit_ongoing_task()
	{
		$model_data = array(
            'id'=> $this->input->get('group_order_id'),
        );
		$this->checklogin();
		$data['ongoingorderlistsindividual'] = $this->adminmodel->getongoingorderlistsindividual($model_data);
		$data['pageName'] = "EIDTONGOINGTASK";
		$this->load->view('content_handler', $data);
	}

	public function edit_task_list()
	{
		$model_data = array(
            'id'=> $this->input->get('group_order_id'),
        );
		$this->checklogin();
		$data['taskorderlistsindividual'] = $this->adminmodel->gettaskorderlistsindividual($model_data);
		$data['pageName'] = "EIDTTASKLIST";
		$this->load->view('content_handler', $data);
	}

	public function getMapRiderData()
	{
		$model_data = array(
            'user_id' => $_POST['id'],
        );
		$this->checklogin();
		$this->adminmodel->getMapRiderData($model_data);
	}
	
	



// ========================= Login And Logout And Check Login Controller Request=============================//

	public function login()
    {
        $this->load->model('loginmodel');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->loginmodel->verify_login($username, $password);
        if ($result == '0') {
            $this->session->set_flashdata('error_msg', 'Incorrect credentials');
            redirect('admin');
        } else if ($result == 'NO_USER_FOUND') {
            $this->session->set_flashdata('error_msg', 'USER NOT FOUND');
            redirect('admin');
        } else {
            $this->session->set_userdata('admin_data', $result);
             redirect('admin/dashboard');
        }
    }

    public function logout()
	{
		$this->session->unset_userdata('admin_data');
		session_destroy();
		$this->load->view('contents/login');
	}


	public function checklogin() 
    {
        if(!$this->session->userdata('admin_data')) 
        {
            redirect('admin');
        }
    }



// ==================================== Add Controller Request =======================================//

    // add Vendor Info
    public function addvendor()
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
	            'id' => $this->input->post('id'),
	            'user_type' => $this->input->post('user_type_id'),
	            'username' => $this->input->post('username'),
	            'email' => $this->input->post('email'),
	            'password' => $this->input->post('password'),
	            'number' => $this->input->post('number'),
	            'business_nature' => $this->input->post('business_nature'),
	            'address' => $this->input->post('address'),
	            'businessname' => $this->input->post('businessname'),
            );
            $this->adminmodel->addvendorwithoutimgInfo($model_data);
            $this->session->set_flashdata('success_msg', 'Vendor Added Successfully...');
            redirect('admin/edit_vendor');
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $model_data = array(
            	'id' => $this->input->post('id'),
	            'user_type_id' => $this->input->post('user_type_id'),
	            'username' => $this->input->post('username'),
	            'email' => $this->input->post('email'),
	            'password' => $this->input->post('password'),
	            'number' => $this->input->post('number'),
	            'business_nature' => $this->input->post('business_nature'),
	            'address' => $this->input->post('address'),
	            'businessname' => $this->input->post('businessname'),
                'image' => $data1['upload_data']['file_name'],
            );
            $this->adminmodel->addvendorimage($model_data);
            $this->session->set_flashdata('success_msg', 'Vendor Added Successfully...');
            redirect('admin/edit_vendor');
        }
    }

    // add Vendor Info
    public function addrider()
    {

        $config['upload_path'] = './images/rider';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
             $model_data = array(
	            'id' => $this->input->post('id'),
	            'user_type_id' => $this->input->post('user_type_id'),
	            'username' => $this->input->post('username'),
	            'id_proof' => $this->input->post('id_proof'),
	            'email' => $this->input->post('email'),
	            'license_no' => $this->input->post('license_no'),
	            'number' => $this->input->post('number'),
	            'emergency_contact_no' => $this->input->post('emergency_contact_no'),
	            'password' => $this->input->post('password'),
	            'address' => $this->input->post('address'),
	            'name' => $this->input->post('name'),
            );
            $this->adminmodel->addriderwithoutimgInfo($model_data);
            $this->session->set_flashdata('success_msg', 'Rider Added Successfully...');
            redirect('admin/edit_riders');
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $model_data = array(
            	'id' => $this->input->post('id'),
	            'user_type_id' => $this->input->post('user_type_id'),
	            'username' => $this->input->post('username'),
	            'id_proof' => $this->input->post('id_proof'),
	            'email' => $this->input->post('email'),
	            'license_no' => $this->input->post('license_no'),
	            'number' => $this->input->post('number'),
	            'emergency_contact_no' => $this->input->post('emergency_contact_no'),
	            'password' => $this->input->post('password'),
	            'name' => $this->input->post('name'),
	            'address' => $this->input->post('address'),
                'image' => $data1['upload_data']['file_name'],
            );
            $this->adminmodel->addriderimage($model_data);
            $this->session->set_flashdata('success_msg', 'Rider Added Successfully...');
            redirect('admin/edit_riders');
        }
    }

    public function assigngroupordertorider()
    {
    	$model_data = array(
        	'group_id' => $this->input->post('group_id'),
            'rider_id' => $this->input->post('rider_id'),
        );

    	$this->adminmodel->assigngroupordertorider($model_data);
    	redirect('admin/task_list'); 
    }

     public function assignbackdateordertorider()
    {
    	$model_data = array(
        	'group_id' => $this->input->post('group_id'),
            'rider_id' => $this->input->post('rider_id'),
            'date' => $this->input->post('date'),
        );

    	$this->adminmodel->assignbackdateordertorider($model_data);
    	redirect('admin/task_list'); 
    }

    public function reassigngroupordertorider()
    {
    	$model_data = array(
        	'group_id' => $this->input->post('group_id'),
            'rider_id' => $this->input->post('rider_id'),
        );

    	$this->adminmodel->reassigngroupordertorider($model_data);
    	redirect('admin/ongoing_tasks'); 
    }


//============================================== Update Controller Request ===================================//


    // Update Vendor Info
    public function updatevendorInfo()
    {
        $config['upload_path'] = './images/rider';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
             $model_data = array(
	            'id' => $this->input->post('id'),
	            'user_type_id' => $this->input->post('user_type_id'),
	            'username' => $this->input->post('username'),
	            'email' => $this->input->post('email'),
	            'password' => $this->input->post('password'),
	            'number' => $this->input->post('number'),
	            'business_nature' => $this->input->post('business_nature'),
	            'address' => $this->input->post('address'),
	            'businessname' => $this->input->post('businessname'),
            );
            $this->adminmodel->updatevendorInfowithoutimgInfo($model_data);
            $this->session->set_flashdata('success_msg', 'Vendor update Info Successfully...');
            redirect('admin/edit_vendor?vendor_id=' . $model_data['id'], 'refresh');
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $model_data = array(
            	'id' => $this->input->post('id'),
	            'user_type_id' => $this->input->post('user_type_id'),
	            'username' => $this->input->post('username'),
	            'email' => $this->input->post('email'),
	            'password' => $this->input->post('password'),
	            'number' => $this->input->post('number'),
	            'business_nature' => $this->input->post('business_nature'),
	            'address' => $this->input->post('address'),
	            'businessname' => $this->input->post('businessname'),
                'image' => $data1['upload_data']['file_name'],
            );
            $this->adminmodel->updatevendorInfoimage($model_data);
            $this->session->set_flashdata('success_msg', 'Vendor update Info Successfully...');
            redirect('admin/edit_vendor?vendor_id=' . $model_data['id'], 'refresh');
        }
    }

    // Update Vendor Info
    public function updateriderInfo()
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
	            'id' => $this->input->post('id'),
	            'user_type_id' => $this->input->post('user_type_id'),
	            'username' => $this->input->post('username'),
	            'id_proof' => $this->input->post('id_proof'),
	            'email' => $this->input->post('email'),
	            'license_no' => $this->input->post('license_no'),
	            'number' => $this->input->post('number'),
	            'emergency_contact_no' => $this->input->post('emergency_contact_no'),
	            'password' => $this->input->post('password'),
	            'name' => $this->input->post('name'),
	            'address' => $this->input->post('address'),
            );
            $this->adminmodel->updateriderInfowithoutimgInfo($model_data);
            $this->session->set_flashdata('success_msg', 'Rider Update Info Successfully...');
            redirect('admin/edit_riders?rider_id=' . $model_data['id'], 'refresh');
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $model_data = array(
            	 'id' => $this->input->post('id'),
	            'user_type_id' => $this->input->post('user_type_id'),
	            'username' => $this->input->post('username'),
	            'id_proof' => $this->input->post('id_proof'),
	            'email' => $this->input->post('email'),
	            'license_no' => $this->input->post('license_no'),
	            'number' => $this->input->post('number'),
	            'emergency_contact_no' => $this->input->post('emergency_contact_no'),
	            'password' => $this->input->post('password'),
	            'name' => $this->input->post('name'),
	            'address' => $this->input->post('address'),
                'image' => $data1['upload_data']['file_name'],
            );
            $this->adminmodel->updateriderInfoimage($model_data);
            $this->session->set_flashdata('success_msg', 'Rider Update Info Successfully...');
            redirect('admin/edit_riders?rider_id=' . $model_data['id'], 'refresh');
        }
    }

    public function cancelongoingtaskorder()
    {
    	$model_data = array(
        	'order_id' => $this->input->get('order_id'),
        	'group_order_id' => $this->input->get('group_order_id'),
        );
    	$this->adminmodel->cancelongoingtaskorder($model_data);
    	redirect('admin/edit_ongoing_task?group_order_id=' . $model_data['group_order_id'], 'refresh'); 
    }

    public function reassignorder()
    {
    	$model_data = array(
        	'order_id' => $this->input->get('order_id'),
        	'group_order_id' => $this->input->get('group_order_id'),
        );
        print_r($model_data);
        exit();

    	$this->adminmodel->reassignorder($model_data);
    	redirect('admin/edit_ongoing_task?group_order_id=' . $model_data['group_order_id'], 'refresh'); 
    }

    public function create_group()
    {
    	$model_data = array(
        	'order_id' => $this->input->post('group'),
        	'vendor_id' => $this->input->post('vendor_id'),
        );
    	$insert_id = $this->adminmodel->create_group($model_data);
    	$model_data['group_id'] = $insert_id;

    	$this->adminmodel->create_group_data($model_data);

    	redirect('admin/vendor_overview?vendor_id=' . $model_data['vendor_id'], 'refresh'); 
    }

    public function ungroup()
    {
    	$model_data = array(
        	'group_id' => $this->input->get('group_order_id'),
            // 'order_id' => $this->input->post('order_id'),
        );

    	$this->adminmodel->ungroup($model_data);
    	redirect('admin/task_list'); 
    }

    public function canceltaskorder()
    {
    	$model_data = array(
        	'order_id' => $this->input->get('order_id'),
        	'group_order_id' => $this->input->get('group_order_id'),
        	'id'=> $this->input->get('group_order_id'),
        );
        $data['taskorderlistsindividual'] = $this->adminmodel->gettaskorderlistsindividual($model_data);
    	$this->adminmodel->canceltaskorder($model_data);
    	redirect('admin/edit_task_list?group_order_id=' . $model_data['group_order_id'], 'refresh'); 
    }




//======================================== Update Inline ==================================================//

    // Ajax Inline Update
    public function updateInline($task="")
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
        );

        if ($task == "riderdelete") 
            $status = $this->adminmodel->updateriderdelete($model_data);
        if ($task == "vendordelete") 
            $status = $this->adminmodel->updatevendordelete($model_data);
       
        if ($status == true) {
            $msg = array('msg' => 'success');
        } else {
            $msg = array('msg' => 'error');
        }
        echo json_encode($msg);
    }

    public function vendorandriderreport($profile_tab = "viewreport")
    {
    	$model_data = array(
            'vendorandriderid' => $this->input->post('vendorandriderid'),
            'period' => $this->input->post('period'),
	        'fromdate' => $this->input->post('fromdate'),
	        'todate' => $this->input->post('todate'),
        );

        //check type of selected vendor ot driver
        $model_data['selected_type'] = $this->adminmodel->getTypeOfUser($model_data['vendorandriderid']);

        if (!empty($model_data['period'])) {	
        	$data['riderreport']  = $this->adminmodel->vendorandriderreportbyperiod($model_data);
		}	
        else {	
        	$data['riderreport']  = $this->adminmodel->vendorandriderreport($model_data);
		}

        if (!empty($data['riderreport'])) {	
	        $data['profile_tab'] = 'viewreport';
		}	
        else {	
        	$this->session->set_flashdata('error_msg', 'No Data Available');
	        $data['profile_tab'] = 'report';
		}

		$data['vendorandriderdatalist'] = $this->adminmodel->getvendorandriderdatalist();
		$data['pageName'] = "REPORTS";
		$this->load->view('content_handler', $data);
    }

     // Ajax Inline Update
    public function mapriderid()
    {
        $model_data = array(
            'id' => $_POST['id'],
        );

        print_r($model_data);
        exit();

        $status = $this->adminmodel->updateriderdelete($model_data);
       
        if ($status == true) {
            $msg = array('msg' => 'success');
        } else {
            $msg = array('msg' => 'error');
        }
        echo json_encode($msg);
    }





}
