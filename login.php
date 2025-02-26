<?php
// TROCAR E ESCREVER DE NOVO PARA N COISAR DO GPT
include('conect.php');

if (isset($_POST['login']) && isset($_POST['senha'])) {
    //quantidade de caracteres
    if(strlen($_POST['login']) == 0){
        echo "preencha seu login";
    }else if (strlen($_POST['senha']) == 0){
        echo "preencha seu senha";
    }else{
        // Usando o método quote() do PDO para escapar a string
        $login = $con->quote($_POST['login']);
        $senha = $con->quote($_POST['senha']);

        // Alterar a consulta para usar PDO
        $sql_code = "SELECT * FROM usuario WHERE login = $login AND senha = $senha";
        $sql_query = $con->query($sql_code);

        if ($sql_query) {
            // Verificar o número de resultados
            $quantidade = $sql_query->rowCount();

            
            if($quantidade == 1){
                // Pega os dados do usuário
                $usuario = $sql_query->fetch(PDO::FETCH_ASSOC);

                if(!isset($_SESSION)){
                    session_start();
                }

                if($usuario['login'] == 'adm' && $usuario['senha'] == 'adm'){
                    header("Location: form_cadastro.php");  
                } else {
                    $_SESSION['login'] = $usuario['login'];
                    header("Location: home.html");
                    exit;
                }
                

                
            } else {
                echo "Falha ao logar. Seu email ou senha estão incorretos.";
            }
        } else {
            echo "Falha na execução da consulta.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style_login_cadastro.css" />
</head>
<body>
    <div class="link">
        <a href="parte1.php"> Voltar à página inicial</a>
    </div>
    <br><br>
    <div class="tela_conf">
        <br>
        <form action="" method="POST">
            <h1> LOGIN </h1>
            <input type="text" name="login" placeholder="login">
            <br><br>
            <input type="password" name="senha" placeholder="senha">
            <br><br>
            <input
            style="background-color: rgb(45, 4, 61); border: none; border-radius: 10px; padding: 10px; width: 100%; color: aliceblue;"
            type="submit" name="submit" value="enviar">
        </form>
    </div>
</body>
</html>