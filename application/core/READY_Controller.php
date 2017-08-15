<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class READY_Controller extends CI_Controller {

	public $title     = 'Madu Pramuka';
	public $desc      = '';
	private $template = array();

	public function _FrontendLayout_($data = FALSE, $headerAddCssJs = FALSE, $footerAddJs = FALSE)
	{
		// add plugin in header
		$headerAdd['addCss'] = (empty($headerAddCssJs['addCss']) ? null : $headerAddCssJs['addCss']);
		$headerAdd['addJs']  = (empty($headerAddCssJs['addJs']) ? null : $headerAddCssJs['addJs']);

		// add plugin in footer
		$footerAdd['addJs'] = (empty($footerAddJs) ? null : $footerAddJs);

		// load page and data
		$contentData = (empty($data) ? null : $data);

		$this->template['HeaderCssJs'] 	= $this->load->view('frontend/_layout/HeaderCssJsView', $headerAdd, TRUE);
		$this->template['HeaderTop'] 		= $this->load->view('frontend/_layout/HeaderView', NULL, TRUE);
		$this->template['NavbarMenu'] 	= $this->load->view('frontend/_layout/NavbarMenuView', NULL, TRUE);
		$this->template['Content'] 			= $this->load->view($this->content, $contentData, TRUE);
		$this->template['Footer'] 			= $this->load->view('frontend/_layout/FooterView', NULL, TRUE);
		$this->template['FooterJs'] 		= $this->load->view('frontend/_layout/FooterJsView', $footerAdd, TRUE);

		$this->load->view('frontend/_layout/LayoutView', $this->template);
	}

	public function _BackendLayout_($data = FALSE, $headerAddCssJs = FALSE, $footerAddJs = FALSE)
	{
		// add plugin in header
		$headerAdd['addCss'] = (empty($headerAddCssJs['addCss']) ? null : $headerAddCssJs['addCss']);
		$headerAdd['addJs']  = (empty($headerAddCssJs['addJs']) ? null : $headerAddCssJs['addJs']);

		// add plugin in footer
		$footerAdd['addJs'] = (empty($footerAddJs) ? null : $footerAddJs);

		// load page and data
		$contentData = (empty($data) ? null : $data);

		// menu access
		// $menuAcess['menus'] = $this->_BackendMenuAccess_();
		$menuAcess['menus'] = $this->_BackendMenuSidebar_();

		$this->template['Header']   = $this->load->view('backend/_layout/HeaderView', $headerAdd, TRUE);
		$this->template['SideMenu'] = $this->load->view('backend/_layout/SideMenuView', $menuAcess, TRUE);
		$this->template['Content']  = $this->load->view($this->content, $contentData, TRUE);
		$this->template['Footer']   = $this->load->view('backend/_layout/FooterView', $footerAdd, TRUE);

		$this->load->view('backend/_layout/LayoutView', $this->template);
	}

	public function _BackendMenuSidebar_()
	{
		switch ($this->session->userdata('tingkat')) {
			case '1':
				// admin gudang
				$result = array(
					'<i class="fa fa-hdd-o"></i> Data' => array(
						'app/daftarharga' => 'Daftar Harga',
						'app/stok' => 'Stok',
						'app/madu' => 'Jenis Madu',
						'app/kemasan' => 'Kemasan'
					),
					'<i class="fa fa-edit"></i> Pengiriman' => array(
						'app/order/pelanggan' => 'Order Pelanggan',
						'app/pengiriman/barang' => 'Pengiriman Barang',
						'app/pengiriman/barang_diterima' => 'Pengiriman Diterima',
						'app/pengiriman/barang_retur' => 'Pengiriman Retur',
						'app/pengiriman/barang_resend' => 'Pengiriman Resend'
					),
					// '<i class="fa fa-edit"></i> Peneriman' => array(
					// 	'app/penerimaan/barang/retur' => 'Penerimaan Retur',
					// 	'app/penerimaan/barang/resend' => 'Penerimaan Resend'
					// )
				);
				break;

			case '2':
				// admin kedai
				$result = array(
					'<i class="fa fa-hdd-o"></i> Data' => array(
						'app/order/pelanggan' => 'Order Pelanggan',
						'app/penerimaan/barang' => 'Penerimaan Barang',
						// 'app/pengembalian/barang' => 'Pengembalian Barang',
						'app/pelanggan' => 'List Pelanggan'
					)
				);
				break;

			case '3':
				// manager gudang
				$result = array(
					'<i class="fa fa-desktop"></i> Laporan' => array(
						'app/report/stok_gudang' => 'Laporan Stok Gudang',
						'app/report/kedai' => 'Laporan Kedai',
						'app/report/madu_order' => 'Laporan Madu Order'
					)
				);
				break;

			case '14':
				// super administrator
				$result = array(
					'<i class="fa fa-hdd-o"></i> Data' => array(
						'app/gudang' => 'Gudang',
						'app/kedai' => 'Kedai',
						'app/kota' => 'Kota'
					),
					'<i class="fa fa-gear"></i> Pengaturan' => array(
						'app/pengguna' => 'Pengguna'
					)
				);
				break;

			default:
				$result = 'No defined';
				break;
		}

		return $result;
	}

}

/* End of file READY_Controller.php */
/* Location: ./application/core/READY_Controller.php */
