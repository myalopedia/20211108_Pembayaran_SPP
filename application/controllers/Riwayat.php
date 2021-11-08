<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_app');

		if (!$this->session->userdata('nis')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$nis = $this->session->userdata('nis');
		$data['nama_siswa']	= $this->session->userdata('nama_siswa');
		$data['foto_siswa']	= $this->session->userdata('foto_siswa');
		$data['title']  = 'Riwayat Pembayaran';
		$data['head']   = 'siswa/layout/head.php';
		$data['body']	= 'siswa/body/riwayat.php';
		$data['foot']   = 'siswa/layout/foot.php';

		$data['data_riwayat'] = $this->M_app->data_riwayat($nis);

		$this->load->view('siswa/template.php', $data);
	}

}