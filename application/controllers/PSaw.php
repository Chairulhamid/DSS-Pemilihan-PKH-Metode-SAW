 <?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class PSaw extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->load->model('MPenduduk');
        $this->load->model('MPenerimaan','penerimaan');
        $this->load->model('MNilai');
        $this->load->model('MSAW', 'saw');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Data Penduduk PKH ';
        $data['namauser'] = 'Admin SPK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penduduk'] = $this->db->get('penduduk')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pSaw/index', $data);
            $this->load->view('templates/footer');
    }
    public function nilaiSAW($id = null)
    {
        if ($id == null) {
            if (count($_POST)) {
                $this->form_validation->set_rules('no_kk', '', 'trim|required');
                $this->form_validation->set_rules('penduduk', '', 'trim|required');
                $this->form_validation->set_rules('nik', '', 'trim|required');
                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $this->session->set_flashdata('errors', $errors);
                    redirect(current_url());
                } else {
                    $no_kk = $this->input->post('no_kk');
                    $penduduk = $this->input->post('penduduk');
                    $nik = $this->input->post('nik');
                    $nilai = $this->input->post('nilai');
                    $this->MPenduduk->no_kk = $no_kk;
                    $this->MPenduduk->penduduk = $penduduk;
                    $this->MPenduduk->nik = $nik;
                    if ($this->MPenduduk->insert() == true) {
                        $success = false;
                        $kdPenduduk = $this->MPenduduk->getLastID()->kdPenduduk;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdPenduduk = $kdPenduduk;
                            $this->MNilai->kd_kriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->insert()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil menambah data :)');
                            redirect('pSaw');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
                //-----
            }else{    
        $data['judul'] = 'Input Data Calon PKH';
        $data['namauser'] = 'Admin SPK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penduduk'] = $this->db->get('tb_penduduk')->result_array();
        $data['dataView'] = $this->getDataInsert();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pSaw/nilaiSAW', $data);
            $this->load->view('templates/footer');
            }
        }else{
            if(count($_POST)){
                $kdPenduduk = $this->uri->segment(3, 0);
                if($kdPenduduk > 0){
                    $penduduk = $this->input->post('penduduk');
                    $no_kk = $this->input->post('no_kk');
                    $nik = $this->input->post('nik');
                    $nilai = $this->input->post('nilai');
                    $where = array('kdPenduduk' => $kdPenduduk);
                    $this->MPenduduk->penduduk = $penduduk;
                    $this->MPenduduk->no_kk = $no_kk;
                    $this->MPenduduk->nik = $nik;
                    if($this->MPenduduk->update($where) == true){
                        $success = false;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdPenduduk = $kdPenduduk;
                            $this->MNilai->kd_kriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->update()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil mengubah data :)');
                            redirect('pSaw/nilaiSAW');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
            }
        $data['judul'] = 'Data Nilai';
        $data['namauser'] = 'Admin SPK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['dataView'] = $this->getDataInsert();
            $data['nilaiPenduduk'] = $this->MNilai->getNilaiByUniveristas($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pSaw/nilaiSAW', $data);
            $this->load->view('templates/footer');
        }
    }
    private function getDataInsert()
    {
        $dataView = array();
        $kriteria = $this->MKriteria->getAll();
        foreach ($kriteria as $item) {
            $this->MSubKriteria->kd_kriteria = $item->kd_kriteria;
            $dataView[$item->kd_kriteria] = array(
                'nama' => $item->kriteria,
                'data' => $this->MSubKriteria->getById()
            );
        }
        return $dataView;
    }
    public function delete($id)
    {
        if($this->MNilai->delete($id) == true){
            if($this->MPenduduk->delete($id) == true){
                $this->session->set_flashdata('message','Berhasil menghapus data :)');
                $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                Data berhasil dihapus!
                </div>');
                redirect('pSaw/index');
            }
        }
    }
    public function penerimaan()
    {
        $data['judul'] = ' Setting Data Jumlah Penerima PKH';
        $data['namauser'] = 'Admin SPK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penerima'] = $this->db->get('tb_penerima')->result_array();
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pSaw/penerimaan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->penerimaan->tambah();
            $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Data baru berhasil ditambahkan
                                            </div>');
            redirect('pSaw/penerimaan');
        }
    }
    public function editPenerima()
    {
    $this->penerimaan->editPenerima();
        $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Data berhasil diubah!
                                            </div>');
        redirect('pSaw/penerimaan');
    }
}

