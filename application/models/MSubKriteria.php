<?php
class MSubKriteria extends CI_Model{

    public $kdSubKriteria;
    public $kd_kriteria;
    public $subKriteria;
    public $value;


    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'subkriteria';
    }

    private function getData(){
        $data = array(
            'kd_kriteria' => $this->kd_kriteria,
            'subKriteria' => $this->subKriteria,
            'value' => $this->value
        );
        return $data;
    }

    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $subkriterias[] = $row;
            }

            return$subkriterias;
        }
    }

    public function getById()
    {
        $this->db->where('kd_kriteria', $this->kd_kriteria);
        $query = $this->db->get($this->getTable());

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $subkriteria[] = $row;
            }

            return $subkriteria;
        }
    }

    public function insert()
    {
        $data = $this->getData();
        $this->db->insert($this->getTable(), $data);
        return $this->db->insert_id();
    }

    public function update()
    {
        $data = $this->getData();
        $this->db->where('kdSubKriteria', $this->kdSubKriteria);
        $this->db->where('kd_kriteria', $this->kd_kriteria);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kd_kriteria', $id);
        return $this->db->delete($this->getTable());
    }
}