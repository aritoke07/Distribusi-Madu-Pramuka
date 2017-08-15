<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenerimaanModel extends CI_Model {

	public $tbl = 'tbl_penerimaan';
	public $pk = 'kode_penerimaan';

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

	public function listDataBarang()
	{
		$userKedai = $this->db->get_where('tbl_pengguna_kedai', array('username' => $this->session->userdata('username')))->row()->id_kedai;

		$this->db->select('
			a.*,
			b.nama as id_gudang
		');
		$this->db->from('tbl_pengiriman as a');
		$this->db->join('tbl_gudang as b', 'a.id_gudang = b.id_gudang', 'left');
		$this->db->where('a.id_kedai', $userKedai);
		$result = $this->db->get()->result();

		return $result;
	}

}

/* End of file PenerimaanModel.php */
/* Location: ./application/models/PenerimaanModel.php */
