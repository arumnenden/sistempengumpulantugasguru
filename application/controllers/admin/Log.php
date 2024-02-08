<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct()// fungsi untuk construct
	{
		parent::__construct();//perent
		if(!$this->session->userdata('level'))
		{
			$this->session->set_flashdata('pesan', 'Anda harus masuk terlebih dahulu!');
			redirect('home');
		} 
		elseif($this->session->userdata('level') != 'Administrator') 
		{
			redirect('home');
        }
	}

	public function index()// fungsi untuk menampilkan halaman histori login
	{
		// inisiasi, Judul Halaman
		$data['title']		= 'Data Log';
		$data['subtitle']	= 'Semua log akan muncul disini';

		//inisiasi untuk masukin tb_log
		$data['log']		= $this->m_model->get_desc('tb_log');// panggil model untuk tb_log

		// perintah munculin halaman
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/log');
		$this->load->view('admin/templates/footer');
	}
}