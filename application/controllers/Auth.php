<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
    public function signup() {
        $this->load->view('signup');
    }

    public function register() {
        $data = [
            'username' => $this->input->post('username'),
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        ];
        $this->load->model('User_model');
        $this->User_model->create_user($data);
        redirect('login');
    }

    public function login() {
        $this->load->view('login');
    }

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');  
    }

    public function login_process() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
    
        $user = $this->User_model->authenticate($email, $password); 
        if ($user) {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('user_id', $user->id);
            echo json_encode(['success' => true, 'redirect' => base_url('home')]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
        }
    }
    
    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('login');
    }
}
