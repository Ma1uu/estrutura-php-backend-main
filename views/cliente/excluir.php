<?php

$id = filter_input(INPUT_GET, 'id');

if ($id) {

    include_once '../models/Cliente.php';

    $cli = new Cliente();
    $cli->setID($id);

    if ($cli->excluir()) {
?>

        <div class="alert alert-primary" role="alert">
            Excluído com sucesso
        </div>

<?php
    }
}
?>

<meta http-equiv="refresh"
      content="1.5;URL=?p=clientes">