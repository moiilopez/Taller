<?php

function executeCommand($sqlCommand, $parameters){
    
    try{
        $connection = new PDO('mysql:dbname=taller;host=localhost','root', 'mysql');
        $connection ->beginTransaction();
        $comand = $connection ->prepare($sqlCommand);
    
        if($parameters != null){
            foreach ($parameters as $key => $value){
                $comand->bindValue($key, $value);
                //echo $key."=>".$value."<br>";
            }
        }
        $comand ->execute();
        $connection->commit();
        return true;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        if($connection != null){
            if($connection->inTransaction()){
                $connection->rollBack();
            }
        }
        return false;
    } finally {
        if($connection != null){
            $connection = null;
        }
    }
}

function executeQuery($sqlCommand, $parameters) {
    try {
        $connection = new PDO('mysql:dbname=taller;host=localhost', 'root', 'mysql');
        $command = $connection->prepare($sqlCommand);

        if ($parameters != null) {
            foreach ($parameters as $key => $value) {
                $listaRetorno = array();
                $command->bindValue($key, $value);
                //echo $key."=>".$value."<br>";
            }
        }
        $command->execute();
        $listaRetorno = array();
        for ($i = 0; $row = $command->fetch(PDO::FETCH_ASSOC); $i++) {
            array_push($listaRetorno, $row);
        };
        return $listaRetorno;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        if ($connection != null) {
            if ($connection->inTransaction()) {
                $connection->rollBack();
            }
        }
        return array();
    } finally {
        //UTILIZADO NA VERSAO DO PHP 5.6 NAS PREVIAS NAO É COMPATÍVEL
        if ($connection != null) {
            //FECHA A CONEXAO COM O BANCO DE DADOS
            $connection = null;
        }
    }
}

