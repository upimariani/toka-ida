<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLapPengajuan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPengajuan');
	}

	public function index()
	{
		$data = array(
			'pengajuan' => $this->mPengajuan->select()
		);
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/Layouts/sidebar', $data);
		$this->load->view('Pemilik/pengajuan', $data);
		$this->load->view('Pemilik/Layouts/footer');
	}
	public function cetak()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$pdf->SetFont('Times', 'B', 13);
		$pdf->Cell(185, 10, 'TOKO IDA OLSHOP ', 0, 1, 'C');
		$pdf->Cell(185, 10, 'LAPORAN PENGAJUAN PRODUK SUPPLIER PERIODE ' . $bulan . ' TAHUN ' . $tahun, 0, 1, 'C');

		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
		$pdf->Cell(45, 7, 'Nama Barang', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Harga', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Tanggal Pengajuan', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Quantity', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Subtotal', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;

		$laporan = $this->db->query("SELECT * FROM `pengajuan` JOIN detail_pengajuan ON pengajuan.id_pengajuan=detail_pengajuan.id_pengajuan JOIN produk ON produk.id_produk=detail_pengajuan.id_produk WHERE MONTH(tgl_pengajuan)='" . $bulan . "' AND YEAR(tgl_pengajuan)='" . $tahun . "'")->result();
		foreach ($laporan as $key => $value) {
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(45, 7, $value->nama_produk, 1, 0, 'C');
			$pdf->Cell(35, 7, 'Rp. ' . number_format($value->harga_supplier), 1, 0, 'C');
			$pdf->Cell(40, 7, $value->tgl_pengajuan, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->qty, 1, 0, 'C');
			$pdf->Cell(30, 7, 'Rp.' . number_format($value->harga_supplier * $value->qty), 1, 1, 'C');
		}
		$pdf->Output();
	}
}

/* End of file cLapPengajuan.php */
