<?php
class Analisa_model extends CI_Model
{
        private $_table = "analisa";

        public function get_list_analisa($param)
        {
                $query = $this->db->select(
                        '
                        analisa.id_analisa,
                        analisa.idindikator,
                        analisa.bulan,
                        analisa.tahun,
                        analisa.tgl_dibuat,
                        analisa.uraian_analisa,
                        analisa.uraian_tindak_lanjut,
                        analisa.keterangan,
                        master_indikator.* 
                                '
                )
                        ->from($this->_table)
                        ->join('master_indikator', 'analisa.idindikator = master_indikator.idindikator')
                        ->where($param)
                        ->get();
                return $query;
        }

        public function analisa_by_trx($trx)
        {
                $query = $this->db->select(
                        '*'
                )
                        ->from($this->_table)
                        // ->join('master_indikator', 'indikator_mutu.idindikator = master_indikator.idindikator', 'left')
                        // ->join('master_dokter', 'indikator_mutu.iddokter = master_dokter.iddokter', 'left')
                        ->where('idtrx', $trx)
                        ->get()->row();
                if ($query) {
                        return $query;
                }
        }
        public function add_analisa($data)
        {
                $data['iduser'] = $this->session->user_id;
                $data['idunit'] = $this->session->user_unit;
                $data['tgl_dibuat'] = date('Y-m-d');
                $data['tgl_update'] = date('Y-m-d');
                return $this->db->insert($this->_table, $data);
        }
        public function update_analisa($data, $idtrx)
        {
                $data['iduser'] = $this->session->user_id;
                $data['idunit'] = $this->session->user_unit;
                $data['tgl_update'] = date('Y-m-d');
                return $this->db->update($this->_table, $data, array('idtrx' => $idtrx));
        }
        public function delete_analsia($idtrx)
        {
                return $this->db->where('idtrx', $idtrx)-> delete($this->_table);
                
        }

        


        

}
