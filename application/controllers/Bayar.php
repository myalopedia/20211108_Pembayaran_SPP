<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayar extends CI_Controller {

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
		$data['title']  = 'Bayar';
		$data['head']   = 'siswa/layout/head.php';
		$data['body']	= 'siswa/body/upload_bayar.php';
		$data['foot']   = 'siswa/layout/foot.php';

		$data['ket'] = 'upload';
		$data['url'] = 'bayar/upload';
		$data['nis'] = $nis;
		$data['tagihan'] = $this->M_app->tagihan($nis);
		$data['keterangan'] = $this->M_app->tagihan_ket($nis);
		$data['id_pembayaran'] = '';
		$data['bukti'] = '';

		$this->load->view('siswa/template.php', $data);
	}

	public function upload()
	{
		date_default_timezone_set('Asia/Jakarta');
		$nis = $this->input->post('nis');
		$id_tagihan = $this->input->post('id_tagihan');
		$id_pembayaran = $this->M_app->getidbayar($nis);
		$data['id_pembayaran'] = $id_pembayaran;
		$data['nis'] = $nis;
		$data['tgl_pembayaran'] = date('Y-m-d H:i:s');
		$data['total_tagihan'] = $this->input->post('tagihan');
		$data['bukti'] = $this->_uploadBukti();
		$data['status'] = 0;
		$data['deskripsi'] = $this->input->post('keterangan');

		$this->db->trans_start();
		$this->db->insert('tb_pembayaran', $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert alert-warning col-md-8'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pembayaran Gagal Diupload!</div>");
			redirect(base_url('home')); 
		}
		else {
			$this->db->query("DELETE FROM tb_tagihan_siswa WHERE nis='$nis'");
			$this->session->set_flashdata("msg", "<div class='alert alert-success col-md-8'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pembayaran $id Berhasil Diupload. Cek Riwayat Pembayaran!</div>");
			redirect(base_url('home'));
		}
	}

	public function edit($id)
	{				
		$nis = $this->session->userdata('nis');		
		$data['nama_siswa']	= $this->session->userdata('nama_siswa');
		$data['foto_siswa']	= $this->session->userdata('foto_siswa');
		$data['title']  = 'Edit Bayar';
		$data['head']   = 'siswa/layout/head.php';
		$data['body']	= 'siswa/body/upload_bayar.php';
		$data['foot']   = 'siswa/layout/foot.php';

		$data['ket'] = 'edit';
		$data['url'] = 'bayar/update';
		$data['nis'] = $nis;
		$bayar_tagihan = $this->M_app->bayar_tagihan($id);
		foreach ($bayar_tagihan as $d) {
			$data['id_pembayaran'] = $id;
			$data['tagihan'] = $d->total_tagihan;
			$data['keterangan'] = $d->deskripsi;
			$data['bukti'] = $d->bukti;
		}

		$this->load->view('siswa/template.php', $data);
	}

	public function update()
	{
		$data['tgl_pembayaran'] = date('Y-m-d H:i:s');		
		$data['bukti'] = $this->_uploadBukti();
		$data['status'] = 0;
		$data['deskripsi'] = $this->input->post('keterangan');
		$id = $this->input->post('id');
		$gambar_bukti = $this->input->post('bukti');

		$this->db->trans_start();
		$this->db->where('id_pembayaran', $id);
		$this->db->update('tb_pembayaran', $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert alert-warning col-md-8'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pembayaran Gagal Diupload!</div>");
			redirect(base_url('home')); 
		}
		else {
			unlink("uploads/bukti/$gambar_bukti");
			$this->session->set_flashdata("msg", "<div class='alert alert-success col-md-8'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pembayaran $id Berhasil Diupload. Cek Riwayat Pembayaran!</div>");
			redirect(base_url('home'));
		}
	}

	private function _uploadBukti()
	{
		$config['upload_path']   = './uploads/bukti/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['encrypt_name']	 = true;
		$config['overwrite']     = true;
		$config['max_size']	     = '5000';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		}
		return "default.png";
	}

}
?>