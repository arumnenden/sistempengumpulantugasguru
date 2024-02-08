<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()//harus masuk dulu
	{
		parent::__construct(); //perent
		if (!$this->session->userdata('level'))
		{
			$this->session->set_flashdata('pesan', 'Anda harus masuk terlebih dahulu!'); // jika blm login
			redirect('home');// di alihkan ke halaman login
		}
	}

	public function index()// untuk tampilan Dashboard
	{
		date_default_timezone_set('Asia/Jakarta');

		// judul halaman
		$data['title']	= 'Overview';
		$data['subtitle']	= 'Data Tugas';

		$this->load->view('admin/templates/header', $data);// tampilakn header
		$this->load->view('admin/templates/sidebar');//tampilkan sidebar
		$this->load->view('admin/dashboard');//tampilkan halaman badan dashboard
		$this->load->view('admin/templates/footer');// tambilkan footer
	}
}
