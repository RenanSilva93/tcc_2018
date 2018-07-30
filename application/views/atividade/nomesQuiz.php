<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');

echo count($nomes);

echo '<br>';
foreach ($nomes as $nome) {
    echo 'Usuáio: ' . $nome['username'] . '<br>';
    echo 'Senha: ' . $nome['senha'] . '<br><br>';
}
?>



<?php $this->load->view('templates/footer'); ?>

