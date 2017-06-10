<?php
class Ahc2 extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                //$this->load->library('Tampil');
                //$this->load->helper('form');
                //$this->load->model('Auth');
                //$this->Auth->is_logged_in();
                $this->load->model('Ahc_selisih');
                $this->load->model('Ahc_avg_nilai');
                $this->load->library('Array_search_multi');
        }
        public function index()
        {
            $data=new Ahc_avg_nilai();
            $data->Set_data('2011', '1');
            $this->cetak($data->get_data());
            
            $sel=new Ahc_selisih();
            $sel->Set_data('2011', '1');
            $this->cetak($sel->get_data());
            
        }
        private function cetak($html){
            echo '<textarea style="width: 100%;height: 100px;">';
            print_r($html);
            echo "</textarea>";
        }
    }