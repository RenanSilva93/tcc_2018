<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct("usuario");
        $this->load->model('TCCUsuario', 'modelUsuario', TRUE);
        $this->load->library('session');
    }
    
    public function cadastrar() {
        $this->session->set_flashdata('msg', '');
        $this->load->view('usuario/cadastroUsuarioView');
    }
    
    public function inserir($id = null) {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules("nome", "Nome", "required");
        $this->form_validation->set_rules("senha", "Senha", "required");
        $this->form_validation->set_rules("senha2", "Senha", "required");
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("sexo", "Sexo", "required");
        $this->form_validation->set_rules("data_nascimento", "Data Nascimento", "required");                

        if ($this->form_validation->run() == FALSE) {
            $this->data['mensagem'] = 'Não foi possível cadastrar usuário!';
            $this->cadastrar();
        } else {
            $data['nome'] = $post['nome'];
            $data['senha'] = $post['senha'];
            $data['username'] = $post['username'];
            $data['email'] = $post['email'];
            $data['data_nascimento'] = $post['data_nascimento'];
            $data['telefone'] = $post['telefone'];
            $data['sexo'] = $post['sexo'];
            $data['tipo_usuario'] = ESTUDANTE;
            $data['nome_responsavel'] = $post['nome_responsavel'];
            $data['ano_escolar'] = $post['ano_escolar'];

            if($id) { //edicao
                $data['id'] = $id;
                if ($this->modelUsuario->atualizar($data)) {
                        $this->data['mensagem'] = 'Usuário atualizado com sucesso!';
                        $this->cadastrar();
                } else {
                        $this->data['mensagem'] = 'Não foi possível atualizar usuário!';
                        //$this->editar($id);
                }
            } else { //insercao                   
                if ($post['senha'] == $post['senha2']) {
                    //$data['senha'] = password_hash($post['password'], PASSWORD_DEFAULT);
                    if($this->modelUsuario->verificarUsername($post['username'])) {
                        if ($this->modelUsuario->cadastrar($data)) {
                            $this->data['mensagem'] = 'Usuário cadastrado com sucesso!';
                            $this->cadastrar();
                        } else {
                            $this->session->set_flashdata('msg', 'Não foi possível cadastrar usuário!');
                            redirect('usuario/cadastrar');
                        }
                    } else {
                        $this->session->set_flashdata('msg', 'Não foi possível cadastrar usuário! Username já cadastrado.');
                        redirect('usuario/cadastrar');
                    }    
                } else {
                    $this->session->set_flashdata('msg', 'Senhas diferentes!');
                    redirect('usuario/cadastrar');
                }
                    
            }
        }
    }
}
