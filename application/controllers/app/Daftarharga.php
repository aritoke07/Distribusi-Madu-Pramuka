<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarharga extends READY_Controller {

  public $titlePage = 'Daftar Harga';

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    if ($this->session->userdata("login")==TRUE && $this->session->userdata("tingkat")!="1") {
      show_404();
    }

    $this->load->model('DaftarhargaModel');
    $this->load->library('convert');
  }

	public function index()
	{
    $data['values'] = $this->DaftarhargaModel->listData();

		$this->content = 'backend/daftarharga/IndexView';

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
      $value = $this->DaftarhargaModel->whereData($pk);

      if (empty($value) && $view=="view") {
        show_404();
      } elseif (!empty($pk) && empty($value)) {
        show_404();
      }
    }

    // set value
    $data['id_daftarhargaitem'] = set_value('id_daftarhargaitem', (!empty($value->id_daftarhargaitem) ? $value->id_daftarhargaitem : null));
    $data['harga'] = set_value('harga', (!empty($value->harga) ? $value->harga : null));
    $data['id_madu'] = set_value('id_madu', (!empty($value->id_madu) ? $value->id_madu : null));
    $data['id_kemasan'] = set_value('id_kemasan', (!empty($value->id_kemasan) ? $value->id_kemasan : null));

    // set disabled
    $data['hargaDisable'] = (!empty($view) ? "disabled" : null);
    $data['id_maduDisable'] = (!empty($view) ? "disabled" : null);
    $data['id_kemasanDisable'] = (!empty($view) ? "disabled" : null);

    // get data addtional
    $data['valMadu'] = $this->db->get('tbl_madu')->result();
    $data['valKemasan'] = $this->db->get('tbl_kemasan')->result();

		$this->content = 'backend/daftarharga/FormView';

    $headerAddCssJs['addJs'] = array(
      'public/core/Convert.js'
    );

		$footerAddJs = array(
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
			'public/master/backend/Daftarharga.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs, $footerAddJs);
	}

  public function save()
  {
    $id = trim($this->input->post('id_daftarhargaitem', TRUE));
    $harga = trim($this->input->post('harga', TRUE));
    $convertHarga = str_replace(array('Rp', '.'), '', $harga);
    $id_madu = trim($this->input->post('id_madu', TRUE));
    $id_kemasan = trim($this->input->post('id_kemasan', TRUE));

    $value = $this->DaftarhargaModel->whereData($id);

    if (empty($value)) {
      $data = array(
        'harga' => $convertHarga,
        'id_madu' => $id_madu,
        'id_kemasan' => $id_kemasan
      );

      $this->DaftarhargaModel->insertData($data);
    } else {
      $data = array(
        'harga' => $convertHarga,
        'id_madu' => $id_madu,
        'id_kemasan' => $id_kemasan
      );

      $this->DaftarhargaModel->updateData($id, $data);
    }
  }

  public function delete($pk = FALSE)
  {
    if (empty($pk)) {
      show_404();
    }

    $this->DaftarhargaModel->deleteData($pk);

    redirect('app/daftarharga');
  }

}

/* End of file Daftarharga.php */
/* Location: ./application/controllers/app/Daftarharga.php */
