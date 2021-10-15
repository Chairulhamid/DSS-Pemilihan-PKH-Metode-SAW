<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DpSaw_model extends CI_Model
{
    // PENDUDUK
    public function tambahPenduduk()
    {
        $data = [
            'no_kk' => $this->input->post('no_kk', true),
            'nama' => $this->input->post('nama', true),
            'nik' => $this->input->post('nik', true),
            'alamat' => $this->input->post('alamat', true),
            'nohp' => $this->input->post('nohp', true),
        ];
        $this->db->insert('tb_penduduk', $data);
    }
    public function tambahRangking()
    {
        $data = [
            'Nomor_kk' => $this->input->post('Nomor_kk', true),
            'Rangking' => $this->input->post('Rangking', true),
        ];
        $this->db->insert('tb_hasil', $data);
    }
      public function editPenduduk()
    {
        
        $no_kk = $this->input->post('no_kk');
        $nama = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $alamat = $this->input->post('alamat');
        $nohp = $this->input->post('nohp');

        $data = [
            'no_kk' => $no_kk,
            'nama' => $nama,
            'nik' => $nik,
            'alamat' => $alamat,
            'nohp' => $nohp
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_penduduk', $data);
    }
     public function hapusPenduduk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_penduduk');
    }

    // KRITERIA
    public function tambahKriteria()
    {
        $data = [
            'kriteria' => $this->input->post('kriteria', true),
            'sifat' => $this->input->post('sifat', true),
            'bobot' => $this->input->post('bobot', true),
            'kode_kriteria' => $this->input->post('kode_kriteria', true)
        ];
        $this->db->insert('kriteria', $data);
    }
     public function editKriteria()
    {
        
        $kriteria = $this->input->post('kriteria');
        $sifat = $this->input->post('sifat');
        $bobot = $this->input->post('bobot');
        $kode_kriteria = $this->input->post('kode_kriteria');

        $data = [
            
            'kriteria' => $kriteria,
            'sifat' => $sifat,
            'bobot' => $bobot,
            'kode_kriteria' => $kode_kriteria
        ];

        $this->db->where('kd_kriteria', $this->input->post('kd_kriteria'));
        $this->db->update('kriteria', $data);
    }
    public function hapusKriteria($kd_kriteria)
    {
        $this->db->where('kd_kriteria', $kd_kriteria);
        $this->db->delete('kriteria');
    }

    // SUBKRITERIA
    public function tambahsubKriteria()
    {
        $data = [
            'subKriteria' => $this->input->post('subKriteria', true),
            'kd_kriteria' => $this->input->post('kd_kriteria', true),
            'kriteria' => $this->input->post('kriteria', true),
            'value' => $this->input->post('value', true)
        ];
        $this->db->insert('subkriteria', $data);
    }
    
     public function editsubKriteria()
    {
        
        $kriteria = $this->input->post('kriteria');
        $subKriteria = $this->input->post('subKriteria');
        $kd_kriteria = $this->input->post('kd_kriteria');
        $value = $this->input->post('value');

        $data = [
            
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
            'kd_kriteria' => $kd_kriteria,
            'value' => $value
        ];

        $this->db->where('kdSubKriteria ', $this->input->post('kdSubKriteria'));
        $this->db->update('subkriteria', $data);
    }
    public function hapussubKriteria($kdSubKriteria)
    {
        $this->db->where('kdSubKriteria', $kdSubKriteria);
        $this->db->delete('subkriteria');
    }
}
