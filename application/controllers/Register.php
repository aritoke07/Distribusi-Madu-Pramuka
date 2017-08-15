<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends READY_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("login")==TRUE) {
			show_404();
		}
	}

	public function index()
	{
		$this->content = 'frontend/register/RegisterView';

		$this->_FrontendLayout_($data = FALSE, $headerAddCssJs = FALSE, $footerAddJs = FALSE);
	}

	public function process()
	{
		$this->form_validation->set_rules('name', 'name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|alpha_numeric|is_unique[tbl_pelanggan.username]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[tbl_pelanggan.email]');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$name     = $this->input->post('name', TRUE);
			$email    = $this->input->post('email', TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			// insert data
			$dataInsert = array(
				'username' => $username,
				'password' => md5($password),
				'nama'     => $name,
				'email'    => $email,
				'status' => '1',
				'tanggal_bergabung' => date("Y-m-d")
			);
			$this->db->insert('tbl_pelanggan', $dataInsert);

			$row = $this->db->get_where('tbl_pelanggan', array('username' => $username))->row();

			// set session
			$dataSession = array(
				'nama' => $row->nama,
				'email' => $row->email,
				'username' => $row->username,
				'id' => $row->id_pelanggan,
				'login' => TRUE
			);
			
			$this->session->set_userdata($dataSession);

			redirect("pelanggan", "refresh");

		}

	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */
