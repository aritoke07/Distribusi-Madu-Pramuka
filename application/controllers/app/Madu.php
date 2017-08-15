<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madu extends READY_Controller {

  public $titlePage = 'Jenis Madu';

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    if ($this->session->userdata("login")==TRUE && $this->session->userdata("tingkat")!="1") {
      show_404();
    }

    $this->load->model('MaduModel');
  }

	public function index()
	{
    $data['values'] = $this->MaduModel->listData();

		$this->content = 'backend/madu/IndexView';

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
      $value = $this->MaduModel->whereData($pk);
      $data['buttonDeleteFile'] = null;

      if (empty($value) && $view=="view") {
        show_404();
      } elseif (!empty($pk) && empty($value)) {
        show_404();
      } elseif (!empty($pk) && !empty($value) && $view==null) {
        $data['buttonDeleteFile'] = '<button type="button" id="_btnDeleteFile_" name="_btnDeleteFile_" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>';
      }
    }

    // set value
    $data['id_madu'] = set_value('id_madu', (!empty($value->id_madu) ? $value->id_madu : null));
    $data['nama'] = set_value('nama', (!empty($value->nama) ? $value->nama : null));
    $data['gambar'] = set_value('gambar', (!empty($value->gambar) ? $value->gambar : null));
    $data['keterangan'] = set_value('keterangan', (!empty($value->keterangan) ? $value->keterangan : null));

    // set disabled
    $data['namaDisable'] = (!empty($view) ? "disabled" : null);
    $data['keteranganDisable'] = (!empty($view) ? "disabled" : null);

		$this->content = 'backend/madu/FormView';

    $headerAddCssJs['addCss'] = array(
      'assets/backend/vendors/progressbar/bootstrap-progressbar-3.3.0.css',
      'assets/backend/plugins/jQuery-File-Upload-master/css/jquery.fileupload.css'
    );

		$footerAddJs = array(
      'assets/backend/vendors/progressbar/bootstrap-progressbar.min.js',
      'assets/backend/vendors/nicescroll/jquery.nicescroll.min.js',
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
      'assets/backend/plugins/jQuery-File-Upload-master/js/vendor/jquery.ui.widget.js',
      'assets/backend/plugins/jQuery-File-Upload-master/js/jquery.iframe-transport.js',
      'assets/backend/plugins/jQuery-File-Upload-master/js/jquery.fileupload.js',
      'assets/backend/plugins/tinymce/tinymce.min.js',
			'public/master/backend/Madu.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs, $footerAddJs);
	}

  public function save()
  {
    $id = trim($this->input->post('id_madu', TRUE));
    $nama = trim($this->input->post('nama', TRUE));
    $gambar = trim($this->input->post('gambar', TRUE));
    $keterangan = trim($this->input->post('keterangan', TRUE));

    $value = $this->MaduModel->whereData($id);

    if (empty($value)) {
      $data = array(
        'nama' => $nama,
        'gambar' => $gambar,
        'keterangan' => $keterangan
      );

      $this->MaduModel->insertData($data);
    } else {
      if (empty($gambar)) {
        $data = array(
          'nama' => $nama,
          'keterangan' => $keterangan
        );
      } else {
        $data = array(
          'nama' => $nama,
          'gambar' => $gambar,
          'keterangan' => $keterangan
        );
      }

      $this->MaduModel->updateData($id, $data);
    }
  }

  public function delete($pk = FALSE)
  {
    if (empty($pk)) {
      show_404();
    }

    $this->MaduModel->deleteData($pk);

    redirect('app/madu');
  }

  public function deleteFile()
  {
    $pk = $this->input->post('id_madu');

    if (empty($pk)) {
      show_404();
    }

    $data = array('gambar' => null);
    $this->MaduModel->updateData($pk, $data);
  }

}

/* End of file Madu.php */
/* Location: ./application/controllers/app/Madu.php */
