<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="./assets/css/materialize.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <?php
        renderBody();
        ?>
    </body>
    <script src="./assets/js/materialize.min.js"></script>
</body>
</html>

<?php

function renderBody() {
    $ComponentHeader = 'Header.php';
    $TelaHome = 'Home.php';
    
//    Header renderizado na tela
    include "/View/shared/" . $ComponentHeader;
    
    if (isset($_GET['id'])) {
        //concatenando a rota clicada de acordo com id
        include "/View/" . $_GET['id'] . ".php";
    } else {
        include '/View/shared/' . $TelaHome;
    }
}
?>