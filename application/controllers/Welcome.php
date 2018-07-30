<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function __construct() {
        parent::__construct("welcome");
        $this->load->library('session');
        $this->load->model('FAREPrincipal', 'modelPrincipal', TRUE);
    }
    
    public function index() {
        $this->load->view('welcome_message');
    }
    
    public function formulario() {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules("nome", "Nome", "required");
        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("assunto", "Assunto", "required");
        $this->form_validation->set_rules("descricao", "Descricao", "required");
        
        $data['nome'] = $post['nome'];
        $data['email'] = $post['email'];
        $data['assunto'] = $post['assunto'];
        $data['descricao'] = $post['descricao'];
        
        if($this->modelPrincipal->inserirContato($data)) {
            $data['mensagem'] = 'Sua mensagem foi enviada! Vamos entrar em contato o mais rápido '
                    . 'possível pelo e-mail inserido.<br>'
                    . 'Obrigado!';
            $this->load->view('welcome_message', $data);
        } else {
            $data['mensagem'] = 'Não foi possível enviar sua mensagem. Tente novamente!';
            $this->load->view('welcome_message', $data);
        }
    }
}
