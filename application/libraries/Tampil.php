<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Tampil {

        public $title = "myApp";
        public $instansi= "SDN Kasiyan 3";
        public $menu=array(
            //Menu => Controller
            'Home'=>'Home',
            'Data Siswa'=>'Siswa',
            'Nilai Siswa'=>'Nilai',
            'Kelompok Belajar'=>'Ahc',
            'Import'=>'Import',
        );
        
        //jangan rubah yang dibawah ini yah
        public $content = "";
        public $js=array();


        public function cetak() {
            $CI = & get_instance();
            
            $this->load_setting();
            
            $data = array(
                'title' => $this->title,
                'content' => $this->content,
                'instansi' => $this->instansi,
                'menu'=>$this->menu,
                'js'=> $this->js,
            );

            $CI->load->view("bootstrap_view", $data);
        }
        public function add_content($content) {
            $this->content .= $content;
            return $this;
        }
        
        public function set_content($content) {
            $this->content = $content;
            return $this;
        }
        private function load_setting(){
            $CI= & get_instance();
            $CI->load->database();
            $data=$CI->db->get('app_setting',1);
            
            $this->title=$data->row_array()['title'];
            $this->instansi=$data->row_array()['app_name'];
        }
    }
    