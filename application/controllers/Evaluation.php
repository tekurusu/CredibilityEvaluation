<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    $this->load->view('templates/header');
    //$this->load->view('evaluation');
    $this->load_first_form();
  }

  public function load_first_form()  
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $segment = $this->input->post("_segment");

    $this->form_validation->set_rules('orig_rating_' . $segment, 'Rating 1 Bes', 'required');
    $this->form_validation->set_rules('mod_rating_' . $segment, 'Rating 2 Beh', 'required');
    $this->form_validation->set_rules('rank_' . $segment, 'Rank', 'required');

    if (!$this->form_validation->run()) {
      if ($segment == 2) {
        $data = array('site_name' => 'Department of Labor and Employment');
        $this->load->view('evaluation2', $data);
      } else if ($segment == 3) {
        $data = array('site_name' => 'Department of Social Welfare and Development');
        $this->load->view('evaluation3', $data);
      } else {
        $data = array('site_name' => 'Court of Appeals');
        $this->load->view('evaluation', $data);
      }

    } else {
      $data = array ('posted_data' => $this->input->post());
      $this->load_next_form($data);
    }
  }

  private function load_next_form($postedData = false) {

    if (is_array($postedData)) {
      //Necessary for prepending hidden fields 
      //with preceding form's post data
      $data['posted_data'] = $postedData['posted_data'];
    } else {
      //Repopulate hidden fields with second form's 
      //posted data (hidden fields)
      $keys = array('hidden_field_name_1', 'hidden_field_name_2');
      $data['posted_data'] = array();
      foreach($keys as $key) {
        $data['posted_data'][$key] = $this->input->post($key);
      }
    }

    //$data['inputs'] = $this->_form_inputs();
    $segment = $this->input->post("_segment");
    if ($segment == 1) {
      $data['site_name'] = 'Department of Labor and Employment';
      $this->load->view('evaluation2', $data);
    } else if ($segment == 2) {
      $data['site_name'] = 'Department of Social Welfare and Development';
      $this->load->view('evaluation3', $data);
    } else if ($segment == 3) { // submit the post finally
      $post_values = $this->input->post();
      $this->save_survey($post_values);
      $this->load->view('thanks');
    }
  }

  private function save_survey($post_values) {
    $survey = array(
      'respondent_id' => '1',
      'set_code' => 'A'
    );

    $this->db->insert('survey', $survey); 
    $survey_id = $this->db->insert_id();

    $site_answer1 = array(
      'survey_id' => $survey_id,
      'site_name' => 'CA',
      'site_mod' => '1',
      'orig_rating' => $post_values['orig_rating_1'],
      'orig_comments' => $post_values['orig_comment_1'],
      'mod_rating' => $post_values['mod_rating_1'],
      'mod_comments' => $post_values['mod_comment_1'],
      'believable' => $post_values['rank_1']
    );

    $site_answer2 = array(
      'survey_id' => $survey_id,
      'site_name' => 'DOLE',
      'site_mod' => '2',
      'orig_rating' => $post_values['orig_rating_2'],
      'orig_comments' => $post_values['orig_comment_2'],
      'mod_rating' => $post_values['mod_rating_2'],
      'mod_comments' => $post_values['mod_comment_2'],
      'believable' => $post_values['rank_2']
    );

    $site_answer3 = array(
      'survey_id' => $survey_id,
      'site_name' => 'DSWD',
      'site_mod' => '3',
      'orig_rating' => $post_values['orig_rating_3'],
      'orig_comments' => $post_values['orig_comment_3'],
      'mod_rating' => $post_values['mod_rating_3'],
      'mod_comments' => $post_values['mod_comment_3'],
      'believable' => $post_values['rank_3']
    );

    $this->db->insert('site_answer', $site_answer1);
    $this->db->insert('site_answer', $site_answer2);
    $this->db->insert('site_answer', $site_answer3);
  }
}
