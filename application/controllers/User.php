<?php

class User extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view("register.php");
    }

    public function register_user() {

        $user = array(
            'user_name' => $this->input->post('user_name'),
            'user_email' => $this->input->post('user_email'),
            'user_password' => md5($this->input->post('user_password')),
            'user_age' => $this->input->post('user_age'),
            'user_mobile' => $this->input->post('user_mobile')
        );
        //print_r($user);

        $email_check = $this->user_model->email_check($user['user_email']);

        if ($email_check) {
            $this->user_model->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registrado correctamente.Ahora puede entrar en su cuenta.');
            redirect('user/login_view');
        } else {

            $this->session->set_flashdata('error_msg', 'Ha ocurrido algún error. Vuelva a probar.');
            redirect('user');
        }
    }

    public function login_view() {
        $this->session->unset_userdata('success_msg');
        $this->session->unset_userdata('error_msg');
        $this->load->view("login.php");
    }

    function login_user() {
        $this->session->unset_userdata('success_msg');
        $this->session->unset_userdata('error_msg');
        $user_login = array(
            'user_email' => $this->input->post('user_email'),
            'user_password' => md5($this->input->post('user_password'))
        );

        $data = $this->user_model->login_user($user_login['user_email'], $user_login['user_password']);
        if ($data) {
            $this->session->set_userdata('user_id', $data['user_id']);
            $this->session->set_userdata('user_email', $data['user_email']);
            $this->session->set_userdata('user_name', $data['user_name']);
            $this->session->set_userdata('user_age', $data['user_age']);
            $this->session->set_userdata('user_mobile', $data['user_mobile']);
            $this->session->set_userdata('user_admin', $data['user_admin']);

            $this->load->view('user_profile.php');
        } else {
            $this->session->set_flashdata('error_msg', 'Ha ocurrido algún error. Vuelva a probar.');
            $this->load->view("login.php");
        }
    }

    function login_user_facebook() {
        $this->session->unset_userdata('success_msg');
        $this->session->unset_userdata('error_msg');
        $data = $this->user_model->login_user_facebook($this->input->post('user_email'));

        if (!$data) {
            $user = array(
                'user_name' => $this->input->post('user_name'),
                'user_email' => $this->input->post('user_email')
            );
            $this->user_model->register_user($user);
            $data = $this->user_model->login_user_facebook($this->input->post('user_email'));
        }
        $this->session->set_userdata('user_id', $data['user_id']);
        $this->session->set_userdata('user_email', $data['user_email']);
        $this->session->set_userdata('user_name', $data['user_name']);
        $this->session->set_userdata('user_age', $data['user_age']);
        $this->session->set_userdata('user_mobile', $data['user_mobile']);
        $this->session->set_userdata('user_admin', $data['user_admin']);
        $this->load->view('user_profile.php');
    }

    function user_profile() {

        $this->load->view('user_profile.php');
    }

    function recovery() {
        $this->session->unset_userdata('success_msg');
        $this->session->unset_userdata('error_msg');

        $this->session->sess_destroy();
        $mail = $this->input->get('mail', TRUE);
        $data = $this->user_model->login_user_facebook($mail);
        if ($data) {
            $token = $this->user_model->user_token($data['user_id']);
            if ($token) {
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://mail.uachit.yuu.es',
                    'smtp_port' => 465,
                    'smtp_user' => 'recovery@uachit.yuu.es',
                    'smtp_pass' => 'Opentrends2',
                    'mailtype' => 'html',
                    'charset' => "utf-8",
                    'newline' => "\r\n"
                );
                $this->load->library('email', $config);

                $this->email->to($mail);
                $this->email->from('recovery@uachit.yuu.es', 'Uachit');
                $this->email->subject('Recuperación de contraseña');
                $this->email->message('<p>Hola ' . $data['user_name'] . '</p>'
                        . '<p>Hemos recibido una petición para recuperar tu contraseña.</p>'
                        . '<p>Si deseas recuperar tu contraseña, por favor sigue el siguiente enlace:</p>'
                        . base_url('user/setpassword') . '?token=' . $token . '</br></p>'
                        . '<p>Si por el contrario crees que has recibido este correo por error, puedes ignorarlo.</p>'
                        . '<p>Un cordial saludo,</p>'
                        . 'Uachit');

                $this->email->send();
            }
        }
        $this->session->set_flashdata('success_msg', 'Se ha enviado un correo.');
        //$errors = 'Se ha enviado un correo';
        $this->load->view("login.php");
    }

    function setpassword() {
        $this->session->unset_userdata('success_msg');
        $this->session->unset_userdata('error_msg');

        $token = $this->input->get('token', TRUE);
        $email = $this->input->post('user_email');
        $password = $this->input->post('user_password');
        $password2 = $this->input->post('user_password2');
        $tokenPost = $this->input->post('tokenPost');
        if ($tokenPost == 'login') {
            if ($this->session->userdata('user_email') == $email) {
                $modify = $this->user_model->modify_user_password($password, $this->session->userdata('user_id'));
                if ($modify) {
                    $this->load->view('user_profile.php');
                    return;
                }
            }
        } elseif (isset($email) && isset($password) && isset($password2) && isset($tokenPost)) {
            if ($password == $password2 && strlen($tokenPost) == 20) {
                $data = $this->user_model->user_recovery($email, $password, $tokenPost);

                if ($data) {
                    $this->session->set_userdata('user_id', $data['user_id']);
                    $this->session->set_userdata('user_email', $data['user_email']);
                    $this->session->set_userdata('user_name', $data['user_name']);
                    $this->session->set_userdata('user_age', $data['user_age']);
                    $this->session->set_userdata('user_mobile', $data['user_mobile']);
                    $this->session->set_userdata('user_admin', $data['user_admin']);

                    $this->load->view('user_profile.php');
                    return;
                }
            }
        } elseif ($token) {
            $this->load->view("recovery.php", array("data" => $token));
            return;
        }
        $this->session->set_flashdata('error_msg', 'Ha ocurrido algún error. Vuelva a probar.');
        $this->load->view("login.php");
    }

    public function user_password() {
        $this->load->view("recovery.php", array("data" => "login"));
    }

    public function user_logout() {

        $this->session->sess_destroy();
        redirect('user/login_view', 'refresh');
    }

}

?>
