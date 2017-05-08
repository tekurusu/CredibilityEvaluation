<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer extends CI_Controller {

	public function index()
	{

		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');

		//$this->load->view('demographics');

		$query = $this->db->query("SELECT 
			  survey_id,
			  site_name,
			  site_mod,
			  orig_rating,
			  orig_comments,
			  mod_rating,
			  mod_comments,
			  believable
			FROM `site_answer`");

		$output = $this->dbutil->csv_from_result($query);

		$name = 'answers.csv';
		force_download($name, $output);
	}

}
