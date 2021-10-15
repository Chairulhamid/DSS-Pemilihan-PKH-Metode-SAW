<?php
class MNilai extends CI_Model{

    public $kdPenduduk;
    public $kd_kriteria;
    public $nilai;

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'nilai';
    }

    private function getData()
    {
        $data = array(
            'kdPenduduk' => $this->kdPenduduk,
            'kd_kriteria' => $this->kd_kriteria,
            'nilai' => $this->nilai
        );

        return $data;
    }

    public function insert()
    {
        $status = $this->db->insert($this->getTable(), $this->getData());
        return $status;
    }

    public function getNilaiByUniveristas($id)
    {
        $query = $this->db->query(
            'select u.kdPenduduk, u.penduduk, u.no_kk, u.nik, k.kd_kriteria, n.nilai from penduduk u, nilai n, kriteria k, subkriteria sk where u.kdPenduduk = n.kdPenduduk AND k.kd_kriteria = n.kd_kriteria and k.kd_kriteria = sk.kd_kriteria and u.kdPenduduk = '.$id.' GROUP by n.nilai '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function getNilaiUniveristas()
    {
        $query = $this->db->query(
            'select u.kdPenduduk, u.no_kk, k.kd_kriteria, k.kriteria ,k.kode_kriteria ,n.nilai from penduduk u, nilai n, kriteria k where u.kdPenduduk = n.kdPenduduk AND k.kd_kriteria = n.kd_kriteria '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function update()
    {
        $data = array('nilai' => $this->nilai);
        $this->db->where('kdPenduduk', $this->kdPenduduk);
        $this->db->where('kd_kriteria', $this->kd_kriteria);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdPenduduk', $id);
        return $this->db->delete($this->getTable());
    }
}