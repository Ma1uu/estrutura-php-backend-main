<?php

$id = filter_input(INPUT_GET, 'id');

if ($id) {

    include_once '../models/Fornecedor.php';

    $for = new Fornecedor();
    $for->setID($id);

    if ($for->excluir()) {
?>

        <div class="alert alert-primary" role="alert">
            Excluído com sucesso
        </div>

<?php
    }
}
?>

<meta http-equiv="refresh"
      content="1.5;URL=?p=fornecedores">