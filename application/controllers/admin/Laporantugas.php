<?php
// Admin halaman laporan data tugas
defined('BASEPATH') or exit('No Direct script access Allowed');

class Laporantugas extends CI_Controller
{

    public function __construct() // fungsi construst harus login dulu
    {
        parent::__construct();//perent
        if (!$this->session->userdata('level')) 
        {
            $this->session->set_flashdata('pesan', 'Anda harus masuk terlebih dahulu!');// munculkan pesan harus masuk dulu
            redirect('home');// arahkan ke halaman loginn
        }
    }

    public function index() // fungsi tampilan laporan tugas
    {
        // judul halaman
        $data['title']      = 'Data Tugas ';
        $data['subtitle']   = 'Semua data Tugas akan muncul disini';

        //inisiasi untuk masukin tb_tugasjurnal
        $data['tugasjurnal']   = $this->m_model->get_desc('tb_tugas_jurnal');// panggil model get_desc

        //panggil tampilan
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/laporantugas');
        $this->load->view('admin/templates/footer');
    }

    public function delete($id) // fungsi untuk hapus 
    {
        // inisiasi
        $where  = array('id' => $id);

        $this->m_model->delete($where, 'tb_tugas_jurnal');// perintah untuk hapus
        $this->session->set_flashdata('pesan', 'Data Tugas Berhasil dihapus!');//munculkan pesan
        redirect('admin/laporantugas');// dan balik lagi ke halaman laporan tugas
    }

    public function insert()// fungsi untuk nembahin
    {
        date_default_timezone_set("Asia/Jakarta");
        
        //inisiasi
        $tipe_tugas      = $_POST['tipe_tugas'];
        $nama            = $_POST['nama'];
        $judul           = $_POST['judul'];
        $kelas           = $_POST['kelas'];
        $tugas_jurnal    = $_POST['tugas_jurnal'];
        $tanggal_upload  = date('Y-m-d H:i:s');

        $data = array(
            'tipe_tugas'     => $tipe_tugas,
            'nama'           => $nama,
            'judul'          => $judul,
            'kelas'          => $kelas,
            'tugas_jurnal'   => $tugas_jurnal,
            'tanggal_upload' => $tanggal_upload,
        );//isi var data

        $this->m_model->insert($data, 'tb_tugas_jurnal'); // panggil model insert data ke tb tugas
        $this->session->set_flashdata('pesan', 'Data Tugas Jurnal Berhasil Ditambahkan!'); // kirim pesan
        redirect('admin/laporantugas'); // dan balik lagi ke halaman laporan tugas
    }

    public function update($id)// fungsi untuk update
    {
        //inisiasi
        $tipe_tugas    = $_POST['tipe_tugas'];
        $nama          = $_POST['nama'];
        $judul         = $_POST['judul'];
        $kelas         = $_POST['kelas'];
        $tugas_jurnal  = $_POST['tugas_jurnal'];

        $data = array(
            'tipe_tugas'   => $tipe_tugas,
            'nama'         => $nama,
            'judul'        => $judul,
            'kelas'        => $kelas,
            'tugas_jurnal' => $tugas_jurnal,
        );// isi var data

        //inisiasi
        $where = array('id' => $id);// berdasarkan id

        $this->m_model->update($where, $data, 'tb_tugas_jurnal');// panggil model update untuk update di tb tugas
        $this->session->set_flashdata('pesan', 'Data Tugas  Berhasil Diubah!'); // kirim pesan
        redirect('admin/laporantugas'); // balik lg ke halaman laporan tugas
    }

    public function download($id)// fungsi untuk download file
    {

        if(!empty($id))
        {
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
           $fileInfo = $this->m_model->download(array('id' => $id));
            
            //file path
            $file = 'aplikasi-pengajuan-tugas/tb_tugas_jurnal/'.$fileInfo['file'];

            //download file from directory
            force_download($file, NULL);

            $this->session->set_flashdata('pesan', 'Data Tugas Berhasil didownload!');//munculkan pesan
            redirect('admin/laporantugas');// dan balik lagi ke halaman laporan tugas
        }

    }
}
