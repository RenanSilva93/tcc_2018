<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TCCLogin extends CI_Model {

    public function __construct() {
        parent::__construct('login');
    }

    public function buscarUsuario($username, $senha) {
        $array = array('username' => $username);
        $query = $this->db->get_where(TABELA_USUARIO, $array);
        $resultado = $query->result();
        if(!empty($resultado)){
            $result = $query->row();
            if ($senha == $result->senha/*password_verify($senha, $result->senha)*/) {
                return $result;
            } else {
                return false;
            }
        }
    }

}

?>


