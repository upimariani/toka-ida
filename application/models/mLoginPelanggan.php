<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLoginPelanggan extends CI_Model
{
	public function register($data)
	{
		$this->db->insert('pelanggan', $data);
	}
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(
			array(
				'username' => $username,
				'password' => $password,
			)
		);
		return $this->db->get()->row();
	}
}

/* End of file mLoginPelanggan.php */
