<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends READY_Controller {

  public $titlePage = 'Pelanggan';

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    $this->load->model('PelangganModel');
    $this->load->library('convert');
  }

	public function index()
	{
    $data['values'] = $this->PelangganModel->listData();

		$this->content = 'backend/pelanggan/IndexView';

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
      $value = $this->PelangganModel->whereData($pk);

      if (empty($value) && $view=="view") {
        show_404();
      } elseif (!empty($pk) && empty($value)) {
        show_404();
      }
    }

    // set value
    $data['id_pelanggan'] = set_value('id_pelanggan', (!empty($value->id_pelanggan) ? $value->id_pelanggan : null));
    $data['nama'] = set_value('nama', (!empty($value->nama) ? $value->nama : null));
    $data['alamat'] = set_value('alamat', (!empty($value->alamat) ? $value->alamat : null));
    $data['telp'] = set_value('telp', (!empty($value->telp) ? $value->telp : null));
    $data['handphone'] = set_value('handphone', (!empty($value->handphone) ? $value->handphone : null));
    $data['email'] = set_value('email', (!empty($value->email) ? $value->email : null));
    $data['status'] = set_value('status', (!empty($value->status) ? $value->status : null));
    $data['tanggal_bergabung'] = set_value('tanggal_bergabung', (!empty($value->tanggal_bergabung) ? $value->tanggal_bergabung : null));
    $data['tanggal_keluar'] = set_value('tanggal_keluar', (!empty($value->tanggal_keluar) ? $value->tanggal_keluar : null));

    // set disabled
    $data['statusDisable'] = (!empty($view) ? "disabled" : null);

		$this->content = 'backend/pelanggan/FormView';

		$footerAddJs = array(
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
			'public/master/backend/Pelanggan.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs = null, $footerAddJs);
	}

  public function save()
  {
    $id = trim($this->input->post('id_pelanggan', TRUE));
    $status = trim($this->input->post('status', TRUE));
    $tanggal_keluar = ($status==0 ? date("Y-m-d") : null);

    $data = array(
      'status' => $status,
      'tanggal_keluar' => $tanggal_keluar
    );

    $this->PelangganModel->updateData($id, $data);
  }

  public function delete($pk = FALSE)
  {
    if (empty($pk)) {
      show_404();
    }

    $this->PelangganModel->deleteData($pk);

    redirect('app/pelanggan');
  }

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/app/Pelanggan.php */
