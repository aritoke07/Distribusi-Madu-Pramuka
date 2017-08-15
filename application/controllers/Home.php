<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends READY_Controller {

	public function index()
	{
		$this->load->library('convert');

		$this->db->select('
			a.id_stok,
			a.status,
				b.harga,
					c.nama as jenis_madu,
					c.gambar as gambar,
					c.keterangan as keterangan,
						d.nama as kemasan
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$data['madus'] = $this->db->get()->result();

		$this->content = 'frontend/home/HomeView';

		$this->_FrontendLayout_($data, $headerAddCssJs = FALSE, $footerAddJs = FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
