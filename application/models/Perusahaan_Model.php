<?php 

	/**
	* 
	*/
	class Perusahaan_model extends CI_Model
	{
		
		public function getAllPerusahaan()
		{
			return $this->db->get('perusahaan')->result_array();
		}

		public function getAllPerusahaanForAdmin()
		{
			return $this->db->get('perusahaan')->row_array();
		}

		public function getPerusahaanByIdm($idm)
		{
			return $this->db->get_where('perusahaan', ['idm' => $idm])->result_array();
		}

		public function getAllNotVerifiedPerusahaan()
		{
			return $this->db->get_where('perusahaan', ['status' => '0'])->result_array();
		}

		public function getPerusahaanByMember($idm)
		{
			return $this->db->get_where('perusahaan', ['idm' => $idm])->row_array();
		}

		public function getSelectedPerusahaan($idm)
		{
			return $this->db->get_where('perusahaan', ['idm' => $idm])->result_array();
		}

		public function getSelectedVerifiedPerusahaan($idm)
		{
			return $this->db->get_where('perusahaan', ['idm' => $idm, 'status' => '1'])->result_array();
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
			
			$this->db->set("namaperusahaan", $this->input->post('namaperusahaan'));
			$this->db->set("idm", $this->input->post('idm'));
			$this->db->set("npwp", $this->input->post('npwp'));
			$this->db->set("lapangan", $this->input->post('lapangan'));
			$this->db->set("alamat", $this->input->post('alamat'));
			$this->db->set("rt", $this->input->post('rt'));
			$this->db->set("rw", $this->input->post('rw'));
			$this->db->set("kelurahan", $this->input->post('kelurahan'));
			$this->db->set("kecamatan", $this->input->post('kecamatan'));
			$this->db->set("kabupaten", $this->input->post('kabupaten'));
			$this->db->set("provinsi", $this->input->post('provinsi'));
			$this->db->set("kodepos", $this->input->post('kodepos'));
			$this->db->set("telp", $this->input->post('telp'));
			$this->db->set("email", $this->input->post('email'));
			$this->db->set("status", 0);
			
			$this->db->insert('perusahaan');
		}

		public function update()
		{
			$this->db->set('status', 1);
			$this->db->where('idp', $this->input->post('idp'));
			$this->db->update('perusahaan', $data);
		}

		public function tolak()
		{
			$this->db->set('status', 2);
			$this->db->where('idp', $this->input->post('tolakidp'));
			$this->db->update('perusahaan', $data);
		}

		public function delete($idp)
		{
			$this->db->delete('perusahaan', ['idp' => $idp]);
		}

	}
?>