<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="cadastro.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<?php
    include 'conexao.php';

    if(isset($_POST['cadastrar'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO cliente (nome, email, telefone, senha) 
                VALUES ('$nome', '$email', '$telefone', '$senha')";

        if($conn->query($sql) === TRUE){
            // Redireciona para clientes.html
            header("Location: clientes.html");
            exit();
        } else {
            echo "Erro: " . $conn->error;
        }
    }
?>


<body>
    <header></header>
    <div class="container">

        <h1 class="loja">LM's</h1>
        <h2 class="cadastro">Cadastro</h2>
        <form method="POST" action="cadastro.php">
            <input type="text" name="nome" placeholder="Nome completo" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="telefone" placeholder="(11) 99999-9999" required><br>
            <input type="password" name="senha" placeholder="Senha" required><br>
            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>

        <a href="login.php"><p>Já tenho uma conta</p></a>
    </div>

    <footer></footer>
</body>
</html>