<?php
class MPenerimaan extends CI_Model{

   

    public function __construct(){
        parent::__construct();
    }

    public function tambah()
    {
        $data = [
            'jumlah' => $this->input->post('jumlah', true),
               ];

        $this->db->insert('tb_penerima', $data);
    }
       public function editPenerima()
    {
        $jumlah = $this->input->post('jumlah');

        $data = [
            'jumlah' => $jumlah,
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_penerima', $data);
    }

   

    
}