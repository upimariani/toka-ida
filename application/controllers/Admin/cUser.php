<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUser extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mUser');
		$this->load->model('mTransaksi');
	}


	public function index()
	{
		$data = array(
			'user' => $this->mUser->select(),
			'notif' => $this->mTransaksi->notif()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar', $data);
		$this->load->view('Admin/user', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function createUser()
	{
		$this->form_validation->set_rules('nama', 'Nama User', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('level', 'Level User', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'notif' => $this->mTransaksi->notif()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/sidebar', $data);
			$this->load->view('Admin/createuser');
			$this->load->view('Admin/Layouts/footer');
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'nama' => $this->input->post('nama'),
				'level_user' => $this->input->post('level')
			);
			$this->mUser->insert($data);
			$this->session->set_flashdata('success', 'Data User Berhasil Disimpan!');
			redirect('Admin/cUser');
		}
	}
	public function update($id)
	{

		$this->form_validation->set_rules('nama', 'Nama User', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('level', 'Level User', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'user' => $this->mUser->edit($id),
				'notif' => $this->mTransaksi->notif()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/sidebar', $data);
			$this->load->view('Admin/updateuser', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'nama' => $this->input->post('nama'),
				'level_user' => $this->input->post('level')
			);
			$this->mUser->update($id, $data);
			$this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
			redirect('Admin/cUser');
		}
	}
	public function delete($id)
	{
		$this->mUser->delete($id);
		$this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
		redirect('Admin/cUser');
	}
}

/* End of file cUser.php */
