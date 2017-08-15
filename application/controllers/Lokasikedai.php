<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasikedai extends READY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('convert');
	}

	public function index()
	{
		// get data content
		$this->db->select('
			a.*,
			b.nama as id_kota
		');
		$this->db->from('tbl_kedai as a');
		$this->db->join('tbl_kota as b', 'a.id_kota = b.id_kota', 'left');
		$data['pro_kedai'] = $this->db->get()->result();
		// end data content

		// menu sidebar
		$data['cat_kota'] = $this->db->get('tbl_kota')->result();
		// end menu sidebar

		$this->content = 'frontend/lokasikedai/LokasikedaiView';

		$this->_FrontendLayout_($data, $headerAddCssJs = FALSE, $footerAddJs = FALSE);
	}

	public function view_category($param=FALSE, $fk=FALSE)
	{
		if (empty($param) || empty($fk)) {
			show_404();
		}

		if ($param!="kedai") {
			show_404();
		}

		$this->db->select('a.*, b.nama as id_kota');
		$this->db->from('tbl_kedai as a');
		$this->db->join('tbl_kota as b', 'a.id_kota = b.id_kota', 'left');
		$this->db->where('a.id_kota', $fk);
		$data['pro_kedai'] = $this->db->get()->result();

		$data['cat_kota'] = $this->db->get('tbl_kota')->result();

		$this->content = 'frontend/lokasikedai/LokasikedaiView_LihatDetailKedai';

		$this->_FrontendLayout_($data, $headerAddCssJs = FALSE, $footerAddJs = FALSE);	
	}

}

/* End of file Lokasikedai.php */
/* Location: ./application/controllers/Lokasikedai.php */