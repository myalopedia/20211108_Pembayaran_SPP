<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
		$data['body']	= 'siswa/body/profil.php';
		$data['foot']   = 'siswa/layout/foot.php';

		$query = $this->db->query("SELECT * FROM tb_siswa WHERE nis='$nis'");
		$d = $query->row();
				
		$data['url_foto']	= 'uploads/siswa/'.$d->foto;
		$data['nis'] = $d->nis;
		$data['nisn'] = $d->nisn;
		$data['angkatan'] = $d->angkatan;
		$data['nama_siswa'] = $d->nama_siswa;
		$data['tempat_lahir'] = $d->tempat_lahir;
		$data['tgl_lahir'] = $d->tgl_lahir;
		$data['kelas'] = $d->kelas;
		$data['jk'] = $d->jk;
		$data['jurusan'] = $d->jurusan;
		$data['alamat'] = $d->alamat;
		$data['no_hp'] = $d->no_hp;
		$data['no_hp_ortu'] = $d->no_hp_ortu;
		$data['foto'] = $d->foto;

		$this->load->view('siswa/template.php', $data);
	}

    public function save()
    {
        $nis = $this->input->post('nis');
		$foto = $this->input->post('foto');
		$data['nis']			= $nis;
		$data['nisn'] 			= $this->input->post('nisn');
		$data['angkatan'] 		= $this->input->post('angkatan');
		$data['nama_siswa'] 	= ucwords($this->input->post('nama_siswa'));
		$data['tempat_lahir'] 	= ucwords($this->input->post('tempat_lahir'));
		$data['tgl_lahir'] 		= $this->input->post('tgl_lahir');
		$data['kelas'] 			= $this->input->post('kelas');
		$data['jurusan'] 		= $this->input->post('jurusan');
		$data['jk'] 		= $this->input->post('jk');
		$data['alamat'] 		= $this->input->post('alamat');
		$data['no_hp'] 		= $this->input->post('no_hp');
		$data['no_hp_ortu'] 		= $this->input->post('no_hp_ortu');
		
		if (!empty($_FILES["file"]["name"])) {
			if ($foto != 'default.png') {		
				unlink("./uploads/siswa/$foto"); }
			$data['foto'] = $this->_uploadImage($nis);
		} 

		$this->db->trans_start();
		$this->db->where('nis', $nis);
		$this->db->update('tb_siswa', $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert alert-warning col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal Diedit!</div>");
			redirect(base_url('profil')); 
		}
		else {
			$this->session->set_flashdata("msg", "<div class='alert alert-success col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Berhasil Diedit!</div>");
			redirect(base_url('profil'));
		}
    }

    public function ganti_password()
	{
		$nis = $this->input->post('nis');
		$data['password'] = md5($this->input->post('pass_baru'));

		$this->db->trans_start();
		$this->db->where('nis', $nis);
		$this->db->update('tb_siswa', $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert alert-warning col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password Gagal Diedit!</div>");
			redirect(base_url('profil')); 
		}
		else {
			$this->session->set_flashdata("msg", "<div class='alert alert-success col-md-6'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password Berhasil Diedit!</div>");
			redirect(base_url('profil'));
		}
	}

    private function _uploadImage($nis)
	{
		$config['upload_path']   = './uploads/siswa/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name']     = $nis;
		$config['overwrite']     = true;
		$config['max_size']	     = 5000;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		}
		return "default.png";
	}

}
?>