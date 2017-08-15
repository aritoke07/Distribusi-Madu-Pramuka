<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataperangkat extends READY_Controller {

	public function index()
	{
		$this->content = 'backend/dataperangkat/IndexView';

		$headerAddCssJs = array(
			'addCss' => array(
				'assets/backend/vendors/iCheck/skins/flat/green.css',
				'assets/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css',
				'assets/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
				'assets/backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
				'assets/backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
				'assets/backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css',
			)
		);

		$footerAddJs = array(
			'assets/backend/vendors/iCheck/icheck.min.js',
			'assets/backend/vendors/datatables.net/js/jquery.dataTables.min.js',
			'assets/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
			'assets/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
			'assets/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
			'assets/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js',
			'assets/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js',
			'assets/backend/vendors/datatables.net-buttons/js/buttons.print.min.js',
			'assets/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
			'assets/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
			'assets/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
			'assets/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
			'assets/backend/vendors/datatables.net-scroller/js/datatables.scroller.min.js',
			'assets/backend/vendors/jszip/dist/jszip.min.js',
			'assets/backend/vendors/pdfmake/build/pdfmake.min.js',
			'assets/backend/vendors/pdfmake/build/vfs_fonts.js',
			'public/master/backend/List.js'
		);

		$this->_backendLayout_($data = null, $headerAddCssJs, $footerAddJs);
	}

	public function create()
	{
		$this->content = 'backend/dataperangkat/FormCreateView';

		$footerAddJs = array(
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
			'public/master/backend/Dataperangkat.js'
		);

		$this->_backendLayout_($data = null, $headerAddCssJs = null, $footerAddJs);
	}

}

/* End of file Dataperangkat.php */
/* Location: ./application/controllers/app/Dataperangkat.php */
