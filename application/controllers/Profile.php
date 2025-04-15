<?php

class Profile extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_models');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->check_login_only();
	}

	public function index()
	{
		$data['current_user'] = $this->session->userdata('current_user');
		$user_id = (int) $this->session->userdata('current_user')->id;
		$data['user'] = $this->User_models->get_user_by_id($user_id);
		$data['title'] = 'Profil';
		$data['content'] = 'profile';

		$this->load->view('layouts/main', $data);
	}

	public function update()
	{
		$user_id = (int) $this->session->userdata('current_user')->id;
		$data['user'] = $this->User_models->get_user_by_id($user_id);

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'name' => $this->input->post('name'),
			);
			if ($this->User_models->update_user($user_id, $data)) {
				$this->session->set_flashdata('success', 'Profil berhasil diubah');
				redirect('profile');
			} else {
				$this->session->set_flashdata('error', 'Gagal mengubah profil');
				redirect('profile');
			}
		}
	}

	public function change_password()
	{
		$user_id = (int) $this->session->userdata('current_user')->id;
		$data['user'] = $this->User_models->get_user_by_id($user_id);

		$this->form_validation->set_rules('old_password', 'Password Lama', 'required');
		$this->form_validation->set_rules('password', 'Password Baru', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			if (password_verify($this->input->post('old_password'), $data['user']->password)) {
				$data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				);
				if ($this->User_models->update_user($user_id, $data)) {
					$this->session->set_flashdata('success', 'Password berhasil diubah');
					redirect('profile');
				} else {
					$this->session->set_flashdata('error', 'Gagal mengubah password');
					redirect('profile');
				}
			} else {
				redirect('profile');
			}
		}
	}
}
