<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Lowongan_model');
		$this->load->model('Perusahaan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ( $this->session->userdata('idm') != NULL ) {
			$data['perusahaan'] = $this->Perusahaan_model->getPerusahaanByMember($this->session->userdata('idm'));
			if (isset($data['perusahaan']['idp'])) {
				$data['lowongan'] = $this->Lowongan_model->getLowonganByIdp($data['perusahaan']['idp']);
			} else {
				$data['lowongan'] = $this->Lowongan_model->getLowonganByIdp('0');
			}
		} else {
			$data['perusahaan'] = $this->Perusahaan_model->getAllPerusahaan();
			$data['lowongan'] = $this->Lowongan_model->getAllLowongan();
		}
		$this->load->view('templateadmin/header', $data);
		$this->load->view('lowongan/index', $data);
		$this->load->view('templateadmin/footer');
	}

	public function direktori()
	{
		$data['perusahaan'] = $this->Perusahaan_model->getAllPerusahaan();
		$data['lowongan'] = $this->Lowongan_model->getAllLowonganDesc();
		if ($this->session->userdata('idm') != NULL) {
			redirect(base_url('member'));
		} else if ($this->session->userdata('username') != NULL) {
			redirect(base_url('admin'));
		} else {
			$this->load->view('template/header');
			// $this->load->view('template/carousel');
			$this->load->view('lowongan/direktori', $data);
			$this->load->view('template/footer');
		}
	}

	public function detail()
	{
		$data['lowongan'] = $this->Lowongan_model->getLowonganByIdl($_POST['idl']);
		$this->load->view('lowongan/detail', $data);
	}

	public function tambah()
	{
		$data['spengupahan'] = ["", "Borongan", "Harian", "Mingguan", "Bulanan"];
		$data['statushubkerja'] = ["", "Waktu Tertentu", "Waktu Tidak Tentu"];

		$data['perusahaan'] = $this->Perusahaan_model->getSelectedVerifiedPerusahaan($this->session->userdata('idm'));

		$this->form_validation->set_rules('idp', 'Nama Perusahaan', 'required');
		$this->form_validation->set_rules('namajabatan', 'Nama Jabatan/Perusahaan', 'required');
		$this->form_validation->set_rules('jumlahformasi', 'Jumlah Formasi', 'required');
		$this->form_validation->set_rules('pendidikanminimal', 'Pendidikan Minimal', 'required');
		$this->form_validation->set_rules('persyaratan', 'Persyaratan dan Cara Melamar', 'required');
		$this->form_validation->set_rules('sistempengupahan', 'Sistem Pengupahan', 'required');
		$this->form_validation->set_rules('gajiperbulan', 'Gaji/Upah sebulan', 'required');
		$this->form_validation->set_rules('statushubungan', 'Status Hubungan Kerja', 'required');
		$this->form_validation->set_rules('jumlahjamkerja', 'Jumlah Jam Kerja dalam Seminggu', 'required');
		$this->form_validation->set_rules('uraiansingkat', 'Uraian Singkat Pekerjaan', 'required');
		$this->form_validation->set_rules('uraiantugas', 'Uraian Tugas', 'required');
		$this->form_validation->set_rules('bataswaktu', 'Batas Waktu', 'required');
		$this->form_validation->set_rules('namakontak', 'Nama Kontak Person', 'required');
		$this->form_validation->set_rules('nomorkontak', 'Nomor Kontak Person', 'required');
		$this->form_validation->set_rules('jabatankontak', 'Jabatan Kontak Person', 'required');

		if ( $this->form_validation->run() == FALSE ) {
			$this->load->view('templateadmin/header');
			$this->load->view('lowongan/tambah', $data);
			$this->load->view('templateadmin/footer');
		} else {
			$this->Lowongan_model->add();
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('lowongan');
		}
	}

	public function verif()
	{
		$this->Lowongan_model->update();
		$this->session->set_flashdata('flash','Diverifikasi');
		redirect('lowongan');
	}

	public function tolak()
	{
		$this->Lowongan_model->tolak();
		$this->session->set_flashdata('flash','Ditolak');
		redirect('lowongan');
	}

}
