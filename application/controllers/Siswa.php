<?php
class Siswa extends CI_Controller {
		public function __construct()
        {
                parent::__construct();
                $this->load->library('Tampil');
                $this->load->helper('form');
                $this->load->model('Auth');
                $this->load->model('Table_gen');
                $this->Auth->is_logged_in();
        }
        public function index()
        {
            	$this->Table_gen->id='id_siswa'; //(!penting)kolom id yang akan digunakan untuk url edit
                $this->Table_gen->edit_url=site_url().'/Siswa/edit'; //url ke controller untuk edit (opsional)
                $this->Table_gen->delete_url=site_url().'/Siswa/Delete'; //url ke controller untuk delete (opsional)
                $this->Table_gen->controller_url=site_url().'/Siswa'; //(!penting) url controller script ini  
                
                $where="";
                if($_POST){
                    $where="
                    where 
                    nama_siswa like '%".$this->input->post('nama_siswa')."%'
                    and
                    thn_masuk like '%".$this->input->post('thn_masuk')."%'
                    ";
                }
                $q="SELECT * 
                FROM 
                `tb_siswa` ";
                
                $h=$this->db->query($q.$where);
                if($h->num_rows() < 1 ){
                    $this->Table_gen->query = $q;
                }else{
                    $this->Table_gen->query = $q.$where;     
                }
                
                
                $myhtmltable= $this->Table_gen->with_paging_query(); //generate tabelnya dalam bentuk string
                
                $var=new Tampil();
                $html="";
                
                $isi_panel=
                form_open().
                '
                <table style="width:100%;" >
                    <tr style="margin-bottom:5px;">
                        <td>Nama Siswa</td>
                        <td>'.form_input('nama_siswa',$this->input->post('nama_siswa'),'class="form-control"').'</td>
                    </tr>
                    <tr>
                        <td><br /></td>
                        <td><br /></td>
                    </tr>
                    <tr>
                        <td>Tahun Masuk</td>
                        <td>'.form_input('thn_masuk',$this->input->post('thn_masuk'),'class="form-control"').'</td>
                    </tr>
                    <tr>
                        <td><br /></td>
                        <td><br /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.form_submit("","Cari",'class="btn btn-primary"').'</td>
                    </tr>
                </table>
                '.
                form_close()
                ;
                
                $html.='<div class="panel panel-primary">
                      <div class="panel-heading">Cari Siswa</div>
                      <div class="panel-body">'.$isi_panel.'</div>
                    </div>';
                
                $html.=anchor(site_url('Siswa/add'),"Tambah","class='btn btn-primary'")."<br /><br />";
                
                $html.=$myhtmltable;
                $var->set_content($html);  
                $var->cetak();
                
        }
        public function edit(){
            
            $var=new Tampil();
        
            $html="";
            
            $id_siswa=$this->input->get('id_siswa');
            
            if($_POST){
                if($this->input->post('id_siswa')){
                    $this->db->where('id_siswa',$this->input->post('id_siswa'));
                    $this->db->update(
                        'tb_siswa',
                        array(
                            'nama_siswa'=>$this->input->post('nama_siswa'),
                            'thn_masuk'=>$this->input->post('thn_masuk'),
                            'kelas'=>$this->input->post('kelas'),
                        )
                    );
                    redirect(site_url('Siswa'));
                    
                }else{
                    $this->db->insert(
                        'tb_siswa',
                        array(
                            'nama_siswa'=>$this->input->post('nama_siswa'),
                            'thn_masuk'=>$this->input->post('thn_masuk'),
                            'kelas'=>$this->input->post('kelas'),
                        )
                    );
                    redirect(site_url('Siswa'));
                }   
            }
            
            $data=$this->db->where('id_siswa',$id_siswa)->get('tb_siswa');
            $data_siswa=$data->row_array();
            
            $nama_siswa="";
            $thn_masuk="";
            $kelas="";
            
            if(isset($id_siswa)){
                $nama_siswa=$data_siswa['nama_siswa'];
                $thn_masuk=$data_siswa['thn_masuk'];
                $kelas=$data_siswa['kelas'];
            }
            
            $data=$this->db->query('select DISTINCT tb_siswa.thn_masuk from tb_siswa');
            
            $opsi_tahun=array();
            
            foreach($data->result_array() as $r){
                $opsi_tahun[$r['thn_masuk']]=$r['thn_masuk'];   
            }
            
            $konten="";            
            $konten.=form_open();
            if(isset($id_siswa)){
                $konten.=form_input("id_siswa",$id_siswa,'class="hidden"');
            }
            
            $konten.='<div class="row">';
                $konten.='<div class="col-md-6">';
                    $konten.='Nama Siswa';
                $konten.='</div>';
                $konten.='<div class="col-md-6">';
                    $konten.=form_input("nama_siswa",$nama_siswa,'class="form-control"');
                $konten.='</div>';
            $konten.='</div>';
            
            $konten.='<br />';
            
            $konten.='<div class="row">';
                $konten.='<div class="col-md-6">';
                    $konten.='Tahun Masuk';
                $konten.='</div>';
                $konten.='<div class="col-md-6">';
                    $konten.=form_dropdown("thn_masuk",$opsi_tahun,$thn_masuk,'class="form-control"');
                $konten.='</div>';
            $konten.='</div>';
            
            $konten.='<br />';
            
            $konten.='<div class="row">';
                $konten.='<div class="col-md-6">';
                    $konten.='Kelas';
                $konten.='</div>';
                $konten.='<div class="col-md-6">';
                    $konten.=form_input("kelas",$kelas,'class="form-control"');
                $konten.='</div>';
            $konten.='</div>';
            
            $konten.='<br />';
            
            $konten.=form_submit("","Save",'class="btn btn-primary" style="float:right;"');
            
            $konten.=form_close();
            
            $panel_nama="Tambah";
            if(isset($id_siswa)){
                $panel_nama="Edit";
            }
            
            $html.='<div class="panel panel-primary">
                      <div class="panel-heading">'.$panel_nama.' Siswa</div>
                      <div class="panel-body">'.$konten.'</div>
                    </div>';
            
            $var->set_content($html);  
            $var->cetak();
        }
        public function add(){
            $this->edit();
        }
        public function delete(){
            if($this->input->get('id_siswa')){
                $this->db->where('id_siswa',$this->input->get('id_siswa'));
                $this->db->delete('tb_siswa');    
                redirect('Siswa');
            }
        }
}