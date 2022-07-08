<?php
class Indikator_model extends CI_Model
{
        public $idindikator;
        public $nama_indikator;
        public $idunit;
        public $nemurator;
        public $denominator;
        public $aktif;
        public $table_name = "master_indikator";
        public function get_indikator_all()
        {
                $query = $this->db->select ('*')
                // ('idindikator,nama_indikator,aktif')
                        ->from('master_indikator')
                        // ->join('master_unit', 'master_indikator.idunit = master_unit.nama_unit')
                        ->get();
                return $query->result_array();
        }

        public function get_detail_indikator($idindikator)
        {
               
                $query = $this->db->select ('*')
                // ('idindikator,nama_indikator,aktif')
                        ->from('master_indikator')
                        // ->join('master_unit', 'master_indikator.idunit = master_unit.nama_unit')
                        ->where('idindikator', $idindikator)
                        ->get();

                return $query;
        } 

        public function cariIndikator($keyword="")
        {
               
                $query = $this->db->select ('*')
              
                        ->from('master_indikator')
                       ->like('nama_indikator', $keyword)
                        ->get();

                return $query;
        } 

        public function insert_indikator($data)
        {
                $count =  $this->db->count_all_results($this->table_name, FALSE);
                $data['idindikator'] =  sprintf("IN%03d", $count + 1);
                $this->db->insert('master_indikator', $data);
        }
        public function update_indikator($data)
        {
               
                $this->db->where('idindikator', $data['idindikator']);
                $this->db->update('master_indikator', $data);
                
        }
}
