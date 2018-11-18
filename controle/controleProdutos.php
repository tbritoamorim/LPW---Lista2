<?php
include_once("controle.php");
function selecionaOpcao() {
    $id_opr = @$_REQUEST["id_opr"];
    $tx_acao  = @trim(strtolower($_REQUEST["acao"]));
    $id_produto = @$_REQUEST["id"];
    $nome = @$_REQUEST["nome"];
    $codigo = @$_REQUEST["codigo"];
    $descricao = @$_REQUEST["descricao"];
    $valorcompra = @$_REQUEST["valor_compra"];
    $valorvenda = @$_REQUEST["valor_venda"];
    $tabela = "produtos";
    $pk = "id";

    switch($tx_acao) {
        case "incluir":
            $id = selectMax($tabela, $pk);
            $valores = "$id, $nome, $codigo, $descricao, $valorcompra, $valorvenda";
            if(insert($tabela, $valores)) {
                echo "Registro incluído com sucesso!<br>";
            }
            $_REQUEST["nome"] = "";
            $_REQUEST["codigo"] = "";
            $_REQUEST["descricao"] = "";
            $_REQUEST["valor_compra"] = "";
            $_REQUEST["valor_venda"] = "";
            $_REQUEST["id_opr"]=1;
            break;
        case "salvar":
            $valores = "nome = '$nome', codigo = '$codigo', descricao = '$descricao', valor_compra = '$valorcompra', valor_venda = '$valorvenda'";
            if(update($tabela, $valores, "id = $id_produto")) {
                echo "Registro alterado com sucesso!<br>";
            }        
            $_REQUEST["id_opr"]=2;
            break;
        case "excluir":
            if(delete($tabela, "id = $id_produto")) {
                echo "Registro excluído com sucesso!<br>";
            }
            echo "<script language=javascript>self.location.href='index.php'; </script>";
            break;
        if(!empty($id_produto) && $tx_acao == "") {
            $result = select($tabela, "*", "id = $id_produto", null);
            if($linha = camposRegistro($result)) {
                $_REQUEST["nome"] = $linha["nome"];
                $_REQUEST["codigo"] = $linha["codigo"];
                $_REQUEST["descricao"] = $linha["descricao"];
                $_REQUEST["valor_compra"] = $linha["valor_compra"];
                $_REQUEST["valor_venda"] = $linha["valor_venda"];
            }
        }
    }
}
?>