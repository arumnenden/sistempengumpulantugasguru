<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {

    public function __construct()// fungsi perintah untuk login dulu / Model File dimuat untuk mengambil data file dari database.
    {
        parent::__construct();

        if(!$this->session->userdata('level'))
        {
            $this->session->set_flashdata('pesan', 'Anda harus masuk terlebih dahulu!');
            redirect('home');
        } 
        elseif ($this->session->userdata('level') != 'Administrator') 
        {
            redirect('home');
        }
    }

    public function index() // fungsi untuk tampilan tentang Aplikasi
    {
        // inisiasi judul halaman
        $data['title']      = 'Tentang Aplikasi';
        $data['subtitle']   = '';

        //inisiasi
        $data['aplikasi']   = $this->m_model->get_desc('tb_aplikasi');// panggil model untuk ke tb_aplikasi

        //panggil tampilan
        $this->load->view('admin/templates/header', $data);//tampilkan header
        $this->load->view('admin/templates/sidebar');//tampilkan sidebar
        $this->load->view('admin/aplikasi');// tampilkan body halaman tentang aplikasi
        $this->load->view('admin/templates/footer'); // tampilkan footer
    }
    
    public function update($id)// fungsuu untuk update data
    {
        //inisiasi
        $nama   = $_POST['nama'];
        $email  = $_POST['email'];
        $telp   = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $logo   = $_FILES['logo'];
        $where = array('id' => $id);//var where isinya id

        if($logo != '')// jika logo ga kosong
        {
            //rules
            $config['upload_path'] = './assets/logo/';// tempat foto
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['file_name'] = 'Logo-' . time();
            $config['max_size'] = 5120;

            $this->load->library('upload', $config);//upload

            if(!$this->upload->do_upload('logo'))// klo logo kosong
            {
                $logo = '';
            } 
            else // klo logo ada
            {
                $logo = $this->upload->data('file_name');
            }
        }

        if($logo == '') // kalau logo kosong
        {
            $data = array(
                'nama'      => $nama,
                'email'     => $email,
                'telp'      => $telp,
                'alamat'    => $alamat,
            ); // isi data
        }
        else // kalau logo isi
        {
            $data = array(
                'nama'      => $nama,
                'email'     => $email,
                'telp'      => $telp,
                'alamat'    => $alamat,
                'logo'      => $logo,
            ); // isi data
        }
        
        $this->m_model->update($where, $data, 'tb_aplikasi'); // panggil mode untuk update di tb_aplikasi
        $this->session->set_flashdata('pesan', 'Pengaturan aplikasi berhasil diubah!'); // muncul pesan
        redirect('admin/aplikasi'); // dan balik lg ke halaman tentang aplikasi
    }

    public function delete_logo($id)// fungsi untuk delete logo
    {
        // inisiasi
        $where = array ('id' => $id);
        $data = array ('logo' => '');

        //perintah
        $this->m_model->update($where, $data, 'tb_aplikasi');
        $this->session->set_flashdata('pesan', 'Logo berhasil dihapus!');
        redirect('admin/aplikasi');
    }
}