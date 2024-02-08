<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()// fungsi untuk menampilkan halamana wellcome
	{
		// inisiasi
		$data['aplikasi']	= $this->m_model->get_desc('tb_aplikasi');// ambil data dari table aplikasi

		//perintah untuk nampilin halaman
		$this->load->view('form', $data);//view nya form
	}
}
