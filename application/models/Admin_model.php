<?php 

	/**
	* 
	*/
	class Admin_model extends CI_Model
	{
		
		public function getAllAdmin()
		{
			return $this->db->get('admin')->result_array();
		}

		public function getAdminByUsername($username)
		{
			return $this->db->get_where('admin', ['username' => $username])->row_array();
		}

		public function updateadmin()
		{
			$this->db->set('pass', $this->input->post('pass'));
			$this->db->where('username', $this->input->post('username'));
			$this->db->update('admin');
		}

	}
?>