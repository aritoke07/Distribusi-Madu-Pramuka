<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenggunaModel extends CI_Model {

	public $tbl = 'tbl_pengguna';
	public $pk = 'username';

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

}

/* End of file PenggunaModel.php */
/* Location: ./application/models/PenggunaModel.php */
