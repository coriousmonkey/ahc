<?php
    class Ahc extends CI_Controller {

        public function __construct() {
            parent::__construct();
            // Your own constructor code
            $this->load->library('Tampil');
            $this->load->helper('form');
            $this->load->model('Auth');
            $this->load->model('Ahc_avg_nilai');
            $this->Auth->is_logged_in();
        }

        public function index() {
            $var = new Tampil();
            $html = "";

            $mapel = "";
            $tahun_masuk = "";
            $jml_kelompok = "";

            $cluster = array();

            if ($_POST) {
                $mapel = $this->input->post('mapel');
                $tahun_masuk = $this->input->post('thn_masuk');
                $jml_kelompok = $this->input->post('jml_kelompok');
                if ($jml_kelompok <= 0 || $jml_kelompok == "") {
                    $jml_kelompok = 2;
                }
                $cluster = $this->hitung($jml_kelompok, $tahun_masuk, $mapel);
            }

            $data = $this->db->get('tb_mapel');
            $ar_mapel = array();
            foreach ($data->result_array() as $row) {
                $ar_mapel[$row['id_mapel']] = $row['nama_mapel'];
            }
            $data = $this->db->query('select distinct tb_siswa.thn_masuk 
            from tb_siswa');
            $ar_thn_masuk = array();
            foreach ($data->result_array() as $row) {
                $ar_thn_masuk[$row['thn_masuk']] = $row['thn_masuk'];
            }


            $html .= '<div class="panel panel-primary">
                      <div class="panel-heading">Bagi Kelompok Belajar Siswa</div>
                      <div class="panel-body">
                    ';
            $html .= form_open();
            $html .= '<div class="form-group">';
            $html .= '<label>Mata Pelajaran</label>';
            $html .= form_dropdown("mapel", $ar_mapel, $mapel, 'class="form-control"');
            $html .= '</div>';

            $html .= '<div class="form-group">';
            $html .= '<label>Jumlah pengelompokan</label>';
            $html .= form_input("jml_kelompok", $jml_kelompok, 'class="form-control" maxlength="2"');
            $html .= '</div>';


            $html .= '<div class="form-group">';
            $html .= '<label>Tahun Masuk</label>';
            $html .= form_dropdown("thn_masuk", $ar_thn_masuk, $tahun_masuk, 'class="form-control"');
            $html .= '</div>';

            $html .= '<div  class="form-group" >';
            $html .= '<button type="submit" class="btn btn-primary" >Proses</button>';
            $html .= '</div>';

            $html .= form_close();

            $html .= '</div>
                    </div>'; //panel

            $var->js = array(
                'custom.js',
            );

            if ($_POST) {

                foreach ($cluster as $key => $row) {

                    $html .= '<div class="panel panel-primary">
                      <div class="panel-heading">Kelompok ' . ($key + 1) . '</div>
                      <!--
                      <div class="panel-body">
                      </div>
                      -->
                    ';

                    $html .= '<table class="table table-bordered table-striped">';
                    $html .= "<thead>";
                    $html .= "<tr>";
                    $html .= "<th>id siswa</th>";
                    $html .= "<th>Nama siswa</th>";
                    $html .= "<th>Nilai</th>";
                    $html .= "<tr>";
                    $html .= "</thead>";
                    foreach ($row as $row1) {
                        $html .= "<tr>";
                        $html .= "<td>" . $row1['siswa'] . "</td>";
                        $html .= "<td>" . $row1['nama_siswa'] . "</td>";
                        $html .= "<td>" . $row1['avgg'] . "</td>";
                        $html .= "</tr>";
                    }
                    $html .= '</table>';

                    $html .= '
                    </div>'; //panel
                }
            }

            $var->set_content($html);
            $var->cetak();
        }

        private function hitung($jml_kelompok, $tahun, $mapel) {
            $data = new Ahc_avg_nilai();
            $data->Set_data($tahun, $mapel);

            $max_nilai = 0;
            $min_nilai = 0;
            $buff = array();
            foreach ($data->get_data() as $key => $row) {
                array_push($buff, $row['t_nilai']);
            }
            $max_nilai = max($buff);
            $min_nilai = min($buff);
            $selisih = $max_nilai - $min_nilai;
            $divier = $selisih / ($jml_kelompok * 1);

            // echo $min_nilai;

            $div = array();
            $i = 0;
            $cluster = array();
            $min_div = 0;
            $max_div = 0;
            while ($i < $jml_kelompok) {
                $cluster[$i] = array();

                $div[$i] = $divier;

                if ($i == 0) {
                    $max_div = $max_nilai;
                }
                else {
                    $max_div = $max_nilai - $div[$i - 1];
                }
                $min_div = $max_nilai - $div[$i];

                foreach ($data->get_data() as $key => $row) {
                    if ($row['t_nilai'] > $min_div && $row['t_nilai'] <= $max_div) {
                        array_push($cluster[$i], $row);
                    }
                }
                $divier = $divier + $divier;
                $i++;
            }
            return $cluster;
        }

    }
    