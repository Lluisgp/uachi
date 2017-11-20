<?php

class Admin extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('media_model');
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function distribution()
    {
        if (isset($_POST["filter"])) {            
            $this->admin_filter();            
        }
        if (isset($_POST["add"])) {            
            $this->add_media();
        }
    }

    public function add_media()
    {
        log_message("info", "Make a new insert from a media form");

          $user_id=$this->session->userdata('user_id');
          $pujat=date("Y-m-d H:i:s");
          //$tags = explode(" ", $this->input->post('media_tags'));
          //$array_tags = array();
          
        //   foreach ($tags as $valor) {
        //       $result=$this->media_model->tag_check($valor);
        //       $array_tags[]=$result;
        // }
        
          $media=array(
          'media_title_en'=>$this->input->post('media_title_en'),
          'media_title_es'=>$this->input->post('media_title_es'),
          'media_title_ca'=>$this->input->post('media_title_ca'),
      
          'media_description_en'=>$this->input->post('media_description_en'),
          'media_description_es'=>$this->input->post('media_description_es'),
          'media_description_ca'=>$this->input->post('media_description_ca'),

          'media_tags'=>$this->input->post('media_tags'),

          'media_address'=>$this->input->post('media_address'),
          'media_uploaded'=>$user_id,
          'media_date'=>$pujat
        );
          $this->media_model->register_media($media);

          $resultat=$this->media_model->search_media($media);
        
        $valors=array();
        $this->load->view("admin.php", array("data"=>$valors));
    }

    public function admin_view()
    {
        $valors=array();
        $this->load->view("admin.php", array("data"=>$valors));
    }
    public function admin_filter()
    {        
        $media=array(
            'media_title_en'=>$this->input->post('media_title_en'),
            'media_title_es'=>$this->input->post('media_title_es'),
            'media_title_ca'=>$this->input->post('media_title_ca'),
        
            'media_description_en'=>$this->input->post('media_description_en'),
            'media_description_es'=>$this->input->post('media_description_es'),
            'media_description_ca'=>$this->input->post('media_description_ca'),
  
            'media_tags'=>$this->input->post('media_tags'),
  
            'media_address'=>$this->input->post('media_address'),            
          );
        
        $valors="";
        
        if ($media) {
            log_message("error", "Make a search");
            $valors=$this->media_model->search_media($media);
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
          $this->load->view("admin.php", array("data"=>$valors));
    }
}
