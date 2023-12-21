<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLaporan');
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$data = array(
			'notif' => $this->mTransaksi->notif(),
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar', $data);
		$this->load->view('Admin/dashboard', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function balas($id)
	{
		$data = array(
			'balas' => $this->input->post('balasan')
		);
		$this->db->where('id_penilaian', $id);
		$this->db->update('penilaian_pelanggan', $data);
		redirect('admin/cDashboard');
	}
}

/* End of file cDashboard.php */
