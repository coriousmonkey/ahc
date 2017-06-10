<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Tampil {

        public $title = "myApp";
        public $instansi= "Nama SD";
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

    }
    