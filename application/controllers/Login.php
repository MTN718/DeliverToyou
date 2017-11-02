<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of home_Controller,
// since no authentication is required

class Login extends MY_Controller
{


     // Login function
    public function index()
    {
        $this->load->model('loginmodel');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->loginmodel->verify_login($username, $password);

        if ($result == '0') {
            $this->session->set_flashdata('error_msg', 'Incorrect credentials');
            redirect('home');
        } else if ($result == 'NO_USER_FOUND') {
            $this->session->set_flashdata('error_msg', 'USER NOT FOUND');

            redirect('home');
        } else {
            $this->session->set_userdata('login_data', $result);
            redirect('home/vendorDashboard');
        }
    }

      // Logout function
    public function logout()
    {
        $this->session->unset_userdata('login_data');
        session_destroy();
        redirect('home');
    }





}

?>
