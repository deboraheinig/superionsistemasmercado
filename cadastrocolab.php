<?php
include("database.php");
session_start();

if(!isset($_SESSION['admlogado'])){
    header("location:index.php");
    session_destroy();
}

if(isset($_GET['logout'])){
    header("location:index.php");
    session_destroy();
}

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome-col'];
    $sobrenome = $_POST['sobrenome-col'];
    $email = $_POST['email-col'];
    $senha = md5($_POST['senha-col']);
    $cargo = $_POST['cargo'];
        if ($cargo == "adm"){
            $cargo = 1;
        }else{
            $cargo = 2;
        }
    $query = mysqli_query ($mysqli,
    "INSERT INTO usuario (nome, sobrenome, email, senha, cargo) 
    VALUES ('$nome', '$sobrenome', '$email', '$senha', '$cargo') ");
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login sistema</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imgs/iniciais.png" type="image/x-icon">

</head>

<body>
    <a href="homepageadm.php"><img class="logo-cliente-lateral" src="imgs/logo11_26_1554.png"></a>

    <section class="conteudo">
        <div class="cadastro-prod">
            <form method="POST" class="form form-cadastro">
                <div><a href="homepageadm.php"><img class="cancelicon" src="imgs/cancel.png"></a></div>
                <h3 class="titulo">Cadastrar novo(a) colaborador(a):</h3>

                <label class="titulos-cadastro" for="nome-col">Nome:</label>
                <input class="campo" type="text" name="nome-col" id="nome-col" placeholder="ex: Maria" required>

                <label class="titulos-cadastro" for="sobrenome-col">Sobrenome:</label>
                <input class="campo" type="text" name="sobrenome-col" id="sobrenome-col" placeholder="ex: da Silva" required>

                <label class="titulos-cadastro" for="email-col">Email:</label>
                <input class="campo" type="text" name="email-col" id="email-col" placeholder="ex: mariadasilva@gmail.com" required>


                <label class="titulos-cadastro" for="senha-col">Senha:</label>
                <input class="campo" type="password" name="senha-col" id="senha-col" placeholder="********" required>
                <p class="obs">obs. O email e senha serão utilizados como forma de login no sistema.</p>

                <div class="cargo-block">
                    <h3 class="titulos-cadastro">Cargo:</h3>
                    <div class="cargo-input">
                        <input type="radio" id="adm" name="cargo" value="adm">
                        <label for="adm" name="cargo">Administrador</label>
                    </div>
                    <div class="cargo-input">
                        <input type="radio" id="caixa" name="cargo" value="caixa" checked="">
                        <label for="caixa">Operador de caixa</label>
                    </div>
                </div>

                <input class="btn btn-cadastro campo" type="submit" name="cadastrar" value="Cadastrar novo funcionario">
                <div class="return-block">
                    <a href="cadastroprod.php"><img class="icon" src="imgs/backicon.png"></a>
                    <a class="btn-return" href="homepageadm.php">Retornar a homepage</a>
                </div>
            </form>


        </div>
    </section>

</body>

</html>
