<h3 class="mt-3 text-primary">
    Fornecedor
</h3>

<div class="card shadow mt-3"><!-- acrescentei um card com sombra aqui tbm -->
    <form method="post" name="formsalvar" id="formSalvar" class="m-3" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">
                Nome
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Nome"
                    value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">
                Informações
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtinformacoes" name="txtinformacoes" placeholder="Informações"
                    value="">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit"
                    class="btn btn-primary"
                    name="btnsalvar"
                    value="Cadastrar">
            </div>
            <!-- faltou um link aqui-->
            <a href="?p=fornecedores" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>

<?php
    //verificar se botão btnsalvar foi acionado
    if(filter_input(INPUT_POST, 'btnsalvar')){
        $nome = filter_input(INPUT_POST, 'txtnome');
        $info = filter_input(INPUT_POST, 'txtinformacoes');

    //acesso a classe em models
        include_once '../models/fornecedor.php';
        $for = new Fornecedor();

    //enviando os dados do form aos aributos de classe
    $for->setId(NULL);
    $for->setNome($nome);
    $for->setInformacoes($info);

    //efetivar o insert into
    if($for->salvar()) {
        ?>
            <div class="alert alert-primary mt-3" role="alert">
                Fornecedor - Cadastro efetuado com sucesso.
            </div>

        <?php
        } else {
            ?>
            <div class="alert alert-danger mt-3" role="alert">
                Fornecedor - Erro ao cadastrar.
            </div>

        <?php
        }
    }