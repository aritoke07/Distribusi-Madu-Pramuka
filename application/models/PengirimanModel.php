<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengirimanModel extends CI_Model {

	public $tbl = 'tbl_pengiriman';
	public $pk = 'kode_pengiriman';

	public function ListData()
	{
		$this->db->select('
			a.*,
			b.nama as id_gudang
		');
		$this->db->from($this->tbl.' as a');
		$this->db->join('tbl_gudang as b', 'a.id_gudang = b.id_gudang', 'left');
		$this->db->join('tbl_order as c', 'a.kode_order = c.kode_order', 'left');

		return $this->db->get()->result();
	}

	public function listData_Menunggu()
	{
		$this->db->select('
			a.*,
			b.nama as id_gudang
		');
		$this->db->from($this->tbl.' as a');
		$this->db->join('tbl_gudang as b', 'a.id_gudang = b.id_gudang', 'left');
		$this->db->join('tbl_order as c', 'a.kode_order = c.kode_order', 'left');
		$this->db->where('a.status', '1');

		return $this->db->get()->result();
	}

	public function listData_Diterima()
  {
    $this->db->select('
			a.*,
			b.nama as id_gudang
		');
		$this->db->from($this->tbl.' as a');
		$this->db->join('tbl_gudang as b', 'a.id_gudang = b.id_gudang', 'left');
		$this->db->join('tbl_order as c', 'a.kode_order = c.kode_order', 'left');
		$this->db->where('a.status', '2');

		return $this->db->get()->result();
  }

	public function listData_Retur()
  {
    $this->db->select('
			a.*,
			b.nama as id_gudang
		');
		$this->db->from($this->tbl.' as a');
		$this->db->join('tbl_gudang as b', 'a.id_gudang = b.id_gudang', 'left');
		$this->db->join('tbl_order as c', 'a.kode_order = c.kode_order', 'left');
		$this->db->where('a.status', '3');

		return $this->db->get()->result();
  }

	public function listData_Resend()
  {
    $this->db->select('
			a.*,
			b.nama as id_gudang
		');
		$this->db->from($this->tbl.' as a');
		$this->db->join('tbl_gudang as b', 'a.id_gudang = b.id_gudang', 'left');
		$this->db->join('tbl_order as c', 'a.kode_order = c.kode_order', 'left');
		$this->db->where('a.status', '4');

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

	public function listDataDetailOne($fk)
	{
		$this->db->select('
			a.id_pengirimanitem,
			a.jumlah,
			d.nama as id_madu,
			e.nama as id_kemasan,
			(select jumlah from tbl_pengembalian_item where id_pengirimanitem = a.id_pengirimanitem) as id_pengembaliam_item
		');
		$this->db->from('tbl_pengiriman_item as a');
		$this->db->join('tbl_stok as b', 'a.id_stok = b.id_stok', 'left');
		$this->db->join('tbl_daftarhargaitem as c', 'b.id_daftarhargaitem = c.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as d', 'c.id_madu = d.id_madu', 'left');
		$this->db->join('tbl_kemasan as e', 'c.id_kemasan = e.id_kemasan', 'left');
		$this->db->where('a.kode_pengiriman', $fk);

		return $this->db->get()->result();
	}

	public function insertDataDetailOne($data)
	{
		$this->db->insert('tbl_pengiriman_item', $data);
	}

	public function updateDataDetailOne($pk, $data)
	{
		$this->db->where('id_pengirimanitem', $pk);
		$this->db->update('tbl_pengiriman_item', $data);
	}

	public function deleteDataDetailOne($pk)
	{
		$this->db->where('id_pengirimanitem', $pk);
		$this->db->delete('tbl_pengiriman_item');
	}

	public function listDataDetailTwo($fk)
	{
		$sql = "
			select 
			e.nama as id_madu,
			f.nama as id_kemasan,
			a.jumlah, a.id_pengirimanitem,
			x.kode_pengembalian,
			x.status,
			x.tanggal_pengembalian,
			x.tanggal_resend
			from tbl_pengembalian as x 
			left join tbl_pengembalian_item as a on a.kode_pengembalian = x.kode_pengembalian
			left join tbl_pengiriman_item as b on a.id_pengirimanitem = b.id_pengirimanitem
			left join tbl_stok as c on b.id_stok = c.id_stok
			left join tbl_daftarhargaitem as d on c.id_daftarhargaitem = d.id_daftarhargaitem
			left join tbl_madu as e on d.id_madu = e.id_madu
			left join tbl_kemasan as f on d.id_kemasan = f.id_kemasan
			where x.kode_order = '$fk'
		";

		return $this->db->query($sql)->result();
	}

}

/* End of file PengirimanModel.php */
/* Location: ./application/models/PengirimanModel.php */
