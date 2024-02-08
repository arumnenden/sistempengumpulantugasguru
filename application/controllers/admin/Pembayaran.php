<!-- Data Guru di admin -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('level'))
		{
			$this->session->set_flashdata('pesan', 'Anda harus masuk terlebih dahulu!');
			redirect('home');
		}
	}

	public function index()
	{
		$data['title']		= 'Data Guru';
		$data['subtitle']	= 'di SD Labschool UPI Bumi Siliwangi';

		// inisiasi masukin tb_user ke $data
		 $data['user']       = $this->m_model->get_desc('tb_user');

		// perintah munculin halaman
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/Pembayaran');
		$this->load->view('admin/templates/footer');

		
    }

	
}