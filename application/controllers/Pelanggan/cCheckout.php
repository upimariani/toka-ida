<?php

use function PHPSTORM_META\map;

defined('BASEPATH') or exit('No direct script access allowed');

class cCheckout extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mCheckout');
		$this->load->model('mKatalog');
	}

	public function index()
	{
		$data = array(
			'produk' => $this->mKatalog->produk(),
			'pelanggan' => $this->mCheckout->pelanggan()
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/Layouts/section', $data);
		$this->load->view('Pelanggan/checkout', $data);
	}
	public function get_desa()
	{
		$id = $this->input->post('id', TRUE);
		$data = $this->mOngkir->get_desa($id);
		echo json_encode($data);
	}
	public function checkout()
	{
		$data = array(
			'id_pelanggan' => $this->session->userdata('id'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_transaksi' => $this->cart->total(),
			'alamat_pengiriman' => $this->input->post('alamat'),

		);
		$this->mCheckout->transaksi($data);




		//menyimpan pesanan ke detail transaksi
		$id = $this->db->query("SELECT MAX(id_transaksi) as id_transaksi FROM `transaksi`")->row();
		foreach ($this->cart->contents() as $item) {
			$data_rinci = array(
				'id_transaksi' => $id->id_transaksi,
				'id_produk' => $item['id'],
				'qty' => $item['qty']
			);
			$this->mCheckout->detail_transaksi($data_rinci);
		}



		//mengurangi jumlah stok
		$kstok = 0;
		foreach ($this->cart->contents() as $key => $value) {
			$id = $value['id'];
			$kstok = $value['stok'] - $value['qty'];
			$data = array(
				'stok' => $kstok
			);
			$this->mCheckout->stok($id, $data);
		}
		$this->cart->destroy();
		redirect('pelanggan/cStatusOrder');
	}
}

/* End of file cCheckout.php */
