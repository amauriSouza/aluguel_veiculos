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


<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content black-text">
                <span class="card-title">Pesquisar</span>


                <div class="row">
                    <div class="col s12">

                        <table class="highlight">
                            <thead>
                                <tr>
                                    <th>Chassi</th>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Combustivel</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Ano</th>

                                    <th>Ações</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $listaVeiculos = $objVeiculoDAO->getVeiculos();
                                foreach ($listaVeiculos as $value) {
                                    echo "<tr>";
                                    echo '<td>' . $value['codigo'] . '</td>';
                                    echo '<td>' . $value['nome'] . '</td>';
                                    echo '<td>' . $value['tipo'] . '</td>';
                                    echo '<td>' . $value['combustivel'] . '</td>';
                                    echo '<td>' . $value['modelo'] . '</td>';
                                    echo '<td>' . $value['marca'] . '</td>';
                                    echo '<td>' . $value['ano'] . '</td>';
                                    echo '<td>Icones</td>';

                                    echo "</tr>";
                                }
                                ?>


                            </tbody>


                        </table>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


<?php
if (isset($_POST['salvar'])) {
    $objVeiculoDAO->salvarVeiculo();
    header("Location: index.php");
}
?>