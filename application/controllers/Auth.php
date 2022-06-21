<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
	}

	public function daftar()
	{
		$datasave = [
			"email" => $this->input->post('email', true),
			"nama" => $this->input->post('nama', true),
			"nohp" => $this->input->post('telp', true),
			"password" => $this->input->post('pass', true)
		];
		$this->db->insert('member', $datasave);
		redirect(base_url('lowongan/direktori'));
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$this->form_validation->set_rules('email', 'Email', 'valid_email');
		if ( $this->form_validation->run() == FALSE ) {
			$loginadmin = $this->db->get_where('admin', ['username' => $email])->row_array();
			if ($loginadmin['username'] != NULL) {
				if ($password == $loginadmin['pass']) {
					$data = [
					'username' => $email,
					'role' => 'admin'
				];
				$this->session->set_userdata($data);
				redirect(base_url('admin'));
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah</div>');
					redirect(base_url());
				}
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah</div>');
				redirect(base_url());
			}
		} else {
			$loginmember = $this->db->get_where('member', ['email' => $email])->row_array();
			if ($loginmember['idm'] != NULL) {
				if ($password == $loginmember['password']) {
					$data = [
						'idm' => $loginmember['idm'],
						'nama' => $loginmember['nama'],
						'email' => $email,
						'role' => 'member'
					];
					$this->session->set_userdata($data);
					redirect(base_url('member'));
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah</div>');
					redirect(base_url());
				}
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('idm');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		redirect(base_url());
	}


}
