<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends READY_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

	    if ($this->session->userdata("login")==TRUE && $this->session->userdata("tingkat")!="3") {
	      show_404();
	    }
		

		$this->load->model('ReportModel');
	}

	public function stok_gudang()
	{
		$this->content = 'backend/report/StokGudangView';

		$footerAddJs = array(
			'assets/backend/plugins/highcharts/js/highcharts.js',
			'assets/backend/plugins/highcharts/js/modules/exporting.js',
			'public/master/backend/StokGudang.js'
		);

		$this->_backendLayout_($data=null, $headerAddCssJs=null, $footerAddJs);
	}

	public function getDataStokGudang()
	{
		$values = $this->ReportModel->report_stokgudang();

		foreach ($values as $val) {
			$data_array[] = array(
				'name' => $val->jenis_madu.':'.$val->kemasan,
				'y' => (int)$val->jumlah
			);
		}

		$data = array(
			'name' => 'Data Stok',
			'colorByPoint' => true,
			'data' => $data_array
		);

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function kedai()
	{
		$this->content = 'backend/report/StokGudangView';

		$footerAddJs = array(
			'assets/backend/plugins/highcharts/js/highcharts.js',
			'assets/backend/plugins/highcharts/js/modules/data.js',
			'assets/backend/plugins/highcharts/js/modules/drilldown.js',
			'public/master/backend/RptKedai.js'
		);

		$this->_backendLayout_($data=null, $headerAddCssJs=null, $footerAddJs);
	}

	public function getDataKedai()
	{
		$values = $this->ReportModel->report_Kedai();

		foreach ($values as $val) {
			$data_array[] = array(
				'name' => $val->nama,
				'y' => (int)$val->hit
			);
		}

		$data = array(
			'name' => 'Data Kedai',
			'colorByPoint' => true,
			'data' => $data_array
		);

		echo json_encode($data, JSON_PRETTY_PRINT);	
	}

	public function madu_order()
	{
		$this->content = 'backend/report/StokGudangView';

		$footerAddJs = array(
			'assets/backend/plugins/highcharts/js/highcharts.js',
			'assets/backend/plugins/highcharts/js/modules/exporting.js',
			'public/master/backend/MaduOrder.js'
		);

		$this->_backendLayout_($data=null, $headerAddCssJs=null, $footerAddJs);
	}

	public function getDataMaduOrder()
	{
		$values = $this->ReportModel->report_MaduOrder();

		foreach ($values as $val) {
			$data_array[] = array(
				'name' => $val->jenis_madu.':'.$val->kemasan,
				'y' => (int)$val->jumlah
			);
		}

		$data = array(
			'name' => 'Data Madu Order',
			'colorByPoint' => true,
			'data' => $data_array
		);

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

}

/* End of file Report.php */
/* Location: ./application/controllers/app/Report.php */