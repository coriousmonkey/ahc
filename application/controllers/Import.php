<?php
class Import extends CI_Controller {
		public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->library('Tampil');
                $this->load->helper('form');
                $this->load->model('Auth');
                $this->Auth->is_logged_in();
        }
        public function index()
        {
        	$var=new Tampil();
            $html="";
            //$html.= $error;

            $html.='<div class="col-md-3"></div>';
            
            $html.='<div class="col-md-6">';
            $html.='<div class="panel panel-primary">
                      <div class="panel-heading">Upload CSV</div>
                      <div class="panel-body">
                    ';
            $html.= form_open_multipart(site_url('Import/upload'));
            $html.='<input type="file" name="userfile" size="20" />';
            $html.='<br /><br />';
            $html.='<input class="btn btn-primary" type="submit" value="upload" />';
            $html.='</form>';
            $html.='<div>';
            $html.="</div>";
            $html.="</div>";
            
            $html.='<div class="col-md-3"></div>';
            
            $var->set_content($html);  
            $var->cetak();   
        }
        public function upload(){
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'csv';
                
            $this->load->library('upload', $config);   
            
            echo "<pre>";
            if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        print_r($data);
                        //redirect(site_url("Import"));
                } 
            echo "</pre>";
            echo anchor(site_url("Import"),"Kembali");
            
            if(isset($data['upload_data']['full_path'])){
                //$csv = array_map('str_getcsv', file($data['upload_data']['full_path']));
                $csv = $this->csv_to_array( $data['upload_data']['full_path'],";" );
                echo "<pre>";
                print_r($csv);  
            }
        }
        function csv_to_array($filename='', $delimiter=',')
        {
            if(!file_exists($filename) || !is_readable($filename))
                return FALSE;
        
            $header = NULL;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== FALSE)
            {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
                {
                    if(!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
            }
            return $data;
        }
}