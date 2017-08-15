<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model {

	public $tbl = 'tbl_order';
	public $pk = 'kode_order';

  public function listData()
  {
    $this->db->select('
			a.*,
			b.nama as id_pelanggan,
			c.nama as id_kedai
		');
		$this->db->from($this->tbl.' as a');
		$this->db->join('tbl_pelanggan as b', 'a.id_pelanggan = b.id_pelanggan', 'left');
		$this->db->join('tbl_kedai as c', 'a.id_kedai = c.id_kedai', 'left');

		return $this->db->get()->result();
  }

  public function whereData($pk)
  {
		$this->db->select('
			a.*,
			b.nama as id_pelanggan,
			c.nama as id_kedai
		');
		$this->db->from($this->tbl.' as a');
		$this->db->join('tbl_pelanggan as b', 'a.id_pelanggan = b.id_pelanggan', 'left');
		$this->db->join('tbl_kedai as c', 'a.id_kedai = c.id_kedai', 'left');

		return $this->db->get()->row();
  }

  public function insertData($data)
  {
    $this->db->insert($this->tbl, $data);
  }

  public function updateData($pk, $data)
  {
    $this->db->where($this->pk, $pk);
    $this->db->update($this->tbl, $data);
  }

  public function deleteData($pk)
  {
    $this->db->where($this->pk, $pk);
    $this->db->delete($this->tbl);
  }

}

/* End of file OrderModel.php */
/* Location: ./application/models/OrderModel.php */
