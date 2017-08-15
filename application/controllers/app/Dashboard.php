<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends READY_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}
	}

	public function index()
	{
		switch ($this->session->userdata("tingkat")) {
			case '1':
				redirect("app/dashboard/gudang", "refresh");
				break;

			case '2':
				redirect("app/dashboard/kedai", "refresh");
				break;

			case '3':
				redirect("app/dashboard/manager", "refresh");
				break;

			case '14':
				redirect("app/dashboard/sa", "refresh");
				break;

			default:
				show_404();
				break;
		}
	}

	public function gudang()
	{
		$this->content = 'backend/dashboard/DashboardGudangView';

		$this->_backendLayout_($data=null, $headerAddCssJs=null, $footerAddJs=null);
	}

	public function kedai()
	{
		$this->content = 'backend/dashboard/DashboardKedaiView';

		$this->_backendLayout_($data=null, $headerAddCssJs=null, $footerAddJs=null);
	}

	public function manager()
	{
		$this->content = 'backend/dashboard/DashboardManagerView';

		$this->_backendLayout_($data=null, $headerAddCssJs=null, $footerAddJs=null);
	}

	public function sa($value='')
	{
		$this->content = 'backend/dashboard/DashboardSAView';

		$this->_backendLayout_($data=null, $headerAddCssJs=null, $footerAddJs=null);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/app/Dashboard.php */
