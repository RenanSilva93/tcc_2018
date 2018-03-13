<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data = array();
	private $curr_user;

	function __construct($son_class) {
		
		parent::__construct();
		$this->data['pagetitle'] = 'GAMEQUIZ';
		$this->load->model('TCCUsuario', 'modelUsuario');
		$this->load->helper('cookie');

		/*if ($this->session->userdata('loginuser')) {
			$this->curr_user = new TCCUsuario($this->session->userdata('username'));
		} else {
			$this->curr_user = new TCCUsuario(0);
		}

		if ($son_class != "pages" && $son_class != "painel" &&
				!$this->curr_user->hasPrivilege($son_class . "/" . $this->router->method)) {
			if ($this->curr_user->getTipo_usuario() == VISITANTE) {
				set_cookie("uri_destino", $this->uri->uri_string() ,time()+ $this->config->item('sess_expiration'));
				redirect('painel/index', 'refresh');
			}
			else {
				redirect('pages/view/notGranted');
			}
		}*/
	}

	function get_curr_user() {
		return $this->curr_user;
	}

	/*protected function render($the_view = NULL, $template = 'master', $returnHTML = FALSE) {
		$html = NULL;

		if ($template == 'json' || $this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			if (!$returnHTML) {
				echo json_encode($this->data);
			} else {
				$html = json_encode($this->data);
			}
		} elseif (is_null($template)) {
			if (!$returnHTML) {
				$this->load->view($the_view, $this->data);
			} else {
				$html = $this->load->view($the_view, $this->data, true);
			}
		} else {
			$this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
			$this->data['database_host'] = $this->db->hostname;

			if (!$returnHTML) {
				$this->load->view('templates/' . $template . '_view', $this->data);
			} else {
				$html = $this->load->view('templates/' . $template . '_view', $this->data, true);
			}
		}
		return $html;
	}*/

}
