<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends READY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('convert');
	}

	public function list_menu($param)
	{
		if (empty($param)) {
			show_404();
		}

		$data['pro_kedai'] = $this->db->get_where('tbl_kedai', array('id_kedai' => $param))->row();

		// get data content
		$this->db->select('
			a.id_stok,
			a.status,
				b.harga,
				b.id_madu,
				b.id_kemasan,
					c.nama as jenis_madu,
					c.gambar as gambar,
					c.keterangan as keterangan,
						d.nama as kemasan
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$data['pro_madu'] = $this->db->get()->result();
		// end data content

		// menu sidebar
		$this->db->distinct();
		$this->db->select('
				b.id_madu,
					c.nama as jenis_madu
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$data['cat_madu'] = $this->db->get()->result();

		$this->db->distinct();
		$this->db->select('
				b.id_kemasan,
					d.nama as kemasan
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$data['cat_kemasan'] = $this->db->get()->result();
		// end menu sidebar

		$data['categoryView'] = null;

		$this->content = 'frontend/menu/MenuView';

		$this->_FrontendLayout_($data, $headerAddCssJs = FALSE, $footerAddJs = FALSE);
	}

	public function view_detail($param=FALSE, $pk=FALSE, $kedai=FALSE)
	{
		if (empty($param) || empty($pk) || empty($kedai)) {
			show_404();
		}

		$data['pro_kedai'] = $this->db->get_where('tbl_kedai', array('id_kedai' => $kedai))->row();

		// get data content
		$this->db->select('
			a.id_stok,
			a.status,
				b.harga,
				b.id_madu,
				b.id_kemasan,
					c.nama as jenis_madu,
					c.gambar as gambar,
					c.keterangan as keterangan,
						d.nama as kemasan
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$this->db->where('a.id_stok', $pk);
		$data['pro_madu'] = $this->db->get()->row();
		// end data content

		// menu sidebar
		$this->db->distinct();
		$this->db->select('
				b.id_madu,
					c.nama as jenis_madu
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$data['cat_madu'] = $this->db->get()->result();

		$this->db->distinct();
		$this->db->select('
				b.id_kemasan,
					d.nama as kemasan
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$data['cat_kemasan'] = $this->db->get()->result();
		// end menu sidebar

		$data['categoryView'] = null;

		// check item is cart or not
		$data['btnAddCartItem'] = anchor('cart/add/'.$data['pro_madu']->id_stok.'/'.$kedai, '<i class="fa fa-shopping-cart"></i> Beli', 'class="btn btn-primary"');
		$cartItems = $this->cart->contents();
		if (isset($cartItems)) {
			foreach ($cartItems as $item) {
				if ($data['pro_madu']->id_stok==$item['id']) {
					$data['btnAddCartItem'] = null;
				}
			}
		}

		$this->content = 'frontend/menu/MenuView_LihatDetailMadu';

		$this->_FrontendLayout_($data, $headerAddCssJs = FALSE, $footerAddJs = FALSE);
	}

	public function view_category($param=FALSE, $pk=FALSE, $kedai=FALSE)
	{
		if (empty($param) || empty($pk) || empty($kedai)) {
			show_404();
		}

		switch ($param) {
			case 'madu':
				$where = 'b.id_madu';
				break;

			case 'kemasan':
				$where = 'b.id_kemasan';
				break;

			default:
				$where = '';
				break;
		}

		$data['pro_kedai'] = $this->db->get_where('tbl_kedai', array('id_kedai' => $kedai))->row();

		// get data content
		$this->db->select('
			a.id_stok,
			a.status,
				b.harga,
				b.id_madu,
				b.id_kemasan,
					c.nama as jenis_madu,
					c.gambar as gambar,
					c.keterangan as keterangan,
						d.nama as kemasan
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$this->db->where($where, $pk);
		$data['pro_madu'] = $this->db->get()->result();
		// end data content

		// menu sidebar
		$this->db->distinct();
		$this->db->select('
				b.id_madu,
					c.nama as jenis_madu
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$data['cat_madu'] = $this->db->get()->result();

		$this->db->distinct();
		$this->db->select('
				b.id_kemasan,
					d.nama as kemasan
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$data['cat_kemasan'] = $this->db->get()->result();
		// end menu sidebar

		switch ($param) {
			case 'madu':
				$data['categoryView'] = '"'.$data['pro_madu'][0]->jenis_madu.'"';
				break;

			case 'kemasan':
				$data['categoryView'] = '"'.$data['pro_madu'][0]->kemasan.'"';
				break;

			default:
				$data['categoryView'] = null;
				break;
		}

		$this->content = 'frontend/menu/MenuView';

		$this->_FrontendLayout_($data, $headerAddCssJs = FALSE, $footerAddJs = FALSE);
	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
