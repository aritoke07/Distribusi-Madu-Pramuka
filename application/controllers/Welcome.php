<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function FunctionName($value='')
	{
		$file = './import/madu.csv';

		if (file_exists($file)) {
			$this->load->helper('path');

			$realPath = set_realpath($file);

			$readFile = fopen($realPath, 'r');

			while (!feof($readFile)) {
				$convertToArray[] = fgetcsv($readFile);
			}

			// echo '<pre>';
			// print_r($convertToArray);
			// exit();

			foreach ($convertToArray as $value) {
				if (!empty($value)) {
					$nama = trim($value[0]);

					$data = array(
						'nama' => "Kedai " . strtolower($nama),
						'id_kota' => $this->db->get_where("tbl_kota", array("nama" => $nama))->row()->id_kota
					);

					// $this->db->insert("tbl_kedai", $data);
				}
			}

		}
	}

}
