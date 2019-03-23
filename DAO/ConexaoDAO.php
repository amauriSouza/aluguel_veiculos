<?php

function getConexao() {
    $dsn = 'mysql:host=localhost;dbname=aluguelveiculos';
    $user = 'root';
    $pass = '';
    try {
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    } catch (PDOExeption $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}

function executaQuery($query) {
    try {
        $con = getConexao();
        $stm = $con->prepare($query);
        $stm->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function executaQueryR($query) {
    try {
        $con = getConexao();
        $stm = $con->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll();
        return $result;
    } catch (PDOException $e) {
        
    }
}
