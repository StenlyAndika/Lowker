<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		$this->load->model('Perusahaan_model');
		$this->load->model('Lowongan_model');
	}

	public function index()
	{
		$data['admin'] =  $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		if ($data['admin']['username'] == null) {
			redirect(base_url());
		} else {
			$data['perusahaan'] = $this->Perusahaan_model->getAllNotVerifiedPerusahaan();
			$data['lowongan'] = $this->Lowongan_model->getAllNotVerifiedLowongan();
			$this->load->view('templateadmin/header', $data);
			$this->load->view('admin/index', $data);
			$this->load->view('templateadmin/footer');
		}
	}

	public function profil()
	{
		$data['admin'] =  $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('templateadmin/header', $data);
		$this->load->view('admin/profil', $data);
		$this->load->view('templateadmin/footer');
	}

	public function ubah()
	{
		$this->Admin_model->updateadmin();
		$this->session->set_flashdata('flash','Diperbaharui');
		redirect('admin/profil');
	}
}
