<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends READY_Controller {

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('login')!=TRUE) {
			redirect("app/login", "refresh");
		}

    if ($this->session->userdata("login")==TRUE && $this->session->userdata("tingkat")!="1") {
      show_404();
    }

    $this->load->model('PengirimanModel');
    $this->load->library('convert');
  }

  public function barang()
  {
    $data['titlePage'] = 'Daftar Pengiriman Barang';
    $data['values']    = $this->PengirimanModel->listData_Menunggu();
    $this->content     = 'backend/pengiriman/IndexView_Menunggu';

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

  public function barang_diterima()
  {
    $data['titlePage'] = 'Daftar Pengiriman Barang Diterima';
    $data['values']    = $this->PengirimanModel->listData_Diterima();
    $this->content     = 'backend/pengiriman/IndexView_Diterima';

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

  public function barang_retur()
  {
    $data['titlePage'] = 'Daftar Pengiriman Barang Retur';
    $data['values']    = $this->PengirimanModel->listData_Retur();
    $this->content     = 'backend/pengiriman/IndexView_Retur';

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

  public function barang_resend()
  {
    $data['titlePage'] = 'Daftar Pengiriman Barang Resend';
    $data['values']    = $this->PengirimanModel->listData_Resend();
    $this->content     = 'backend/pengiriman/IndexView_Resend';

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

  public function create()
  {
    // set data
    $data['titlePage']    = 'Buat Pengiriman Madu';

    $this->db->from('tbl_pengiriman');
    $this->db->order_by('kode_pengiriman', 'desc');
    $row = $this->db->get()->row();
    $getData    = (isset($row->kode_pengiriman) ? $row->kode_pengiriman : null);
    $cutCode    = substr($getData, 8);
    $queue      = ($cutCode==0 ? 1 : $cutCode+1);
    $createCode = "PGN/MAD/".$queue;
    $data['generateCode'] = $createCode;
    
    $data['formId']       = 'form_create';
    $data['valGudang']    = $this->db->get('tbl_gudang')->result();
    $data['valOrder']     = $this->db->get_where('tbl_order', array('status' => '2'))->result();
    
    $this->db->select('
      a.id_stok, a.jumlah,
        c.nama as jenis_madu,
        d.nama as kemasan
    ');
    $this->db->from('tbl_stok as a');
    $this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
    $this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
    $this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
    $this->db->where('a.status', '1');
    $data['valStok'] = $this->db->get()->result();

		$this->content = 'backend/pengiriman/FormView_Create';

		$footerAddJs = array(
			'assets/backend/vendors/fastclick/lib/fastclick.js',
			'assets/backend/vendors/validator/validator.js',
      'assets/backend/vendors/moment/moment.min.js',
      'assets/backend/vendors/datepicker/daterangepicker.js',
			'public/master/backend/PengirimanBarang.js'
		);

		$this->_backendLayout_($data, $headerAddCssJs = null, $footerAddJs);
  }

  public function insert()
  {
    $this->form_validation->set_rules('kode_pengiriman', 'kode pengiriman', 'trim|required|min_length[5]|is_unique[tbl_pengiriman.kode_pengiriman]');
    $this->form_validation->set_rules('tanggal_pengiriman', 'tanggal pengiriman', 'trim|required');
    $this->form_validation->set_rules('id_gudang', 'gudang', 'trim|required');
    $this->form_validation->set_rules('kode_order', 'kode order', 'trim|required');
    $this->form_validation->set_rules('id_stok[]', 'stok', 'trim|required');
    $this->form_validation->set_rules('jumlah[]', 'jumlah', 'trim|required');

    $tmp_stok = $this->input->post('id_stok');
    $tmp_jumlah = $this->input->post('jumlah');

    $count_stok = count($tmp_stok);
    $count_jumlah = count($tmp_jumlah);

    if ($count_stok==$count_jumlah) {
      $count_max = $count_stok;
    } elseif ($count_stok<$count_jumlah) {
      $count_max = $count_jumlah;
    } elseif ($count_stok>$count_jumlah) {
      $count_max = $count_stok;
    } else {
      $count_max = 0;
    }

    $check_detail_sum = $this->db->get_where('tbl_order_item', array('kode_order' => $this->input->post('kode_order')))->num_rows();

    if ($check_detail_sum!=$count_max) {
      $this->session->set_flashdata('infoDetailError', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Data pengiriman madu tidak sesuai dengan data order
                    </div>');

        redirect('app/pengiriman/create','refresh');
    }

    for ($i=0; $i < $count_max; $i++) { 
      $this->db->where('kode_order', $this->input->post('kode_order'));
      $this->db->where('id_stok', $tmp_stok[$i]);
      $this->db->where('jumlah', $tmp_jumlah[$i]);
      $this->db->from('tbl_order_item');
      $check_detail = $this->db->get()->num_rows();

      if (empty($check_detail)) {
        $this->session->set_flashdata('infoDetailError', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Silahkan cek pengiriman jenis madu - kemasan dan jumlah, karena tidak sama dengan data order
                    </div>');

        redirect('app/pengiriman/create','refresh');
      }
    }

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $pk                 = $this->input->post('kode_pengiriman');
      $tanggal_pengiriman = $this->input->post('tanggal_pengiriman');
      $id_gudang          = $this->input->post('id_gudang');
      $kode_order         = $this->input->post('kode_order');
      $id_stok            = $this->input->post('id_stok');
      $jumlah             = $this->input->post('jumlah');

      $data = array(
        'kode_pengiriman'    => $pk,
        'tanggal_pengiriman' => date("Y-m-d", strtotime($tanggal_pengiriman)),
        'status'             => '1',
        'id_gudang'          => $id_gudang,
        'kode_order'         => $kode_order
      );
      $this->PengirimanModel->insertData($data);

      $countStok   = count($id_stok);
      $countJumlah = count($jumlah);

      if ($countStok==$countJumlah) {
        $countMax = $countStok;
      } elseif ($countStok<$countJumlah) {
        $countMax = $countJumlah;
      } elseif ($countStok>$countJumlah) {
        $countMax = $countStok;
      } else {
        $countMax = 0;
      }

      for ($i=0; $i<$countMax; $i++) {
        if (isset($id_stok[$i]) && isset($jumlah[$i])) {
          $postStok = $id_stok[$i];
          $postJumlah = $jumlah[$i];
        } elseif (isset($id_stok[$i]) && !isset($jumlah[$i])) {
          $postStok = $id_stok[$i];
          $postJumlah = 0;
        } elseif (!isset($id_stok[$i]) && isset($jumlah[$i])) {
          $postStok = 0;
          $postJumlah = $jumlah[$i];
        } else {
          $postStok = 0;
          $postJumlah = 0;
        }

        $postDetail = array(
          'jumlah'          => $postJumlah,
          'kode_pengiriman' => $pk,
          'id_stok'         => $postStok
        );
        $this->PengirimanModel->insertDataDetailOne($postDetail);
      }

      redirect("app/pengiriman/barang", "refresh");
    }

  }

  public function view($pk, $url = NULL)
  {
    if (empty($pk)) {
      show_404();
    }

    // set title
    $data['titlePage'] = 'Lihat Pengiriman Barang';
    $data['url'] = $url;

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

    $this->content = 'backend/pengiriman/FormView_Lihat';

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
    if (empty($pk)) {
      show_404();
    }

    // set title
    $data['titlePage'] = 'Perbaru Pengiriman Retur';

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

    $this->content = 'backend/pengiriman/FormView_Retur';

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
    $this->form_validation->set_rules('kode_pengiriman', 'kode pengiriman', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');

    $kode_pengembalian = $this->input->post('kode_pengembalian');
    $jumlah = $this->input->post('resend_jumlah_');
    $jumlah_retur = $this->input->post('resend_jumlahretur_');

    for ($i=0; $i < count($kode_pengembalian); $i++) { 
      if (isset($jumlah[$i]) && isset($jumlah_retur[$i])) {
        if ($jumlah[$i]<$jumlah_retur[$i]) {
          $this->session->set_flashdata('infoDetailError', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Jumlah retur melebihi jumlah pengiriman.
                    </div>');

          redirect('app/pengiriman/edit_retur/'.str_replace('/', '-', $this->input->post('kode_pengiriman')),'refresh');
        }
      }
    }

    for ($i=0; $i < count($jumlah_retur); $i++) { 
      if (!empty($this->input->post('status')) && empty($jumlah_retur[$i])) {
        $this->session->set_flashdata('infoDetailError', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Jumlah resend belum di isi.
                    </div>');

        redirect('app/pengiriman/edit_retur/'.str_replace('/', '-', $this->input->post('kode_pengiriman')),'refresh');
      }
    }

    if ($this->form_validation->run() == FALSE) {
      $this->edit_retur(str_replace('/', '-', $this->input->post('kode_pengiriman')));
    } else {
      $pk     = $this->input->post('kode_pengiriman');
      $status = $this->input->post('status');

      $data = array(
        'status' => $status
      );
      $this->PengirimanModel->updateData($pk, $data);

      if ($status=='4') {
        $master = array(
          'tanggal_resend' => date("Y-m-d"),
          'status' => 2
        );
        $this->db->where('kode_pengembalian', $kode_pengembalian[0]);
        $this->db->update('tbl_pengembalian', $master);
      }

      redirect("app/pengiriman/barang_retur", "refresh");
    }
  }

  public function getDataOrder()
  {
    $kode_order = $this->input->post('kode_order');

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
    $this->db->where('a.kode_order', $kode_order);
    $data = $this->db->get()->result();

    $no = 1;
    foreach ($data as $val) {
      echo '<tr>';
        echo '<td>'.$no++.'</td>';
        echo '<td>'.$val->id_madu.'</td>';
        echo '<td>'.$val->id_kemasan.'</td>';
        echo '<td>'.$val->jumlah.'</td>';
      echo '</tr>';
    }

  }

  public function getJumlahStok()
  {
    $id_stok = $this->input->post('id_stok');

    if (empty($id_stok)) {
      show_404();
    }

    echo $this->db->get_where('tbl_stok', array('id_stok' => $id_stok))->row()->jumlah;
  }

  public function getDataStok()
  {
    $this->db->select('
      a.id_stok, a.jumlah,
        c.nama as jenis_madu,
        d.nama as kemasan
    ');
    $this->db->from('tbl_stok as a');
    $this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
    $this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
    $this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
    $this->db->where('a.status', '1');
    $values = $this->db->get()->result();

    echo '<option value="">- Pilih -</pilih>';
    foreach ($values as $row) {
      echo '<option value="'.$row->id_stok.'">'.ucfirst($row->jenis_madu.' - '.$row->kemasan).'</option>';
    }
  }

  public function print_pdf($pk)
  {
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
    $data['valGudang']          = $this->db->get('tbl_gudang')->result();
    $data['valKedai']           = $this->db->get('tbl_kedai')->result();
    $data['valuesDetail']       = (empty($valuesDetail) ? null : $valuesDetail);

    // create pdf
    ob_start();
		$this->load->view('backend/pengiriman/PrintPdfView_Barang', $data);
		$html = ob_get_contents();
		ob_end_clean();

		require_once('./assets/backend/plugins/mpdf/mpdf.php');
		$pdf = new mPDF('utf-8', 'A4');
		$pdf->AddPage('P');
		$pdf->WriteHtml($html);
		$pdf->Output('PrintPenerimaan.pdf', 'I');
  }

  public function print_pdf_retur($pk)
  {
    if (empty($pk)) {
      show_404();
    }

    // get data
    $value = $this->PengirimanModel->whereData(str_replace('-', '/', $pk));
    $valuesDetail = $this->PengirimanModel->listDataDetailTwo($value->kode_order);

    // set value
    $data['kode_pengiriman']    = $value->kode_pengiriman;
    $data['tanggal_pengiriman'] = $value->tanggal_pengiriman;
    $data['status']             = $value->status;
    $data['id_gudang']          = $this->db->get_where("tbl_gudang", array("id_gudang" => $value->id_gudang))->row()->nama;
    $data['kode_order']         = $value->kode_order;
    $data['catatan']            = $value->catatan;
    $data['valGudang']          = $this->db->get('tbl_gudang')->result();
    $data['valKedai']           = $this->db->get('tbl_kedai')->result();
    $data['valuesDetail']       = (empty($valuesDetail) ? null : $valuesDetail);

    // create pdf
    ob_start();
    $this->load->view('backend/pengiriman/PrintPdfView_Barang', $data);
    $html = ob_get_contents();
    ob_end_clean();

    require_once('./assets/backend/plugins/mpdf/mpdf.php');
    $pdf = new mPDF('utf-8', 'A4');
    $pdf->AddPage('P');
    $pdf->WriteHtml($html);
    $pdf->Output('PrintPenerimaan.pdf', 'I');
  }

}

/* End of file Pengiriman.php */
/* Location: ./application/controllers/app/Pengiriman.php */
