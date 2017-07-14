<?php

    class User extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Auth');
        }

        public function index() {
            $this->login();
        }

        public function logout() {
            session_destroy();
            redirect('User/login');
        }

        public function login() {
            if ($_POST) {
                $_SESSION['user'] = $this->input->post('username');
                $_SESSION['pass'] = $this->input->post('password');
                redirect('Home');
            }
            $this->load->view('Login');
        }

        public function profile() {
            if($_POST){
                $this->if_post($_SESSION['user'], $_SESSION['pass']);
            }
            $this->load->library('Tampil');
            $this->load->helper('form');
            $tampil = new Tampil();

            $data_user = new Auth();
            $ar_data_user = $data_user->cari_user($_SESSION['user'], $_SESSION['pass'])['data'];

            $username = "";
            $password = "";
            $full_name = "";
            if (count($ar_data_user) > 0) {
                $username = $ar_data_user['nama_user'];
                $password = $ar_data_user['password_user'];
                $full_name = $ar_data_user['nama_lengkap_user'];
            }

            $html = "";
            $html .= '<div class="panel panel-primary">
                      <div class="panel-heading">Profile  ' . $_SESSION['user'] . '</div>
                      <div class="panel-body">
                    ';
            $html .= form_open();

            $html .= '<div class="form-group">';
            $html .= '<label>Username</label>';
            $html .= form_input("username", $username, 'class="form-control"');
            $html .= '</div>';

            $html .= '<div class="form-group">';
            $html .= '<label>Nama Lengkap</label>';
            $html .= form_input("full_name", $full_name, 'class="form-control"');
            $html .= '</div>';

            $html .= '<div class="form-group">';
            $html .= '<label>Password</label>';
            $html .= form_input("password", $password, 'class="form-control"');
            $html .= '</div>';
            
            $html.= form_submit('', 'Simpan', 'class="btn btn-primary"');
            
            $html .= form_close();

            $html .= '</div>
                    </div>'; //panel

            $tampil->set_content($html);
            $tampil->cetak();
        }
        private function if_post($username,$password){
            $this->db->where('nama_user',$username);
            $this->db->where('password_user',$password);
            $data_id=$this->db->get('tb_user');
            $id=$data_id->row_array()['id_user'];
            
            $this->db->where('id_user',$id);
            $this->db->update('tb_user',
                array(
                    'nama_user'=> $this->input->post('username'),
                    'password_user'=> $this->input->post('password'),
                    'nama_lengkap_user'=> $this->input->post('full_name'),
                )        
            );
            redirect('User');
        }
    }
    