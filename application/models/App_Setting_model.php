<?php

    if (!defined('BASEPATH')) exit('No direct script access allowed');

    class App_Setting_model extends CI_Model {

        protected $app_name = "";
        protected $title = "";
        protected $home_image1 = "";
        protected $home_image2 = "";
        protected $home_image3 = "";

        public function __construct() {
            parent::__construct();
        }
/*
        public function getApp_name() {
            return $this->app_name;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getHome_image1() {
            return $this->home_image1;
        }

        public function getHome_image2() {
            return $this->home_image2;
        }

        public function getHome_image3() {
            return $this->home_image3;
        }
 * 
 */

        public function setApp_name($app_name) {
            $this->app_name = $app_name;
            return $this;
        }

        public function setTitle($title) {
            $this->title = $title;
            return $this;
        }

        public function setHome_image1($home_image1) {
            $this->home_image1 = $home_image1;
            return $this;
        }

        public function setHome_image2($home_image2) {
            $this->home_image2 = $home_image2;
            return $this;
        }

        public function setHome_image3($home_image3) {
            $this->home_image3 = $home_image3;
            return $this;
        }

        public function get_all() {
            $data = $this->db->get('app_setting', 1);
            return $data->row_array();
        }

        public function set_all() {
            $data = array(
                'app_name' => $this->app_name,
                'title' => $this->title,
                'home_image1' => $this->home_image1,
                'home_image2' => $this->home_image2,
                'home_image3' => $this->home_image3
            );
            
            $this->db->query('delete from app_setting');
            $this->db->insert('app_setting',$data);
        }

    }
    