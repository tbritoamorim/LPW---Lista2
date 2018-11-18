<?php
include_once("controle.php");
function selecionaOpcao() {
    $id_opr = @$_REQUEST["id_opr"];
    $tx_acao = @trim(strtolower($_REQUEST["acao"]));
    $id_cat = @$_REQUEST["id"];
    $categoriascol = @$_REQUEST["categoriascol"];
    $tabela = "categorias";
    $pk = "id";

    switch($tx_acao) {
        case "incluir":
            $id = selectMax($tabela, $pk);
            $valores = "$id, '$tx_tipo'";
            if(insert($tabela, $valores)) {
                echo "Registro incluído com sucesso!<br>";
            }
            $_REQUEST["categoriascol"] = "";
            $_REQUEST["id_opr"] = 1;
            break;
        case "salvar":
            $valores = "categoriascol='$categoriascol'";
            if(update($tabela, $valores, "id='$id_cat'")) {
                echo "Registro alterado com sucesso!<br>";
            } 
            $_REQUEST["id_opr"] = 2;
            break;
        case "excluir":
            if(delete($tabela, "id='$id_cat'")) {
                echo "Registro deletado com sucesso!<br>";
            }
            echo "<script language=javascript>self.location.href='index.php'; </script>";
            break;
    }

    if(!empty($id_cat) && $tx_acao == "") {
        $result = select($tabela, "*", "categoriascol = $categoriascol", null);
        if($linha = camposRegistro($result)) {
            $_REQUEST["categoriascol"] = $linha["categoriascol"];
        }
    }
}
?>