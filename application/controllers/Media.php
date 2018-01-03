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

    public function index() {
        $this->media_search();
    }

    public function media_search() {
        $cerca = $this->input->post('cerca');
        $valors = "";

        if (strlen($cerca) > 0) {
            $valors = $this->media_model->search_word_media($cerca);
        } else {
            $valors = $this->media_model->search_last_media();
        }
        $this->load->view("home.php", array("data" => $valors));
    }

    public function media_show() {        
        $user_id = $this->session->userdata('user_id');
        $id = $this->input->get('media_id', TRUE);  
        $this->trace_model->trace_media($id,$user_id);          
        $valors = "";
        $valors = $this->media_model->detail_media($id);        
        $this->load->view("show.php", array("data" => $valors));
    }

}
