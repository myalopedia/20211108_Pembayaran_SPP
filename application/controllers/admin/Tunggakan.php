<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunggakan extends CI_Controller {

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
		$data['content']	= 'admin/body/tunggakan.php';
		$data['foot']		= 'admin/layout/foot.php';
        $data['get_angkatan'] = $this->M_admin->get_tahun_angkatan();
        $data['get_jurusan'] = $this->M_admin->get_jurusan();

		if(isset($_POST['filter']) && $_POST['filter'] != null)
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
		$this->load->view('admin/template.php', $data);
	}
}