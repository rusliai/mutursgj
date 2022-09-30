<?php
class User_model extends CI_Model
{
        public $iduser;
        public $namauser;
        public $unit;
        public $aktif;
        public $table_name = "master_user";
        public function get_user_all()
        {
                $query = $this->db->select('iduser,
                                                nama_user,
                                                username,
                                                master_user.idunit,
                                                nama_unit,
                                                master_user.aktif')
                        ->from('master_user')
                        ->join('master_unit', 'master_user.idunit = master_unit.idunit')
                        ->get();
                return $query->result_array();
        }
        public function cariUser($keyword = "")
        {
                $query = $this->db->select('*')
                        ->from('master_user')
                        ->like('nama_user', $keyword)
                        ->get();
                return $query;
        }
        public function get_detail_user($iduser)
        {
                $query = $this->db->select('iduser,
                                           nama_user,
                                           username,
                                           master_user.idunit,
                                           master_user.aktif,
                                           master_user.idgroup,
                                           master_unit.nama_unit')
                        ->from('master_user')
                        ->join('master_unit', 'master_user.idunit = master_unit.idunit')
                        ->where('iduser', $iduser)
                        ->get();
                return $query;
        }
        public function insert_user($data)
        {
                return   $this->db->insert('master_user', $data);
        }
        public function update_user($data, $iduser)
        {
                return $this->db->update($this->table_name, $data, array('iduser' => $iduser));
        }

        public function get_group_all()
    {
        $query = $this->db->select('*')
            ->from('user_group')
            ->order_by('urutan','asc')
            ->get()->result();
        return $query;
    }
}
