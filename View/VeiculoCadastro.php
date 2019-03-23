

<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <?php
        include './DAO/VeiculoDAO.php';
        $objVeiculoDAO = new VeiculoDAO();
        ?>
        <div class="row">
            <div class="col s12">
                <form action="" method="POST">
                    <div class="card">
                        <div class="card-content black-text">
                            <span class="card-title">Cadastrar</span>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input type="text" class="validate" name="nome">
                                    <label>Nome</label>
                                </div>

                                <div class="input-field col s4">
                                    <input type="text" class="validate" name="tipo">
                                    <label>Tipo</label>
                                </div>

                                <div class="input-field col s4">
                                    <input type="text" class="validate" name="combustivel">
                                    <label>Combustivel</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input type="text" class="validate" name="modelo">
                                    <label>Modelo</label>
                                </div>

                                <div class="input-field col s4">
                                    <input type="text" class="validate" name="marca">
                                    <label>Marca</label>
                                </div>

                                <div class="input-field col s4">
                                    <input type="number" class="validate" name="ano">
                                    <label>Ano</label>
                                </div>

                            </div>

                        </div>
                        <div class="card-action">
                            <button class="btn waves-effect waves-light" type="submit" name="salvar">Salvar
                                <i class="material-icons right">send</i>
                            </button>
                            <button class="btn waves-effect waves-light" type="reset" name="limpar">Cancelar
                                <i class="material-icons right">clear</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    
        <!--JavaScript at end of body for optimized loading-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>

<?php
if (isset($_POST['salvar'])) {
    $objVeiculoDAO->salvarVeiculo();
    header("Location: index.php");
}
?>
