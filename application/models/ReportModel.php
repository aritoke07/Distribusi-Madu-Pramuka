<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model {

	public function report_stokgudang()
	{
		$this->db->select('
			a.jumlah, c.nama as jenis_madu, d.nama as kemasan
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');

		return $this->db->get()->result();
	}

	public function report_MaduOrder($value='')
	{
		$sql = '
			select 
			c.nama as jenis_madu,
			d.nama as kemasan,
			count(e.id_stok) as jumlah
			from tbl_stok as a
			left join tbl_daftarhargaitem as b on a.id_daftarhargaitem = b.id_daftarhargaitem
			left join tbl_madu as c on b.id_madu = c.id_madu
			left join tbl_kemasan as d on b.id_kemasan = d.id_kemasan
			left join tbl_order_item as e on a.id_stok = e.id_stok
			group by c.nama, d.nama
		';

		return $this->db->query($sql)->result();
	}

	public function report_Kedai()
	{
		$sql = '
			select 
			a.nama,
			count(b.id_kedai) as hit
			from tbl_kedai as a
			left join tbl_order as b on a.id_kedai = b.id_kedai
			group by a.nama
		';

		return $this->db->query($sql)->result();
	}

}

/* End of file ReportModel.php */
/* Location: ./application/models/ReportModel.php */