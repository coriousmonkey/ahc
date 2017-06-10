<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Model {
    
    public $username="admin";
    public $password="admin";
    
	function __construct()
	{
		parent::__construct();
        if (!isset($_SESSION)){ 
            session_start();
        }
        if (!isset($_SESSION['user'])){
                $_SESSION['user']="username";
        }
        //$this->is_logged_in();
	}
    public function is_logged_in(){
        if($_SESSION['user']==$this->username && $_SESSION['pass']==$this->password ){
            //pass
        }else{
            redirect('User/login');
        }
    }
}