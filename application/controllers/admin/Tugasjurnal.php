<?php

defined('BASEPATH') or exit('No Direct script access Allowed');

class Tugasjurnal extends CI_Controller
{

    public function __construct()//fungsi agar di suruh login dulu
    {
        parent::__construct();
        if (!$this->session->userdata('level')) 
        {
            $this->session->set_flashdata('pesan', 'Anda harus masuk terlebih dahulu!');
            redirect('home');
        }
    }

    public function index()// fungsi untuk menampilkan halaman Tugas Jurnal
    {
        // inisiasi untuk body Judul halaman
        $data['title']      = 'Data Tugas ';
        $data['subtitle']   = 'Semua data Tugas  akan muncul disini';

        // inisiasi masukin data di database jadi $data
        $data['tugasjurnal']   = $this->m_model->get_desc('tb_tugas_jurnal');

        // perintah untuk munculin halaman
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tugas_jurnal');
        $this->load->view('admin/templates/footer');
    }

    public function delete($id)// fungsi untuk delete berdasarkan id
    {
        // inisiasi
        $where  = array('id' => $id);

        //perintah hapus
        $this->m_model->delete($where, 'tb_tugas_jurnal');// panggil model delete dimna parameter nya id di database tb jurnal
        $this->session->set_flashdata('pesan', 'Data Tugas Berhasil dihapus!');// munculin tulisan jika telah di hapus
        redirect('admin/tugasjurnal');// alihkan ke halamana tygas jurnal
    }

    public function insert() // fungsi untuk menambahkan data 
    {
        date_default_timezone_set("Asia/Jakarta");// untuk waktu

        // inisiasi variable
        $tipe_tugas       = $_POST['tipe_tugas'];
        $nama             = $_POST['nama'];
        $judul            = $_POST['judul'];
        $kelas            = $_POST['kelas'];
        $tugas_jurnal     = $_POST['tugas_jurnal'];
        $tanggal_upload   = date('Y-m-d H:i:s');

        // inisiasi untuk masukin semua var ke $data
        $data = array(
            'tipe_tugas'        => $tipe_tugas,
            'nama'              => $nama,
            'judul'             => $judul,
            'kelas'             => $kelas,
            'tugas_jurnal'      => $tugas_jurnal,
            'tanggal_upload'    => $tanggal_upload,
        );

        // perintah untuk insert 
        $this->m_model->insert($data, 'tb_tugas_jurnal');// panggil model isert data
        $this->session->set_flashdata('pesan', 'Data Tugas Jurnal Berhasil Ditambahkan!');// munculkan pesan
        redirect('admin/tugasjurnal');// alihkan ke halaman tugas jurnal
    }

    public function update($id)// fungsi untuk update data
    {
        // inisiasi variabel
        $tipe_tugas       = $_POST['tipe_tugas'];
        $nama             = $_POST['nama'];
        $judul            = $_POST['judul'];
        $kelas            = $_POST['kelas'];
        $tugas_jurnal     = $_POST['tugas_jurnal'];

        //inisiasi untuk masukin semua var ke $data
        $data = array(
            'tipe_tugas'   => $tipe_tugas,
            'nama'         => $nama,
            'judul'        => $judul,
            'kelas'        => $kelas,
            'tugas_jurnal' => $tugas_jurnal,
        );

        //inisiasi id adalah $where
        $where = array('id' => $id);
        // perintah untuk update
        $this->m_model->update($where, $data, 'tb_tugas_jurnal');
        $this->session->set_flashdata('pesan', 'Data Tugas  Berhasil Diubah!');
        redirect('admin/tugasjurnal');
    }
}
