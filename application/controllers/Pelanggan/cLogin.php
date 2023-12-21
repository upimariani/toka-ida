<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLoginPelanggan');
	}


	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('pelanggan/login_pelanggan');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->mLoginPelanggan->login($username, $password);
			if ($data) {

				$array = array(
					'id' => $data->id_pelanggan,
					'nama' => $data->nama_pelanggan
				);
				$this->session->set_userdata($array);
				redirect('pelanggan/ckatalog', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Salah!');
				redirect('pelanggan/clogin');
			}
		}
	}
	public function registrasi()
	{
		$this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required|min_length[11]|max_length[13]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == FALSE) {

			$this->load->view('pelanggan/registrasi');
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'nama_pelanggan' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'jk' => $this->input->post('jk')
			);
			$this->mLoginPelanggan->register($data);
			$this->session->set_flashdata('success', 'Anda Berhasil Registrasi! Silahkan Login!');
			redirect('pelanggan/clogin');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('success', 'Anda Berhasil Logout!');
		$this->cart->destroy();
		redirect('pelanggan/clogin');
	}
}

/* End of file cLogin.php */
