<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()// fungsi untuk menampilkan halaman home
    {
        if ($this->session->userdata('level') == 'Administrator') // jika user data adalah admin
        {
            redirect('admin/dashboard');// maka masuk ke halaman dashboard
        } 
        else 
        {
            //inisiasi
            $data['title']  = 'Login';
            $digit1 = mt_rand(1, 20);
            $digit2 = mt_rand(1, 20);

            $captcha = array('captcha' => $digit1 + $digit2); // rumus hitung angka

            $this->session->set_userdata($captcha);
            $data['captcha'] = "$digit1 + $digit2 = ?";

            $data['aplikasi'] = $this->m_model->get_desc('tb_aplikasi');//panggil model
            $this->load->view('login', $data);// ke halaman login
        }
    }

    public function auth() //fungsi untuk auth/eror/cek
    {
        date_default_timezone_set('Asia/Jakarta');

        //inisiasi
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $jawaban    = $_POST['jawaban'];

        if (!empty($jawaban)) // jika jawaban hitungan di isi atau ga kosong
        {
            if ($jawaban == $this->session->userdata('captcha')) // jika hitung bener
            {
                //inisiasi
                $where = array('username' => $username);// jika username bener
                $cek = $this->m_model->get_where($where, 'tb_user'); //inisiai cek table dengan manggil model get_where

                if ($cek->num_rows() > 0) // jika user di temukan dari tb_user
                {
                    foreach ($cek->result_array() as $row) 
                    {

                        if (password_verify($password, $row['password'])) // jika password bener
                        {

                            $datauser = array 
                            (
                                'id'            => $row['id'],
                                'nama'          => $row['nama'],
                                'telp'          => $row['telp'],
                                'email'         => $row['email'],
                                'username'      => $row['username'],
                                'skin'          => $row['skin'],
                                'level'         => $row['level'],
                                'foto'          => $row['foto'],
                                'terdaftar'     => $row['terdaftar']
                            ); //ini isi user data

                            $this->session->set_userdata($datauser);

                            $insertLog = array(
                                'idUser'    => $row['id'],
                                'status'    => 'Login',
                                'ipAddress' => $_SERVER['REMOTE_ADDR'],
                                'device'    => $_SERVER['HTTP_USER_AGENT'],
                                'terdaftar' => date('Y-m-d H:i:s'),
                            ); // ini isi insert log 

                            $this->m_model->insert($insertLog, 'tb_log');// panggil model fungsi insert utnuk kasih tau kalau dia login

                            if ($row['level'] == 'Administrator') // jika level admin, 
                            {
                                redirect('admin/dashboard'); 
                            } 
                            else if ($row['level'] == 'Guru') // jika bukan admin
                            {
                                redirect('admin/dashboard');
                            }
                        } 
                        else // jika password salah
                        {
                            $this->session->set_flashdata('pesan', 'Password anda salah!');// menampilkan pesan dan
                            redirect('home'); // balik lagi ke home
                        }
                    }// end foreach
                } 
                else //jika user tidak di temukan
                {
                    $this->session->set_flashdata('pesan', 'Username tidak ditemukan!');// menampilkan pesan dan
                    redirect('home'); // balik lagi ke home
                }
            } 
            else // jika hitung tidak bener
            {
                $this->session->set_flashdata('pesan', 'Hitung dengan benar!'); // menampilkan pesan dan 
                redirect('home'); // balik lg ke home (di suruh login ulang)
            }
        } 
        else // jika hitungan kosong
        {
            $this->session->set_flashdata('pesan', 'Captcha harap diisi!'); // menampilkan pesan dan 
            redirect('home'); // balik lg ke home ( disuruh login ulang)
        }
    }

    public function logout() // fungsi untuk logout
    {
        date_default_timezone_set('Asia/Jakarta');

        $insertLog = array
        (
            'idUser'    => $this->session->userdata('id'),
            'status'    => 'Logout',
            'ipAddress' => $_SERVER['REMOTE_ADDR'],
            'device'    => $_SERVER['HTTP_USER_AGENT'],
            'terdaftar' => date('Y-m-d H:i:s'),
        ); // isi insert log

        $this->m_model->insert($insertLog, 'tb_log');// untuk masukin ke table log biar ada history pernah login

        $this->session->sess_destroy();// logout
        redirect('home');// pindahkan ke halaman login
    }
}
