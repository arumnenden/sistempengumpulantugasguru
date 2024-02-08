<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()// fungsi untuk masuk dulu
	{
		parent::__construct();
		if(!$this->session->userdata('level'))// jika admin
		{
			$this->session->set_flashdata('pesan', 'Anda harus masuk terlebih dahulu!');
			redirect('home');
		} 
		elseif($this->session->userdata('level') != 'Administrator') // jika guru
		{
			redirect('home');
        }
	}

	public function index()// halaman untuk menampilkan manage user
	{
		//inisiasi untuk judul body halaman
		$data['title']		= 'Manajemen User';
		$data['subtitle']	= 'Semua user akan muncul disini';

		// inisiasi masukin tb_user ke $data
		$data['user']       = $this->m_model->get_desc('tb_user');

		// perintah munculin halaman
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/user');
		$this->load->view('admin/templates/footer');
    }

    public function delete($id)//fungsi untuk delete akun
	{
		// inisiasi dimna id adalah $where
		$where = array('id' => $id);

		// perintah untuk delete 
		$this->m_model->delete($where, 'tb_user');// dimna id di tb_user
		$this->session->set_flashdata('pesan', 'Account berhasil dihapus');// munculin pesan
		redirect('admin/user');// alihkan ke halaman user
	}

	public function insert()// fungsi untuk nambahkan data user
	{
		date_default_timezone_set('Asia/Jakarta');
		//inisiasi variabe yang ada di database
		$nama		= $_POST['nama'];
		$telp		= $_POST['telp'];
		$email		= $_POST['email'];
		$alamat		= $_POST['alamat'];
		$ttl		= $_POST['ttl'];
		$username	= $_POST['username'];
		$password	= $_POST['password'];
		$foto		= 'no-image.png';// ubah
		$skin		= 'blue';// thema
		$level		= $_POST['level'];
		$terdaftar	= date('Y-m-d H:i:s');

		// inisiasi variabel 
		$where = array('username' => $username);
		$cekUsername	= $this->m_model->get_where($where, 'tb_user');

		if(empty($cekUsername->num_rows()))// jika username belom ada
		 {
			$options = [
				'cost' => 10,
			];

			// inisiasi
			$enkripPassword = password_hash($password, PASSWORD_BCRYPT, $options);
			
			//inisiasi masukin ke $data
			$data = array(
				'nama' 		=> $nama,
				'telp' 		=> $telp,
				'email' 	=> $email,
				'alamat' 	=> $alamat,
				'ttl' 		=> $ttl,
				'username'	=> $username,
				'password'	=> $enkripPassword,
				'foto'		=> $foto,
				'skin'		=> $skin,
				'level'		=> $level,
				'terdaftar'	=> $terdaftar,
			);
			// perintah untuk nambah data
			$this->m_model->insert($data, 'tb_user');
			$this->session->set_flashdata('pesan', 'Account berhasil dibuat!');
			redirect('admin/user');
		} 
		else // jika username belom ada
		{
			$this->session->set_flashdata('pesanError', 'Username sudah ada!');
			redirect('admin/user');
		}
	}

	public function resetpassword($id)// fungsi untuk ubah password
	{
		// inisiasi
		$password	= $_POST['password'];
		$options = [
			'cost' => 10,
		];
		// inisiasi
		$enkripPassword = password_hash($password, PASSWORD_BCRYPT, $options);
		$data = array(
			'password'	=> $enkripPassword,
		);
		$where = array('id' => $id);

		// perintah
		$this->m_model->update($where, $data, 'tb_user');// panggil model untuk update data
		$this->session->set_flashdata('pesan', 'Reset password berhasil!');// munculin pesan
		redirect('admin/user');// alihkan ke halaman admin
	}
}