<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atividade extends MY_Controller {

    public function __construct() {
        parent::__construct("atividade");
        $this->load->model('TCCUsuario', 'modelUsuario', TRUE);
        $this->load->library('session');
    }
    
    public function index() {
        $this->load->view('atividade/principal');
    }
}

