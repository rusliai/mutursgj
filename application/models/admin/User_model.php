<?php
class User_model extends CI_Model
{
        public $iduser;
        public $username;
        public $password;
        public $nama_user;
        public $idunit;
        public $idgrup;
        public $aktif;
        public $table_name = "master_user";
       

        public function insert_dokter($data)
        {
                $count =  $this->db->count_all_results($this->table_name, FALSE);
                $data['iddokter'] =  sprintf("DR%03d", $count + 1);
                $this->db->insert('master_dokter', $data);
        }
        public function update_dokter($data)
        {
               
                $this->db->where('iddokter', $data['iddokter']);
                $this->db->update('master_dokter', $data);
                
        }
}
