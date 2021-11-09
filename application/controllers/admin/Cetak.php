<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

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
		$data['title']		= '';
		$data['head']		= 'admin/layout/head.php';
        $data['menu']       = 'admin/layout/menu.php';
		$data['content']	= 'admin/body/cetak.php';
		$data['foot']		= 'admin/layout/foot.php';

		if($_POST['filter'] == 'true')
		{
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_akhir = $this->input->post('tgl_akhir');
			$data['inp_tgl_awal'] = $tgl_awal;
			$data['inp_tgl_akhir'] = $tgl_akhir;
			$data['data_bayar'] = $this->M_admin->filter_data_bayar($tgl_awal, $tgl_akhir);
		}
		else {
			$data['data_bayar'] = $this->M_admin->data_pembayaran();
		}


		$this->load->view('admin/template.php', $data);
	}

	public function cetak()
	{
		if($_POST['filter'] == 'true')
		{
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_akhir = $this->input->post('tgl_akhir');
			$data['inp_tgl_awal'] = $tgl_awal;
			$data['inp_tgl_akhir'] = $tgl_akhir;
			$data['data_bayar'] = $this->M_admin->filter_data_bayar(date('Y-m-d 00:00:01', strotime($tgl_awal)), date('Y-m-d 23:59:59', strotime($tgl_akhir)));
		}
		else {
			$data['data_bayar'] = $this->M_admin->data_pembayaran();
		}

		$this->load->view('admin/cetak', $data);
	}
	public function cetak_tunggakan()
	{
		if($_POST['filter'] == 'true')
		{
			$angkatan = $this->input->post('angkatan');
			$jurusan = $this->input->post('jurusan');
			$data['angkatan'] = $angkatan;
			$data['jurusan'] = $jurusan;
			$data['data_bayar'] = $this->M_admin->filter_data_belum_bayar($angkatan, $jurusan);
		}
		else {
			$data['data_bayar'] = $this->M_admin->data_belum_bayar();
		}

		$this->load->view('admin/body/cetak_tunggakan', $data);
	}
}