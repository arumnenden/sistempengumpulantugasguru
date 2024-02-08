<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()// fungsi untuk construct
    {
        parent::__construct();
        if(!$this->session->userdata('level'))
        {
            $this->session->set_flashdata('pesan', 'Anda harus masuk terlebih dahulu!');
            redirect('home');// di arahkan ke halam login
        }
    }

    public function index()// fungsi untuk tampilan halaman profil
    {
        //Judul Halaman
        $data['title']      = 'Profil';
        $data['subtitle']   = '';

        // perintah
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/profil');
        $this->load->view('admin/templates/footer');
    }
    
    public function update($id)// fungsi untuk update data
    {
        //inisiasi variabel
        $nama           = $_POST['nama'];
        $telp           = $_POST['telp'];
        $email          = $_POST['email'];
        $alamat         = $_POST['alamat'];
        $ttl            = $_POST['ttl'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $skin           = $_POST['skin'];
        $foto           = $_FILES['foto'];

        if($foto != '')// jika foto tidak kosong
        {
            //inisiasi
            $config['upload_path']   = './assets/profil/';
            $config['allowed_types'] = '*';
            $config['file_name']     = 'Profil-' . time();

            $this->load->library('upload', $config);// perintah upload

            if(!$this->upload->do_upload('foto'))
            {
                $foto = '';
            } 
            else 
            {
                $foto = $this->upload->data('file_name');
            }
        }

        //inisiasi id
        $cekUsername    = $this->db->query('SELECT username FROM tb_user WHERE id="'.$this->session->userdata('id').'" ');

        foreach ($cekUsername->result() as $usr) 
        {
            if($username == $usr->username) // jika username di temukan
            {

                $where = array('id' => $id);

                if($password == '' AND $foto == '')// jika password dan foto kosong
                {
                    $data = array(
                        'nama'          => $nama,
                        'telp'          => $telp,
                        'email'         => $email,
                        'alamat'        => $alamat,
                        'ttl'           => $ttl,
                        'username'      => $username,
                        'skin'          => $skin,
                    );// isi $data
                } 
                elseif($password != '' AND $foto == '') // jika password tidak kosong dan foto kosong
                {
                    $options = [
                        'cost' => 10,
                    ];
            
                    $enkripPassword = password_hash($password, PASSWORD_BCRYPT, $options);

                    $data = array(
                        'nama'          => $nama,
                        'telp'          => $telp,
                        'email'         => $email,
                        'alamat'        => $alamat,
                        'ttl'           => $ttl,
                        'username'      => $username,
                        'skin'          => $skin,
                        'password'      => $enkripPassword,
                    );// isi $data
                }
                elseif($password != '' AND $foto != '')// jika foto dan password tidak kosong
                {

                    $options = [
                        'cost' => 10,
                    ];
            
                    $enkripPassword = password_hash($password, PASSWORD_BCRYPT, $options);

                    $data = array(
                        'nama'          => $nama,
                        'telp'          => $telp,
                        'email'         => $email,
                        'alamat'        => $alamat,
                        'ttl'           => $ttl,
                        'username'      => $username,
                        'skin'          => $skin,
                        'foto'          => $foto,
                        'password'      => $enkripPassword,
                    );// $data
                } 
                elseif($password == '' AND $foto != '') // jika password kosong dan foto tidak kosong
                {

                    $options = [
                        'cost' => 10,
                    ];
            
                    $enkripPassword = password_hash($password, PASSWORD_BCRYPT, $options);

                    $data = array(
                        'nama'          => $nama,
                        'telp'          => $telp,
                        'email'         => $email,
                        'alamat'        => $alamat,
                        'ttl'           => $ttl,
                        'username'      => $username,
                        'skin'          => $skin,
                        'foto'          => $foto,
                    );// isi $data
                }
                
                // perintah update profile
                $this->m_model->update($where, $data, 'tb_user');// panggil model untuk update
                $this->session->set_userdata($data);
                $this->session->set_flashdata('pesan', 'Profil berhasil diubah!');
                redirect('admin/profil');

            } 
            else // jika username tidak di temukan
            {
                //inisiasi
                $cekUsernameTersedia = $this->db->query('SELECT username FROM tb_user WHERE username="'.$username.'" ')->num_rows();

                if($cekUsernameTersedia == '0') // jika username tersedia
                {
                    //inisiasi
                    $where = array('id' => $id);

                    if($password == '' AND $foto == '') // jika password dan foto kosong
                    {
                        $data = array(
                            'nama'          => $nama,
                            'telp'          => $telp,
                            'email'         => $email,
                            'alamat'        => $alamat,
                            'ttl'           => $ttl,
                            'username'      => $username,
                            'skin'          => $skin,
                        );// isi $data
                    } 
                    elseif($password != '' AND $foto == '') // jika password tidak kosong fann foto kosong

                    {
    
                        $options = [
                            'cost' => 10,
                        ];
                        
                        //inisiasi 
                        $enkripPassword = password_hash($password, PASSWORD_BCRYPT, $options);
    
                        $data = array(
                            'nama'          => $nama,
                            'telp'          => $telp,
                            'email'         => $email,
                            'alamat'        => $alamat,
                            'ttl'           => $ttl,
                            'username'      => $username,
                            'skin'          => $skin,
                            'password'      => $enkripPassword,
                        );
                    } 
                    elseif($password != '' AND $foto != '') // jika passord dan foto tidak kosong
                    {
    
                        $options = [
                            'cost' => 10,
                        ];
                        
                        //inisiasi
                        $enkripPassword = password_hash($password, PASSWORD_BCRYPT, $options);
    
                        $data = array(
                            'nama'          => $nama,
                            'telp'          => $telp,
                            'email'         => $email,
                            'alamat'        => $alamat,
                            'ttl'           => $ttl,
                            'username'      => $username,
                            'skin'          => $skin,
                            'foto'          => $foto,
                            'password'      => $enkripPassword,
                        );

                    } 
                    elseif($password == '' AND $foto != '') // jika password kosong dan foto tidak kosong
                    {
    
                        $options = [
                            'cost' => 10,
                        ];

                        //inisiasi
                        $enkripPassword = password_hash($password, PASSWORD_BCRYPT, $options);
    
                        $data = array(
                            'nama'          => $nama,
                            'telp'          => $telp,
                            'email'         => $email,
                            'alamat'        => $alamat,
                            'ttl'           => $ttl,
                            'username'      => $username,
                            'skin'          => $skin,
                            'foto'          => $foto,
                        );
                    }
                    
                    //perintah
                    $this->m_model->update($where, $data, 'tb_user');
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('pesan', 'Profil berhasil diubah!');
                    redirect('admin/profil');
                } 
                else // jika username tidak tersedia
                {
                    $this->session->set_flashdata('pesanError', 'Username tidak tersedia!');
                    redirect('admin/profil');
                }
            }
        }
    }
}