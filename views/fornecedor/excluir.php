<?php 
    $id = filter_input(INPUT_GET, 'id');

    if($id){
        include_once '../models/Fornecedor.php';
        $cat = new Fornecedor();
        $cat -> setId($id);

        if($cat->excluir()){
     ?>
            <div class="alert alert-primary" role="alert">
                Excluído com sucesso
            </div>
    <?php
        }
    }
    ?>
    <meta http-equiv="refresh" CONTENT="1.5;URL=?p=fornecedores"