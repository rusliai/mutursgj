<?php
class Unit_model extends CI_Model
{
        public $idunit;
        public $namaunit;
        public $aktif;
        public $table_name = "master_unit";
        
        public function get_unit_all()
        {
                $query = $this->db->select ('*')
                        ->from('master_unit')
                        ->get();
                return $query->result_array();
        }

        public function get_detail_unit($idunit)
        {
               
                $query = $this->db->select ('*')
                         ->from('master_unit')
                        ->where('idunit', $idunit)
                        ->get();

                return $query;
        } 

        public function insert_unit($data)
        {
                $count =  $this->db->count_all_results($this->table_name, FALSE);
                $data['idunit'] =  sprintf("UN%03d", $count + 1);
                $this->db->insert('master_unit', $data);
        }
        public function update_unit($data)
        {
               
                $this->db->where('idunit', $data['idunit']);
                $this->db->update('master_unit', $data);
                
        }
}
