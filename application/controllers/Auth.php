<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_models');
	}

	public function register()
	{
		$this->check_guest_only();

		$data['title'] = 'Daftar';
		$data['content'] = 'auth/register';

		$this->load->view('layouts/main', $data);
	}

	public function register_user()
	{
		$this->check_guest_only();
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

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
			);

			if ($this->Auth_models->register($data)) {
				$this->session->set_flashdata('success', 'Pendaftaran berhasil, silakan login');
				redirect('auth/login');
			} else {
				$this->session->set_flashdata('error', 'Pendaftaran gagal, silakan coba lagi');
				redirect('auth/register');
			}
		}
	}

	public function login()
	{
		$this->check_guest_only();
		$data['title'] = 'Login';
		$data['content'] = 'auth/login';

		$this->load->view('layouts/main', $data);
	}

	public function login_user()
	{
		$this->check_guest_only();
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->login();
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->Auth_models->login($email, $password);

			if ($user) {
				$this->session->set_userdata('current_user', $user);
				redirect('/');
			} else {
				$this->session->set_flashdata('error', 'Email atau password salah');
				redirect('auth/login');
			}
		}
	}

	public function logout()
	{
		$this->check_login_only();
		$this->session->unset_userdata('id_user');
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
