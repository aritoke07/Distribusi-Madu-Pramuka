<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $title = 'Login Form';

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('login')!=FALSE) {
			redirect("app/dashboard", "refresh");
		}
	}

	public function index()
	{
		$this->load->view('backend/LoginView');
	}

	public function process()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('backend/LoginView');
		} else {
			$username = $this->input->post("username");
			$password = md5($this->input->post("password"));

			$this->db->where("username", $username);
			$this->db->where("password", $password);
			$this->db->from("tbl_pengguna");
			$row = $this->db->get();

			if (empty($row->num_rows())) {
				$this->session->set_flashdata('wrongLogin', '<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											Salah username dan password
									  	</div>');
				$this->load->view('backend/LoginView');
			} else {
				$session = array(
					'username' => $row->row()->username,
					'nama' => $row->row()->nama,
					'tingkat' => $row->row()->tingkat,
					'login' => TRUE
				);
				$this->session->set_userdata($session);

				switch ($row->row()->tingkat) {
					case '1':
						redirect("app/daftarharga", "refresh");
						break;

					case '2':
						redirect("app/order/pelanggan", "refresh");
						break;

					case '3':
						redirect("app/report/stok_gudang", "refresh");
						break;

					case '14':
						redirect("app/dashboard", "refresh");
						break;

					default:
						show_404();
						break;
				}
			}
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/app/Login.php */
