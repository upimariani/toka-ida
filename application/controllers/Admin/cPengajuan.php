<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPengajuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPengajuan');
		$this->load->model('mTransaksi');
		$this->load->model('mProduk');
	}

	public function index()
	{
		$data = array(
			'pengajuan' => $this->mPengajuan->select(),
			'notif' => $this->mTransaksi->notif()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar', $data);
		$this->load->view('Admin/pengajuan', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$data = array(
			'notif' => $this->mTransaksi->notif(),
			'barang' => $this->mProduk->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar', $data);
		$this->load->view('Admin/createPengajuan', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function add_to_cart()
	{
		$id_barang = $this->input->post('barang');
		$qty = $this->input->post('qty');

		$produk = $this->db->query("SELECT * FROM `produk` WHERE id_produk='" . $id_barang . "'")->row();

		$data = array(
			'id' => $produk->id_produk,
			'name' => $produk->nama_produk,
			'price' => $produk->harga_supplier,
			'qty' => $qty,
			'picture' => $produk->gambar
		);
		$this->cart->insert($data);
		redirect('Admin/cPengajuan/create');
	}
	public function selesai()
	{
		$data = array(
			'id_user' => '1',
			'tgl_pengajuan' => date('Y-m-d'),
			'total_pengajuan' => $this->cart->total(),
			'nama_supplier' => $this->input->post('supplier'),

		);
		$this->db->insert('pengajuan', $data);


		//menyimpan pesanan ke detail transaksi
		$id = $this->db->query("SELECT MAX(id_pengajuan) as id_pengajuan FROM `pengajuan`")->row();
		foreach ($this->cart->contents() as $item) {
			$data_rinci = array(
				'id_pengajuan' => $id->id_pengajuan,
				'id_produk' => $item['id'],
				'qty' => $item['qty']
			);
			$this->db->insert('detail_pengajuan', $data_rinci);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Data Pengajuan Berhasil Disimpan!');
		redirect('Admin/cPengajuan');
	}
	public function detail($id)
	{
		$data = array(
			'detail' => $this->mPengajuan->detail_pengajuan($id),
			'notif' => $this->mTransaksi->notif()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar', $data);
		$this->load->view('Admin/detail_pengajuan', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function cetak($id)
	{
		require('asset/fpdf/fpdf.php');
		$hasil = $this->mPengajuan->detail_pengajuan($id);
		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(200, 10, 'Lampiran', 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 12);

		$pdf->Cell(200, 10, 'Surat Pengajuan Produk Supplier', 0, 1, 'L');
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(200, 10, 'Nomor : ' . $hasil['transaksi']->id_pengajuan, 0, 1, 'L');
		$pdf->Cell(200, 10, 'Tanggal Cetak :' . date('d/m/Y'), 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 13);
		$pdf->Cell(185, 10, 'SURAT PENGAJUAN PRODUK SUPPLIER ' . $hasil['transaksi']->nama_supplier, 0, 1, 'C');




		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Quantity', 1, 0, 'C');
		$pdf->Cell(70, 7, 'Nama Produk', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Harga', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Subtotal', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;

		foreach ($hasil['pesanan'] as $key => $value) {
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->qty, 1, 0, 'C');
			$pdf->Cell(70, 7, $value->nama_produk, 1, 0, 'C');
			$pdf->Cell(30, 7, 'Rp' . number_format($value->harga_supplier), 1, 0, 'C');
			$pdf->Cell(40, 7, 'Rp' . number_format($value->qty * $value->harga_supplier), 1, 1, 'R');
		}
		$pdf->Cell(5, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(10, 7, '', 0, 0, 'C');
		$pdf->Cell(35, 7, '', 0, 0, 'C');
		$pdf->Cell(70, 7, '', 0, 0, 'C');
		$pdf->Cell(30, 7, 'Total', 0, 0, 'C');
		$pdf->Cell(40, 7, 'Rp. ' . number_format($hasil['transaksi']->total_pengajuan), 0, 1, 'C');


		$pdf->Output();
	}
}

/* End of file cPengajuan.php */
