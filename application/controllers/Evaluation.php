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

    if ($segment != 3) {
      $this->form_validation->set_rules('orig_rating_' . $segment, 'Credibility Rating', 'required');
      $this->form_validation->set_rules('mod_rating_' . $segment, 'Credibility Rating', 'required');
      $this->form_validation->set_rules('rank_' . $segment, 'More believable', 'required');
    } else {
      $this->form_validation->set_rules('gender', 'Gender', 'required');
      $this->form_validation->set_rules('age', 'Age', 'required');
      $this->form_validation->set_rules('education', 'Education', 'required');
      $this->form_validation->set_rules('occupation', 'Occupation', 'required');
      $this->form_validation->set_rules('usage', 'Usage', 'required');
      $this->form_validation->set_rules('informed', 'Informed', 'required');
      $this->form_validation->set_rules('ngo', 'NGO', 'required');
    }

    $data = array ('posted_data' => $this->input->post());
    $this->load_next_form($data, $this->form_validation->run());
  }

  private function load_next_form($postedData = false, $isValid) {

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

    $this->load->dbutil();
    $this->load->library('session');

    // load marker for which stage in survey user is in
    $segment = $this->input->post("_segment") + ($isValid ? 1 : 0);

    // load the saved survey set
    $set_code = $this->session->userdata('set_code');

    $query = $this->db->query("SELECT site_1, site_2
      FROM survey_set
      WHERE set_code = " . $this->db->escape($set_code));
    $results = $query->row_array();


    if ($segment == 2) {
      $site_query = $this->db->get_where('site', array('short_name' => $results["site_2"]));
      $site = $site_query->row_array();
      $data['site_name'] = $site["name"];
      $data['short_link'] = $site["short_name"];
      $this->load->view('evaluation2', $data);
    } else if ($segment == 3) {
      $this->load->view('demographics', $data);
    } else if ($segment == 4)  { // submit the post finally
      $post_values = $this->input->post();
      $this->save_survey($post_values, $results);
      $this->load->view('thanks');
    } else {
      $site_query = $this->db->get_where('site', array('short_name' => $results["site_1"]));
      $site = $site_query->row_array();
      $data['site_name'] = $site["name"];
      $data['short_link'] = $site["short_name"];
      $this->load->view('evaluation', $data);
    }
    $this->load->view('templates/footer');
  }

  private function save_survey($post_values, $results) {
    $email = $this->session->userdata('email');
    $set = $this->session->userdata('set_code');

    if (!$email) {
      return;
    }

    $respondent = array(
      'email' => $email,
      'gender' => $post_values['gender'],
      'age' => $post_values['age'],
      'educational_attainment' => $post_values['education'],
      'occupation' => $post_values['occupation'],
      'web_hours' => $post_values['usage'],
      'gov_informed' => $post_values['informed'],
      'ngo_id' => $post_values['ngo']
    );

    $this->session->unset_userdata('email');
    $this->session->unset_userdata('set_code');

    $this->db->insert('respondent', $respondent); 
    $respondent_id = $this->db->insert_id();

    $survey = array(
      'respondent_id' => $respondent_id,
      'set_code' => $set
    );

    $this->db->insert('survey', $survey); 
    $survey_id = $this->db->insert_id();

    $site_answer1 = array(
      'survey_id' => $survey_id,
      'site_name' => $results["site_1"],
      'site_mod' => '1',
      'orig_rating' => $post_values['orig_rating_1'],
      'orig_comments' => $post_values['orig_comment_1'],
      'mod_rating' => $post_values['mod_rating_1'],
      'mod_comments' => $post_values['mod_comment_1'],
      'believable' => $post_values['rank_1']
    );

    $site_answer2 = array(
      'survey_id' => $survey_id,
      'site_name' => $results["site_2"],
      'site_mod' => '2',
      'orig_rating' => $post_values['orig_rating_2'],
      'orig_comments' => $post_values['orig_comment_2'],
      'mod_rating' => $post_values['mod_rating_2'],
      'mod_comments' => $post_values['mod_comment_2'],
      'believable' => $post_values['rank_2']
    );

    $this->db->insert('site_answer', $site_answer1);
    $this->db->insert('site_answer', $site_answer2);
  }
}
