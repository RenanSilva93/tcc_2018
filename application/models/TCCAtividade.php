<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TCCAtividade extends CI_Model {

    function construct () {
        parrent::Model();
    }
    
    public function inserirPergunta($data){
        if($this->db->insert(TABELA_PERGUNTA, $data)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getPerguntas($nivel) {
        $array = array('nivel' => $nivel);
        $query = $this->db->get_where(TABELA_PERGUNTA, $array);
        $resultado = $query->result_array();
        return $resultado;
    }
    
    public function getTodasPerguntas($id_quiz) {
        $array = array('id_quiz' => $id_quiz);
        $query = $this->db->get_where(TABELA_PERGUNTA, $array);
        $resultado = $query->result_array();
        return $resultado;
    }
    
    public function inserirPontuacao($data) {
        $this->db->insert(TABELA_GAMIFICACAO, $data);
    }
    
    public function getGamificacaoIdUsuario($idUsuario, $nivel, $idQuiz) {
        $array = array('id_usuario' => $idUsuario, 'nivel' => $nivel, 'id_quiz' => $idQuiz);
        $query = $this->db->get_where(TABELA_GAMIFICACAO, $array);
        $resultado = $query->result_array();
        return $resultado;
    }
    
    public function removerPontuacao($idUsuario, $nivel) {
        $array = array('id_usuario' => $idUsuario, 'nivel' => $nivel);
        $this->db->where($array);
        $this->db->delete(TABELA_GAMIFICACAO);
        return true;
    }
    
    public function getPergunta($id) {
        $array = array('id' => $id);
        $query = $this->db->get_where(TABELA_PERGUNTA, $array);
        $resultado = $query->row();
        return $resultado;
    }
    
    public function getNome($turma) {
        $array = array('ano_escolar' => $turma);
        $this->db->order_by('nome', 'asc');
        $query = $this->db->get_where(TABELA_USUARIO, $array);
        $resultado = $query->result_array();
        return $resultado;
    }
    
    public function getPontos($idQuiz) {
        $array = array('id_quiz' => $idQuiz);
        $query = $this->db->get_where(TABELA_GAMIFICACAO, $array);
        $resultado = $query->result_array();
        return $resultado;
    }
    
    public function inserirRespostaQuestionario($data) {
        $this->db->insert(TABELA_QUESTIONARIO, $data);
    }
    
    public function verificaQuestionario($id) {
        $array = array('id_usuario' => $id);
        $query = $this->db->get_where(TABELA_QUESTIONARIO, $array);
        $resultado = $query->row();
        return $resultado;
    }
    
    public function atualizarPergunta($data) {
        $array = array('id' => $data['id']);
        $this->db->where($array);
        $this->db->set($data);
        $this->db->update(TABELA_PERGUNTA);
        
        return true;
    }
    
    public function inserirQuiz($data){
        if($this->db->insert(TABELA_QUIZ, $data)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getQuiz($idQuiz) {
        $array = array('id' => $idQuiz);
        $query = $this->db->get_where(TABELA_QUIZ, $array);
        $resultado = $query->row();
        return $resultado;
    }
    
    public function getQuizzes($idProfessor) {
        $array = array('id_Professor' => $idProfessor);
        $query = $this->db->get_where(TABELA_QUIZ, $array);
        $resultado = $query->result_array();
        return $resultado;
    }
    
    public function atualizarQuiz($data) {
        $array = array('id' => $data['id']);
        $this->db->where($array);
        $this->db->set($data);
        $this->db->update(TABELA_QUIZ);
        
        return true;
    }
}

