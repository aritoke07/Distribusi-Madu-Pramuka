<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarhargaModel extends CI_Model {

	public $tbl = 'tbl_daftarhargaitem';
	public $pk = 'id_daftarhargaitem';

  public function listData()
  {
    $this->db->select("
			a.id_daftarhargaitem,
			a.harga,
			b.nama as id_madu,
			c.nama as id_kemasan
		");
		$this->db->from($this->tbl.' as a');
		$this->db->join('tbl_madu as b', 'a.id_madu = b.id_madu', 'left');
		$this->db->join('tbl_kemasan as c', 'a.id_kemasan = c.id_kemasan', 'left');

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

/* End of file DaftarhargaModel.php */
/* Location: ./application/models/DaftarhargaModel.php */
