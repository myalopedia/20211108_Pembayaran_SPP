<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

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
		$data['id_admin']	= $this->session->userdata('id_admin');
		$data['level_admin']	= $this->session->userdata('level_admin');
		$data['title']		= 'Data Admin';
		$data['head']		= 'admin/layout/head.php';
        $data['menu']       = 'admin/layout/menu.php';
		$data['content']	= 'admin/body/admin.php';
		$data['foot']		= 'admin/layout/foot.php';

        $data['data_admin'] = $this->M_admin->data_admin();

		$this->load->view('admin/template.php', $data);
	}

    public function tambah()
	{
		$data['foto_admin']	= $this->session->userdata('foto_admin');
		$data['id_admin']	= $this->session->userdata('id_admin');
		$data['level_admin']	= $this->session->userdata('level_admin');
		$data['title']		= 'Tambah Data Admin';
		$data['head']		= 'admin/layout/head.php';
        $data['menu']       = 'admin/layout/menu.php';
		$data['content']	= 'admin/body/admin_form.php';
		$data['foot']		= 'admin/layout/foot.php';

        $data['url']		= 'admin/akun/add';
		$data['url_foto']	= 'uploads/admin/default.png';
		$data['id_admin']	= $this->M_admin->getidadmin();;

		$this->load->view('admin/template.php', $data);
	}

	public function add()
	{
		$id_admin = $this->input->post('id_admin');
		$data['id_admin']		= $id_admin;
		$data['nama_admin']		= $this->input->post('nama_admin');
		$data['password'] 		= md5($this->input->post('password'));
		$data['foto']			= $this->_uploadImage($id_admin);

		$this->db->trans_start();
		$this->db->insert('tb_admin', $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert alert-warning col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal Disimpan!</div>");
			redirect(base_url('admin/akun')); 
		}
		else {
			$this->session->set_flashdata("msg", "<div class='alert alert-success col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Berhasil Disimpan!</div>");
			redirect(base_url('admin/akun'));
		}
	}

	public function profil($id)
	{		
		$data['foto_admin']	= $this->session->userdata('foto_admin');
		$data['id_admin']	= $this->session->userdata('id_admin');
		$data['level_admin']	= $this->session->userdata('level_admin');
		$data['title']		= 'Profil Admin';
		$data['head']		= 'admin/layout/head.php';
        $data['menu']       = 'admin/layout/menu.php';
		$data['content']	= 'admin/body/admin_edit.php';
		$data['foot']		= 'admin/layout/foot.php';

        $data['url']		= 'admin/akun/update';

		$query = $this->db->query("SELECT * FROM tb_admin WHERE id_admin='$id'");
		$d = $query->row();
				
		$data['url_foto']	= 'uploads/admin/'.$d->foto;
        $data['foto'] = $d->foto;
		$data['nama_admin'] = $d->nama_admin;
		$data['username'] = $d->id_admin; 
		$data['level'] = $d->level; 
        $data['id'] = $id;        

		$this->load->view('admin/template.php', $data);
	}

	public function update()
	{
		$id_admin	= $this->input->post('id');
		$foto 		= $this->input->post('foto');
		$data['nama_admin']	= $this->input->post('nama_admin');
		$data['level']	= $this->input->post('level');
		
		if (!empty($_FILES["file"]["name"])) {
			if ($foto != 'default.png') {		
				unlink("./uploads/siswa/$foto"); }
			$data['foto'] = $this->_uploadImage($id_admin);
		} 

		$this->db->trans_start();
		$this->db->where('id_admin', $id_admin);
		$this->db->update('tb_admin', $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert alert-warning col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal Diedit!</div>");
			redirect(base_url('admin/akun')); 
		}
		else {
			$this->session->set_flashdata("msg", "<div class='alert alert-success col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Berhasil Diedit!</div>");
			redirect(base_url('admin/akun'));
		}
	}

	public function ganti_password()
	{
		$id_admin =$this->input->post('id');
		$data['password'] = md5($this->input->post('new_pass'));

		$this->db->trans_start();
		$this->db->where('id_admin', $id_admin);
		$this->db->update('tb_admin', $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert alert-warning col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password Gagal Diedit!</div>");
			redirect(base_url('admin/akun')); 
		}
		else {
			$this->session->set_flashdata("msg", "<div class='alert alert-success col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password Berhasil Diedit!</div>");
			redirect(base_url('admin/akun'));
		}
	}

	public function hapus($id)
	{
		$query = $this->db->query("SELECT * FROM tb_admin WHERE id_admin='$id'");
		$d = $query->row();

		$this->db->trans_start();
		$this->db->where('id_admin', $id);
		$this->db->delete('tb_admin');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert alert-warning col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal Dihapus!</div>");
			redirect(base_url('admin/akun')); 
		}
		else {
			unlink("./uploads/admin/$foto");
			$this->session->set_flashdata("msg", "<div class='alert alert-success col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Berhasil Dihapus!</div>");
			redirect(base_url('admin/akun'));
		}
	}

	private function _uploadImage($id)
	{
		$config['upload_path']   = './uploads/admin/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name']     = $id;
		$config['overwrite']     = true;
		$config['max_size']	     = 5000;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		}
		return "default.png";
	}

}