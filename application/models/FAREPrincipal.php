<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FAREPrincipal extends CI_Model {

    public function __construct() {
        parent::__construct('principal');
    }

    public function inserirContato($data) {
        if($this->db->insert(TABELA_CONTATO, $data)) {
            return true;
        } else {
            return false;
        }
    }

}

?>