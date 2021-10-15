<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Rangking extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MKriteria');
        $this->load->model('MNilai');
        $this->load->model('MPenduduk');
        $this->load->model('MSAW');
        $this->load->model('DpSaw_model', 'dps');
        $this->page->setTitle('Rangking');
    }
    public function hasilSAW()
    {
        $Nomor_kk = $this->MPenduduk->getAll();
        if($Nomor_kk == null){
            redirect('Rangking/noData');
        }
        /**
         * Menghapus table SAW jika ada
         */
        $this->MSAW->dropTable();
        /**
         * $kriteria data dari table kriteria
         */
        $kriteria = $this->MKriteria->getAll();
        /**
         * membuat table SAW berdasarkan data dari table kriteria
         * menginputkan semua data nilai
         */
        $this->MSAW->createTable($kriteria);
        /**
         * Ambil data dari table SAW untuk perhitungan awal
         */
        $table1 = $this->initialTableSAW($Nomor_kk);
        $this->page->setData('table1', $table1);
        /**
         * mengambil sifat kriteria
         * @var $dataSifat array
         */
        $dataSifat = $this->getDataSifat();
        $this->page->setData('dataSifat', $dataSifat);
        /**
         * Mengambil nilai maksimal dan minimal berdasarkan sifat
         */
        $dataValueMinMax = $this->getVlueMinMax($dataSifat);
        $this->page->setData('valueMinMax', $dataValueMinMax);
        /**
         * Proses 1 ubah data berdasarkan sifat
         */
        $table2 = $this->getCountBySifat($dataSifat,$dataValueMinMax);
        $this->page->setData('table2', $table2);
        /**
         * Hitung perkalian bobot dengan nilai kriteria
         */
        $bobot = $this->MKriteria->getBobotKriteria();
        $this->page->setData('bobot', $bobot);
        $table3 = $this->getCountByBobot($bobot);
        $this->page->setData('table3', $table3);
        /**
         * Add kolom total dan rangking
         */
        $this->MSAW->addColumnTotalRangking();
        /**
         * Menghitung nilai total
         */
        $this->countTotal();
        /**
         * Mengambil data yang sudah di rangking
         */
        $tableFinal = $this->getRangking();
        $this->page->setData('tableFinal', $tableFinal);
        /**
         * Menghapus table SAW
         */
        $this->MSAW->dropTable();
        $data['judul'] = 'Data Hasil Rangking';
        $data['namauser'] = 'Admin SPK';
       $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pSaw/hasilSAW', $data);
            $this->load->view('templates/footer');
    }
    public function noData()
    {
        $data['judul'] = 'Tidak Ada Hasil!!!';
        $data['namauser'] = 'Admin SPK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pSaw/noData', $data);
            $this->load->view('templates/footer');
    }
    private function initialTableSAW($no_kk)
    {
        $nilai = $this->MNilai->getNilaiUniveristas();
        $dataInput = array();
        $no = 0;
        foreach ($no_kk as $item => $iteMPenduduk) {
            foreach ($nilai as $index => $itemNilai) {
                if ($iteMPenduduk->kdPenduduk == $itemNilai->kdPenduduk) {
                    $dataInput[$no]['Nomor_kk'] = $iteMPenduduk->no_kk;
                    $dataInput[$no][$itemNilai->kode_kriteria] = $itemNilai->nilai;
                }
            }
            $no++;
        }
        foreach ($dataInput as $data => $item){
            $this->MSAW->insert($item);
        }
        return $this->MSAW->getAll();
    }
    private function getDataSifat()
    {
        $sawData = $this->MSAW->getAll();
        $dataSifat = array();
        foreach ($sawData as $item => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'Nomor_kk') {
                    continue;
                }
                $dataSifat[$x] = $this->MSAW->getStatus($x);
            }
        }
        return $dataSifat;
    }
    private function getVlueMinMax($dataSifat)
    {
        $sawData = $this->MSAW->getAll();
        $dataValueMinMax = array();
        foreach ($sawData as $point => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'Nomor_kk') {
                    continue;
                }
                foreach ($dataSifat as $item => $itemX) {
                    if ($x == $item) {
                        if ($x == $item && $itemX->sifat == 'B') {
                            if (!isset($dataValueMinMax['max' . $x])) {
                                $dataValueMinMax['kd_kriteria'.$x] = $x;
                                $dataValueMinMax['max' . $x] = $z;
                                $dataValueMinMax['sifat' . $x] = 'Benefit';
                            } elseif ($z > $dataValueMinMax['max' . $x]) {
                                $dataValueMinMax['max' . $x] = $z;
                            }
                        } else {
                            if (!isset($dataValueMinMax['min' . $x])) {
                                $dataValueMinMax['kd_kriteria'.$x] = $x;
                                $dataValueMinMax['min' . $x] = $z;
                                $dataValueMinMax['sifat' . $x] = 'Cost';
                            } elseif ($z < $dataValueMinMax['min' . $x]) {
                                $dataValueMinMax['min' . $x] = $z;
                            }
                        }
                    }
                }
            }
        }
        return $dataValueMinMax;
    }
    private function getCountBySifat($dataSifat, $dataValueMinMax)
    {
        $sawData = $this->MSAW->getAll();
        foreach ($sawData as $point => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'Nomor_kk') {
                    continue;
                }
                foreach ($dataSifat as $item => $sifat) {
                    if ($x == $item) {
                        if($sifat->sifat == 'B'){
                            $newData = $z / $dataValueMinMax['max'.$x];
                            $dataUpdate = array(
                                $x => $newData
                            );
                            $where = array(
                                'Nomor_kk' => $value->Nomor_kk
                            );
                            $this->MSAW->update($dataUpdate, $where);
                        }else{
                            $newData = $dataValueMinMax['min'.$x] / $z ;
                            $dataUpdate = array(
                                $x => $newData
                            );
                            $where = array(
                                'Nomor_kk' => $value->Nomor_kk
                            );
                            $this->MSAW->update($dataUpdate, $where);
                        }
                    }
                }
            }
        }
        return $this->MSAW->getAll();
    }
    private function countTotal()
    {
        $sawData = $this->MSAW->getAll();
        foreach ($sawData as $item => $value) {
            $total = 0;
            foreach ($value as $item => $itemData) {
                if($item == 'Nomor_kk'){
                    continue;
                }elseif($item == 'Total'){
                    $dataUpdate = array(
                        'Total'=> $total
                    );
                    $where = array(
                        'Nomor_kk' => $value->Nomor_kk
                    );
                    $this->MSAW->update($dataUpdate, $where);
                }else{
                    $total = $total + $itemData;
                }
            }
        }
    }
    private function getCountByBobot($bobot)
    {
        $sawData = $this->MSAW->getAll();
        foreach ($sawData as $point => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'Nomor_kk') {
                    continue;
                }
                foreach ($bobot as $item => $itemKriteria) {
                    if ($x == $itemKriteria->kode_kriteria) {
                        $sawData[$point]->$x =  $z * $itemKriteria->bobot ;
                        $newData = $z * $itemKriteria->bobot;
                        $dataUpdate = array(
                            $x => $newData
                        );
                        $where = array(
                            'Nomor_kk' => $value->Nomor_kk
                        );
                        
                        $this->MSAW->update($dataUpdate, $where);
                    }
                }
            }
        }
        return $this->MSAW->getAll();
    }
    private function getRangking()
    {
        $sawData = $this->MSAW->getSortTotalByDesc();
        $no = 1;
        foreach ($sawData as $item => $value) {
            $dataUpdate = array(
                'Rangking' => $no
            );
            $where = array(
                'Nomor_kk' => $value->Nomor_kk
            );
            $this->MSAW->update($dataUpdate, $where);
            $no++;  
        }
        return $this->MSAW->getAll();
    }
    private function jumlah(){
        $query = $this->db->query("SELECT jumlah FROM tb_penerima");
        $dd = $query->row();
        $jumlah = $dd->jumlah;
        return $jumlah;
    }
    public function laporan()
    {
        
        $Nomor_kk = $this->MPenduduk->getAll();
        if($Nomor_kk == null){
            redirect('Rangking/noData');
        }
        /**
         * Menghapus table SAW jika ada
         */
        $this->MSAW->dropTable();
        /**
         * $kriteria data dari table kriteria
         */
        $kriteria = $this->MKriteria->getAll();
        /**
         * membuat table SAW berdasarkan data dari table kriteria
         * menginputkan semua data nilai
         */
        $this->MSAW->createTable($kriteria);
        /**
         * Ambil data dari table SAW untuk perhitungan awal
         */
        $table1 = $this->initialTableSAW($Nomor_kk);
        $this->page->setData('table1', $table1);
        /**
         * mengambil sifat kriteria
         * @var $dataSifat array
        */
        $dataSifat = $this->getDataSifat();
        $this->page->setData('dataSifat', $dataSifat);
        /**
         * Mengambil nilai maksimal dan minimal berdasarkan sifat
         */
        $dataValueMinMax = $this->getVlueMinMax($dataSifat);
        $this->page->setData('valueMinMax', $dataValueMinMax);
        /**
         * Proses 1 ubah data berdasarkan sifat
         */
        $table2 = $this->getCountBySifat($dataSifat,$dataValueMinMax);
        $this->page->setData('table2', $table2);
        /**
         * Hitung perkalian bobot dengan nilai kriteria
         */
        /**
         * Add kolom total dan rangking
         */
        $this->MSAW->addColumnTotalRangking();
        /**
         * Menghitung nilai total
         */
        $this->countTotal();
        /**
         * Mengambil data yang sudah di rangking
         */
        $tableFinal = $this->getRangking();
        $this->page->setData('tableFinal', $tableFinal);
        $tableFinal1 = $this->jumlah();
        $this->page->setData('tableFinal1', $tableFinal1);
        $data['judul'] = 'Data Laporan PKH';
        $data['namauser'] = 'Admin SPK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penerima'] = $this->db->get('tb_penerima')->result_array(); 
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pSaw/laporan', $data);
            $this->load->view('templates/footer');
    }
    public function print()
    {
        $Nomor_kk = $this->MPenduduk->getAll();
        /**
         * Menghapus table SAW jika ada
         */
        $this->MSAW->dropTable();
        /**
         * $kriteria data dari table kriteria
         */
        $kriteria = $this->MKriteria->getAll();
        /**
         * membuat table SAW berdasarkan data dari table kriteria
         * menginputkan semua data nilai
         */
        $this->MSAW->createTable($kriteria);
        /**
         * Ambil data dari table SAW untuk perhitungan awal
         */
        $table1 = $this->initialTableSAW($Nomor_kk);
        $this->page->setData('table1', $table1);
        /**
         * mengambil sifat kriteria
         * @var $dataSifat array
        */
        $dataSifat = $this->getDataSifat();
        $this->page->setData('dataSifat', $dataSifat);
        /**
         * Mengambil nilai maksimal dan minimal berdasarkan sifat
         */
        $dataValueMinMax = $this->getVlueMinMax($dataSifat);
        $this->page->setData('valueMinMax', $dataValueMinMax);
        /**
         * Proses 1 ubah data berdasarkan sifat
         */
        $table2 = $this->getCountBySifat($dataSifat,$dataValueMinMax);
        $this->page->setData('table2', $table2);
        /**
         * Add kolom total dan rangking
         */
        $this->MSAW->addColumnTotalRangking();
        /**
         * Menghitung nilai total
         */
        $this->countTotal();
        /**
         * Mengambil data yang sudah di rangking
         */
        $tableFinal = $this->getRangking();
        $this->page->setData('tableFinal', $tableFinal);
        $tableFinal1 = $this->jumlah();
        $this->page->setData('tableFinal1', $tableFinal1);
        /**
         * Menghapus table SAW
         */
        $this->MSAW->dropTable();
        $data['judul'] = 'Laporan PKH';
        $data['namauser'] = 'Admin SPK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('pSaw/laporan_print', $data); 
    }
}