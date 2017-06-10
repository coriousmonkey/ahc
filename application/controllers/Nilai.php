<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Nilai extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('Tampil');
            $this->load->helper('form');
            $this->load->model('Auth');
            $this->Auth->is_logged_in();
        }

        public function index(){
            
            $var=new Tampil();
            
            $html="";
            
            $kelas="";
            $mapel="";
            $semester="";
            $tahun_masuk="";
            
            if($_POST){
                $kelas=$this->input->post('kelas'); 
                $mapel=$this->input->post('mapel');
                $semester=$this->input->post('semester');  
                $tahun_masuk=$this->input->post('thn_masuk');             
            }
            else{
                $kelas=$this->input->get('kelas'); 
                $mapel=$this->input->get('mapel');
                $semester=$this->input->get('semester');  
                $tahun_masuk=$this->input->get('thn_masuk');             
            }
             
            $data_nilai=$this->get_nilai($kelas,$semester,$mapel,$tahun_masuk); 
            
            $html.=form_open_multipart();
            
            $data=$this->db->get('tb_kelas');
            $ar_kelas=array();
            foreach($data->result_array() as $row){
                $ar_kelas[$row['id_kelas']]=$row['kelas'];
            }
            
            $data=$this->db->get('tb_mapel');
            $ar_mapel=array();
            foreach($data->result_array() as $row){
                $ar_mapel[$row['id_mapel']]=$row['nama_mapel'];
            }
            
            $data=$this->db->get('tb_semester');
            $ar_semester=array();
            foreach($data->result_array() as $row){
                $ar_semester[$row['id_semester']]=$row['semester'];
            }
            
            $data=$this->db->query('select distinct tb_siswa.thn_masuk 
            from tb_siswa');
            $ar_thn_masuk=array();
            foreach($data->result_array() as $row){
                $ar_thn_masuk[$row['thn_masuk']]=$row['thn_masuk'];
            }
            
            $html.='<div class="panel panel-primary">
                      <div class="panel-heading">Data Nilai Siswa</div>
                      <div class="panel-body">
                    ';
            
            $html.='<div class="form-group">';
            $html.='<label>Kelas</label>';
            $html.=form_dropdown("kelas",$ar_kelas,$kelas,'class="form-control"');
            $html.='</div>';
            
            $html.='<div class="form-group">';
            $html.='<label>Semester</label>';
            $html.=form_dropdown("semester",$ar_semester,$semester,'class="form-control"');
            $html.='</div>';
            
            $html.='<div class="form-group">';
            $html.='<label>Mata Pelajaran</label>';
            $html.=form_dropdown("mapel",$ar_mapel,$mapel,'class="form-control"');
            $html.='</div>';            
            
            $html.='<div class="form-group">';
            $html.='<label>Tahun Masuk</label>';
            $html.=form_dropdown("thn_masuk",$ar_thn_masuk,$tahun_masuk,'class="form-control"');
            $html.='</div>';
            
            $html.='<button type="submit" class="btn btn-primary">Tampilkan</button>';
            $html.=form_close();
            
            $html.='</div>
                    </div>';//panel
             
            
            $html.="<br />";
            $html.="<br />";
            $html.="<br />";
            
            $q="
            select * from tb_siswa
            where
            thn_masuk = ".$this->db->escape($tahun_masuk)."
            ";
            
            $data=$this->db->query($q);
            
            $html.=form_open_multipart(site_url('Nilai/simpan'));
            
            $html.="<div class = 'hidden'>";
            $html.=form_input("save_kelas",$kelas)."<br />";
            $html.=form_input("save_semester",$semester)."<br />";
            $html.=form_input("save_mapel",$mapel)."<br />";
            $html.=form_input("save_thn_masuk",$tahun_masuk)."<br />";
            $html.="</div>";
            
            $html.="<table class='table table-bordered'>";
            $html.="<thead>";
                $html.='<th>Nama Siswa</th>';
                $html.='<th>Nilai</th>';
            $html.="</thead>";
            $html.="<tbody>";
            
            foreach($data->result_array() as $row){
                $html.="<tr>";
                    $html.='<td>'.$row['nama_siswa'].'</td>'; 
                    
                    $html.='<td>';
                    $key_nilai=array_search($row['id_siswa'],array_column($data_nilai,'siswa'));
                
                    $class="";
                    
                    $nilai_per_siswa="";
                    if(is_bool($key_nilai) && !$key_nilai){
                        $nilai_per_siswa="";
                        $class=" has-error";
                    }else{
                        if(isset($data_nilai[$key_nilai]['nilai'])){
                            $nilai_per_siswa=$data_nilai[$key_nilai]['nilai'];
                        }
                    }
                    
                    $html.='<input type="text" name="'.$row['id_siswa'].'" class="number-only form-control '.$class.'" value="'.$nilai_per_siswa.'" >';
                    $html.='</td>';
                      
                $html.="</tr>";
            }
            
            $html.="</tbody>";
            $html.='</table>';
            
            if($_POST || $_GET){
                $html.='<div  class="form-group" >';
                $html.='<button type="submit" class="btn btn-primary" >simpan</button>';
                $html.='</div>';
            }
           
            $html.=form_close();
            $var->js=array(
                'custom.js',
            );
            $var->set_content($html);  
            $var->cetak();   
        }
        public function simpan(){
            $data_nilai=$this->get_nilai(
                $_POST['save_kelas'],
                $_POST['save_semester'],
                $_POST['save_mapel'],
                $_POST['save_thn_masuk']
            );
            
            
            $insert_data=array();
            $total_tambah=0;
            foreach($_POST as $pv_key=>$pv){
                if(
                    $pv_key=='save_kelas' ||
                    $pv_key=='save_semester' ||
                    $pv_key=='save_mapel' ||
                    $pv_key=='save_thn_masuk'
                ){
                    //pass
                }
                else{
                    array_push(
                        $insert_data,
                        array(
                            'siswa'=>$pv_key,
                            'kelas'=> $_POST['save_kelas'],
                            'semester'=> $_POST['save_semester'],
                            'mapel'=> $_POST['save_mapel'],
                            'nilai'=>$pv
                        )
                    );
                }
                //
                $total_tambah++;
            }
            $id_nilai=array();
            $total_hapus=0;
            foreach($data_nilai as $get_nilai){
                array_push($id_nilai,$get_nilai['id_nilai']);
                $total_hapus++;
            }
            
            if($total_hapus>0){
                $this->db->where_in('id_nilai',$id_nilai);
                $this->db->delete('tb_nilai');
                //echo "menghapus";
            }
            if($total_tambah>0){
                //echo "<pre>";
                //print_r($insert_data);
                $this->db->insert_batch('tb_nilai',$insert_data);
            }
            $url_param=array(
                            'kelas'=> $_POST['save_kelas'],
                            'semester'=> $_POST['save_semester'],
                            'mapel'=> $_POST['save_mapel'],
                            'thn_masuk'=>$_POST['save_thn_masuk'],
            );
            
            redirect('Nilai?'.http_build_query($url_param));
        }
        
        private function get_nilai($kelas,$semester,$mapel,$thn_masuk){
            $q="
            select 
            tb_nilai.id_nilai,
            tb_nilai.siswa,
             tb_nilai.kelas,
             
             tb_nilai.semester,
             tb_nilai.mapel,
             tb_nilai.nilai
              
            from tb_siswa
            
            right join  tb_nilai
            on tb_nilai.siswa=tb_siswa.id_siswa
            
            where
            tb_nilai.kelas=".$this->db->escape($kelas)." and
            tb_nilai.semester=".$this->db->escape($semester)." and
            tb_nilai.mapel=".$this->db->escape($mapel)." and
            tb_siswa.thn_masuk=".$this->db->escape($thn_masuk)."
            
            order by tb_nilai.siswa
            ";
            $data=$this->db->query($q);
            return $data->result_array();
        }   
    }
    