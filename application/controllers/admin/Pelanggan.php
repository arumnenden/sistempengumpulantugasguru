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
		$data['title']		= 'Data Guru';
		$data['subtitle']	= 'Semua user akan muncul disini';

		// inisiasi masukin tb_user ke $data
		$data['user']       = $this->m_model->get_desc('tb_user');

		// perintah munculin halaman
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/user');
		$this->load->view('admin/templates/footer');
    }


}