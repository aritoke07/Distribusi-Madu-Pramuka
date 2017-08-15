<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends READY_Controller {

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    $this->load->model('PengirimanModel');
    $this->load->model('PenerimaanModel');
    $this->load->library('convert');
  }

  public function barang()
  {
    if ($this->session->userdata('tingkat')!="2") {
      show_404();
    }

    $data['titlePage'] = 'Daftar Pengiriman Barang';
    $data['values']    = $this->PengirimanModel->listData();
    $this->content     = 'backend/penerimaan/IndexView_Barang';

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

  public function view($pk)
  {
    if ($this->session->userdata('tingkat')!="2") {
      show_404();
    }

    if (empty($pk)) {
      show_404();
    }

    // set title
    $data['titlePage'] = 'Lihat Pengiriman Barang';

    // get data
    $value = $this->PengirimanModel->whereData(str_replace('-', '/', $pk));
    $valuesDetail = $this->PengirimanModel->listDataDetailOne(str_replace('-', '/', $pk));
    $valuesDetail2 = $this->PengirimanModel->listDataDetailTwo($value->kode_order);

    // set value
    $data['kode_pengiriman']    = $value->kode_pengiriman;
    $data['tanggal_pengiriman'] = $value->tanggal_pengiriman;
    $data['status']             = $value->status;
    $data['id_gudang']          = $value->id_gudang;
    $data['kode_order']         = $value->kode_order;
    $data['catatan']            = $value->catatan;
    $data['valGudang']          = $this->db->get('tbl_gudang')->result();
    $data['valKedai']           = $this->db->get('tbl_kedai')->result();
    $data['valuesDetail']       = (empty($valuesDetail) ? null : $valuesDetail);
    $data['valuesDetail2'] = (empty($valuesDetail2) ? null : $valuesDetail2);

    $this->content = 'backend/penerimaan/FormView_BarangLihat';

		$footerAddJs = array(
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
      'assets/backend/vendors/moment/moment.min.js',
      'assets/backend/vendors/datepicker/daterangepicker.js',
			'public/master/backend/PengirimanBarang.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs = null, $footerAddJs);
  }

  public function edit_retur($pk)
  {
    if ($this->session->userdata('tingkat')!="2") {
      show_404();
    }

    if (empty($pk)) {
      show_404();
    }

    // set title
    $data['titlePage'] = 'Perbaru Pengiriman';

    // get data
    $value = $this->PengirimanModel->whereData(str_replace('-', '/', $pk));
    $valuesDetail = $this->PengirimanModel->listDataDetailOne(str_replace('-', '/', $pk));

    // set value
    $data['kode_pengiriman']    = $value->kode_pengiriman;
    $data['tanggal_pengiriman'] = $value->tanggal_pengiriman;
    $data['status']             = $value->status;
    $data['id_gudang']          = $value->id_gudang;
    $data['kode_order']         = $value->kode_order;
    $data['catatan']            = $value->catatan;
    $data['valGudang']          = $this->db->get('tbl_gudang')->result();
    $data['valKedai']           = $this->db->get('tbl_kedai')->result();
    $data['valuesDetail']       = (empty($valuesDetail) ? null : $valuesDetail);

    $this->content = 'backend/penerimaan/FormView_BarangEdit';

		$footerAddJs = array(
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
      'assets/backend/vendors/moment/moment.min.js',
      'assets/backend/vendors/datepicker/daterangepicker.js',
			'public/master/backend/PengirimanBarang.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs = null, $footerAddJs);
  }

  public function update()
  {
    if ($this->session->userdata('tingkat')!="2") {
      show_404();
    }

    $this->form_validation->set_rules('kode_pengiriman', 'kode pengiriman', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');
    $this->form_validation->set_rules('kode_order', 'kode order', 'trim|required');

    $idItem = $this->input->post('id_pengirimanitem');
    $jumlah = $this->input->post('jumlah');
    $jumlahretur = $this->input->post('jumlahretur');

    for ($i=0; $i < count($idItem); $i++) { 
      if ($jumlah[$i]<$jumlahretur[$i]) {
        $this->session->set_flashdata('infoDetailError', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Jumlah retur melebihi jumlah pengiriman.
                    </div>');

        redirect('app/penerimaan/edit_retur/'.str_replace('/', '-', $this->input->post('kode_pengiriman')),'refresh');
      }
    }

    if ($this->form_validation->run() == FALSE) {
      $pk = str_replace('/', '-', $this->input->post('kode_pengiriman', TRUE));

      $this->edit_retur($pk);
    } else {
      $pk     = $this->input->post('kode_pengiriman');
      $status = $this->input->post('status');
      $fk     = $this->input->post('kode_order');
      $catatan = $this->input->post('catatan');

      $data = array(
        'status' => $status,
        'catatan' => $catatan
      );
      $this->PengirimanModel->updateData($pk, $data);

      if ($status=='2') {
        // update status pengembalian
        $this->db->where('kode_order', $fk);
        $this->db->update('tbl_pengembalian', array('status' => 3));

        // kurangi data stok
        $this->db->where('kode_order', $fk);
        $this->db->from('tbl_order_item');
        $rows = $this->db->get()->result();

        foreach ($rows as $row) {
          $rowStok = $this->db->get_where('tbl_stok', array('id_stok' => $row->id_stok))->row();
          if ($rowStok->jumlah==0) {
            $result = 0;
          } else {
            $result = $rowStok->jumlah - $row->jumlah;
          }

          $this->db->where('id_stok', $row->id_stok);
          $this->db->update('tbl_stok', array('jumlah' => $result));
        }

        // update jika sudah di terima
        $this->db->where('kode_order', $fk);
        $this->db->update('tbl_order', array('status' => '3', 'tanggal_penerimaan' => date("Y-m-d")));
      }

      if ($status=='3') {
        $this->db->from('tbl_pengembalian');
        $this->db->order_by('kode_pengembalian', 'desc');
        $row = $this->db->get()->row();
        $getData    = (isset($row->kode_pengembalian) ? $row->kode_pengembalian : null);
        $cutCode    = substr($getData, 8);
        $queue      = ($cutCode==0 ? 1 : $cutCode+1);
        $createCode = "RTR/MAD/".$queue;

        $dataPengembalian = array(
          'kode_pengembalian' => $createCode,
          'tanggal_pengembalian' => date("Y-m-d"),
          'status' => 1,
          'catatan' => $catatan,
          'kode_order' => $fk
        );
        $this->db->insert('tbl_pengembalian', $dataPengembalian);

        $idItem = $this->input->post('id_pengirimanitem');
        $jumlah = $this->input->post('jumlah');
        $jumlahretur = $this->input->post('jumlahretur');

        for ($i=0; $i < count($idItem); $i++) {
          if (!empty($jumlahretur[$i])) {
              $dataPengembalianItem = array(
              'jumlah' => $jumlahretur[$i],
              'id_pengirimanitem' => $idItem[$i],
              'kode_pengembalian' => $createCode
            );
            $this->db->insert('tbl_pengembalian_item', $dataPengembalianItem);
          }
        }
      }

      redirect("app/penerimaan/barang", "refresh");
    }
  }

  public function print_pdf($pk)
  {
    if ($this->session->userdata('tingkat')!="2") {
      show_404();
    }

    if (empty($pk)) {
      show_404();
    }

    // get data
    $value = $this->PengirimanModel->whereData(str_replace('-', '/', $pk));
    $valuesDetail = $this->PengirimanModel->listDataDetailOne(str_replace('-', '/', $pk));

    // set value
    $data['kode_pengiriman']    = $value->kode_pengiriman;
    $data['tanggal_pengiriman'] = $value->tanggal_pengiriman;
    $data['status']             = $value->status;
    $data['id_gudang']          = $this->db->get_where("tbl_gudang", array("id_gudang" => $value->id_gudang))->row()->nama;
    $data['kode_order']         = $value->kode_order;
    $data['catatan']            = $value->catatan;
    $data['valuesDetail']       = (empty($valuesDetail) ? null : $valuesDetail);

    // create pdf
    ob_start();
		$this->load->view('backend/penerimaan/PrintPdfView_Barang', $data);
		$html = ob_get_contents();
		ob_end_clean();

		require_once('./assets/backend/plugins/mpdf/mpdf.php');
		$pdf = new mPDF('utf-8', 'A4');
		$pdf->AddPage('P');
		$pdf->WriteHtml($html);
		$pdf->Output('PrintPenerimaan.pdf', 'I');
  }

}

/* End of file Penerimaan.php */
/* Location: ./application/controllers/app/Penerimaan.php */
