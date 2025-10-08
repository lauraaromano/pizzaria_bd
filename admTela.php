<?php
// Conexão com o banco
$host = "localhost";
$user = "root";
$pass = "";
$db = "pizzaria_domus";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

// Verifica se veio pedido de exclusão
if (isset($_POST['excluir'])) {
  $id_cliente = $_POST['id_cliente'];
  $sql_delete = "DELETE FROM cliente WHERE id_cliente = $id_cliente";
  $conn->query($sql_delete);
}

// Buscar clientes atualizados
$sql = "SELECT * FROM cliente";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizzaria - Painel do Administrador</title>
  <link rel="stylesheet" href="admTela.css">
</head>

<body>
  <div class="container">
    <h1>Painel do Administrador - Pizzaria</h1>

    <div class="search-box">
      <input type="text" placeholder="Pesquisar cliente por nome, e-mail ou telefone">
    </div>

    <table>
      <thead>
        <tr>
          <th>Nome Completo</th>
          <th>Telefone</th>
          <th>E-mail</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $row['nome'] ?></td>
              <td><?= $row['telefone'] ?></td>
              <td><?= $row['email'] ?></td>
              <td class="acoes">
                <!-- Botão Editar -->
                <a href="editar_cliente.php?id_cliente=<?= $row['id_cliente'] ?>">
                  <button class="editar">Editar</button>
                </a>

                <!-- Formulário de Exclusão -->
                <form method="POST" style="display:inline;"
                  onsubmit="return confirm('Deseja realmente excluir este cliente?');">
                  <input type="hidden" name="id_cliente" value="<?= $row['id_cliente'] ?>">
                  <button type="submit" name="excluir" class="excluir">Excluir</button>

                </form>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="4">Nenhum cliente cadastrado.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>

</html>
<?php $conn->close(); ?>