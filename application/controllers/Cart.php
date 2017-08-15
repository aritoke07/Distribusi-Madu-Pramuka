<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function add($id_stok=false, $id_kedai=false)
	{
		if (empty($id_stok) || empty($id_kedai)) {
			show_404();
		}

		// check user is login or not
		if (empty($this->session->userdata('login'))) {
			$this->session->set_flashdata('cartInfoNoLogin', '<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					Silahkan '.anchor('register', 'masuk').' terlebih dahulu untuk melakukan pemesanan madu.
				</div>');

			redirect('menu/view_detail/madu/'.$id_stok.'/'.$id_kedai,'refresh');
		}

		// get data stock
		$this->db->select('
			a.id_stok,
			a.status,
				b.harga,
				b.id_madu,
				b.id_kemasan,
					c.nama as jenis_madu,
					c.gambar as gambar,
					c.keterangan as keterangan,
						d.nama as kemasan
		');
		$this->db->from('tbl_stok as a');
		$this->db->join('tbl_daftarhargaitem as b', 'a.id_daftarhargaitem = b.id_daftarhargaitem', 'left');
		$this->db->join('tbl_madu as c', 'b.id_madu = c.id_madu', 'left');
		$this->db->join('tbl_kemasan as d', 'b.id_kemasan = d.id_kemasan', 'left');
		$this->db->where('a.id_stok', $id_stok);
		$rowStok = $this->db->get()->row();

		// checking stock is avaliable or not
		if ($rowStok->status=="2") {
			$this->session->set_flashdata('cartInfoNoLogin', '<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					Madu tidak tersedia.
				</div>');

			redirect('menu/view_detail/madu/'.$id_stok.'/'.$id_kedai,'refresh');
		} else {
			// insert data to cart
			$data = array(
				'id'      => $rowStok->id_stok,
				'qty'     => 1,
				'price'   => $rowStok->harga,
				'name'    => $rowStok->id_madu,
				'options' => array('kemasan' => $rowStok->kemasan, 'kedai' => $id_kedai)
			);
			
			$this->cart->insert($data);

			$this->session->set_flashdata('cartInfoNoLogin', '<div class="alert alert-info" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Madu sudah masuk dalam list pemesanan anda.
			</div>');

			redirect('menu/view_detail/madu/'.$id_stok.'/'.$id_kedai,'refresh');
		}
	}

	public function delete($rowid)
	{
		if (empty($rowid)) {
			show_404();
		}

		$this->cart->remove($rowid);

    	redirect('pelanggan','refresh');
	}

	public function update()
	{
		$rowid = $this->input->post('rowid');
		$qty = $this->input->post('qty');

		if (empty($rowid) || empty($qty)) {
			show_404();
		}

		$data = array(
        	'rowid' => $rowid,
        	'qty'   => $qty
        );
		$this->cart->update($data);

		$row = $this->cart->get_item($rowid);

		$print = array(
			'subtotal' => $this->convert->FormatRupiah($row['subtotal']),
			'total' => $this->convert->FormatRupiah($this->cart->total())
		);

		echo json_encode($print, JSON_PRETTY_PRINT);
	}

}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */