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
                        analisa.iddokter,
                        analisa.idunit,
                        analisa.bulan,
                        analisa.tahun,
                        analisa.tgl_dibuat,
                        analisa.uraian_analisa,
                        analisa.uraian_tindak_lanjut,
                        analisa.keterangan,
                        master_dokter.nama_dokter,
                        master_indikator.* 
                                '
                )
                        ->from($this->_table)
                        ->join('master_indikator', 'analisa.idindikator = master_indikator.idindikator')
                        ->join('master_dokter', 'analisa.iddokter = master_dokter.iddokter')
                        ->where($param)
                        ->get();
                return $query;
        }

        public function analisa_by_param($param)
        {
                $query = $this->db->select( '*')
                        ->from($this->_table)
                        ->where($param)
                        ->get();
                if ($query) {
                        return $query;
                }
        }

        public function analisa_by_trx($trx)
        {
                $query = $this->db->select(
                        '*'
                )
                        ->from($this->_table)

                        ->where('id_analisa', $trx)
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
                return $this->db->update($this->_table, $data, array('id_analisa' => $idtrx));
        }
        public function delete_analsia($idtrx)
        {
                return $this->db->where('idtrx', $idtrx)->delete($this->_table);
        }
}
