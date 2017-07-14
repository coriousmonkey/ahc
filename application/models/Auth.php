<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Auth extends CI_Model {

        function __construct() {
            parent::__construct();
            if (!isset($_SESSION)) {
                session_start();
            }
            if (!isset($_SESSION['user'])) {
                $_SESSION['user'] = "username";
            }
            //$this->is_logged_in();
        }
        
        public function cari_user ($username,$password){
            $this->db->where('nama_user',$username);
            $this->db->where('password_user',$password);
            $data=$this->db->get('tb_user');
            $is_ketemu=false;
            if(count($data->row_array()) > 0 ){
                $is_ketemu=true;
            }
            return 
            
            array(
                'is_ketemu'=>$is_ketemu,
                'data'=>$data->row_array()
            );
        }

        public function is_logged_in() {
            if ($this->cari_user($_SESSION['user'], $_SESSION['pass'] )['is_ketemu']) {
                //pass
            }
            else {
                redirect('User/login');
            }
        }

    }
    