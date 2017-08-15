<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends READY_Controller {

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    $this->load->model('OrderModel');
    $this->load->library('convert');
  }

  public function pelanggan()
  {
    $data['titlePage'] = 'List Data Pelanggan';
    $data['values'] = $this->OrderModel->listData();

		$this->content = 'backend/order/IndexView';

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

  	public function form($url_pk=FALSE, $param=FALSE)
  	{
  		if (empty($url_pk)) {
  			show_404();
  		} elseif (!empty($param) && $param!="view") {
  			show_404();
  		}

  		$data['titlePage'] = 'Order Data Pelanggan';

  		// replace url from - to /
  		$pk = str_replace('-', '/', $url_pk);

  		// get data
  		$this->db->select('
  			a.kode_order, a.total_pembayaran, a.tanggal_order, a.tanggal_penerimaan, a.status, a.bukti_transfer,
  			b.nama as id_pelanggan,
  			c.nama as id_kedai
  		');
  		$this->db->from('tbl_order as a');
  		$this->db->join('tbl_pelanggan as b', 'a.id_pelanggan = b.id_pelanggan', 'left');
  		$this->db->join('tbl_kedai as c', 'a.id_kedai = c.id_kedai', 'left');
  		$this->db->where('a.kode_order', $pk);
  		$master = $this->db->get()->row();

  		$this->db->select('
  			a.jumlah,
  			d.nama as id_madu,
        e.nama as id_kemasan
  		');
  		$this->db->from('tbl_order_item as a');
      $this->db->join('tbl_stok as b', 'a.id_stok = b.id_stok', 'left');
      $this->db->join('tbl_daftarhargaitem as c', 'b.id_daftarhargaitem = c.id_daftarhargaitem', 'left');
      $this->db->join('tbl_madu as d', 'c.id_madu = d.id_madu', 'left');
      $this->db->join('tbl_kemasan as e', 'c.id_kemasan = e.id_kemasan', 'left');
  		$this->db->where('a.kode_order', $pk);
  		$data['detail'] = $this->db->get()->result();

  		// set value
  		$data['kode_order'] = $master->kode_order;
  		$data['total_pembayaran'] = $this->convert->FormatRupiah($master->total_pembayaran);
  		$data['tanggal_order'] = $master->tanggal_order;
  		$data['tanggal_penerimaan'] = ($master->tanggal_penerimaan==0 ? null : $master->tanggal_penerimaan);
  		$data['status'] = $master->status;
      $data['bukti_transfer'] = $master->bukti_transfer;
  		$data['id_pelanggan'] = $master->id_pelanggan;
  		$data['id_kedai'] = $master->id_kedai;

  		// set disabled
  		$data['statusDisable'] = ($param=="view" ? "disabled" : null);

      // btn action
      if ($param=="view") {
        $data['btnAction'] = anchor('app/order/print_pdf/'.str_replace('/', '-', $master->kode_order), 'Print', 'class="btn btn-success" target="_blank"');
      } else {
        $data['btnAction'] = '<button type="submit" class="btn btn-success" id="_btnSubmit_" name="_btnSubmit_">Simpan</button>';
      }


  		$this->content = 'backend/order/FormView';

		$footerAddJs = array(
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
			'public/master/backend/Order.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs=FALSE, $footerAddJs);
  	}

  	public function save()
  	{
  		$kode_order = $this->input->post('kode_order');
  		$status = $this->input->post('status');

  		if (empty($kode_order) || empty($status)) {
  			show_404();
  		}

  		$data = $this->db->get_where('tbl_order', array('kode_order' => $kode_order))->num_rows();

  		if (empty($data)) {
  			show_404();
  		}

  		$this->db->where('kode_order', $kode_order);
  		$this->db->update('tbl_order', array('status' => $status));
  	}

    public function print_pdf($pk)
    {
      if (empty($pk)) {
        show_404();
      }

      // replace url from - to /
  		$pk = str_replace('-', '/', $pk);

      // get data
  		$this->db->select('
  			a.kode_order, a.total_pembayaran, a.tanggal_order, a.tanggal_penerimaan, a.status, a.bukti_transfer,
  			b.nama as id_pelanggan,
  			c.nama as id_kedai
  		');
  		$this->db->from('tbl_order as a');
  		$this->db->join('tbl_pelanggan as b', 'a.id_pelanggan = b.id_pelanggan', 'left');
  		$this->db->join('tbl_kedai as c', 'a.id_kedai = c.id_kedai', 'left');
  		$this->db->where('a.kode_order', $pk);
  		$master = $this->db->get()->row();

  		$this->db->select('
  			a.jumlah,
  			d.nama as id_madu,
        e.nama as id_kemasan
  		');
  		$this->db->from('tbl_order_item as a');
      $this->db->join('tbl_stok as b', 'a.id_stok = b.id_stok', 'left');
      $this->db->join('tbl_daftarhargaitem as c', 'b.id_daftarhargaitem = c.id_daftarhargaitem', 'left');
      $this->db->join('tbl_madu as d', 'c.id_madu = d.id_madu', 'left');
      $this->db->join('tbl_kemasan as e', 'c.id_kemasan = e.id_kemasan', 'left');
  		$this->db->where('a.kode_order', $pk);
  		$data['detail'] = $this->db->get()->result();

  		// set value
  		$data['kode_order'] = $master->kode_order;
  		$data['total_pembayaran'] = $this->convert->FormatRupiah($master->total_pembayaran);
  		$data['tanggal_order'] = $master->tanggal_order;
  		$data['tanggal_penerimaan'] = ($master->tanggal_penerimaan==0 ? null : $master->tanggal_penerimaan);
  		$data['status'] = $master->status;
      $data['bukti_transfer'] = $master->bukti_transfer;
  		$data['id_pelanggan'] = $master->id_pelanggan;
  		$data['id_kedai'] = $master->id_kedai;

      // create pdf
      ob_start();
  		$this->load->view('backend/order/PrintPdfView', $data);
  		$html = ob_get_contents();
  		ob_end_clean();

  		require_once('./assets/backend/plugins/mpdf/mpdf.php');
  		$pdf = new mPDF('utf-8', 'A4');
  		$pdf->AddPage('P');
  		$pdf->WriteHtml($html);
  		$pdf->Output('PrintPenerimaan.pdf', 'I');
    }

}

/* End of file Order.php */
/* Location: ./application/controllers/app/Order.php */
