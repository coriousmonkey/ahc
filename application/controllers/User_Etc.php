<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

    class User_Etc extends CI_Controller {
                
        function __construct() {
            parent::__construct();
            $this->load->model();
        }

        public function index() {
        }

    }
    