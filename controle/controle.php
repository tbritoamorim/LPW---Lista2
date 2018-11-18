<?php
include_once("../acessodados/acessodb.php");
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "linguagemprogramacaowebi";

if(!dbConnection($host, $user, $pass, $dbName)) {
    die("Problemas na conexão com o banco $dbName !<br>");
}

function select($tabela, $campos, $criterio, $ordem) {
    return dbSelect($tabela, $campos, $criterio, $ordem);
}

function selectMax($tabela, $campo) {
    return dbSelectMax($tabela, $campo);
}

function numLinhas($result) {
    return dbNumRows($result);
}

function camposRegistro($result) {
    return dbFetchArray($result);
}

function insert($tabela, $valores, $criterio) {
    if(!dbUpdate($tabela, $valores, $criterio)) {
        $msg = "Não foi possível alterar os dados!";
        return false;
    }
    return true;
}

function delete($tabela, $criterio){
    if(!dbDelete($tabela, $criterio)){
        $msg = "Não foi possível excluir os dados";
        return false;
    }
    return true;
}
?>