<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends READY_Controller {

  public $titlePage = 'Pengembalian';

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    $this->load->model('PengembalianModel');
    $this->load->library('convert');
  }

	public function index()
	{
    $data['values'] = $this->PengembalianModel->listData();

		$this->content = 'backend/pengembalian/IndexView';

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
    if (empty($pk)) {
      show_404();
    } elseif (!empty($pk) && !is_numeric($pk)) {
      show_404();
    } elseif (!empty($view) && $view!="view") {
      show_404();
    } elseif (!empty($pk)) {
      $value = $this->PengembalianModel->whereData($pk);

      if (empty($value) && $view=="view") {
        show_404();
      } elseif (!empty($pk) && empty($value)) {
        show_404();
      }
    }

    // set value
    $data['kode_pengembalian'] = set_value('kode_pengembalian', (!empty($value->kode_pengembalian) ? $value->kode_pengembalian : null));
    $data['tanggal_pengembalian'] = set_value('tanggal_pengembalian', (!empty($value->tanggal_pengembalian) ? $value->tanggal_pengembalian : null));
    $data['tanggal_resend'] = set_value('tanggal_resend', (!empty($value->tanggal_resend) ? $value->tanggal_resend : null));
    $data['status'] = set_value('status', (!empty($value->status) ? $value->status : null));
    $data['catatan'] = set_value('text', (!empty($value->text) ? $value->text : null));
    $data['kode_order'] = set_value('kode_order', (!empty($value->kode_order) ? $value->kode_order : null));

    // set disabled
    $data['kode_pengembalianDisable'] = (!empty($view) ? "disabled" : null);
    $data['tanggal_pengembalianDisable'] = (!empty($view) ? "disabled" : null);
    $data['tanggal_resendDisable'] = (!empty($view) ? "disabled" : null);
    $data['statusDisable'] = (!empty($view) ? "disabled" : null);
    $data['catatanDisable'] = (!empty($view) ? "disabled" : null);
    $data['kode_orderDisable'] = (!empty($view) ? "disabled" : null);

		$this->content = 'backend/pengembalian/FormView';

		$footerAddJs = array(
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
			'public/master/backend/Pengembalian.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs = null, $footerAddJs);
	}

  public function save()
  {
    $id = trim($this->input->post('kode_pengembalian', TRUE));
    $tanggal_resend = trim($this->input->post('tanggal_resend', TRUE));
    $status = trim($this->input->post('status', TRUE));

    $data = array(
      'tanggal_resend' => $tanggal_resend,
      'status' => $status
    );

    $this->PengembalianModel->updateData($id, $data);
  }

  public function delete($pk = FALSE)
  {
    if (empty($pk)) {
      show_404();
    }

    $this->PengembalianModel->deleteData($pk);

    redirect('app/pengembalian');
  }

  public function deleteOne($pk = FALSE)
  {
    if (empty($pk)) {
      show_404();
    }

    $this->PengembalianModel->deleteDataDetailOne($pk);

    redirect('app/pengiriman');
  }

}

/* End of file Pengembalian.php */
/* Location: ./application/controllers/app/Pengembalian.php */
