<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProduk extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProduk');
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$data = array(
			'produk' => $this->mProduk->select(),
			'notif' => $this->mTransaksi->notif()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar', $data);
		$this->load->view('Admin/produk', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function createProduk()
	{
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required');
		$this->form_validation->set_rules('harga_supplier', 'Harga Supplier Produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'notif' => $this->mTransaksi->notif()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/sidebar', $data);
			$this->load->view('Admin/createProduk');
			$this->load->view('Admin/Layouts/footer');
		} else {
			$config['upload_path']          = './asset/foto-produk';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 5000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$error = array(
					'error' => $this->upload->display_errors(),
					'notif' => $this->mTransaksi->notif()
				);
				$this->load->view('Admin/Layouts/head');
				$this->load->view('Admin/Layouts/sidebar', $error);
				$this->load->view('Admin/createProduk', $error);
				$this->load->view('Admin/Layouts/footer');
			} else {
				$upload_data = $this->upload->data();
				$data = array(
					'nama_produk' => $this->input->post('nama'),
					'deskripsi' => $this->input->post('deskripsi'),
					'keterangan' => $this->input->post('keterangan'),
					'harga' => $this->input->post('harga'),
					'harga_supplier' => $this->input->post('harga_supplier'),
					'stok' => $this->input->post('stok'),
					'gambar' => $upload_data['file_name']
				);
				$this->mProduk->insert($data);
				$this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan!');
				redirect('Admin/cProduk');
			}
		}
	}
	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required');
		$this->form_validation->set_rules('harga_supplier', 'Harga Supplier Produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required');
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './asset/foto-produk';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 5000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'produk' => $this->mProduk->edit($id),
					'notif' => $this->mTransaksi->notif()
				);
				$this->load->view('Admin/Layouts/head');
				$this->load->view('Admin/Layouts/sidebar', $data);
				$this->load->view('Admin/updateproduk', $data);
				$this->load->view('Admin/Layouts/footer');
			} else {
				$produk = $this->mProduk->select();
				if ($produk->gambar !== "") {
					unlink('./asset/foto-produk/' . $produk->gambar);
				}
				$upload_data =  $this->upload->data();
				$data = array(
					'nama_produk' => $this->input->post('nama'),
					'deskripsi' => $this->input->post('deskripsi'),
					'keterangan' => $this->input->post('keterangan'),
					'harga' => $this->input->post('harga'),
					'harga_supplier' => $this->input->post('harga_supplier'),
					'stok' => $this->input->post('stok'),
					'gambar' => $upload_data['file_name']
				);
				$this->mProduk->update($id, $data);
				$this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
				redirect('Admin/cProduk');
			} //tanpa ganti gambar
			$data = array(
				'nama_produk' => $this->input->post('nama'),
				'deskripsi' => $this->input->post('deskripsi'),
				'keterangan' => $this->input->post('keterangan'),
				'harga' => $this->input->post('harga'),
				'harga_supplier' => $this->input->post('harga_supplier'),
				'stok' => $this->input->post('stok')
			);
			$this->mProduk->update($id, $data);
			$this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
			redirect('Admin/cProduk');
		}
		$data = array(
			'produk' => $this->mProduk->edit($id),
			'notif' => $this->mTransaksi->notif()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar', $data);
		$this->load->view('Admin/updateproduk', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function delete($id)
	{
		$this->mProduk->delete_produk($id);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus !!!');
		redirect('Admin/cProduk');
	}
}

/* End of file cProduk.php */
