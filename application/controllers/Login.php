<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct("login");
        $this->load->model('TCCLogin', 'modelLogin', TRUE);
        $this->load->model('TCCUsuario', 'modelUsuario', TRUE);
        $this->load->library('session');
        $this->load->helper('cookie');
    }

    public function closeSession() {
        $this->session->unset_userdata('loginuser');
        $this->session->sess_destroy();
        redirect('/');
    }

    public function analisarLogin() {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules("username", "Nome", "required");
        $this->form_validation->set_rules("senha", "Senha", "required");

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', 'Não foi possível realizar login.');
            $this->load->view('welcome_message');
            
        } else {
            $usuario = $this->modelLogin->buscarUsuario($post['username'], $post['senha']);
            if (!empty($usuario)) {
                $sessiondata = array(
                    'username' => $post['username'],
                    'loginuser' => TRUE,
                    'nome' => $usuario->nome,
                    'email' => $usuario->email,
                    'tipo_usuario' => $usuario->tipo_usuario,
                    'id' => $usuario->id
                );
                $this->session->set_userdata($sessiondata);
                redirect('atividade/index');
            } else {
                $this->session->set_flashdata('msg', 'Usuário ou senha inválidos.');
                $this->load->view('welcome_message');
            }
        }
    }
}
?>

