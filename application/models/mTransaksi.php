<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
	public function transaksi()
	{
		$data['pesanan_masuk'] = $this->db->query("SELECT * FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE stat_order='0';")->result();
		$data['konfirmasi'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE stat_order='1'")->result();
		$data['diproses'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE stat_order='2'")->result();
		$data['kirim'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE stat_order='3'")->result();
		$data['selesai'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE stat_order='4'")->result();
		return $data;
	}

	public function notif()
	{
		$data['pesanan_masuk'] = $this->db->query("SELECT COUNT(tgl_transaksi) as jml FROM `transaksi` WHERE stat_order='0'")->row();
		$data['konfirmasi'] = $this->db->query("SELECT COUNT(tgl_transaksi) as jml FROM `transaksi` WHERE stat_order='1'")->row();
		$data['diproses'] = $this->db->query("SELECT COUNT(tgl_transaksi) as jml FROM `transaksi` WHERE stat_order='2'")->row();
		$data['kirim'] = $this->db->query("SELECT COUNT(tgl_transaksi) as jml FROM `transaksi` WHERE stat_order='3'")->row();
		return $data;
	}
	//status order pelanggan
	public function status_order()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('pelanggan.id_pelanggan', $this->session->userdata('id'));
		return $this->db->get()->result();
	}
	public function detail_pesanan($id)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE transaksi.id_transaksi='" . $id . "'")->row();
		$data['pesanan'] = $this->db->query("SELECT * FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi=transaksi.id_transaksi JOIN produk ON produk.id_produk=detail_transaksi.id_produk WHERE transaksi.id_transaksi='" . $id . "'")->result();
		return $data;
	}
	public function bayar($id, $data)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
	}
	public function status($id, $status)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $status);
	}
}

/* End of file mTransaksi.php */
