<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class MY_DB_mysqli_driver extends CI_DB_mysqli_driver {

	private $conn2_id = FALSE;

	function __construct($params) {
		parent::__construct($params);
		log_message('debug', 'MY DB Mysqli driver class instantiated!');
	}

	protected function _connect_conn2() {
		if (!$this->conn2_id) {
			$this->conn2_id = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);// mysqli_connect("p:".$this->dsn);
		}
	}

	protected function _close() {
		mysqli_close($this->conn_id);
		mysqli_close($this->conn2_id);
	}

	private function must_gen_log($sql) {
		return ((strpos($sql, "INSERT") !== FALSE) ||
				(strpos($sql, "UPDATE") !== FALSE) ||
				(strpos($sql, "DELETE") !== FALSE)) &&
				(!strpos($sql, "sessions"));
	}

	protected function _execute($sql) {
		$ok = parent::_execute($sql);
		
		if ($this->must_gen_log($sql)) {
			$CI = & get_instance();
			$ip = $CI->input->ip_address();
			$curr_user = $CI->get_curr_user();

			if ($curr_user) {
				$this->_connect_conn2();

				$log_query = "INSERT INTO " . TABELA_LOG . " (usuario, instrucao,ip) VALUES (" . $curr_user->getId() . "," .
						$this->escape($sql) . "," . $this->escape($ip) . ")";
				$ok2 = mysqli_query($this->conn2_id, $log_query);
			} 
		}
		
		return $ok;
	}

}
