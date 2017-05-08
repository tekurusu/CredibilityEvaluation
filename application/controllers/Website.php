<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('website');
	}

	public function view($site_name, $mod_id) {

    if ($site_name == null || $mod_id == null) {
      show_404();
    }

    $this->load->helper('html');
    $this->load->view('templates/header');
    $this->load->view($site_name . '/' . $mod_id . '/index.html');
    $this->load->view('templates/footer');
  }

}
