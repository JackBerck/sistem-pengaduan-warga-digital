<?php

class User_models extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_user_by_id($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row();
	}

	public function create_user($data)
	{
		$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

		return $this->db->insert('users', $data);
	}

	public function update_user($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}

	public function delete_user($id)
	{
		return $this->db->delete('users', array('id' => $id));
	}
}
