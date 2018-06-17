<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TCCUsuario extends CI_Model {

    private $id;
    private $nome;
    private $username;
    private $email;
    private $nome_responsavel;
    private $tipo_usuario;
    private $ano_escolar;
    private $data_nascimento;
    private $telefone;
    private $sexo;
        
    public function construct ($username = null, $id = null) {
        parent::__construct('usuario');
        $this->load->database();

        $resultado = NULL;
        if($username) {
            $query = $this->db->get_where(TABELA_USUARIO, array('username' => $username));
            $resultado = $query->row();
        } else if($id) {
            $query = $this->db->get_where(TABELA_USUARIO, array('id' => $id));
            $resultado = $query->row();
        }

        if ($resultado) {
            $this->id = $resultado->id;
            $this->nome = $resultado->nome;
            $this->username = $resultado->username;
            $this->email = $resultado->email;
            $this->tipo_usuario = $resultado->tipo_usuario;
            $this->data_nascimento = $resultado->data_nascimento;
            $this->nome_responsavel = $resultado->nome_responsavel;
            $this->ano_escolar = $resultado->ano_escolar;
            $this->telefone = $resultado->telefone;
            $this->sexo = $resultado->sexo;
        }
    }
    
    public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}
	
	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}
        
        public function getTipo_usuario() {
		return $this->tipo_usuario;
	}

	public function setTipo_usuario($tipo_usuario) {
		$this->tipo_usuario = $tipo_usuario;
	}
        
        function getData_nascimento() {
		return $this->data_nascimento;
	}
        
        function setDataNascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
        }
        
        function getSexo() {
		return $this->sexo;
	}
	
	function setSexo($sexo) {
		$this->sexo = $sexo;
	}
        
        function getTelefone() {
		return $this->telefone;
	}

	function setTelefone($telefone) {
		$this->telefone = $telefone;
	}
        
        function getNome_Responsavel() {
		return $this->nome_responsavel;
	}

	function setNome_Responsavel($nome_responsavel) {
		$this->nome_responsavel = $nome_responsavel;
	}
        
        function getAno_escolar() {
		return $this->ano_escolar;
	}

	function setAno_escolar($ano_escolar) {
		$this->ano_escolar = $ano_escolar;
	}


    public function verificarUsername($username) {
        $array = array('username' => $username);
        $query = $this->db->get_where(TABELA_USUARIO, $array);
        $resultado = $query->row();
        if(empty($resultado)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getUsuarios() {
        $query = $this->db->get_where(TABELA_USUARIO);
        $resultado = $query->result_array();
        return $resultado;
    }
	
    public function getUsuario($id) {
        $array = array('id' => $id);
        $query = $this->db->get_where(TABELA_USUARIO, $array);
        $resultado = $query->row();
        return $resultado;
    }
    
    public function cadastrar($data){
        if($this->db->insert(TABELA_USUARIO, $data)) {
            return true;
        } else {
            return false;
        }
    }
}


