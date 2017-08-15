<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends READY_Controller {

	public function index()
	{
		$this->content = 'frontend/contact/ContactView';

    $footerAddJs = array(
      'public/master/frontend/Contact.js'
    );

		$this->_FrontendLayout_($data = FALSE, $headerAddCssJs = FALSE, $footerAddJs);
	}

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */
