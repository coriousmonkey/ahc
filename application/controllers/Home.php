<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('Tampil');
        //$this->load->helper('form');
        $this->load->model('Auth');
        $this->Auth->is_logged_in();
	}
    public function index(){
        $var=new Tampil();
        
        $html="";
        
        $var->set_content($html);  
        $var->cetak();
    }
}