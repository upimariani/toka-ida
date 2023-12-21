<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPengajuan extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('pengajuan');
		return $this->db->get()->result();
	}
	public function insert_pengajuan($data)
	{
		$this->db->insert('pengajuan', $data);
	}
	public function insert_detailpengajuan($data)
	{
		$this->db->insert('detail_pengajuan', $data);
	}
	public function detail_pengajuan($id)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM pengajuan WHERE pengajuan.id_pengajuan='" . $id . "'")->row();
		$data['pesanan'] = $this->db->query("SELECT * FROM detail_pengajuan JOIN pengajuan ON detail_pengajuan.id_pengajuan=pengajuan.id_pengajuan JOIN produk ON produk.id_produk=detail_pengajuan.id_produk WHERE pengajuan.id_pengajuan='" . $id . "'")->result();
		return $data;
	}
}

/* End of file mPengajuan.php */
