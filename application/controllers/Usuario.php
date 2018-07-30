<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct("usuario");
        $this->load->model('TCCUsuario', 'modelUsuario', TRUE);
        $this->load->model('TCCAtividade', 'modelAtividade', TRUE);
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
            //$data['senha'] = $post['senha'];
            $data['username'] = $post['username'];
            $data['email'] = $post['email'];
            $data['data_nascimento'] = $post['data_nascimento'];
            $data['telefone'] = $post['telefone'];
            $data['sexo'] = $post['sexo'];
            $data['tipo_usuario'] = ESTUDANTE;
            $data['nome_responsavel'] = $post['nome_responsavel'];
            $data['ano_escolar'] = $post['ano_escolar'];

            if ($id) { //edicao
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
                    $data['senha'] = password_hash($post['senha'], PASSWORD_DEFAULT);
                    if ($this->modelUsuario->verificarUsername($post['username'])) {
                        if ($this->modelUsuario->cadastrar($data)) {
                            $mensagem = 'Usuário cadastrado com sucesso!';
                            $this->cadastrar($mensagem);
                        } else {
                            $mensagem = 'Não foi possível cadastrar usuário!';
                            $this->cadastrar($mensagem);
                        }
                    } else {
                        $mensagem = 'Não foi possível cadastrar usuário! Username já cadastrado.';
                        $this->cadastrar($mensagem);
                    }
                } else {
                    $mensagem = 'Senhas diferentes!';
                    $this->cadastrar($mensagem);
                }
            }
        }
    }

    public function trocarSenha($mensagem = NULL) {
        $data['mensagem'] = $mensagem;
        $this->load->view('usuario/trocarSenhaView', $data);
    }

    public function mudarSenha() {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules("nome", "Nome", "required");
        $this->form_validation->set_rules("senha", "Senha", "required");
        $this->form_validation->set_rules("senha2", "Senha", "required");

        $data['username'] = $post['username'];

        if ($post['senha'] == $post['senha2']) {
            $data['senha'] = password_hash($post['senha'], PASSWORD_DEFAULT);
            if (!$this->modelUsuario->verificarUsername($post['username'])) {
                if ($this->modelUsuario->mudarSenha($data)) {
                    $mensagem = 'Mudança de senha realizada!';
                    $this->trocarSenha($mensagem);
                } else {
                    $mensagem = 'Não foi possível trocar senha!';
                    $this->trocarSenha($mensagem);
                }
            } else {
                $mensagem = 'Não foi possível trocar senha! Username não existe.';
                $this->trocarSenha($mensagem);
            }
        } else {
            $mensagem = 'Senhas diferentes!';
            $this->trocarSenha($mensagem);
        }
    }
    
    public function cadastrarUsuarioToProfessor($mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
            $data['mensagem'] = $mensagem;
            $data['quizzes'] = $this->modelAtividade->getQuizzes($this->session->userdata('id'));
            $data['funcao'] = 'usuario/cadastrarUsuarioToProfessorQuiz';
            $this->load->view('atividade/escolherQuizView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function cadastrarUsuarioToProfessorQuiz($mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
            $post = $this->input->post();
            $this->load->library('form_validation');
            $this->form_validation->set_rules("quiz", "Quiz", "required");

            $data['quiz'] = $this->modelAtividade->getQuiz($post['quiz']);
            
            $this->load->view('usuario/cadastrarUsuarioToProfessorView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function inserirUsuario($idQuiz, $id = null) {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules("nome", "Nome", "required");
        $this->form_validation->set_rules("senha", "Senha", "required");
        $this->form_validation->set_rules("senha2", "Senha", "required");
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("sexo", "Sexo", "required");
        $this->form_validation->set_rules("data_nascimento", "Data Nascimento", "required");

        
            $data['nome'] = $post['nome'];
            //$data['senha'] = $post['senha'];
            $data['username'] = $post['username'];
            $data['email'] = $post['email'];
            $data['data_nascimento'] = $post['data_nascimento'];
            //$data['telefone'] = $post['telefone'];
            $data['sexo'] = $post['sexo'];
            $data['tipo_usuario'] = ESTUDANTE;
            $data['nome_responsavel'] = $post['nome_responsavel'];
            $data['ano_escolar'] = $post['time'];

            if ($id) { //edicao
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
                    $data['senha'] = password_hash($post['senha'], PASSWORD_DEFAULT);
                    
                    if ($this->modelUsuario->verificarUsername($post['username'])) {
                        if ($this->modelUsuario->cadastrar($data)) {
                            $mensagem = 'Usuário cadastrado com sucesso!';
                            $this->cadastrarUsuarioToProfessorQuiz($mensagem);
                        } else {
                            $mensagem = 'Não foi possível cadastrar usuário!';
                            $this->cadastrarUsuarioToProfessorQuiz($mensagem);
                        }
                    } else {
                        $mensagem = 'Não foi possível cadastrar usuário! Username já cadastrado.';
                        $this->cadastrarUsuarioToProfessorQuiz($mensagem);
                    }
                    
                } else {
                    $mensagem = 'Senhas diferentes!';
                    $this->cadastrarUsuarioToProfessorQuiz($mensagem);
                }
            }
        
    }
    
    public function verQuizComoAluno($mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
            $data['mensagem'] = $mensagem;
            $data['quizzes'] = $this->modelAtividade->getQuizzes($this->session->userdata('id'));
            $data['funcao'] = 'usuario/verQuiz';
            $this->load->view('atividade/escolherQuizView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function verQuiz() {
        if ($this->session->userdata('loginuser')) {
            $post = $this->input->post();
            $this->load->library('form_validation');
            $this->form_validation->set_rules("quiz", "Quiz", "required");

            $data['quiz'] = $this->modelAtividade->getQuiz($post['quiz']);          

            $this->load->view('atividade/verQuizComoAlunoView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }

}
