<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    
    class Ahc_selisih extends CI_Model {
        
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
select siswa2,siswa, abs(t_nilai-t_nilai2) as selisih from (
	select * from (
		select tb_nilai.siswa, sum(tb_nilai.nilai) as t_nilai from tb_nilai
		left join tb_siswa
			on tb_nilai.siswa=tb_siswa.id_siswa
		where
			tb_nilai.mapel='".$mapel."' and
			tb_siswa.thn_masuk='".$thn_masuk."'                
		group by
			tb_nilai.siswa
		order by tb_nilai.siswa asc
	) as tbb
	
	left join  (
		select tb_nilai.siswa as siswa2, sum(tb_nilai.nilai) as t_nilai2 from tb_nilai
		left join tb_siswa
			on tb_nilai.siswa=tb_siswa.id_siswa
		where
			tb_nilai.mapel='".$mapel."' and
			tb_siswa.thn_masuk='".$thn_masuk."'                
		group by
			tb_nilai.siswa
		order by tb_nilai.siswa asc
	) as tbb2
	
	on tbb2.siswa2 < tbb.siswa

) as tbbb
where 
siswa2 is not Null
and
siswa is not Null
order by selisih,siswa2,siswa
";
            return $this;
            
        }
    }