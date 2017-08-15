<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kedai extends READY_Controller {

  public $titlePage = 'Kedai';

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    $this->load->model('KedaiModel');
  }

	public function index()
	{
    $data['values'] = $this->KedaiModel->listData();

		$this->content = 'backend/kedai/IndexView';

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
      $value = $this->KedaiModel->whereData($pk);

      if (empty($value) && $view=="view") {
        show_404();
      } elseif (!empty($pk) && empty($value)) {
        show_404();
      }
    }

    // set value
    $data['id_kedai'] = set_value('id_kedai', (!empty($value->id_kedai) ? $value->id_kedai : null));
    $data['nama'] = set_value('nama', (!empty($value->nama) ? $value->nama : null));
    $data['alamat'] = set_value('alamat', (!empty($value->alamat) ? $value->alamat : null));
    $data['telp'] = set_value('telp', (!empty($value->telp) ? $value->telp : null));
    $data['id_kota'] = set_value('id_kota', (!empty($value->id_kota) ? $value->id_kota : null));

    // set disabled
    $data['namaDisable'] = (!empty($view) ? "disabled" : null);
    $data['alamatDisable'] = (!empty($view) ? "disabled" : null);
    $data['telpDisable'] = (!empty($view) ? "disabled" : null);
    $data['telpDisable'] = (!empty($view) ? "disabled" : null);
    $data['id_kotaDisable'] = (!empty($view) ? "disabled" : null);

    // get data addtional
    $data['valKota'] = $this->db->get('tbl_kota')->result();

		$this->content = 'backend/kedai/FormView';

		$footerAddJs = array(
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
			'public/master/backend/Kedai.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs = null, $footerAddJs);
	}

  public function save()
  {
    $id = trim($this->input->post('id_kedai', TRUE));
    $nama = trim($this->input->post('nama', TRUE));
    $alamat = trim($this->input->post('alamat', TRUE));
    $telp = trim($this->input->post('telp', TRUE));
    $id_kota = trim($this->input->post('id_kota', TRUE));

    $value = $this->KedaiModel->whereData($id);

    if (empty($value)) {
      $data = array(
        'nama' => $nama,
        'alamat' => $alamat,
        'telp' => $telp,
        'id_kota' => $id_kota
      );

      $this->KedaiModel->insertData($data);
    } else {
      $data = array(
        'nama' => $nama,
        'alamat' => $alamat,
        'telp' => $telp,
        'id_kota' => $id_kota
      );

      $this->KedaiModel->updateData($id, $data);
    }
  }

  public function delete($pk = FALSE)
  {
    if (empty($pk)) {
      show_404();
    }

    $this->KedaiModel->deleteData($pk);

    redirect('app/kedai');
  }

}

/* End of file Kedai.php */
/* Location: ./application/controllers/app/Kedai.php */
