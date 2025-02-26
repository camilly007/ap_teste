<?php
//try{
    $con = new PDO('pgsql:host=localhost; port=5432;dbname=20221214010023','postgres', 'cams05');

    
   //if (isset($_POST['submit'])){
    //    print_r($_POST['nome']);
    //    print_r($_POST['senha']);
    //    include_once('conect.php');

     //   $username=$_POST['username'];
      //  $senha=$_POST['senha'];

      //  $result=  NEW PD0 ($con, "INSERT INTO usuario (userneme,senha) VALUES ('$username'.'$senha')");
    //}
    //if ($con) {
      //echo "deu certo";
       //     $comando1 = $con->query("SELECT * FROM usuario");
    
      //  while ($var_linha = $comando1->fetch()) {
    //        echo $var_linha[1] . "<br/>";	
   // }
  //  }

//} catch (PDOException $e) {
  // echo 'DEU ERRADO!!!' . $e;
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style_login_cadastro.css" />
    <title>Cadastro</title>
</head>
<body>
    <div class="link">
        <a href="parte1.php"> voltar para a página inicial </a>
    </div>
    <br><br>
    <div class="tela_conf">
        <form action="insertusuario.php" method="POST">
            <h1> CADASTRO </h1>
            <p><i> Ainda não tem uma conta? Cadastre-se aqui.</i></p>
            <input type="text" name="login" id="login" placeholder="login" required>
            <br><br>
            <input type="password" name="senha" id="senha" placeholder="password" required>
            <br><br>
            <input
            style="background-color: rgb(45, 4, 61); border: none; border-radius: 10px; padding: 10px; width: 100%; color: aliceblue;"
            type="submit" name="submit" id="submit"> 
        </form>
    </div>
</body>
</html>