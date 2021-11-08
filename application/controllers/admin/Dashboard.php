<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');

		if (!$this->session->userdata('id_admin') || $this->session->userdata('level_admin') != 1) {
			redirect(base_url('admin/login'));
		}
	}

	public function index()
	{
		$data['foto_admin']	= $this->session->userdata('foto_admin');
		$data['nama_admin']	= $this->session->userdata('nama_admin');
		$data['id_admin']	= $this->session->userdata('id_admin');
		$data['level_admin']	= $this->session->userdata('level_admin');
		$data['title']		= 'Dashboard';
		$data['head']		= 'admin/layout/head.php';
        $data['menu']       = 'admin/layout/menu.php';
		$data['content']	= 'admin/body/dashboard.php';
		$data['foot']		= 'admin/layout/foot.php';

		$data['data_bayar_baru'] = $this->M_admin->data_pembayaran_baru();
		$data['jml_belum_bayar'] = $this->M_admin->jml_belum_bayar();

		$this->load->view('admin/template.php', $data);
	}

}