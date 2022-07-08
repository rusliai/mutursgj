<?php
class Dokter_model extends CI_Model
{
        public $iddokter;
        public $namadokter;
        public $spesialis;
        public $aktif;
        public $table_name = "master_dokter";
        public function get_dokter_all()
        {
                $query = $this->db->select('iddokter,nama_dokter,master_dokter.spesialis,aktif,nama_spesialis')
                        ->from('master_dokter')
                        ->join('master_spesialis', 'master_dokter.spesialis = master_spesialis.idspesialis')
                        ->get();
                return $query->result_array();
        }
        public function cariDokter($keyword = "")
        {
                $query = $this->db->select('*')
                        ->from('master_dokter')
                        ->like('nama_dokter', $keyword)
                        ->get();
                return $query;
        }
        public function get_detail_dokter($iddokter)
        {
                $query = $this->db->select('iddokter,nama_dokter,master_dokter.spesialis,aktif,nama_spesialis')
                        ->from('master_dokter')
                        ->join('master_spesialis', 'master_dokter.spesialis = master_spesialis.idspesialis')
                        ->where('iddokter', $iddokter)
                        ->get();
                return $query;
        }
        public function insert_dokter($data)
        {
                $count =  $this->db->count_all_results($this->table_name, FALSE);
                $data['iddokter'] =  sprintf("DR%03d", $count + 1);
                return   $this->db->insert('master_dokter', $data);
        }
        public function update_dokter($data, $iddokter)
        {
                return $this->db->update($this->table_name, $data, array('iddokter' => $iddokter));
        }
}
