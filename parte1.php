<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartamento 03</title>
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
            background-image: linear-gradient(65deg, purple, rgb(12, 112, 54));
        }
        .box{
            background-color: rgba(1000, 1000, 1000, 0.6);
            position: absolute ;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 40px;
            padding-top: 40px;
            border-radius: 30px;
        }
        .link{
            text-align: center;
        }
        a:link {
            text-decoration: none;
            color: rgb(95, 15, 133);
        }
        a:hover {
            text-decoration: underline;
            color: rgb(16, 114, 73)
        }
        .cabecalho{
            padding-top: 30px;
            text-align: center;
            color: aliceblue;
            font-size: 25px;
        }
        p {
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="cabecalho">
        <h1 >BEM VIND@ AO PRÉDIO!</h1>
        <p><i>"Enfim lar doce lar" </i></p>
    </div>
    <div class="box">
        <fieldset>
            <p><b>Já é cadastrado como morador? Entre aqui! Caso não seja cadastrado contate o sindico do seu prédio</b></p>
            <div class="link">
                <b><a href="login.php"> Entre na sua conta </a></b>
            </div>
        </fieldset>
        <br><br>
    </div>
</body>
</html>