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
                            <input type="text" name="nome" id="nome">
                            <label>Nome</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="text" name="tipo" id="tipo">
                            <label>Tipo</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="text" name="combustivel" id="combustivel">
                            <label>Combustivel</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" name="modelo" id="modelo">
                            <label>Modelo</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="text" name="marca" id="marca">
                            <label>Marca</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="number" name="ano" id="ano">
                            <label>Ano</label>
                        </div>

                    </div>

                </div>
                <div class="card-action">
                    <input class="btn waves-effect waves-light" type="submit" name="salvar" id="salvar" value="Salvar">
                    <input class="btn waves-effect waves-light" type="reset" name="limpar" id="limpar" value="Limpar">
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
if (($_POST['salvar'])) {
    if (!empty($_GET['nome']) && !empty($_GET['tipo']) && !empty($_GET['combustivel']) && !empty($_GET['marca']) && !empty($_GET['modelo']) && !empty($_GET['ano'])) {
        $objVeiculoDAO->salvarVeiculo();
    } else {
        echo '<script>

                window.onload = () => toastAlert("Preencha todos os campos!");
              </script>';
    }
}
