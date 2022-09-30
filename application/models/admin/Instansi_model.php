<?php
class Instansi_model extends CI_Model
{

    public function get_instansi()
    {
       
        $query = $this->db->select('*')
                        ->from('instansi')
                        ->get();

        return $query->row();
    }

}