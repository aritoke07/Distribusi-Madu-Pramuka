<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Convert
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

  public function StokStatus($value)
  {
    switch ($value) {
      case '1':
        $result = 'Ada';
        break;

      case '2':
        $result = 'Tidak ada';
        break;

      default:
        $result = 'No Defined';
        break;
    }

    return $result;
  }

	public function PelangganStatus($value)
  {
    switch ($value) {
      case '1':
        $result = 'Aktif';
        break;

      case '0':
        $result = 'Tidak Aktif';
        break;

      default:
        $result = 'No Defined';
        break;
    }

    return $result;
  }

	public function OrderStatus($value)
  {
    switch ($value) {
      case '1':
        $result = 'Menunggu';
        break;

      case '2':
        $result = 'Sedang Diproses';
        break;

			case '3':
				$result = 'Sudah Diterima';
				break;

      default:
        $result = 'No Defined';
        break;
    }

    return $result;
  }

	public function PengirimanStatus($value)
  {
    switch ($value) {
      case '1':
        $result = 'Menunggu';
        break;

			case '2':
				$result = 'Sudah Diterima';
				break;

			case '3':
				$result = 'Retur';
				break;

			case '4':
				$result = 'Resend';
				break;

      default:
        $result = 'No Defined';
        break;
    }

    return $result;
  }

	public function PengembalianStatus($value)
  {
    switch ($value) {
      case '1':
        $result = 'Menunggu';
        break;

      case '2':
        $result = 'Resend';
        break;

			case '3':
				$result = 'Sudah Diterima';
				break;

      default:
        $result = 'No Defined';
        break;
    }

    return $result;
  }

	public function PenggunaTingkat($value)
  {
    switch ($value) {
      case '1':
        $result = 'Admin Gudang';
        break;

      case '2':
        $result = 'Admin Kedai';
        break;

			case '3':
				$result = 'Manager Gudang';
				break;

			case '14':
				$result = 'Super Administrator';
				break;

      default:
        $result = 'No Defined';
        break;
    }

    return $result;
  }

	public function FormatRupiah($number)
	{
		$result = number_format($number, "0", ",", ".");

		return "Rp. " . $result;
	}

}

/* End of file Convert.php */
/* Location: ./application/libraries/Convert.php */
