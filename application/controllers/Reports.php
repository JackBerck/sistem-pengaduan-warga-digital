<?php

class Reports extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Report_models');
		$this->check_login_only();
	}

	public function index()
	{
		$data['title'] = 'Laporan';
		$data['content'] = 'reports/index';
		$data['current_user'] = $this->session->userdata('current_user');
		$data['reports'] = $this->Report_models->get_report_by_user((int)$data['current_user']->id);
		$data['reports'] = $this->Report_models->get_report_by_user($data['current_user']->id);

		$this->load->view('layouts/main', $data);
	}

	public function create()
	{
		$data['title'] = 'Buat Laporan';
		$data['content'] = 'reports/create';
		$data['current_user'] = $this->session->userdata('current_user');

		$this->load->view('layouts/main', $data);
	}

	public function store()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'user_id' => $this->session->userdata('current_user')->id,
			);

			if ($this->Report_models->create_report($data)) {
				$this->session->set_flashdata('success', 'Laporan berhasil dibuat.');
				redirect('/reports');
			} else {
				$this->session->set_flashdata('error', 'Gagal membuat laporan. Silakan coba lagi.');
				redirect('/reports/create');
			}
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Laporan';
		$data['content'] = 'reports/edit';
		$data['current_user'] = $this->session->userdata('current_user');
		$data['report'] = $this->Report_models->get_report_by_id($id);

		if (empty($data['report'])) {
				show_404();
		}

		$this->load->view('layouts/main', $data);
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'required');

		if ($this->form_validation->run() == FALSE) {
			redirect('/reports/edit/' . $id);
		} else {
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
			);

			if ($this->Report_models->update_report($id, $data)) {
				$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
				redirect('/reports');
			} else {
				$this->session->set_flashdata('error', 'Gagal memperbarui laporan. Silakan coba lagi.');
				redirect('/reports/edit/' . $id);
			}
		}
	}

	public function manage()
	{
		$data['title'] = 'Kelola Laporan';
		$data['content'] = 'reports/manage/index';
		$data['current_user'] = $this->session->userdata('current_user');
		$data['reports'] = $this->Report_models->get_all_reports();

		$this->load->view('layouts/main', $data);
	}

	public function create_manage()
	{
		$data['title'] = 'Buat Laporan';
		$data['content'] = 'reports/manage/create';
		$data['current_user'] = $this->session->userdata('current_user');

		$this->load->view('layouts/main', $data);
	}

	public function store_manage()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required|in_list[baru,diproses,selesai]');

		if ($this->form_validation->run() == FALSE) {
			redirect('/reports/create_manage');
		} else {
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'user_id' => $this->session->userdata('current_user')->id,
			);

			if ($this->Report_models->create_report($data)) {
				$this->session->set_flashdata('success', 'Laporan berhasil dibuat.');
				redirect('/reports/manage');
			} else {
				$this->session->set_flashdata('error', 'Gagal membuat laporan. Silakan coba lagi.');
				redirect('/reports/create_manage');
			}
		}
	}

	public function edit_manage($id)
	{
		$data['title'] = 'Edit Laporan';
		$data['content'] = 'reports/manage/edit';
		$data['current_user'] = $this->session->userdata('current_user');
		$data['report'] = $this->Report_models->get_report_by_id($id);

		if (empty($data['report'])) {
				show_404();
		}

		$this->load->view('layouts/main', $data);
	}

	public function update_manage($id)
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required|in_list[baru,diproses,selesai]');

		if ($this->form_validation->run() == FALSE) {
			redirect('/reports/edit_manage/' . $id);
		} else {
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
			);

			if ($this->Report_models->update_report($id, $data)) {
				$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
				redirect('/reports/manage');
			} else {
				$this->session->set_flashdata('error', 'Gagal memperbarui laporan. Silakan coba lagi.');
				redirect('/reports/edit_manage/' . $id);
			}
		}
	}

	public function delete_manage($id)
	{
		if ($this->Report_models->delete_report($id)) {
			redirect('/reports/manage');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus laporan. Silakan coba lagi.');
			redirect('/reports/manage');
		}
	}

	public function delete($id)
	{
		if ($this->Report_models->delete_report($id)) {
			redirect('/reports');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus laporan. Silakan coba lagi.');
			redirect('/reports');
		}
	}
}
