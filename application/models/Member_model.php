
<?php 

	/**
	* 
	*/
	class Member_model extends CI_Model
	{
		
		public function getAllMember()
		{
			return $this->db->get('member')->result_array();
		}

		public function getAllMemberRow()
		{
			return $this->db->get('member')->row_array();
		}

		public function getMemberById($idm)
		{
			return $this->db->get_where('member', ['idm' => $idm])->row_array();
		}

		public function updatemember()
		{
			$this->db->set('email', $this->input->post('email'));
			$this->db->set('nama', $this->input->post('nama'));
			$this->db->set('nohp', $this->input->post('nohp'));
			$this->db->set('password', $this->input->post('password'));
			$this->db->where('idm', $this->input->post('idm'));
			$this->db->update('member');
		}
    }
?>