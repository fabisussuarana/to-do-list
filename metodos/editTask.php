<?php
include './conexao.php';

// Buscar dados da tarefa para preencher o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $id = $_POST['id'];

  $sql = "SELECT * FROM tasks WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $task = $result->fetch_assoc();
  } else {
    echo "Tarefa não encontrada.";
    exit();
  }
} else {
  echo "Requisição inválida.";
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Tarefa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="container my-5">
    <h1 class="text-center text-light mb-4">Editar Tarefa</h1>
    <div class="card shadow-lg mx-auto" style="max-width: 700px;">
      <div class="card-body p-4 text-white rounded">
        <form method="POST" action="updateTask.php">
          <input type="hidden" name="id" value="<?= $task['id'] ?>">

          <div class="mb-3">
            <label for="titulo" class="form-label text-edit">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $task['title'] ?>" required>
          </div>

          <div class="mb-3">
            <label for="descricao" class="form-label text-edit">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $task['description'] ?>" required>
          </div>

          <div class="mb-3">
            <label for="status" class="form-label text-edit">Status</label>
            <select class="form-select" id="status" name="status">
              <option value="pendente" <?= $task['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
              <option value="em_andamento" <?= $task['status'] === 'em_andamento' ? 'selected' : '' ?>>Em andamento</option>
              <option value="concluido" <?= $task['status'] === 'concluido' ? 'selected' : '' ?>>Concluído</option>
            </select>
          </div>

          <div class="d-flex justify-content-between">
            <a href="../todoList.php" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-success text-light">
              <i class="bi bi-save"></i> Salvar Alterações
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
