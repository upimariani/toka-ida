<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/Layouts/sidebar');
		$this->load->view('Pemilik/dashboard');
		$this->load->view('Pemilik/Layouts/footer');
	}
}

/* End of file cDashboard.php */
