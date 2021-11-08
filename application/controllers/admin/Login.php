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
		$data['url']	= 'admin/login/akses';

		$this->load->view('login.php', $data);
	}

    public function akses()
	{
		$username = trim($this->input->post('username'));
  		$password = md5(trim($this->input->post('password')));
  	
		$akses = $this->db->query("SELECT * FROM tb_admin A
			WHERE A.id_admin = '$username' AND A.password = '$password'");

    	if($akses->num_rows() == 1) {
			foreach($akses->result_array() as $data) {
				$session['id_admin'] = $data['id_admin'];
				$session['nama_admin'] = $data['nama_admin'];
				$session['foto_admin'] = $data['foto'];
				$session['level_admin'] = $data['level'];
			}		
			$this->session->set_userdata($session);

			if($data['level'] == 0)
			{
    			redirect(base_url('admin/laporan'));	
			}
			else {
    			redirect(base_url('admin/dashboard'));	
			}
		}
		else {
			$this->session->set_flashdata("msg", "<div class='alert alert-warning col-md-12'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pastikan Username dan Password Benar!</div>");
			redirect(base_url('admin/login')); 			
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin/login')); 
	}

}