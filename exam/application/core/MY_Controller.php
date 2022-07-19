<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends MX_Controller {
	public $assets_ = array(
		'users' => array(
			'css' => array(),
			'js' => array('users.min.js'),
		)
	);

	public function __construct() {
		// Something
	}


	public function load_page($page, $data = array()) {
		$data['route'] = $this->router->fetch_class();
		$data['__assets__'] = $this->assets_;
		$this->load->view('includes/head', $data);
		$this->load->view('includes/sidebar', $data);
		$this->load->view($page, $data);
		$this->load->view('includes/footer', $data);
	}

} // End of Class
