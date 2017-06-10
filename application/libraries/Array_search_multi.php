<?php
   if (!defined('BASEPATH')) exit('No direct script access allowed');

    /**
     *
     * @author Harits Wahyu
     * @since  Jun 4, 2017
     * used to search data in multidimensional array
     * 
     */
    class Array_search_multi{
        
        protected $array = array();
        protected $filters=array();
        protected $output=array();
        protected $key=null;
        
        public $output_s=array();
        public $key_s=array();

        public function set_array($array=array()) {
            $this->array = $array;
            return $this;
        }

        public function set_filters($filters=array()) {
            $this->filters = $filters;
            return $this;
        }

        
        private function cari(){
            $totalfilter=0;
            foreach($this->filters as $tf){
                $totalfilter++;
            }
            
            foreach($this->array as $key=>$row){
                $totalsame=0;
                foreach($this->filters as $fk=>$fs){
                   if($row[$fk]==$fs){
                        $totalsame++;
                   }
                   if($totalfilter==$totalsame){
                       $this->output=$this->array[$key];
                       $this->key=$key;
                       return $this;
                   }
                   else{
                       $this->key=null;
                   }
                }
            }
            //return $this;
        }
        
        public function get_output_s(){
            $totalfilter=0;
            foreach($this->filters as $tf){
                $totalfilter++;
            }
            foreach($this->array as $key=>$row){
                $totalsame=0;
                foreach($this->filters as $fk=>$fs){
                   if($row[$fk]==$fs){
                        $totalsame++;
                   }
                   if($totalfilter==$totalsame){
                       array_push( $this->output_s, $this->array[$key] );
                       array_push( $this->key_s, $key );
                       //return $this;
                   }
                   else{
                       //
                   }
                }
            }
            return $this;
        }


        public function get_output(){
//            if(count($this->output)>0){
//                
//            }else{
//                echo "is array or filters setted ? or check obj->get_key too !";
//                die();
//            }
            return $this->output;
        }
        public function get_key(){
            $this->cari();
            return $this->key;
        }
    
    }