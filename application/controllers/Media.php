<?php

class Media extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('media_model');
        $this->load->model('trace_model');
        $this->load->library('session');
    }

    /**
     * Default call show last ten results
     */
    public function index() {
        $this->media_search();
    }

    /**
     * Search media records if have a word filter the related records else the last 10 records
     */
    public function media_search() {
        $this->session->unset_userdata('success_msg');
        $this->session->unset_userdata('error_msg');
        $cerca = $this->input->post('cerca');
        $valors = "";

        if (strlen($cerca) > 0) {
            $valors = $this->media_model->search_word_media($cerca);
        } else {
            $valors = $this->media_model->search_last_media();
        }
        $this->load->view("home.php", array("data" => $valors));
    }

    /**
     * Show a media record
     */
    public function media_show() {
        $this->session->unset_userdata('success_msg');
        $this->session->unset_userdata('error_msg');
        $user_id = $this->session->userdata('user_id');
        $id = $this->input->get('media_id', TRUE);
        $this->trace_model->trace_media($id, $user_id);
        $valors = $this->media_model->detail_media($id);
        if ($valors) {
            $this->load->view("show.php", array("data" => $valors));
        } else {
            $this->media_search();
        }
    }

}
