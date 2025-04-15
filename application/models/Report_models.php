<?php

class Report_models extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_reports()
	{
		$query = $this->db->get('reports');
		return $query->result();
	}

	public function get_report_by_id($id)
	{
		$query = $this->db->get_where('reports', array('id' => $id));
		return $query->row();
	}

	public function create_report($data)
	{
		return $this->db->insert('reports', $data);
	}

	public function update_report($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('reports', $data);
	}

	public function delete_report($id)
	{
		return $this->db->delete('reports', array('id' => $id));
	}

	public function get_report_by_user($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('reports');
		return $query->result();
	}
}
