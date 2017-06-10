<?php

    if (!defined('BASEPATH')) exit('No direct script access allowed');
    
    class Ahc_avg_nilai extends CI_Model {

        
        public $query="";
       
        function __construct() {
            //parent::__construct();
            $this->load->database();
        }
        public function get_data(){
            $data= $this->db->query($this->query);
            return $data->result_array();
        }

        public function Set_data($thn_masuk,$mapel) {
            $this->query="

		select tb_nilai.siswa,tb_siswa.nama_siswa, sum(tb_nilai.nilai) as t_nilai 
                ,format (avg(tb_nilai.nilai),1 ) as avgg
                from tb_nilai
		left join tb_siswa
			on tb_nilai.siswa=tb_siswa.id_siswa
		where
			tb_nilai.mapel='".$mapel."' and
			tb_siswa.thn_masuk='".$thn_masuk."'                
		group by
			tb_nilai.siswa
		order by t_nilai desc
";
            //echo "<pre>".$this->query;
            //die();
            return $this;
            
        }

    }

?>