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
        $this->load->helper('form');
    }

    public function distribution()
    {      
        log_message("error", "distribution filter:".isset($_POST["filter"])." add ".isset($_POST["add"]));  
        if (isset($_POST["filter"])) {            
            $this->admin_filter();          
        }
        if (isset($_POST["add"])) {            
            $this->add_media();         
        }  
        if (isset($_POST["delete"])) {            
            $this->delete_media();         
        } 
        if (isset($_POST["modify"])) {            
            $this->modify_media();         
        } 
    }

    public function delete_media(){   
        
        $id=$this->input->post('media_id');
        $resultat="S'ha esborrat ";
        $valors=array();
        $resultat .=$this->media_model->delete_media($id);         
        $resultat .=" registre";
        $this->load->view("admin.php", array("data"=>$valors,"error"=>$resultat));
    }
    
    public function modify_media(){        
         $valors=array();
         $this->load->view("admin.php", array("data"=>$valors,"error"=>"Modificat!"));
    }
            
    public function add_media()
    {
          $user_id=$this->session->userdata('user_id');
          $pujat=date("Y-m-d H:i:s");     
        
          $media=array(
          'media_title'=>$this->input->post('media_title'),      
          'media_description'=>$this->input->post('media_description'),
          'media_tags'=>$this->input->post('media_tags'),
          'media_address'=>$this->input->post('media_address'),
          'media_uploaded'=>$user_id,
          'media_date'=>$pujat
        );
          $insert_id=$this->media_model->register_media($media);     
        
       if(!empty($_FILES['thumbnail']['tmp_name'])){
        $file_data = file_get_contents($_FILES['thumbnail']['tmp_name']);
        $this->media_model->upload_image($insert_id,$file_data);   
       }
       
       if(!empty($_FILES['video']['tmp_name'])){
        $file_data = file_get_contents($_FILES['video']['tmp_name']);
        $this->media_model->upload_video($insert_id,$file_data);   
       }

          $resultat=$this->media_model->search_media($media);
        
        $valors=array();
        $errors=array();
        $this->load->view("admin.php", array("data"=>$valors,"error"=>$errors));
    }

    public function admin_view()
    {
        $valors=array();
        $errors=array();
        //$this->load->view("admin.php", array("data"=>$valors)); 
        $this->load->view("admin.php", array("data"=>$valors,"error"=>$errors));
    }
    public function admin_filter()
    {   
        $media=array(
            'media_title'=>$this->input->post('media_title'),          
            'media_description'=>$this->input->post('media_description'),  
            'media_tags'=>$this->input->post('media_tags'),  
            'media_address'=>$this->input->post('media_address'),            
          );
        
        $valors="";
        
        if ($media) {            
            $valors=$this->media_model->search_media($media);
        } else {            
            $valors=$this->media_model->search_last_media();
        }
          //$this->load->view("admin.php", array("data"=>$valors));
          $errors=array();
          $this->load->view("admin.php", array("data"=>$valors,"error"=>$errors));
    }    
}
