<?php

class Auth_models extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function is_email_exists($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		return $query->num_rows() > 0;
	}

	public function register($data)
	{
		$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	public function login($email, $password)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');

		if($query->num_rows() == 0) {
			echo "<script>alert('Email tidak terdaftar atau password salah. Silakan coba lagi.');</script>";
			return false;
		}

		if ($query->num_rows() == 1) {
			$user = $query->row();
			if (password_verify($password, $user->password)) {
				return $user;
			}
			else {
				echo "<script>alert('Email tidak terdaftar atau password salah. Silakan coba lagi.');</script>";
				return false;
			}
		}

		return false;
	}
}
