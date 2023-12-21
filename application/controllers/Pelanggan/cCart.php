<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKatalog');
	}

	public function index()
	{
		$data = array(
			'produk' => $this->mKatalog->produk()
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/Layouts/section', $data);
		$this->load->view('Pelanggan/cart');
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function add($id)
	{

		$produk = $this->db->query("SELECT * FROM `produk` WHERE id_produk='" . $id . "'")->row();
		$data = array(
			'id' => $produk->id_produk,
			'name' => $produk->nama_produk,
			'price' => $produk->harga,
			'qty' => '1',
			'picture' => $produk->gambar,
			'stok' => $produk->stok
		);
		$this->cart->insert($data);
		redirect('pelanggan/ckatalog');
	}
	public function update_cart($rowid, $qty)
	{
		$data = array(
			'rowid'  => $rowid,
			'qty'    => $qty
		);
		$this->cart->update($data);
		redirect('Pelanggan/cCart');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Pelanggan/cCart');
	}
}

/* End of file cCart.php */
