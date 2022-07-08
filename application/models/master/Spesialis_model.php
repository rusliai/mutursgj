<?php
class Spesialis_model extends CI_Model
{
     
        public $table = "master_spesialis";

        public function get_list_spesialis()
        {
                $query = $this->db->select ('*')
                        ->from($this->table)
                        ->get();
                return $query;

                
        }

       
}
