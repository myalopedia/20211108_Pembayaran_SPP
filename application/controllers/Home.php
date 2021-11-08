<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['title']  = 'Home';
		$data['head']   = 'siswa/layout/head.php';
		$data['body']	= 'siswa/body/dashboard.php';
		$data['foot']   = 'siswa/layout/foot.php';

		$data['nis'] = $nis;
		$data['data_tagihan'] = $this->M_app->data_tagihan($nis);
		$data['batas_waktu'] = $this->M_app->bulan_tagihan($nis);
		$data['status'] = $this->M_app->status_notif($nis);

		$this->load->view('siswa/template.php', $data);
	}

}
?>