<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');

		if (!$this->session->userdata('id_admin')) {
			redirect(base_url('admin/login'));
		}
	}

	public function index()
	{
		$data['foto_admin']	= $this->session->userdata('foto_admin');
		$data['nama_admin']	= $this->session->userdata('nama_admin');
		$data['id_admin']	= $this->session->userdata('id_admin');
		$data['level_admin']	= $this->session->userdata('level_admin');
		$data['title']		= 'Laporan Pembayaran SPP';
		$data['head']		= 'admin/layout/head.php';
		$data['menu']       = 'admin/layout/menu.php';
		$data['content']	= 'admin/body/Laporan.php';
		$data['foot']		= 'admin/layout/foot.php';

		if(isset($_POST['filter']) && $_POST['filter'] != null)
		{
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_akhir = $this->input->post('tgl_akhir');
			$data['inp_tgl_awal'] = $tgl_awal;
			$data['inp_tgl_akhir'] = $tgl_akhir;
			$data['data_bayar'] = $this->M_admin->filter_data_bayar($tgl_awal, $tgl_akhir);

		}
		else {
			$data['data_bayar'] = $this->M_admin->data_bayar();

		}
		$this->load->view('admin/template.php', $data);
	}
}