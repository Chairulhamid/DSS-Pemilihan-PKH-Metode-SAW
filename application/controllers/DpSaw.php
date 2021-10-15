 <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class DpSaw extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('DpSaw_model', 'dps');
        }
        // Data Penduduk. Penduduk
        public function data_penduduk()
            {
            $data['judul'] = 'Data Penduduk';
            $data['namauser'] = 'Admin SPK';
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['penduduk'] = $this->db->get('tb_penduduk')->result_array();
                $this->form_validation->set_rules('no_kk', 'Nomor KK', 'required');
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('nohp', 'nohp', 'required');
                if ($this->form_validation->run() == false) {
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sidebar', $data);
                    $this->load->view('templates/topbar', $data);
                    $this->load->view('dpSaw/data_penduduk', $data);
                    $this->load->view('templates/footer');
                } else {
                    $this->dps->tambahPenduduk();
                    $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                                Data baru berhasil ditambahkan
                                                </div>');
                    redirect('dpSaw/data_penduduk');
                }
        }
        public function editPenduduk()
        {
            $this->dps->editPenduduk();
            $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Data berhasil diubah!
                                            </div>');
            redirect('dpSaw/data_penduduk');
        }
        public function hapusPenduduk($id)
        {
            $this->dps->hapusPenduduk($id);
            $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Data berhasil dihapus!
                                            </div>');
            redirect('dpSaw/data_penduduk');
        }
        public function lapPenduduk()
            {
            $data['judul'] = 'Laporan Data Penduduk';
            $data['namauser'] = 'Admin SPK';
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['penduduk'] = $this->db->get('tb_penduduk')->result_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('dpSaw/lapPenduduk', $data);
                $this->load->view('templates/footer');
        }
        public function printPenduduk()
            {
            $data['judul'] = 'Laporan Data Penduduk';
            $data['namauser'] = 'Admin SPK';
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['penduduk'] = $this->db->get('tb_penduduk')->result_array();
                $this->load->view('dpSaw/printPenduduk', $data);
        }
        // C. kriteria
        public function kriteria()
        {
            $data['judul'] = 'Data Kriteria';
            $data['namauser'] = 'Admin SPK';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['kriteria'] = $this->db->get('kriteria')->result_array();
            $this->form_validation->set_rules('kriteria', 'Nama kriteria', 'required');
            $this->form_validation->set_rules('sifat', 'Sifat kriteria', 'required');
            $this->form_validation->set_rules('bobot', 'Bobot kriteria', 'required');
            $this->form_validation->set_rules('kode_kriteria', 'kode kriteria', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('dpSaw/kriteria', $data);
                $this->load->view('templates/footer');
            } else {
                $this->dps->tambahKriteria();
                $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Data baru berhasil ditambahkan
                                            </div>');
                redirect('dpSaw/kriteria');
            }
        }
        public function editKriteria()
        {
            $this->dps->editKriteria();
            $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Data berhasil diubah!
                                            </div>');
            redirect('dpSaw/kriteria');
        }
        public function hapusKriteria($kd_kriteria)
        {
            $this->dps->hapusKriteria($kd_kriteria);
            $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Data berhasil dihapus!
                                            </div>');
            redirect('dpSaw/kriteria');
        }
         // C. SUBkriteria
        public function subKriteria()
        {
            $data['judul'] = 'Data Sub Kriteria';
            $data['namauser'] = 'Admin SPK';

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['subkriteria'] = $this->db->get('subkriteria')->result_array();
            $data['kriteria'] = $this->db->get('kriteria')->result_array();
            $this->form_validation->set_rules('subKriteria', 'Nama Sub kriteria', 'required');
            $this->form_validation->set_rules('kd_kriteria', 'kode kriteria', 'required');
            $this->form_validation->set_rules('value', 'Nilai kriteria', 'required');
            $this->form_validation->set_rules('kriteria', ' kriteria', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('dpSaw/subkriteria', $data);
                $this->load->view('templates/footer');
            } else {
                $this->dps->tambahsubKriteria();
                $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Data baru berhasil ditambahkan
                                            </div>');
                redirect('dpSaw/subkriteria');
            }
        }
        public function tambah_c()
        {
            $data['judul'] = 'Tambah Data Sub Kriteria';
            $data['namauser'] = 'Admin SPK';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['subkriteria'] = $this->db->get('subkriteria')->result_array();
            $data['kriteria'] = $this->db->get('kriteria')->result_array();
            $this->form_validation->set_rules('subKriteria', 'Nama Sub kriteria', 'required');
            $this->form_validation->set_rules('value', 'Value kriteria', 'required');;
            $this->form_validation->set_rules('kd_kriteria', ' kode kriteria', 'required');
            $this->form_validation->set_rules('kriteria', ' kriteria', 'required');
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('dpSaw/tambah_subKriteria', $data);
                $this->load->view('templates/footer');
        }
        public function editsubKriteria()
        {
            $this->dps->editsubKriteria();
            $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Data berhasil diubah!
                                            </div>');
            redirect('dpSaw/subkriteria');
        }
        public function hapussubKriteria($kdSubKriteria)
        {
            $this->dps->hapussubKriteria($kdSubKriteria);
            $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Data berhasil dihapus!
                                            </div>');
            redirect('dpSaw/subkriteria');
        }
    }
