<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pizzaria_domus";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$cliente = null;
$mensagem = '';

if (isset($_POST['salvar_edicao'])) {
    $id_cliente = $_POST['id_cliente'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE cliente SET nome = ?, telefone = ?, email = ? WHERE id_cliente = ?");
    $stmt->bind_param("sssi", $nome, $telefone, $email, $id_cliente);

    if ($stmt->execute()) {
        header("Location: admTela.php?status=sucesso_edicao");
        exit();
    } else {
        $mensagem = "Erro ao atualizar: " . $conn->error;
    }
    $stmt->close();
}

if (isset($_GET['id_cliente']) || isset($_POST['id_cliente'])) {
    $id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : $_POST['id_cliente'];

    $stmt = $conn->prepare("SELECT id_cliente, nome, telefone, email FROM cliente WHERE id_cliente = ?");
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
    } else {
        $mensagem = "Cliente não encontrado.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="editar_cliente.css">
</head>
<body>
    <div class="container-edicao">
        <h1>Editar Cliente</h1>

        <?php if ($mensagem): ?>
            <p style="color: red;"><?= $mensagem ?></p>
        <?php endif; ?>

        <?php if ($cliente): ?>
        <form method="POST" action="editar_cliente.php">
            <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">

            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required><br><br>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" required><br><br>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required><br><br>

            <div class="botoes-acao">
                <button type="submit" name="salvar_edicao" class="salvar">Salvar Alterações</button>
                <a href="admTela.php" class="link-cancelar">Cancelar e Voltar</a>
            </div>
        </form>
        <?php elseif (!isset($_GET['id_cliente']) && !isset($_POST['id_cliente'])): ?>
            <p>ID do cliente não fornecido para edição.</p>
        <?php endif; ?>
    </div>
</body>
</html>