<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
	public function produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		return $this->db->get()->result();
	}


	public function detail_produk($id)
	{
		$data['produk'] = $this->db->query("SELECT * FROM `produk` WHERE produk.id_produk='" . $id . "'")->row();
		return $data;
	}
}

/* End of file mkatalog.php */
