<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receiver extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert()
	{
		$data = $this->input->get('data');
		$suhu = $this->input->get('suhu');

		if (empty($data) && empty($suhu)) {
			echo "tidak data yang dikirim";
		} else {
			$post = array(
				'data' => $data, 
				'suhu' => $suhu
			);
			$this->db->insert('test', $post);
			
			echo "data sudah masuk silahkan dicek";
		}
	}

}

/* End of file Receiver.php */
/* Location: ./application/controllers/Receiver.php */