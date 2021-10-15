<?php

class MKriteria extends CI_Model{

    public $kd_kriteria;
    public $kriteria;
    public $sifat;
    public $bobot;
    public $kode_kriteria;

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'kriteria';
    }

    private function getData(){
        $data = array(
            'kriteria' => $this->kriteria,
            'sifat' => $this->sifat,
            'bobot' => $this->bobot,
            'kode_kriteria' => $this->kode_kriteria
        );

        return $data;
    }
    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $kriterias[] = $row;
            }
            return $kriterias;
        }
    }

    public function getById()
    {

        $this->db->from($this->getTable());
        $this->db->where('kd_kriteria',$this->kd_kriteria);
        $query = $this->db->get();

        return $query->row();
    }

    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $this->db->update($this->getTable(), $this->getData(), $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kd_kriteria', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('kd_kriteria');
        $this->db->order_by('kd_kriteria', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }

    public function getBobotKriteria()
    {
        $query = $this->db->query('select kode_kriteria, bobot, kriteria from kriteria');
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $bobot[] = $row;
            }
            return $bobot;
        }
    }
}