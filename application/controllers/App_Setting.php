<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

    class App_Setting extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->library('Tampil');
            $this->load->helper('form');
            $this->load->model('Auth');
            $this->load->model('Ahc_avg_nilai');
            $this->Auth->is_logged_in();
        }

        public function index() {
            $this->load->model('App_Setting_model');
            
            $tampil = new Tampil();

            $app_name="";
            $title="";
            
            $appsetting=new App_Setting_model();
           
            if($_POST){
                $appsetting->setApp_name($_POST['app_name']);
                $appsetting->setTitle($_POST['title']);
                $appsetting->set_all();
            }
            
            $app_name=$appsetting->get_all()['app_name'];
            $title=$appsetting->get_all()['title'];

            $html = "";
            $html .= '<div class="panel panel-primary">
                      <div class="panel-heading">Aplication Setting</div>
                      <div class="panel-body">
                    ';
            $html .= form_open();

            $html .= '<div class="form-group">';
            $html .= '<label>Nama Aplikasi</label>';
            $html .= form_input("app_name", $app_name, 'class="form-control"');
            $html .= '</div>';
            
            $html .= '<div class="form-group">';
            $html .= '<label>Title</label>';
            $html .= form_input('title', $title, 'class="form-control"');
            $html .= '</div>';
            
            $html.= form_submit('','Simpan','class="btn btn-primary"');
            $html .= '</div>
                    </div>'; //panel
            $html.= form_close();

            $tampil->set_content($html);
            $tampil->cetak();
        }
    }
    