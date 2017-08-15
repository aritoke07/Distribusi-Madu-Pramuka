<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kemasan extends READY_Controller {

  public $titlePage = 'Kemasan';

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    if ($this->session->userdata("login")==TRUE && $this->session->userdata("tingkat")!="1") {
      show_404();
    }

    $this->load->model('KemasanModel');
  }

	public function index()
	{
    $data['values'] = $this->KemasanModel->listData();

		$this->content = 'backend/kemasan/IndexView';

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

		$this->_backendLayout_($data, $headerAddCssJs, $footerAddJs);
	}

	public function form($pk = FALSE, $view = FALSE)
	{
    // rules
    if (!empty($pk) && !is_numeric($pk)) {
      show_404();
    } elseif (!empty($view) && $view!="view") {
      show_404();
    } elseif (!empty($pk)) {
      $value = $this->KemasanModel->whereData($pk);

      if (empty($value) && $view=="view") {
        show_404();
      } elseif (!empty($pk) && empty($value)) {
        show_404();
      }
    }

    // set value
    $data['id_kemasan'] = set_value('id_kemasan', (!empty($value->id_kemasan) ? $value->id_kemasan : null));
    $data['nama'] = set_value('nama', (!empty($value->nama) ? $value->nama : null));

    // set disabled
    $data['namaDisable'] = (!empty($view) ? "disabled" : null);

		$this->content = 'backend/kemasan/FormView';

		$footerAddJs = array(
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
			'public/master/backend/Kemasan.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs = null, $footerAddJs);
	}

  public function save()
  {
    $id = trim($this->input->post('id_kemasan', TRUE));
    $nama = trim($this->input->post('nama', TRUE));

    $value = $this->KemasanModel->whereData($id);

    if (empty($value)) {
      $data = array(
        'nama' => $nama
      );

      $this->KemasanModel->insertData($data);
    } else {
      $data = array(
        'nama' => $nama
      );

      $this->KemasanModel->updateData($id, $data);
    }
  }

  public function delete($pk = FALSE)
  {
    if (empty($pk)) {
      show_404();
    }

    $this->KemasanModel->deleteData($pk);

    redirect('app/kemasan');
  }

}

/* End of file Kemasan.php */
/* Location: ./application/controllers/app/Kemasan.php */
