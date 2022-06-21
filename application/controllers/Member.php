<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Member_model');
		$this->load->model('Perusahaan_model');
		$this->load->model('Lowongan_model');
	}

	public function index()
	{
		$data['member'] =  $this->db->get_where('member', ['idm' => $this->session->userdata('idm')])->row_array();
		if ($data['member']['idm'] == null) {
			redirect(base_url());
		} else {
			$data['perusahaan'] = $this->Perusahaan_model->getAllNotVerifiedPerusahaan();
			$data['lowongan'] = $this->Lowongan_model->getAllNotVerifiedLowongan();
			$this->load->view('templateadmin/header', $data);
			$this->load->view('member/index', $data);
			$this->load->view('templateadmin/footer');
		}
	}

	public function profil()
	{
		$data['member'] =  $this->db->get_where('member', ['idm' => $this->session->userdata('idm')])->row_array();
		$this->load->view('templateadmin/header', $data);
		$this->load->view('member/profil', $data);
		$this->load->view('templateadmin/footer');
	}

	public function ubah()
	{
		$this->Member_model->updatemember();
		$this->session->set_flashdata('flash','Diperbaharui');
		redirect('member/profil');
	}
}
