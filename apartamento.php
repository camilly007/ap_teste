<?php
    //ajeitar a parte de table pq eu copiei do arquivo
    //CONTEÉM O READ E O ADICIONAR DA TELA DONO 
 
$con = new PDO('pgsql:host=localhost; port=5432;dbname=20221214010023','postgres', 'cams05');


// Verificar se foi enviado dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "oi";
    exit();
    $numero_apartamento = !empty($_POST["numero_apartamento"]) ? $_POST["numero_apartamento"] : "";
    $andar = !empty($_POST["andar"]) ? $_POST["andar"] : "";
   
} else if (!isset($numero_apartamento)) {
    $numero_apartamento = !empty($_GET["numero_apartamento"]) ? $_GET["numero_apartamento"] : "";
    $andar = NULL;
}

// Conectar ao banco de dados PostgreSQL
try {
    $conexao = new PDO("pgsql:host=localhost;dbname=20221214010023", "postgres", "cams05");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec('set client_encoding to utf8');
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
}

//comparar isso daqi com o de baixo pra testar
// if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $numero_apartamento != "") {
//     try {
//         if ($numero_apartamento != "") {
//             $stmt = $conexao->prepare("UPDATE apartamento SET andaro=? WHERE numero_apartamento = ?");
//             $stmt->bindParam(4, $numero_apartamento);
//         } else {
//             $stmt = $conexao->prepare("INSERT INTO apartamento (numero_apartamento, andar) VALUES (?, ?)");
//         }
//         $stmt->bindParam(1, $numero_apartamento);
//         $stmt->bindParam(2, $andar);
 
//         if ($stmt->execute()) {
//             if ($stmt->rowCount() > 0) {
//                 echo "Dados cadastrados com sucesso!";
//                 $numero_apartamento = null;
//                 $andar = null;
            
//             } else {
//                 echo "Erro ao tentar efetivar cadastro";
//             }
//         } else {
//             throw new PDOException("Erro: Não foi possível executar a declaração sql");
//         }
//     } catch (PDOException $erro) {
//         echo "Erro: ".$erro->getMessage();
 //   }
//}
// Bloco para salvar (Create/Update)
// if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && !empty($_REQUEST["nome_produto"])) {

//     try {
//         if (!empty($id_produto)) {
            
//             $stmt = $conexao->prepare("UPDATE catalogo SET nome_produto = ?, valor_produto = ?, tempo_producao = ? WHERE id_produto = ?");
//             $stmt->bindParam(4, $id_produto, PDO::PARAM_INT);
//         } else {
//             $stmt = $conexao->prepare("INSERT INTO catalogo (id_produto, nome_produto, valor_produto, tempo_producao) VALUES (?, ?, ?,?)");
//         }
//         $stmt->bindParam(1, $id_produto);
//         $stmt->bindParam(2, $nome_produto);
//         $stmt->bindParam(3, $valor_produto);
//         $stmt->bindParam(4, $tempo_producao);

//         if ($stmt->execute()) {
//             echo "Dados cadastrados com sucesso!";
//             $id_produto = $nome_produto = $valor_produto = $tempo_producao = null;
//         } else {
//             echo "Erro ao tentar efetivar cadastro";
//         }
//     } catch (PDOException $erro) {
//         echo "Erro: " . $erro->getMessage();
//     }
// }

// Bloco para buscar informações para edição (Read)
// if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $numero_apartamento != "") {
//     try {
//         $stmt = $conexao->prepare("SELECT * FROM apartamento WHERE numero_apartamento = ?");
//         $stmt->bindParam(1, $numero_apartamento, PDO::PARAM_INT);
//         if ($stmt->execute()) {
//             $rs = $stmt->fetch(PDO::FETCH_OBJ);
//             $numero_apartamento = $rs->numero_apartamento;
//             $andar = $rs->andar;
            
//         } else {
//             throw new PDOException("Erro: Não foi possível executar a declaração sql");
//         }
//     } catch (PDOException $erro) {
//         echo "Erro: ".$erro->getMessage();
//     }
// }

// if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
//     try {
//         $stmt = $conexao->prepare("SELECT * FROM contatos WHERE id = ?");
//         $stmt->bindParam(1, $id, PDO::PARAM_INT);
//         if ($stmt->execute()) {
//             $rs = $stmt->fetch(PDO::FETCH_OBJ);
//             $id = $rs->id;
//             $nome = $rs->nome;
//             $email = $rs->email;
//             $celular = $rs->celular;
//         } else {
//             throw new PDOException("Erro: Não foi possível executar a declaração sql");
//         }
//     } catch (PDOException $erro) {
//         echo "Erro: ".$erro->getMessage();
//     }
// }

    if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && !empty($numero_apartamento)) {
        try {
            $stmt = $conexao->prepare("DELETE FROM apartamento WHERE numero_apartamento = ?");
            $stmt->bindParam(1, $numero_apartamento, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo "Registro excluído com sucesso!";
                $numero_apartamento = null;
            } else {
                throw new PDOException("Erro ao tentar excluir o contato");
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APARTAMENTO</title>
</head>
<body>
    <form action="insertcrud.php" method="POST">
        <h1>MEU APARTAMENTO</h1>
        <hr>
        <input type="number" name="numero_apartamento" placeholder="Numêro do AP." value="<?php if($numero_apartamento) echo $numero_apartamento; ?>"/>

        <input type="number" name="andar" placeholder="Seu andar"  value="<?php if($andar) echo $andar; ?>" />   

      
        <input type="hidden" name="act" value="save">
        <input type="submit" value="salvar">
        <input type="reset" value="novo">
    </form>
    
    <table border="1" width="100%">
        <tr>
            <th>numero ap</th>
            <th>andar</th>
        </tr>
        <?php
    // Bloco que realiza o papel do Read - recupera os dados e apresenta na tela (TEM QUE ALTERAR PQ EU PEGUEI DO ARQUIVO)
        try {
            $stmt = $con->prepare("SELECT * FROM apartamento ORDER BY numero_apartamento ASC");
            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>{$rs->numero_apartamento}</td><td>{$rs->andar}</td>";
                    echo "<td><center>
                        <a href=\"?act=del&numero_apartamento={$rs->numero_apartamento}\" onclick=\"return confirm('Deseja realmente excluir?');\">[Excluir]</a>
                        </center></td>";
                    echo "</tr>";
                }
            } else {
                echo "Erro ao recuperar os contatos.";
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
        ?>
    </table>
</body>
</html>