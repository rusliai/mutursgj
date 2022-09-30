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
                $query = $this->db->select('*')
                        ->from('master_indikator')
                        ->get();
                return $query->result_array();
        }
        public function get_detail_indikator($idindikator)
        {
                $query = $this->db->select('*')
                        ->from('master_indikator')
                        ->where('idindikator', $idindikator)
                        ->get();
                return $query;
        }
        public function get_indikator_by_grup($idunit)
        {
                $query = $this->db->select('group_indikator.*, nama_indikator')
                        ->from('group_indikator')
                        ->join('master_indikator', 'group_indikator.idindikator = master_indikator.idindikator')
                        ->where('group_indikator.idunit', $idunit)
                        ->get();
                return $query->result_array();
        }
        public function cariIndikator($keyword = "")
        {
                $query = $this->db->select('*')
                        ->from('master_indikator')
                        ->like('nama_indikator', $keyword)
                        ->get();
                return $query;
        }
        public function insert_indikator($data)
        {
                $count =  $this->db->count_all_results($this->table_name, FALSE);
                $data['idindikator'] =  sprintf("IN%03d", $count + 1);
                return   $this->db->insert('master_indikator', $data);
        }
        public function update_indikator($data, $id)
        {
                $this->db->where('idindikator', $id);
                return  $this->db->update('master_indikator', $data);
        }
        public function cariIndikatorGroup($keyword = "", $idunit = "")
        {
                $query = $this->db->select('master_indikator.*')
                        ->from('group_indikator')
                        ->join('master_indikator', 'group_indikator.idindikator = master_indikator.idindikator', 'left')
                        ->like('nama_indikator', $keyword)
                        ->where('idunit', $idunit)
                        ->get();
                return $query;
        }
        function add_item_group($data)
        {
                $query = $this->db->where('idindikator', $data['idindikator'])
                        ->where('idunit', $data['idunit'])
                        ->from('group_indikator')
                        ->count_all_results();
                if (!$query > 0) {
                        return $this->db->insert('group_indikator', $data);
                } else {
                        return false;
                }
        }
        function delete_item_group($data)
        {
                return $this->db->delete('group_indikator', $data);
        }
}
