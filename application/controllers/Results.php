<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Controller {

        public function index()
        {
          if ($this->validate_login()) {
            if ($this->input->post("csv_download")) {
              $this->download_csv($this->input->post("csv_download"));
            } else {
              $this->load_table();
            }
          }
        }

        private function validate_login() {
            $this->load->library('session');
            if ($this->session->userdata('login_validated')) {
                return true;
            } else if ($this->input->post("password") == "jlct") {
                $this->session->set_userdata("login_validated", true);
                return true;
            } else {
                $this->load->view('templates/header');
                $this->load->view('login');
                return false;
            }
        }

        private function load_table() {
                $this->load->library('table');
                $this->load->helper('form');
                $this->load->dbutil();

                $template = array(
                        'table_open'            => '<table class="table table-bordered">',

                        'thead_open'            => '<thead class="thead-inverse">',
                        'thead_close'           => '</thead>',

                        'heading_row_start'     => '<tr>',
                        'heading_row_end'       => '</tr>',
                        'heading_cell_start'    => '<th>',
                        'heading_cell_end'      => '</th>',

                        'tbody_open'            => '<tbody>',
                        'tbody_close'           => '</tbody>',

                        'row_start'             => '<tr>',
                        'row_end'               => '</tr>',
                        'cell_start'            => '<td scope="row">',
                        'cell_end'              => '</td>',

                        'row_alt_start'         => '<tr>',
                        'row_alt_end'           => '</tr>',
                        'cell_alt_start'        => '<td>',
                        'cell_alt_end'          => '</td>',

                        'table_close'           => '</table>'
                );

                $this->table->set_template($template);

                $respondents_query = $this->db->get("vw_respondent_results");
                $data['respondents_table'] = $this->table->generate($respondents_query);

                $responses_query = $this->db->get("site_answer");
                $data['responses_table'] = $this->table->generate($responses_query);

                $this->load->view('results', $data);
        }

        function download_csv($is_responses) {
          $this->load->dbutil();
          $this->load->helper('file');
          $this->load->helper('download');

          if ($is_responses == "true") {
            $query = $this->db->get("site_answer");
            $output = $this->dbutil->csv_from_result($query);
            $name = 'responses.csv';
            force_download($name, $output);
          } else {
            $query = $this->db->get("vw_respondent_results");
            $output = $this->dbutil->csv_from_result($query);
            $name = 'respondents.csv';
            force_download($name, $output);
          }

          $this->load_table();
        }

}