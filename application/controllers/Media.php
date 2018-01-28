<?php

class Media extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('media_model');
        $this->load->model('trace_model');
        $this->load->model('comment_model');
        $this->load->library('session');
        $this->load->library('form_validation');
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
        //$this->session->unset_userdata('success_msg');
        //$this->session->unset_userdata('error_msg');
        $user_id = $this->session->userdata('user_id');
        $id = $this->input->get('media_id', TRUE);
        $this->trace_model->trace_media($id, $user_id);
        $valors = $this->media_model->detail_media($id);
        $comments = $this->show_tree($id);
        if ($valors) {
            $this->load->view("show.php", array(
                "data" => $valors,
                "comments" => $comments,
            ));
        } else {
            $this->media_search();
        }
    }

    /**
     * Function to add a comment to a media 
     */
    function add_comment() {
        $comment = array(
            "ne_id" => $this->input->post('ne_id'),
            "parent_id" => $this->input->post('parent_id'),
            "comment_name" => $this->input->post('user_name'),
            "comment_email" => $this->input->post('user_email'),
            "comment_name" => $this->session->userdata('user_name'),
            "comment_email" => $this->session->userdata('user_email'),
            "comment_body" => htmlspecialchars($this->input->post('comment_body')),
            "comment_created" => time()
        );        
         $this->form_validation->set_rules('comment_body', 'comment_body', 'required|trim|htmlspecialchars');
        if ($this->form_validation->run() == FALSE || !$this->session->userdata('user_id') > 0) {
            // if not valid load comments
            $this->session->set_flashdata('error_msg', "Revise el texto introducido y compruebe que esta registrado y se ha identificado.");
            redirect("media/media_show?media_id=" . $this->input->post('ne_id'));
        } else {
            //if valid send comment to admin to tak approve
            $this->comment_model->add_new_comment($comment);
            $this->session->set_flashdata('success_msg', 'Comentario publicado con éxito.');
            //redirect("news/show_one/$ne_id");
            redirect("media/media_show?media_id=" . $this->input->post('ne_id'));
        }
    }

    /**
     * Show comments tree
     * @param type $ne_id
     * @return type
     */
    function show_tree($ne_id) {
        // create array to store all comments ids
        $store_all_id = array();
        // get all parent comments ids by using news id
        $id_result = $this->comment_model->tree_all($ne_id);
        // loop through all comments to save parent ids $store_all_id array
        foreach ($id_result as $comment_id) {
            array_push($store_all_id, $comment_id['parent_id']);
        }
        // return all hierarchical tree data from in_parent by sending
        //  initiate parameters 0 is the main parent,news id, all parent ids

        return $this->in_parent(0, $ne_id, $store_all_id);
    }

    /* recursive function to loop
      through all comments and retrieve it
     */

    /**
     * Used by the comments tree 
     * @param type $in_parent
     * @param type $ne_id
     * @param type $store_all_id
     * @return string
     */
    function in_parent($in_parent, $ne_id, $store_all_id) {
        // this variable to save all concatenated html
        $html = "";
        // build hierarchy  html structure based on ul li (parent-child) nodes
        if (in_array($in_parent, $store_all_id)) {
            $result = $this->comment_model->tree_by_parent($ne_id, $in_parent);
            $html .= $in_parent == 0 ? "<ul  style='color:white;'class='tree'>" : "<ul>";
            foreach ($result as $re) {
                $html .= " <li class='comment_box'>                    
            <div style='color:white;' class='comment-body'>" . $re['comment_body'] . "</div>
            <div style='color:white;' class='timestamp'>  " . $re['comment_name'] . "  " . date("j/m/Y", $re['comment_created']) . "
            <a style='color:white;'  href='#' class='reply float-right' id='" . $re['comment_id'] . "'>Contestar</a></div></br>";
                $html .= $this->in_parent($re['comment_id'], $ne_id, $store_all_id);
                $html .= "</li>";
            }
            $html .= "</ul>";
        }
        return $html;
    }

}
