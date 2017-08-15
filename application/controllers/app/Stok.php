<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends READY_Controller {

  public $titlePage = 'Stok';

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    if ($this->session->userdata("login")==TRUE && $this->session->userdata("tingkat")!="1") {
      show_404();
    }

    $this->load->model('StokModel');
    $this->load->library('convert');
  }

	public function index()
	{
    $data['values'] = $this->StokModel->listData();

		$this->content = 'backend/stok/IndexView';

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

	public function form_backup($pk = FALSE, $view = FALSE)
	{
    // rules
    if (!empty($pk) && !is_numeric($pk)) {
      show_404();
    } elseif (!empty($view) && $view!="view") {
      show_404();
    } elseif (!empty($pk)) {
      $this->db->select('
        a.*,
        (SELECT id_madu FROM tbl_madu WHERE id_madu = b.id_madu) as id_daftarhargaitem
      ');
      $this->db->from('tbl_stok as a');
      $this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
      $this->db->where('a.id_stok', $pk);
      $value = $this->db->get()->row();

      if (empty($value) && $view=="view") {
        show_404();
      } elseif (!empty($pk) && empty($value)) {
        show_404();
      }
    }

    // set value
    $data['id_stok'] = set_value('id_stok', (!empty($value->id_stok) ? $value->id_stok : null));
    $data['status'] = set_value('status', (!empty($value->status) ? $value->status : null));
    $data['jumlah'] = set_value('jumlah', (!empty($value->jumlah) ? $value->jumlah : null));
    $data['id_madu'] = set_value('id_madu', (!empty($value->id_daftarhargaitem) ? $value->id_daftarhargaitem : null));

    // set disabled
    $data['statusDisable'] = (!empty($view) ? "disabled" : null);
    $data['jumlahDisable'] = (!empty($view) ? "disabled" : null);
    $data['id_maduDisable'] = (!empty($view) ? "disabled" : (!empty($pk) && $view==null) ? "disabled" : null);

    // get data
    $data['valMadu'] = $this->db->get('tbl_madu')->result();

		$this->content = 'backend/stok/FormView';

    $headerAddCssJs['addJs'] = array(
      'public/core/Convert.js'
    );

		$footerAddJs = array(
      'assets/backend/vendors/progressbar/bootstrap-progressbar.min.js',
      'assets/backend/vendors/nicescroll/jquery.nicescroll.min.js',
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
			'public/master/backend/Stok.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs, $footerAddJs);
	}

  public function create()
  {
    // get data
    $data['valMadu'] = $this->db->get('tbl_madu')->result();
    $data['formId'] = 'form_create';
    $data['inputKemasan'] = '<select class="form-control col-md-7 col-xs-12" id="id_kemasan" name="id_kemasan"><option value="">- Pilih -</option></select>';
    $data['inputHarga'] = '<input type="text" class="form-control col-md-7 col-xs-12" placeholder="Harga" id="harga" name="harga" disabled />';

		$this->content = 'backend/stok/FormCreateView';

    $headerAddCssJs['addJs'] = array(
      'public/core/Convert.js'
    );

		$footerAddJs = array(
      'assets/backend/vendors/progressbar/bootstrap-progressbar.min.js',
      'assets/backend/vendors/nicescroll/jquery.nicescroll.min.js',
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
			'public/master/backend/Stok.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs, $footerAddJs);
  }

  public function insert()
  {
    $status = trim($this->input->post('status', TRUE));
    $jumlah = trim($this->input->post('jumlah', TRUE));
    $id_daftarhargaitem = trim($this->input->post('id_daftarhargaitem', TRUE));

    $check = $this->db->get_where("tbl_stok", array("id_daftarhargaitem" => $id_daftarhargaitem))->num_rows();

    if (!empty($check)) {
      echo "Data sudah tersedia";
      return;
    }

    $data = array(
      'status' => $status,
      'jumlah' => $jumlah,
      'id_daftarhargaitem' => $id_daftarhargaitem
    );

    $this->StokModel->insertData($data);
  }

  public function edit($pk)
  {
    if (empty($pk)) {
      show_404();
    }

    // get data
    $this->db->select('
      a.*,
      b.harga,
      (SELECT id_madu FROM tbl_madu WHERE id_madu = b.id_madu) as id_madu,
      (SELECT nama FROM tbl_kemasan WHERE id_kemasan = b.id_kemasan) as id_kemasan
    ');
    $this->db->from('tbl_stok as a');
    $this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
    $this->db->where('a.id_stok', $pk);
    $value = $this->db->get()->row();

    // set value
    $data['id_stok'] = $value->id_stok;
    $data['status'] = $value->status;
    $data['jumlah'] = $value->jumlah;
    $data['id_madu'] = $value->id_madu;

    $data['valMadu'] = $this->db->get('tbl_madu')->result();
    $data['formId'] = 'form_edit';
    $data['inputKemasan'] = '<input type="text" class="form-control col-md-7 col-xs-12" placeholder="Kemasan" id="id_kemasan" name="id_kemasan" disabled value="'.$value->id_kemasan.'" />';
    $data['inputHarga'] = '<input type="text" class="form-control col-md-7 col-xs-12" placeholder="Harga" id="harga" name="harga" disabled value="'.$this->convert->FormatRupiah($value->harga).'" />';

		$this->content = 'backend/stok/FormEditView';

    $headerAddCssJs['addJs'] = array(
      'public/core/Convert.js'
    );

		$footerAddJs = array(
      'assets/backend/vendors/progressbar/bootstrap-progressbar.min.js',
      'assets/backend/vendors/nicescroll/jquery.nicescroll.min.js',
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
			'public/master/backend/Stok.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs, $footerAddJs);
  }

  public function update()
  {
    $id = trim($this->input->post('id_stok', TRUE));
    $status = trim($this->input->post('status', TRUE));
    $jumlah = trim($this->input->post('jumlah', TRUE));

    $data = array(
      'status' => $status,
      'jumlah' => $jumlah
    );

    $this->StokModel->updateData($id, $data);
  }

  public function view($pk)
  {
    if (empty($pk)) {
      show_404();
    }

    // get data
    $this->db->select('
      a.*,
      b.harga,
      (SELECT id_madu FROM tbl_madu WHERE id_madu = b.id_madu) as id_madu,
      (SELECT nama FROM tbl_kemasan WHERE id_kemasan = b.id_kemasan) as id_kemasan
    ');
    $this->db->from('tbl_stok as a');
    $this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
    $this->db->where('a.id_stok', $pk);
    $value = $this->db->get()->row();

    // set value
    $data['id_stok'] = $value->id_stok;
    $data['status'] = $value->status;
    $data['jumlah'] = $value->jumlah;
    $data['id_madu'] = $value->id_madu;

    $data['valMadu'] = $this->db->get('tbl_madu')->result();
    $data['formId'] = 'form_view';
    $data['inputKemasan'] = '<input type="text" class="form-control col-md-7 col-xs-12" placeholder="Kemasan" id="id_kemasan" name="id_kemasan" disabled value="'.$value->id_kemasan.'" />';
    $data['inputHarga'] = '<input type="text" class="form-control col-md-7 col-xs-12" placeholder="Harga" id="harga" name="harga" disabled value="'.$this->convert->FormatRupiah($value->harga).'" />';

		$this->content = 'backend/stok/FormViewView';

		$this->_backendLayout_($data, $headerAddCssJs=null, $footerAddJs=null);
  }

  public function save()
  {
    $id = trim($this->input->post('id_stok', TRUE));
    $status = trim($this->input->post('status', TRUE));
    $jumlah = trim($this->input->post('jumlah', TRUE));
    $id_daftarhargaitem = trim($this->input->post('id_daftarhargaitem', TRUE));

    $value = $this->StokModel->whereData($id);

    if (empty($value)) {
      $data = array(
        'status' => $status,
        'jumlah' => $jumlah,
        'id_daftarhargaitem' => $id_daftarhargaitem
      );

      $this->StokModel->insertData($data);
    } else {
      $data = array(
        'status' => $status,
        'jumlah' => $jumlah
      );

      $this->StokModel->updateData($id, $data);
    }
  }

  public function delete($pk = FALSE)
  {
    if (empty($pk)) {
      show_404();
    }

    $this->StokModel->deleteData($pk);

    redirect('app/stok');
  }

  public function getDetailKemasan()
  {
    $fk = $this->input->post('id_madu');

    $this->db->select('a.*, b.nama');
    $this->db->from('tbl_daftarhargaitem as a');
    $this->db->join('tbl_kemasan as b', 'a.id_kemasan = b.id_kemasan', 'left');
    $this->db->where('a.id_madu', $fk);
    $rows = $this->db->get()->result();

    echo '<option value="">- Pilih -</option>';
    foreach ($rows as $row) {
      echo '<option value="'.$row->id_kemasan.'">'.ucfirst($row->nama).'</option>';
    }
  }

  public function getDetailHarga()
  {
    $id_madu = $this->input->post('id_madu');
    $id_kemasan = $this->input->post('id_kemasan');

    $this->db->where('id_madu', $id_madu);
    $this->db->where('id_kemasan', $id_kemasan);
    $this->db->from('tbl_daftarhargaitem');
    $rows = $this->db->get()->result();

    // $data = array();
    foreach ($rows as $row) {
      $data = array(
        'harga' => $row->harga,
        'id_daftarhargaitem' => $row->id_daftarhargaitem
      );
    }

    echo json_encode($data, JSON_PRETTY_PRINT);
  }

  public function print_pdf($pk)
  {
    if (empty($pk)) {
      show_404();
    }

    // get data
    $this->db->select('
      a.*,
      b.harga,
      (SELECT nama FROM tbl_madu WHERE id_madu = b.id_madu) as id_madu,
      (SELECT nama FROM tbl_kemasan WHERE id_kemasan = b.id_kemasan) as id_kemasan
    ');
    $this->db->from('tbl_stok as a');
    $this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
    $this->db->where('a.id_stok', $pk);
    $value = $this->db->get()->row();

    // set value
    $data['id_stok'] = $value->id_stok;
    $data['status'] = $value->status;
    $data['jumlah'] = $value->jumlah;
    $data['id_madu'] = $value->id_madu;
    $data['id_kemasan'] = $value->id_kemasan;
    $data['harga'] = $value->harga;

    // create pdf
    ob_start();
		$this->load->view('backend/stok/PrintPdfView', $data);
		$html = ob_get_contents();
		ob_end_clean();

		require_once('./assets/backend/plugins/mpdf/mpdf.php');
		$pdf = new mPDF('utf-8', 'A4');
		$pdf->AddPage('P');
		$pdf->WriteHtml($html);
		$pdf->Output('PrintPenerimaan.pdf', 'I');
  }

}

/* End of file Stok.php */
/* Location: ./application/controllers/app/Stok.php */
