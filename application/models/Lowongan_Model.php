<?php 

	/**
	* 
	*/
	class Lowongan_Model extends CI_Model
	{
		
		public function getAllLowonganDesc()
		{
			return $this->db->order_by('bataswaktu', 'desc')->get_where('lowongan', ['status' => '1'])->result_array();
		}

		public function getAllLowongan()
		{
			return $this->db->get('lowongan')->result_array();
		}
		public function getAllNotVerifiedLowongan()
		{
			return $this->db->get_where('lowongan', ['status' => '0'])->result_array();
		}

		public function getLowonganByIdl($idl)
		{
			return $this->db->get_where('lowongan', ['idl' => $idl])->result_array();
		}

		public function getLowonganByIdp($idp)
		{
			return $this->db->get_where('lowongan', ['idp' => $idp])->result_array();
		}

		public function add()
		{
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
			$config['max_size'] = '2048';
			$config['upload_path'] = './dokumen/';

			$uploaddokumen = $_FILES['dokumen']['name'];

			if ($uploaddokumen) {
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('dokumen')) {
					$dokumenbaru = $this->upload->data('file_name');
					$this->db->set('dokumen', $dokumenbaru);
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				$dokumenbaru = 'default-dokumen.png';
				$this->db->set('dokumen', $dokumenbaru);
			}
			
			$this->db->set("idp", $this->input->post('idp'));
			$this->db->set("namajabatan", $this->input->post('namajabatan'));
			$this->db->set("jumlahformasi", $this->input->post('jumlahformasi'));
			$this->db->set("laki", $this->input->post('laki'));
			$this->db->set("perempuan", $this->input->post('perempuan'));
			$this->db->set("pendidikanminimal", $this->input->post('pendidikanminimal'));
			$this->db->set("persyaratan", $this->input->post('persyaratan'));
			$this->db->set("sistempengupahan", $this->input->post('sistempengupahan'));
			$this->db->set("gajiperbulan", $this->input->post('gajiperbulan'));
			$this->db->set("statushubungan", $this->input->post('statushubungan'));
			$this->db->set("jumlahjamkerja", $this->input->post('jumlahjamkerja'));
			$this->db->set("uraiansingkat", $this->input->post('uraiansingkat'));
			$this->db->set("uraiantugas", $this->input->post('uraiantugas'));
			$this->db->set("bataswaktu", $this->input->post('bataswaktu'));
			$this->db->set("namakontak", $this->input->post('namakontak'));
			$this->db->set("nomorkontak", $this->input->post('nomorkontak'));
			$this->db->set("jabatankontak", $this->input->post('jabatankontak'));
			$this->db->set("tglposting", date("d-m-Y"));
			$this->db->set("status", 0);
			
			$this->db->insert('lowongan');

			$this->db->select('idl');
			$this->db->from('lowongan');
			$this->db->order_by("idl", "desc");
			$data['lastid'] = $this->db->get()->row_array();

			$jaminansosial = count($this->input->post('jaminansosial'));
 
			for ($i = 0; $i < $jaminansosial; $i++) {
				$datas[$i] = array(
				'idl' => $data['lastid']['idl'],
				'jaminan' => $this->input->post('jaminansosial[' . $i . ']')
				);
		
				$this->db->insert('jaminansosial', $datas[$i]);
			}
		}

		public function update()
		{
			$this->db->set('status', 1);
			$this->db->where('idl', $this->input->post('idl'));
			$this->db->update('lowongan', $data);
		}

		public function tolak()
		{
			$this->db->set('status', 2);
			$this->db->where('idl', $this->input->post('tolakidl'));
			$this->db->update('lowongan', $data);
		}

		public function delete($idl)
		{
			$this->db->delete('lowongan', ['idl' => $idl]);
		}

	}
?>