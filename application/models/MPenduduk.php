<?php

class MPenduduk extends CI_Model{

    public $kdPenduduk;
    public $no_kk;
    public $penduduk;
    public $nik;

    public function __construct(){
        parent::__construct();
    }

    private function getTable(){
        return 'penduduk';
    }

    private function getData(){
        $data = array(
            'no_kk' => $this->no_kk,
            'penduduk' => $this->penduduk,
            'nik' => $this->nik
        );

        return $data;
    }

    public function getAll()
    {
        $no_kk = array();
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $no_kk[] = $row;
            }
        }
        return $no_kk;
    }


    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $status = $this->db->update($this->getTable(), $this->getData(), $where);
        return $status;

    }

    public function delete($id)
    {
        $this->db->where('kdPenduduk', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('kdPenduduk');
        $this->db->order_by('kdPenduduk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }
}