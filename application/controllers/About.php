<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends READY_Controller {

	public function index()
	{
		$this->content = 'frontend/about/AboutView';

		$this->_FrontendLayout_($data = FALSE, $headerAddCssJs = FALSE, $footerAddJs = FALSE);
	}

	public function FunctionName($value='')
	{
		// $this->db->from('tbl_order');
	 //    $this->db->order_by('kode_order', 'desc');
	 //    $row = $this->db->get()->result();

	 //    if (!empty($row)) {
	 //    	rsort($row);
	 //    	foreach ($row as $r) {
	 //    		$val[] = substr($r->kode_order, 8);
	 //    	}
	 //    } else {
	 //    	$val[0] = 1;
	 //    }

	 //    $queue = $val[0] + 1;
	 //    $createCode = "ODR/MAD/".$queue;

		$data = array(
			1,
			10,
			2,
			3,
			4,
			5,
			6,
			7,
			8,
			9,
		);

		rsort($data);
		foreach ($data as $r) {
			echo $r;
			echo '<br>';
		}
	}

}

/* End of file About.php */
/* Location: ./application/controllers/About.php */
