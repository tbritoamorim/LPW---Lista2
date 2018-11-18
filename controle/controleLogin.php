<?php
include_once("controle.php");
function selecionaOpcao() {
    $tx_acao = @trim(strtolower($_REQUEST["acao"]));
    $tx_login = @trim($_REQUEST["tx_login"]);
    $tx_senha = @trim($_REQUEST["tx_senha"]);
    $tabela = "tb_usuario";
    $pk = "id_usuario";

    switch($tx_acao) {
        case "acessar":
            $result = select($tabela, "*", "tx_login = '$tx_login'", null);
            if($linha = camposRegistro($result)) {
                if($linha["tx_senha"] == $tx_senha) {
                    $_SESSION["id_usuario"] = $linha["tx_senha"];
                }
            }
            else {
                echo 'Usuário inválido!';
            }
            break;

        case "sair":
            $_SESSION["id_usuário"] = "";
            header("Location: index.php");
            break;
            
    }
}
?>