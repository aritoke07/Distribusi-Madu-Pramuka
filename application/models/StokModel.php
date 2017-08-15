<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StokModel extends CI_Model {

	public $tbl = 'tbl_stok';
	public $pk = 'id_stok';

  public function listData()
  {
    $this->db->select('
			a.*,
			b.harga as id_daftarhargaitem,
			(SELECT nama FROM tbl_madu WHERE id_madu = b.id_madu) as id_madu,
			(SELECT nama FROM tbl_kemasan WHERE id_kemasan = b.id_kemasan) as id_kemasan
		');
		$this->db->from($this->tbl . ' as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$result = $this->db->get()->result();

		return $result;
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

/* End of file StokModel.php */
/* Location: ./application/models/StokModel.php */
