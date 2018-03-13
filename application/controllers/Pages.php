<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

	public function __construct()
	{
		parent::__construct("pages");
	}
	
	public function index()
	{
		$this->view();
	}
	
	private function show_page($page, $path = NULL)
	{
		if (! file_exists(APPPATH . '/views/'. $path . $page.'.php')) {
			$this->error();							// Ooops, nao existe esta pagina
		}
		else {
			$this->data['title'] = ucfirst($page); 	// Coloca a primeira letra como maiuscula
			$this->render($path . $page);
		}
	}	
	
	public function view($page = 'home')
	{
		$this->show_page($page);
	}
	
	public function view_auth($page = 'auth')
	{
		$this->show_page($page, 'auth/');
	}
	
    public function error() {
		$this->render('pages/error');
    }

	
	public function sobre() {
		$this->render('pages/sobre');
	}
}

