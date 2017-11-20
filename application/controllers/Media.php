<?php

class Media extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
         $this->load->helper('url');
         $this->load->model('user_model');
         $this->load->model('media_model');
    }

    public function media_search()
    {
        $cerca=$this->input->post('cerca');
        $valors="";

        log_message("error", "valor de cerca: ".$cerca);

        if (strlen($cerca)>0) {
            log_message("error", "Make a search");
            $valors=$this->media_model->search_word_media($cerca);
            if ($valors) {
                foreach ($valors as $row) {
                        $titulo=$row['media_title_es'];
                        log_message("error", "resultats de cerca per text->titulo: ".$titulo);
                }
            }
        } else {
            log_message("error", "Give-me first results");
            $valors=$this->media_model->search_last_media();
            if ($valors) {
                foreach ($valors as $row) {
                        $titulo=$row['media_title_es'];
                        log_message("error", "resultats de cerca per data titulo: ".$titulo);
                }
            }
        }
          $this->load->view("home.php", array("data"=>$valors));
    }
}
