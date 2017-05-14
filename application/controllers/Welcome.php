<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		  $this->load->helper('form');
    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[respondent.email]');

		  $this->load->view('templates/header');
    	if ($this->form_validation->run() == FALSE) {
        $this->load->view('welcome');
      }
      else {
        $this->load->dbutil();
        $this->load->library('session');

        // get the survey set
        $query = $this->db->query("SELECT SS.set_code, SS.site_1
          FROM survey_set SS
            LEFT JOIN survey S on S.set_code = SS.set_code
            LEFT JOIN site_answer SA on SA.survey_id = S.survey_id
          GROUP BY SS.set_code
          ORDER BY count(S.survey_id) asc
          LIMIT 1");
        $set = $query->row_array();

        $this->session->unset_userdata('set_code');
        $this->session->unset_userdata('email');
			  $newdata = array(
          'email' => $this->input->post('email'),
          'set_code' => $set["set_code"]
        );

			$this->session->set_userdata($newdata);
      
      $this->load->view('welcome');
    }

	}

}
