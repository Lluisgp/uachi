<?php

class Admin extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('media_model');
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper('form');
    }

    /**
     * Distribute all calls to the controller to diferent functions
     */
    public function distribution() {
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

    /**
     * Load admin view
     */
    public function admin_view() {
        $valors = array();
        $errors = array();
        $this->load->view("admin.php", array("data" => $valors, "error" => $errors));
    }

    /**
     * Add media, thumbnail and video if exists
     */
    public function add_media() {
        $user_id = $this->session->userdata('user_id');
        $pujat = date("Y-m-d H:i:s");
        $errors = "";

        $media = array(
            'media_title' => $this->input->post('media_title'),
            'media_description' => $this->input->post('media_description'),
            'media_tags' => $this->input->post('media_tags'),
            'media_address' => $this->input->post('media_address'),
            'media_uploaded' => $user_id,
            'media_date' => $pujat
        );
        $insert_id = $this->media_model->register_media($media);

        //upload thumbnail to bdd
        if (!empty($_FILES['thumbnail']['tmp_name'])) {
            $file_data = file_get_contents($_FILES['thumbnail']['tmp_name']);
            $this->media_model->upload_image($insert_id, $file_data);
        }

        //Write a video on a file
        if (!empty($_FILES['video']['tmp_name'])) {
            $config['upload_path'] = 'videos';
            $config['allowed_types'] = 'mp4';
            $config['file_name'] = $insert_id;
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('video')) {
                $errors .= "Errores al subir el archivo - ";
            } else {
                $errors .= "Archivo subido con éxito - ";
            }
        }

        if ($insert_id > 0) {
            $errors .= "Registro añadido con éxito";
        } else {
            $errors .= "Ningún registro añadido";
        }
        $valors = array();
        $this->load->view("admin.php", array("data" => $valors, "error" => $errors));
    }

    /**
     * Modify a media record
     */
    public function modify_media() {
        $id = $this->input->post('media_id');
        $errors = "";
        if ($id) {

            $user_id = $this->session->userdata('user_id');
            $pujat = date("Y-m-d H:i:s");

            $media = array(
                'media_id' => $id,
                'media_title' => $this->input->post('media_title'),
                'media_description' => $this->input->post('media_description'),
                'media_tags' => $this->input->post('media_tags'),
                'media_uploaded' => $user_id,
                'media_date' => $pujat
            );
            $insert_id = $this->media_model->modify_media($media);

            if (!empty($_FILES['thumbnail']['tmp_name'])) {
                $file_data = file_get_contents($_FILES['thumbnail']['tmp_name']);
                $this->media_model->update_image($insert_id, $file_data);
            }

            if (!empty($_FILES['video']['tmp_name'])) {
                $config['upload_path'] = 'videos';
                $config['allowed_types'] = 'mp4';
                $config['file_name'] = $id;
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('video')) {
                    $errors .= "Errores al subir el archivo - ";
                } else {
                    $errors .= "Archivo subido con éxito - ";
                }
            }

            if ($insert_id > 0) {
                $errors .= "Registro modificado con éxito";
            } else {
                $errors .= "Ningún registro modificado";
            }
        } else {
            $errors = "Primero debe seleccionar un registro";
        }
        $valors = array();
        $this->load->view("admin.php", array("data" => $valors, "error" => $errors));
    }

    /**
     * Delete a media record
     */
    public function delete_media() {
        $id = $this->input->post('media_id');
        $valors = array();
        $resultat = $this->media_model->delete_media($id);
        if ($resultat > 0) {
            $filename = 'videos/' . $id . '.mp4';
            if (file_exists($filename)) {
                unlink($filename);
            }
            $resultat = "Se ha borrado un registro con éxito";
        } else {
            $resultat = "No se ha borrado ningún registro";
        }

        $this->load->view("admin.php", array("data" => $valors, "error" => $resultat));
    }

    /**
     * Filter media records
     */
    public function admin_filter() {
        $media = array(
            'media_title' => $this->input->post('media_title'),
            'media_description' => $this->input->post('media_description'),
            'media_tags' => $this->input->post('media_tags'),
        );

        $valors = "";

        if ($media) {
            $valors = $this->media_model->search_media($media);
        } else {
            $valors = $this->media_model->search_last_media();
        }
        $errors = array();
        $this->load->view("admin.php", array("data" => $valors, "error" => $errors));
    }

}
