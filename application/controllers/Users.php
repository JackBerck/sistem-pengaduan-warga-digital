<?php

class Users extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->check_login_only();
		$this->load->model('User_models');
		$this->load->model('Report_models');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['title'] = "Kelola Pengguna";
		$data['current_user'] = $this->session->userdata('current_user');
		$data['users'] = $this->User_models->get_all_users();
		$data['content'] = 'users/index';

		$this->load->view('layouts/main', $data);
	}

	public function create() {
		$data['title'] = "Tambah Pengguna";
		$data['current_user'] = $this->session->userdata('current_user');
		$data['content'] = 'users/create';

		$this->load->view('layouts/main', $data);
	}

	public function store() {
		$this->load->model('Auth_models');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,warga]');

		if ($this->form_validation->run() == FALSE) {
			$this->register();
		} else {
			$email = $this->input->post('email');

			if ($this->Auth_models->is_email_exists($email)) {
				$this->session->set_flashdata('error', 'Email sudah terdaftar');
				return;
			}

			$data = array(
				'name' => $this->input->post('name'),
				'email' => $email,
				'password' => $this->input->post('password'),
				'role' => $this->input->post('role'),
			);

			if ($this->User_models->create_user($data)) {
				$this->session->set_flashdata('success', 'Pendaftaran berhasil, silakan login');
				redirect('/users');
			} else {
				$this->session->set_flashdata('error', 'Pendaftaran gagal, silakan coba lagi');
				redirect('/users');
			}
		}
	}

	public function edit($id) {
		$data['title'] = "Edit Pengguna";
		$data['current_user'] = $this->session->userdata('current_user');
		$data['user'] = $this->User_models->get_user_by_id($id);
		$data['content'] = 'users/edit';

		$this->load->view('layouts/main', $data);
	}

	public function update($id)
	{
		$data['title'] = "Edit Pengguna";
		$data['current_user'] = $this->session->userdata('current_user');
		$data['user'] = $this->User_models->get_user_by_id($id);
		$data['content'] = 'users/edit';

		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('role', 'Peran', 'required');

			if ($this->form_validation->run() == TRUE) {
				$update_data = array(
					'name' => $this->input->post('name'),
					'role' => $this->input->post('role'),
				);

				// Periksa apakah password diisi
				if ($this->input->post('password')) {
					$update_data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				}

				if ($this->User_models->update_user($id, $update_data)) {
					$this->session->set_flashdata('success', 'Pengguna berhasil diperbarui.');
					redirect('users');
				} else {
					$this->session->set_flashdata('error', 'Gagal memperbarui pengguna.');
				}
			}
		}

		$this->load->view('layouts/main', $data);
	}

	public function delete($id)
	{
		if ($this->User_models->delete_user($id)) {
			$this->session->set_flashdata('success', 'Pengguna berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus pengguna.');
		}
		redirect('users');
	}
}
