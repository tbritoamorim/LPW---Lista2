<?php
function dbConnection($host, $user, $pass, $dbName) {
    $conn = mysqli_connect($host, $user, $pass);
    if($conn) {
        if(!mysqli_select_db($conn, $dbName)) {
            return false;
        }
    } else {
        return false;
    }
    return true;
}

function dbSelect($tabela, $campos, $criterio, $ordem) {
    $sql = " SELECT $campos FROM $tabela ";
    if(isset($criterio)) {
        $sql .= " WHERE $criterio ";
    }
    if(isset($ordem)) {
        sql .= " ORDER BY $ordem ";
    }
    return mysqli_query($conn, $sql);
}

function dbSelectMax($tabela, $campo){
    $result=mysqli_query($conn, "SELECT MAX($campo) AS max FROM $tabela");
    if ($linha=mysqli_fetch_array($result)) { 
        $id=$linha["max"]+1;
    }
    else {
        $id=1;
    }
    return $id;
}

function dbInsert($tabela, $valores){
    $sql  = " INSERT INTO $tabela VALUES ";
    $sql .= " ( $valores ) ";
    return mysqli_query($conn, $sql);  
}

function dbUpdate($tabela, $valores, $criterio){
    $sql  = " UPDATE $tabela SET $valores ";
    if(isset($criterio)){
        $sql .= " WHERE $criterio ";
    }
    return mysqli_query($conn, $sql);
}

function dbDelete($tabela, $criterio){
    $sql  = " DELETE FROM $tabela ";
    if(isset($criterio)){
        $sql .= " WHERE $criterio ";
    }
    return mysqli_query($conn, $sql);
}

function dbNumRows($result){
    return mysqli_num_rows($result);
}
function dbFetchArray($result){
    return mysqli_fetch_array($result);
}

?>