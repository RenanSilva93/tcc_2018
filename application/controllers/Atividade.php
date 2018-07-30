<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atividade extends CI_Controller {

    public function __construct() {
        parent::__construct("atividade");
        $this->load->model('TCCUsuario', 'modelUsuario', TRUE);
        $this->load->model('TCCAtividade', 'modelAtividade', TRUE);
        $this->load->library('session');
    }

    public function index($mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
            if($this->session->userdata('tipo_usuario') != PROFESSOR) {
                
        $data['gamificacao1'] = $this->modelAtividade->getGamificacaoIdUsuario($this->session->userdata('id'), 1, $this->session->userdata('id_quiz'));
        $data['gamificacao2'] = $this->modelAtividade->getGamificacaoIdUsuario($this->session->userdata('id'), 2, $this->session->userdata('id_quiz'));
        $data['gamificacao3'] = $this->modelAtividade->getGamificacaoIdUsuario($this->session->userdata('id'), 3, $this->session->userdata('id_quiz'));
        $pontos = $this->modelAtividade->getPontos($this->session->userdata('id_quiz'));
        $quiz = $this->modelAtividade->getQuiz($this->session->userdata('id_quiz'));
        
        $turmaB = 0;
        $turmaC = 0;
        $pontosUsuario = 0;
        
        foreach ($pontos as $ponto) {
            $usuario = $this->modelUsuario->getUsuario($ponto['id_usuario']);
            
            if($this->session->userdata('id') == $ponto['id_usuario']) {
                $pontosUsuario = $pontosUsuario + $ponto['pontuacao'];
            }

            if($usuario->ano_escolar == $quiz->time1) {
                $turmaB = $turmaB + $ponto['pontuacao'];
            } else if($usuario->ano_escolar == $quiz->time2) {
                $turmaC = $turmaC + $ponto['pontuacao'];
            }
        }
        
        $qtd1 = $usuarios = $this->modelUsuario->getUsuariosQuiz($this->session->userdata('id_quiz'), $quiz->time1, 1);
        $qtd2 = $usuarios = $this->modelUsuario->getUsuariosQuiz($this->session->userdata('id_quiz'), $quiz->time2, 2);
        
        $data['pontosB'] = $turmaB/count($qtd1);
        $data['pontosC'] = $turmaC/count($qtd2);
        
        $data['pontosUsuario'] = $pontosUsuario;
        
        $data['quiz'] = $quiz;
        
        $data['mensagem'] = $mensagem;
        
        $this->load->view('atividade/principal', $data);
        } else {
            $data['quizzes'] = $this->modelAtividade->getQuizzes($this->session->userdata('id'));
            $this->load->view('atividade/indexProfessorView', $data);
        }
        } else {
            $this->load->view('welcome_message');
        }
        
    }
    
    public function cadastrarPergunta($mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
            $data['mensagem'] = $mensagem;
            
        $this->load->view('atividade/cadastrarPerguntaView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function inserirPergunta($id = NULL) {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules("descricao", "Descricao", "required");
        $this->form_validation->set_rules("valor", "Valor", "required");
        $this->form_validation->set_rules("fase", "Fase", "required");
        $this->form_validation->set_rules("certa", "Certa", "required");
        $this->form_validation->set_rules("alternativa1", "Alternativa", "required");
        $this->form_validation->set_rules("alternativa12", "Alternativa", "required"); 
        $this->form_validation->set_rules("alternativa13", "Alternativa", "required"); 
        
        $texto = nl2br($post['descricao']);
        $data['descricao'] = trim($texto);
        $data['valor'] = $post['valor'];
        $data['nivel'] = $post['fase'];
        $data['alternativa_certa'] = $post['certa'];
        $data['alternativa1'] = $post['alternativa1'];
        $data['alternativa2'] = $post['alternativa2'];
        $data['alternativa3'] = $post['alternativa3'];
        $data['ativo'] = $post['ativo'];
        $data['id_quiz'] = $post['quiz'];
            
        if($id) { //edicao
            $data['id'] = $id;
            if ($this->modelAtividade->atualizarPergunta($data)) {
                    $mensagem = 'Pergunta atualizada com sucesso!';
                    $this->editarPergunta($id, $post['quiz'], $mensagem);
            } else {
                    $mensagem = 'Não foi possível atualizar pergunta!';
                    $this->editarPergunta($id, $post['quiz'], $mensagem);
            }
        } else {
            if($this->modelAtividade->inserirPergunta($data)) {
                $mensagem = 'Pergunta cadastrada com sucesso!';
                $this->inserirPerguntaToProfessorQuiz($mensagem, $post['quiz']);
            } else {
                $mensagem = 'Não foi possível cadastrar pergunta!';
                $this->inserirPerguntaToProfessorQuiz($mensagem, $post['quiz']);
            }
        }        
    }
    
    public function jogarFase($nivel, $denovo = NULL) {
        if ($this->session->userdata('loginuser')) {
    
        $data['denovo'] = $denovo;
        if($nivel == 1) {
            $data['perguntas'] = $this->modelAtividade->getPerguntas($nivel);
            $data['nivel'] = $nivel;
            $data['texto'] = 'Histórias Clássicas Infantil';
            $this->load->view('atividade/quizView', $data);
            
        } else if($nivel == 2) {
            $data['perguntas'] = $this->modelAtividade->getPerguntas($nivel);
            $data['nivel'] = $nivel;
            $data['texto'] = 'Folclore Brasileiro';
            $this->load->view('atividade/quizView', $data);
            
        } else if($nivel == 3) {
            $data['perguntas'] = $this->modelAtividade->getPerguntas($nivel);
            $data['nivel'] = $nivel;
            $data['texto'] = 'Fábulas';
            $this->load->view('atividade/quizView', $data);
            
        }
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function responderQuiz() {
        if ($this->session->userdata('loginuser')) {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $peso = 1;
        $soma = 0;
        
        if(!empty($post['denovo'])) {
            $this->modelAtividade->removerPontuacao($this->session->userdata('id'), $post['1Nivel']);
            $peso = 0.7;
        }
        
        $i = 1;
        while($i < 4) {
            if(empty($post[$i])) {
                $data['id_usuario'] = $this->session->userdata('id');
                $data['id_pergunta'] = $post[$i.'Pergunta'];
                $data['resposta'] = 0;
                $data['nivel'] = $post[$i.'Nivel'];
                $data['pontuacao'] = 0;
                $soma = $soma + 0;
            } else {
                $data['id_usuario'] = $this->session->userdata('id');
                $data['id_pergunta'] = $post[$i.'Pergunta'];
                $data['resposta'] = $post[$i];
                $data['nivel'] = $post[$i.'Nivel'];

                if($post[$i] == $i.'4') { //certa
                    $data['pontuacao'] = $post[$i.'Valor'] * $post[$i.'Nivel'] * $peso;
                    $soma = $soma + $post[$i.'Valor'] * $post[$i.'Nivel'] * $peso;;
                } else {
                    $data['pontuacao'] = 0;
                    $soma = $soma + 0;
                }
            }
            
            $this->modelAtividade->inserirPontuacao($data);
            $i++;
        }
        
        if($data['nivel'] == 1) {
            if($soma >= 14) {
                $data['pontuacao'] = $soma;
                $data['sucesso'] = TRUE;
                $this->load->view('atividade/respostaQuizView', $data);
            } else {
                $data['pontuacao'] = $soma;
                $data['sucesso'] = FALSE;
                $this->load->view('atividade/respostaQuizView', $data);
            }
            
        } else if($data['nivel'] == 2) {
            if($soma >= 28) {
                $data['pontuacao'] = $soma;
                $data['sucesso'] = TRUE;
                $this->load->view('atividade/respostaQuizView', $data);
            } else {
                $data['pontuacao'] = $soma;
                $data['sucesso'] = FALSE;
                $this->load->view('atividade/respostaQuizView', $data);
            }
            
        } else if($data['nivel'] == 3) {
            if($soma >= 42) {
                $data['pontuacao'] = $soma;
                $data['sucesso'] = TRUE;
                $this->load->view('atividade/respostaQuizView', $data);
            } else {
                $data['pontuacao'] = $soma;
                $data['sucesso'] = FALSE;
                $this->load->view('atividade/respostaQuizView', $data);
            }
            
        }
        } else {
            $this->load->view('welcome_message');
        }
         
    }
    
    public function verResposta($nivel, $idUsuario) {
        if ($this->session->userdata('loginuser')) {
        $gamificacao = $this->modelAtividade->getGamificacaoIdUsuario($idUsuario, $nivel, $this->session->userdata('id_quiz'));
        $soma = 0;
        foreach ($gamificacao as $game) {
            $soma = $soma + $game['pontuacao'];
        }
        
        $perguntas = array();
        
        $perguntas[0] = $this->modelAtividade->getPergunta($gamificacao[0]['id_pergunta']);
        $perguntas[1] = $this->modelAtividade->getPergunta($gamificacao[1]['id_pergunta']);
        $perguntas[2] = $this->modelAtividade->getPergunta($gamificacao[2]['id_pergunta']);
        
        $data['perguntas'] = $perguntas;
        $data['gamificacao'] = $gamificacao;
        $data['soma'] = $soma;
        
        $data['nivel'] = $nivel;
        $this->load->view('atividade/quizResposta', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    
    public function getNome($turma) {
        $data['nomes'] = $this->modelAtividade->getNome($turma);
        
        $this->load->view('atividade/nomesQuiz', $data);
    }
    
    public function questionario($mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
        $data['mensagem'] = $mensagem;
        
        if($this->modelAtividade->verificaQuestionario($this->session->userdata('id'))) {
            $mensagem = 'Você já respondeu o questionário.';
            $this->index($mensagem);
        } else {
        
            $this->load->view('atividade/questionarioView', $data);
        }
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function responderQuestionario() {
        if ($this->session->userdata('loginuser')) {
        $post = $this->input->post();
        $this->load->library('form_validation');
        
        $data['id_usuario'] = $this->session->userdata('id');

        if(empty($post['perg1']) || empty($post['perg2']) || empty($post['perg3']) || 
        empty($post['perg4']) || empty($post['perg5'])) {

            $mensagem = 'Alguma pergunta não foi respondida. Todas as perguntas devem ser respondidas.';
            $this->questionario($mensagem);
        } else {
            $data['pergunta1'] = $post['perg1'];
            $data['pergunta2'] = $post['perg2'];
            $data['pergunta3'] = $post['perg3'];
            $data['pergunta4'] = $post['perg4'];
            $data['pergunta5'] = $post['perg5'];
            $data['texto'] = $post['texto'];

            $data2['id_usuario'] = $this->session->userdata('id');
            $data2['id_pergunta'] = 0;
            $data2['resposta'] = 0;
            $data2['nivel'] = 0;
            $data2['pontuacao'] = 10;

            $this->modelAtividade->inserirRespostaQuestionario($data);
            $this->modelAtividade->inserirPontuacao($data2);
            $mensagem = 'Obrigado por responder a pesquisa. Acaba de ganhar mais 10 pontos pela '
                    . 'participação.';
            $this->index($mensagem);
        }
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function verPerguntas () {
        if ($this->session->userdata('loginuser')) {
            $post = $this->input->post();
            $this->load->library('form_validation');
            $this->form_validation->set_rules("quiz", "Quiz", "required");

            $data['perguntas'] = $this->modelAtividade->getTodasPerguntas($post['quiz']);
            $this->load->view('atividade/verPerguntasView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function editarPergunta ($idPergunta, $idQuiz = NULL, $mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
            $data['mensagem'] = $mensagem;
            $data['dados_pergunta'] = $this->modelAtividade->getPergunta($idPergunta);
            $data['quiz'] = $idQuiz;
            $this->load->view('atividade/cadastrarPerguntaView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function cadastrarQuiz ($mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
            $data['mensagem'] = $mensagem;
            $this->load->view('atividade/cadastrarQuizView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function inserirQuiz($id = NULL) {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules("nome", "Nome", "required");
        $this->form_validation->set_rules("tema1", "tema1", "required");
        $this->form_validation->set_rules("tema2", "tema2", "required");
        $this->form_validation->set_rules("tema3", "tema3", "required");
        $this->form_validation->set_rules("time1", "time1", "required");
        $this->form_validation->set_rules("time2", "time2", "required"); 
        $this->form_validation->set_rules("ativo", "ativo", "required"); 
        
        $data['nome'] = $post['nome'];
        $data['tema1'] = $post['tema1'];
        $data['tema2'] = $post['tema2'];
        $data['tema3'] = $post['tema3'];
        $data['time1'] = $post['time1'];
        $data['time2'] = $post['time2'];
        $data['ativo'] = $post['ativo'];
        $data['id_Professor'] = $this->session->userdata('id');
        $data['descricao'] = nl2br($post['descricao']);
            
        if($id) { //edicao
            $data['id'] = $id;
            if ($this->modelAtividade->atualizarQuiz($data)) {
                    $mensagem = 'Quiz atualizado com sucesso!';
                    $this->editarQuiz($id, $mensagem);
            } else {
                    $mensagem = 'Não foi possível atualizar quiz!';
                    $this->editarQuiz($id, $mensagem);
            }
        } else {
            if($this->modelAtividade->inserirQuiz($data)) {
                $mensagem = 'Quiz cadastrado com sucesso!';
                $this->cadastrarQuiz($mensagem);
            } else {
                $mensagem = 'Não foi possível cadastrar quiz!';
                $this->cadastrarQuiz($mensagem);
            }
        }  
    }
    
    public function editarQuiz ($idQuiz, $mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
            $data['mensagem'] = $mensagem;
            $data['dados_quiz'] = $this->modelAtividade->getQuiz($idQuiz);
            $this->load->view('atividade/cadastrarQuizView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function cadastrarPerguntaToProfessor($mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
            $data['mensagem'] = $mensagem;
            $data['quizzes'] = $this->modelAtividade->getQuizzes($this->session->userdata('id'));
            $data['funcao'] = 'atividade/inserirPerguntaToProfessorQuiz';
            $this->load->view('atividade/escolherQuizView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function inserirPerguntaToProfessorQuiz($mensagem = NULL, $idQuiz = NULL) {
        if ($this->session->userdata('loginuser')) {
            $post = $this->input->post();
            $this->load->library('form_validation');
            $this->form_validation->set_rules("quiz", "Quiz", "required");
            
            if($idQuiz) {
               $data['quiz'] = $idQuiz; 
            } else {
                $data['quiz'] = $post['quiz'];
            }
            
            $data['mensagem'] = $mensagem;
            
            $this->load->view('atividade/cadastrarPerguntaView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
    
    public function verListaPergunta($mensagem = NULL) {
        if ($this->session->userdata('loginuser')) {
            $data['mensagem'] = $mensagem;
            $data['quizzes'] = $this->modelAtividade->getQuizzes($this->session->userdata('id'));
            $data['funcao'] = 'atividade/verPerguntas';
            $this->load->view('atividade/escolherQuizView', $data);
        } else {
            $this->load->view('welcome_message');
        }
    }
}

