<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KedaiModel extends CI_Model {

	public $tbl = 'tbl_kedai';
	public $pk = 'id_kedai';

  public function listData()
  {
    $this->db->select("
			a.*,
			b.nama as id_kota
		");
		$this->db->from($this->tbl.' as a');
		$this->db->join('tbl_kota as b', 'a.id_kota = b.id_kota', 'left');

		return $this->db->get()->result();
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

}

/* End of file KedaiModel.php */
/* Location: ./application/models/KedaiModel.php */
