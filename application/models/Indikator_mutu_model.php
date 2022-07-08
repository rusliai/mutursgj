<?php
class Indikator_mutu_model extends CI_Model
{
        private $_table = "indikator_mutu";
        public $idtrx;
        public $iduser;
        public $idindikator;
        public $iddokter;
        public $idunit;
        public $tanggal;
        public $numerator;
        public $denominator;
        public $tglupdate;
        public $tglbuat;


        public function get_list_indikator($param)
        {
                $query = $this->db->select(
                        '
                                indikator_mutu.idtrx,
                                indikator_mutu.tanggal,
                                indikator_mutu.numerator as jumlah_numerator ,
                                indikator_mutu.denominator as jumlah_denominator,
                                master_indikator.*,
                                master_dokter.*,
                                '
                )
                        ->from($this->_table)
                        ->join('master_indikator', 'indikator_mutu.idindikator = master_indikator.idindikator')
                        ->join('master_dokter', 'indikator_mutu.iddokter = master_dokter.iddokter','left')
                        ->where($param)
                        ->get();
                return $query;
        }
        public function indikator_by_trx($trx)
        {
                $query = $this->db->select(
                        '
                        indikator_mutu.idtrx,
                        indikator_mutu.iddokter,
                        indikator_mutu.idunit,
                        indikator_mutu.tanggal,
                        indikator_mutu.numerator as jumlah_numerator ,
                        indikator_mutu.denominator as jumlah_denominator,
                        master_indikator.*,
                        master_dokter.nama_dokter'
                )
                        ->from($this->_table)
                        ->join('master_indikator', 'indikator_mutu.idindikator = master_indikator.idindikator', 'left')
                        ->join('master_dokter', 'indikator_mutu.iddokter = master_dokter.iddokter', 'left')
                        ->where('idtrx', $trx)
                        ->get()->row();
                if ($query) {
                        return $query;
                }
        }
        public function add_indikator_mutu($data)
        {
                $data['iduser'] = $this->session->user_id;
                $data['idunit'] = $this->session->user_unit;
                $data['tglbuat'] = date('Y-m-d');
                $data['tglupdate'] = date('Y-m-d');
                return $this->db->insert($this->_table, $data);
        }
        public function update_indikator_mutu($data, $idtrx)
        {
                $data['iduser'] = $this->session->user_id;
                $data['idunit'] = $this->session->user_unit;
                $data['tglbuat'] = date('Y-m-d');
                $data['tglupdate'] = date('Y-m-d');
                return $this->db->update($this->_table, $data, array('idtrx' => $idtrx));
        }

        public function getRekap($param = "")
        {
                $query = $this->db->select(
                        '
                        indikator_mutu.idindikator,
                        indikator_mutu.iddokter,
                        master_indikator.nama_indikator,
                        master_indikator.numerator,
                        master_indikator.denominator,
                        master_indikator.standar,
                        master_indikator.target_capaian,
                        master_dokter.nama_dokter,
                        sum(indikator_mutu.numerator) as total_numerator,
                        sum(indikator_mutu.denominator) as total_denominator,
                        ' )
               
                        ->from($this->_table)
                        ->join('master_indikator', 'indikator_mutu.idindikator = master_indikator.idindikator', 'left')
                        ->join('master_dokter', 'indikator_mutu.iddokter = master_dokter.iddokter','left')
                        ->group_by(' indikator_mutu.idindikator')
                        ->group_by(' indikator_mutu.iddokter')
                     
                        ->order_by(' master_indikator.nama_indikator','asc')
                        ->where($param)
                        ->get();
                if ($query) {
                        return $query;
                }
        }


        public function getRekapDetail($param){

                $query = $this->db->select(
                        '
                                `idTrx`,
                                `idindikator`,
                                `tanggal`,
                                `numerator`,
                                `denominator`
                        ' )
               
                        ->from($this->_table)
                       
                        ->where($param)
                        ->get();
                        return $query;


        }

}
