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
    $this->load_first_form();
  }

  public function begin() {
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
      $query = $this->db->query("SELECT SS.set_code, SS.site_1, SS.mod_1
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
      
      $site_query = $this->db->get_where('site', array('short_name' => $set["site_1"]));
      $site = $site_query->row_array();

      $data['site_name'] = $site["name"];
      $data['short_link'] = $site["short_name"];
      $data['mod'] = $set["mod_1"];
       
      $this->load->view('evaluation', $data);
    }
  }

  public function load_first_form()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');
    
    $segment = $this->input->post("_segment");

    if ($segment != 3) {
      $this->form_validation->set_rules('orig_rating_' . $segment, 'Credibility Rating', 'required');
      $this->form_validation->set_rules('mod_rating_' . $segment, 'Credibility Rating', 'required');
      $this->form_validation->set_rules('orig_comment_' . $segment, '"What influenced your opinon"', 'required');
      $this->form_validation->set_rules('mod_comment_' . $segment, '"What influenced your opinon"', 'required');
      $this->form_validation->set_rules('color_' . $segment, 'Color', 'required');
      $this->form_validation->set_rules('font_' . $segment, 'Font', 'required');
      $this->form_validation->set_rules('graphics_' . $segment, 'Graphics', 'required');
      $this->form_validation->set_rules('branding_' . $segment, 'Branding', 'required');
      $this->form_validation->set_rules('layout_' . $segment, 'Layout', 'required');
      $this->form_validation->set_rules('navigation_' . $segment, 'Navigation', 'required');
      $this->form_validation->set_rules('sidebar_' . $segment, 'Sidebar', 'required');
      $this->form_validation->set_rules('content_' . $segment, 'Content', 'required');

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

    $query = $this->db->query("SELECT site_1, site_2, mod_1, mod_2
      FROM survey_set
      WHERE set_code = " . $this->db->escape($set_code));
    $results = $query->row_array();


    if ($segment == 2) {
      $site_query = $this->db->get_where('site', array('short_name' => $results["site_2"]));
      $site = $site_query->row_array();
      $data['site_name'] = $site["name"];
      $data['short_link'] = $site["short_name"];
      $data['mod'] = $results["mod_2"];
      $this->load->view('part2', $data);
    } else if ($segment == 3) {
      $this->load->view('demographics', $data);
    } else if ($segment == 4)  { // submit the post finally
      $post_values = $this->input->post();
      $this->save_survey($post_values, $results);
    } else {
      $site_query = $this->db->get_where('site', array('short_name' => $results["site_1"]));
      $site = $site_query->row_array();
      $data['site_name'] = $site["name"];
      $data['short_link'] = $site["short_name"];
      $data['mod'] = $results["mod_1"];
      $this->load->view('evaluation', $data);
    }
    $this->load->view('templates/footer');
  }

  private function save_survey($post_values, $results) {
    $email = $this->session->userdata('email');
    $set_code = $this->session->userdata('set_code');
    $query = $this->db->query("SELECT mod_1, mod_2
      FROM survey_set
      WHERE set_code = " . $this->db->escape($set_code));
    $set = $query->row_array();

    if (!$email) {
      $this->load->view('thanks');
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
      'set_code' => $set_code
    );

    $this->db->insert('survey', $survey); 
    $survey_id = $this->db->insert_id();

    $site_answer1 = array(
      'survey_id' => $survey_id,
      'site_name' => $results["site_1"],
      'site_mod' => $set["mod_1"],
      'orig_rating' => $post_values['orig_rating_1'],
      'orig_comments' => $post_values['orig_comment_1'],
      'mod_rating' => $post_values['mod_rating_1'],
      'mod_comments' => $post_values['mod_comment_1'],
      'believable' => $post_values['rank_1'],
      'color' => $post_values['color_1'],
      'font' => $post_values['font_1'],
      'graphics' => $post_values['graphics_1'],
      'branding' => $post_values['branding_1'],
      'layout' => $post_values['layout_1'],
      'navigation' => $post_values['navigation_1'],
      'sidebar' => $post_values['sidebar_1'],
      'content' => $post_values['content_1']
    );

    $site_answer2 = array(
      'survey_id' => $survey_id,
      'site_name' => $results["site_2"],
      'site_mod' => $set["mod_2"],
      'orig_rating' => $post_values['orig_rating_2'],
      'orig_comments' => $post_values['orig_comment_2'],
      'mod_rating' => $post_values['mod_rating_2'],
      'mod_comments' => $post_values['mod_comment_2'],
      'believable' => $post_values['rank_2'],
      'color' => $post_values['color_2'],
      'font' => $post_values['font_2'],
      'graphics' => $post_values['graphics_2'],
      'branding' => $post_values['branding_2'],
      'layout' => $post_values['layout_2'],
      'navigation' => $post_values['navigation_2'],
      'sidebar' => $post_values['sidebar_2'],
      'content' => $post_values['content_2']
    );

    $this->db->insert('site_answer', $site_answer1);
    $this->db->insert('site_answer', $site_answer2);

    /*
     * send email of the response
     */
    $email_data = array(
      'respondent' => $respondent,
      'set_code' => $set_code,
      'site_answer1' => $site_answer1,
      'site_answer2' => $site_answer2
    );

    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'eliiiiiz.19@gmail.com', // change it to yours
      'smtp_pass' => 'jlct_1030', // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );

    $message = $this->load->view('response', $email_data, true);
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from('eliiiiiz.19@gmail.com', 'Zarah Bot');
    $this->email->to('zaaraah.19@gmail.com');
    $this->email->subject('Survey Response - ' . date('F j, Y - g:i a'));
    $this->email->message($message);

    if (!$this->email->send()) {

      // insert entry in email failure if failed to send
      $failure = array(
        'survey_id' => $survey_id
      );

      $this->db->insert('email_failures', $failure); 
    }

    $this->load->view('thanks');
  }
}
