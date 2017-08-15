<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends READY_Controller {

	public function index()
	{
    if ($this->session->userdata("login")==FALSE) {
			redirect("register", "refresh");
		}

    $this->content = 'frontend/pelanggan/IndexView';

    $headerAddCssJs['addCss'] = array(
      'assets/backend/vendors/progressbar/bootstrap-progressbar-3.3.0.css',
      'assets/backend/plugins/jQuery-File-Upload-master/css/jquery.fileupload.css'
    );

    $footerAddJs = array(
      'assets/backend/plugins/jQuery-File-Upload-master/js/vendor/jquery.ui.widget.js',
      'assets/backend/plugins/jQuery-File-Upload-master/js/jquery.iframe-transport.js',
      'assets/backend/plugins/jQuery-File-Upload-master/js/jquery.fileupload.js',
      'public/master/frontend/Pelanggan.js'
    );

		$this->_FrontendLayout_($data = FALSE, $headerAddCssJs, $footerAddJs);
	}

  public function process()
  {
		$this->form_validation->set_rules('username_login', 'username_login', 'trim|required');
		$this->form_validation->set_rules('password_login', 'password_login', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
			redirect("register", "refresh");
		} else {
      $username = $this->input->post("username_login", TRUE);
      $password = md5($this->input->post("password_login", TRUE));

      $this->db->where("username", $username);
      $this->db->where("password", $password);
      $this->db->where('tanggal_keluar', null);
      $this->db->from("tbl_pelanggan");
      $result = $this->db->get();

      if ($result->num_rows()=="1") {
        $dataSession = array(
  				'nama' => $result->row()->nama,
  				'email' => $result->row()->email,
  				'username' => $result->row()->username,
          'id' => $result->row()->id_pelanggan,
  				'login' => TRUE
  			);
  			$this->session->set_userdata($dataSession);

  			redirect("pelanggan", "refresh");
      } else {
        $this->session->set_flashdata('notifWrongUserPass', '<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													Salah username and password
											  	</div>');

        redirect("register", "refresh");
      }
    }
  }

	public function process_modal()
	{
		$username = $this->input->post("username", TRUE);
		$password = $this->input->post("password", TRUE);

		if (empty($username) || empty($password)) {
			echo "Harap lengkapi data form login";
			return;
		} else {
			$this->db->where("username", $username);
      $this->db->where("password", md5($password));
      $this->db->where('tanggal_keluar', null);
      $this->db->from("tbl_pelanggan");
      $result = $this->db->get();

      if ($result->num_rows()=="1") {
        $dataSession = array(
  				'nama' => $result->row()->nama,
  				'email' => $result->row()->email,
  				'username' => $result->row()->username,
          'id' => $result->row()->id_pelanggan,
  				'login' => TRUE
  			);
  			$this->session->set_userdata($dataSession);

  			redirect("pelanggan", "refresh");
      } else {
        echo "Salah username dan password";
				return;
      }
		}
	}

  public function logout()
  {
		$this->session->sess_destroy();

		redirect(site_url());
	}

  public function data_pengguna($pk)
  {
    if (empty($pk)) {
      show_404();
    }

    $data['row'] = $this->db->get_where('tbl_pelanggan', array('username' => $pk))->row();

    $this->content = 'frontend/pelanggan/DatapenggunaView';

    $footerAddJs = array(
      'public/master/frontend/Pelanggan.js'
    );

    $this->_FrontendLayout_($data, $headerAddCssJs = FALSE, $footerAddJs);    
  }

  public function update_password()
  {
    $password_1 = $this->input->post('password_1');
    $password_2 = $this->input->post('password_2');

    if (empty($password_1) || empty($password_2)) {
      show_404();
    }

    $this->db->from('tbl_pelanggan');
    $this->db->where('username', $this->session->userdata('username'));
    $this->db->where('password', md5($password_1));
    $data = $this->db->get()->row();

    if ($data->password!='') {
      $this->db->where('username', $this->session->userdata('username'));
      $this->db->update('tbl_pelanggan', array('password' => md5($password_2)));

      echo "Password sudah di perbarui";
    } else {
      echo "Password yang lama tidak sesuai";
    }    
  }

  public function update()
  {
    $nama      = $this->input->post('nama');
    $alamat    = $this->input->post('alamat');
    $telp      = $this->input->post('telp');
    $handphone = $this->input->post('handphone');
    $email     = $this->input->post('email');

    if (empty($nama) && empty($alamat) && empty($telp) && empty($handphone) && empty($email)) {
      show_404();
    }

    $this->db->from('tbl_pelanggan');
    $this->db->where('username', $this->session->userdata('username'));
    $data = $this->db->get()->row();

    if ($data->username!='') {
      $data = array(
        'nama' => $nama,
        'alamat' => $alamat,
        'telp' => $telp,
        'handphone' => $handphone,
        'email' => $email
      );
      $this->db->where('username', $this->session->userdata('username'));
      $this->db->update('tbl_pelanggan', $data);

      echo "Data sudah diperbarui";
    } else {
      echo "Data tidak ditemukan";
    }    
  }

  public function delete($pk)
  {
    if (empty($pk)) {
      show_404();
    }

    $this->db->where('username', $pk);
    $this->db->update('tbl_pelanggan', array('tanggal_keluar' => date("Y-m-d")));

    $this->session->sess_destroy();

    redirect(base_url(),'refresh');
  }

  public function checkout()
  {
    $filename = $this->input->post('filename');

    if (empty($filename)) {
      show_404();
    }

    foreach ($this->cart->contents() as $val) {
      $id_kedai = $val['options']['kedai'];
    }

    $this->db->from('tbl_order');
    $this->db->order_by('kode_order', 'desc');
    $row = $this->db->get()->row();
    $getData = (isset($row->kode_order) ? $row->kode_order : null);
    $cutCode = substr($getData, 8);

    $queue = ($cutCode==0 ? 1 : $cutCode+1);
    $createCode = "ODR/MAD/".$queue;

    $data = array(
      'kode_order' => $createCode,
      'total_pembayaran' => $this->cart->total(),
      'tanggal_order' => date("Y-m-d"),
      'status' => 1,
      'bukti_transfer' => $filename,
      'id_pelanggan' => $this->session->userdata('id'),
      'id_kedai' => $id_kedai
    );
    $this->db->insert('tbl_order', $data);

    foreach ($this->cart->contents() as $val) {
      $detail = array(
        'jumlah' => $val['qty'],
        'kode_order' => $createCode,
        'id_stok' => $val['id']
      );
      $this->db->insert('tbl_order_item', $detail);
    }
  }

  public function list_order()
  {
    $this->load->library('convert');

    // get data
    $this->db->where('id_pelanggan', $this->session->userdata('id'));
    $this->db->from('tbl_order');
    $values = $this->db->get()->result(); 

    $data['pro_order'] = $values;

    // remove all cart
    if ($this->cart->total()!=0) {
      $this->cart->destroy();
    }

    $this->content = 'frontend/pelanggan/ListOrderView';

    $footerAddJs = array(
      'public/master/frontend/Pelanggan.js'
    );

    $this->_FrontendLayout_($data, $headerAddCssJs = FALSE, $footerAddJs);
  }

  public function print_order($url_kode_order=FALSE, $id_pelanggan=FALSE)
  {
    if (empty($url_kode_order) || empty($id_pelanggan)) {
      show_404();
    }

    $this->load->library('convert');

    // replace url from - to /
    $kode_order = str_replace('-', '/', $url_kode_order);

    // get data master
    $this->db->select('
      a.kode_order, a.total_pembayaran, a.tanggal_order, a.tanggal_penerimaan, a.status, a.bukti_transfer,
      b.nama as id_pelanggan,
      c.nama as id_kedai
    ');
    $this->db->from('tbl_order as a');
    $this->db->join('tbl_pelanggan as b', 'a.id_pelanggan = b.id_pelanggan', 'left');
    $this->db->join('tbl_kedai as c', 'a.id_kedai = c.id_kedai', 'left');
    $this->db->where('a.kode_order', $kode_order);
    $this->db->where('a.id_pelanggan', $id_pelanggan);
    $master = $this->db->get()->row();

    // get data detail
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
    $data['detail'] = $this->db->get()->result();

    // set value
    $data['kode_order'] = $master->kode_order;
    $data['total_pembayaran'] = $this->convert->FormatRupiah($master->total_pembayaran);
    $data['tanggal_order'] = $master->tanggal_order;
    $data['tanggal_penerimaan'] = ($master->tanggal_penerimaan==0 ? null : $master->tanggal_penerimaan);
    $data['status'] = $this->convert->OrderStatus($master->status);
    $data['id_pelanggan'] = $master->id_pelanggan;
    $data['id_kedai'] = $master->id_kedai;

    // create pdf
    ob_start();
    $this->load->view('frontend/pelanggan/PrintPdfView', $data);
    $html = ob_get_contents();
    ob_end_clean();

    require_once('./assets/backend/plugins/mpdf/mpdf.php');
    $pdf = new mPDF('utf-8', 'A4');
    $pdf->AddPage('P');
    $pdf->WriteHtml($html);
    $pdf->Output('PrintOrder.pdf', 'I');
  }

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */
