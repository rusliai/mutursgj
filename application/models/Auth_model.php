<?php
class Auth_model extends CI_Model
{
        private $_table = "master_user";
        const SESSION_KEY = 'user_id';
        public function valid_user($username, $password)
        {
                $query = $this->db->select('*')
                        ->from($this->_table)
                        ->where('username', $username)
                        ->join('master_unit', ' master_unit.idunit = master_user.idunit','left')
                        ->get()->row();
                if (!$query) {
                        return FALSE;
                }
                if (!password_verify($password, $query->password)) {
                        return FALSE;
                }
                $this->session->set_userdata(self::SESSION_KEY, $query->iduser);
                $this->session->set_userdata('user_name', $query->username);
                $this->session->set_userdata('user_unit', $query->idunit);
                $this->session->set_userdata('nama_unit', $query->nama_unit);
                $this->session->set_userdata('user_nama', $query->nama_user);
                $this->session->set_userdata('id_grup', $query->idgroup);
                return $this->session->has_userdata(self::SESSION_KEY);
        }
        public function current_user()
        {
                if (!$this->session->has_userdata(self::SESSION_KEY)) {
                        return null;
                }
                $session_key = $this->session->userdata(self::SESSION_KEY);
                $query = $this->db->get_where($this->_table, ['iduser' => $session_key]);
                return $query->row();
        }
}
