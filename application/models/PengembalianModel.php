<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengembalianModel extends CI_Model {

	public $tbl = 'tbl_pengembalian';
	public $pk = 'kode_pengembalian';

  public function listData()
  {
    return $this->db->get($this->tbl)->result();
  }

  public function whereData($pk)
  {
    return $this->db->get_where($this->tbl, array($this->pk => $pk))->row();
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

	public function listDataDetailOne($fk)
	{
		return $this->db->get_where('tbl_pengembalian_item', array('kode_pengembalian' => $fk))->result();
	}

	public function insertDataDetailOne($data)
	{
		$this->db->insert('tbl_pengembalian_item', $data);
	}

	public function updateDataDetailOne($pk, $data)
	{
		$this->db->where('id_pengembalianitem', $pk);
		$this->db->update('tbl_pengembalian_item', $data);
	}

	public function deleteDataDetailOne($pk)
	{
		$this->db->where('id_pengirimanitem', $pk);
		$this->db->delete('tbl_pengembalian_item');
	}

}

/* End of file PengembalianModel.php */
/* Location: ./application/models/PengembalianModel.php */
