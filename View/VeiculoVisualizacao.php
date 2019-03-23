
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
