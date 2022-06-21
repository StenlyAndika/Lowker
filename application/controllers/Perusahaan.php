<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Member_model');
		$this->load->model('Member_model');
		$this->load->model('Perusahaan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ( $this->session->userdata('idm') != NULL ) {
			$data['perusahaan'] = $this->Perusahaan_model->getPerusahaanByIdm($this->session->userdata('idm'));
		} else {
			$data['perusahaan'] = $this->Perusahaan_model->getAllPerusahaan();
		}
		
		$this->load->view('templateadmin/header', $data);
		$this->load->view('perusahaan/index', $data);
		$this->load->view('templateadmin/footer');
	}

	public function tambah()
	{
		$data['member'] = $this->Member_model->getMemberById($this->session->userdata('idm'));
		$this->form_validation->set_rules('namaperusahaan', 'Nama Perusahaan', 'required');
		$this->form_validation->set_rules('npwp', 'NPWP Perusahaan', 'required');
		$this->form_validation->set_rules('lapangan', 'Lapangan Usaha', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Perusahaan', 'required');
		$this->form_validation->set_rules('rt', 'RT', 'required');
		$this->form_validation->set_rules('rw', 'RW', 'required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kodepos', 'Kode Pos', 'required');
		$this->form_validation->set_rules('telp', 'Telepon', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if ( $this->form_validation->run() == FALSE ) {
			$this->load->view('templateadmin/header');
			$this->load->view('perusahaan/tambah', $data);
			$this->load->view('templateadmin/footer');
		} else {
			$this->Perusahaan_model->add();
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('perusahaan');
		}
	}

	public function verif()
	{
		$this->Perusahaan_model->update();
		$this->session->set_flashdata('flash','Diverifikasi');
		redirect('perusahaan');
	}

	public function tolak()
	{
		$this->Perusahaan_model->tolak();
		$this->session->set_flashdata('flash','Ditolak');
		redirect('perusahaan');
	}

}
