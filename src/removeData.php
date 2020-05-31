<?php

    if(empty($_GET) == false){
        echo "processando";

        $value = $_GET['excluir']; // pegando o valor do que irá ser excluido

        include_once '../conf/MySqlConf.php'; // chamando as configurações do mysql

        $result = $dbh->exec("delete from email where id_email = '{$value}'"); // executando o script de deletar o campo selecionado

        header('location:../pages/history.php'); // voltando a pagina do histórico
    }else{
        header('location:../index.php'); // retornando ao index.php
    }
    

?>