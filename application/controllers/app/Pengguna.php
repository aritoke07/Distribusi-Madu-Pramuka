<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends READY_Controller {

  public $titlePage = 'Pengguna';

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    $this->load->model('PenggunaModel');
    $this->load->library('convert');
  }

	public function index()
	{
    $data['values'] = $this->PenggunaModel->listData();

		$this->content = 'backend/pengguna/IndexView';

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
    if (!empty($view) && $view!="view") {
      show_404();
    } elseif (!empty($pk)) {
      $this->db->select('
        a.*,
        -- (SELECT nama FROM tbl_kedai WHERE id_kedai=b.id_kedai) as id_kedai
        b.id_kedai
      ');
      $this->db->from('tbl_pengguna as a');
      $this->db->join('tbl_pengguna_kedai as b', 'a.username = b.username', 'left');
      $this->db->where('a.username', $pk);
      $value = $this->db->get()->row();

      if (empty($value) && $view=="view") {
        show_404();
      } elseif (!empty($pk) && empty($value)) {
        show_404();
      }
    }

    // set value
    $data['username'] = set_value('username', (!empty($value->username) ? $value->username : null));
    $data['password'] = set_value('password', (!empty($value->password) ? '******' : null));
    $data['nama'] = set_value('nama', (!empty($value->nama) ? $value->nama : null));
    $data['tingkat'] = set_value('tingkat', (!empty($value->tingkat) ? $value->tingkat : null));
    $data['id_kedai'] = set_value('id_kedai', (!empty($value->id_kedai) ? $value->id_kedai : null));

    // set disabled
    $data['usernameDisable'] = (!empty($view) ? "disabled" :(!empty($pk) && empty($view)) ? "readonly" : null);
    $data['passwordDisable'] = (!empty($view) ? "disabled" :(!empty($pk) && empty($view)) ? "disabled" : null);
    $data['namaDisable'] = (!empty($view) ? "disabled" : null);
    $data['tingkatDisable'] = (!empty($view) ? "disabled" : null);
    $data['id_kedaiDisable'] = (!empty($view) ? "disabled" : null);

    // get data
    $data['valKedai'] = $this->db->get("tbl_kedai")->result();

		$this->content = 'backend/pengguna/FormView';

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
			'public/master/backend/Pengguna.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs, $footerAddJs);
	}

  public function save()
  {
    $id = trim($this->input->post('username', TRUE));
    $password = trim($this->input->post('password', TRUE));
    $nama = trim($this->input->post('nama', TRUE));
    $tingkat = trim($this->input->post('tingkat', TRUE));
    $id_kedai = trim($this->input->post('id_kedai', TRUE));

    $value = $this->PenggunaModel->whereData($id);

    if (empty($value)) {
      $data = array(
        'username' => $id,
        'password' => md5($password),
        'nama' => $nama,
        'tingkat' => $tingkat
      );
      $this->PenggunaModel->insertData($data);

      if (!empty($id_kedai) && $tingkat=="2") {
        $dataDetail = array(
          'username' => $id,
          'id_kedai' => $id_kedai
        );
        $this->db->insert("tbl_pengguna_kedai", $dataDetail);
      }
    } else {
      $data = array(
        'nama' => $nama,
        'tingkat' => $tingkat
      );
      $this->PenggunaModel->updateData($id, $data);

      $rowDetail = $this->db->get_where("tbl_pengguna_kedai", array("username" => $id));

      if (!empty($id_kedai) && $tingkat=="2" && empty($rowDetail->num_rows())) {
        $dataDetail = array(
          'username' => $id,
          'id_kedai' => $id_kedai
        );
        $this->db->insert("tbl_pengguna_kedai", $dataDetail);
      } elseif (!empty($id_kedai) && $tingkat=="2" && !empty($rowDetail->num_rows())) {
        $dataDetail = array(
          'id_kedai' => $id_kedai
        );
        $this->db->where("username", $id);
        $this->db->update("tbl_pengguna_kedai", $dataDetail);
      } elseif ($tingkat!="2" && !empty($rowDetail->num_rows())) {
        $this->db->where("username", $id);
        $this->db->delete("tbl_pengguna_kedai");
      }
    }
  }

  public function delete($pk = FALSE)
  {
    if (empty($pk)) {
      show_404();
    }

    $this->PenggunaModel->deleteData($pk);

    redirect('app/pengguna');
  }

  public function keluar()
  {
    $this->session->sess_destroy();

    redirect('app/login', 'refresh');
  }

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/app/Pengguna.php */
