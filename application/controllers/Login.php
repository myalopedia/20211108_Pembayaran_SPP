<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['head']	= 'admin/layout/head.php';
		$data['foot']	= 'admin/layout/foot.php';
        $data['url']    = 'login/akses';

		$this->load->view('login.php', $data);
	}

    public function akses()
	{
		$username = trim($this->input->post('username'));
  		$password = md5(trim($this->input->post('password')));
  	
		$akses = $this->db->query("SELECT * FROM tb_siswa A
			WHERE A.nis = '$username' AND A.password = '$password'");

    	if($akses->num_rows() == 1) {
			foreach($akses->result_array() as $data) {
				$session['nis'] = $data['nis'];
				$session['nama_siswa'] = $data['nama_siswa'];
				$session['foto_siswa'] = $data['foto'];
			}		

			$this->session->set_userdata($session);
    		redirect(base_url('home'));	
		}
		else {
			$this->session->set_flashdata("msg", "<div class='alert alert-warning col-md-12'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pastikan Username dan Password Benar!</div>");
			redirect(base_url('login')); 
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login')); 
	}

}