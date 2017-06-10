<?php
class User extends CI_Controller {
		public function __construct()
        {
                parent::__construct();
                $this->load->model('Auth');
        }
        public function index()
        {
            $this->login();   
        }
        public function logout(){
            session_destroy();
            redirect('User/login');
        }
        public function login(){
            if($_POST){
                $_SESSION['user']=$this->input->post('username');
                $_SESSION['pass']=$this->input->post('password');
                redirect('Home');
            }
        	$this->load->view('Login');
        }
}