<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLapTransaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}
	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/Layouts/sidebar');
		$this->load->view('Pemilik/pesanan_selesai', $data);
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
		$pdf->Cell(185, 10, 'LAPORAN TRANSAKSI PERIODE ' . $bulan . ' TAHUN ' . $tahun, 0, 1, 'C');

		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
		$pdf->Cell(25, 7, 'Tgl Transaksi', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Nama Pelanggan', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Alamat', 1, 0, 'C');
		$pdf->Cell(30, 7, 'No Telepon', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Total', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;

		$laporan = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE MONTH(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "' AND stat_order='4'")->result();
		foreach ($laporan as $key => $value) {
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(25, 7, $value->tgl_transaksi, 1, 0, 'C');
			$pdf->Cell(40, 7, $value->nama_pelanggan, 1, 0, 'C');
			$pdf->Cell(50, 7, $value->alamat, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->no_hp, 1, 0, 'C');
			$pdf->Cell(30, 7, 'Rp. ' . number_format($value->total_transaksi), 1, 1, 'C');
		}
		$pdf->Output();
	}
}

/* End of file cLapTransaksi.php */
