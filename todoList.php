<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo_list";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Renderizar todas as tarefas
$sql = "SELECT * FROM tasks";
$todasTarefas = $conn->query($sql);


// Adicionar uma nova tarefa
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_POST['status'])) {
  $titulo = $_POST['titulo'];
  $descricao = $_POST['descricao'];
  $status = $_POST['status'];

  $sql = "INSERT INTO tasks (title, description, status) VALUES ('$titulo', '$descricao', '$status')";
  $conn->query($sql);


  header("Location: todoList.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

  <div class="container py-5">
    <div class="card shadow-lg mx-auto" style="max-width: 600px;">
      <div class="card-body bg-dark text-white rounded p-4">
        <h3 class="text-center mb-4">Lista de Atividades</h3>

        <form class="mb-3" method="POST">
          <input required type="text" class="form-control mb-2" id="titulo" name="titulo" placeholder="Título">
          <input required type="text" class="form-control mb-2" id="descricao" name="descricao" placeholder="Descrição">
          <select class="form-select mb-2" id="status" name="status">
            <option value="pendente">Pendente</option>
            <option value="em_progresso">Em progresso</option>
            <option value="completado">Completado</option>
          </select>
          <div class="text-end">
            <button type="submit" class="btn btn-outline-light rounded-circle">
              <i class="bi bi-plus-lg"></i>
            </button>
          </div>
        </form>

        <ul class="list-group list-group-flush px-4 d-flex gap-4" id="listaTarefas">
          <?php while ($row = $todasTarefas->fetch_assoc()) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center w-100 border-0 rounded-bottom shadow-sm">
              <?= $row['title'] ?>
              <?= $row['description'] ?>

              <div class="d-flex gap-2">
                <button class="btn btn-outline-danger btn-sm d-flex justify-content-between align-items-center">
                  <i class="bi bi-trash"></i>
                </button>

                <button class="btn btn-outline-success btn-sm d-flex justify-content-between align-items-center">
                  <i class="bi bi-check"></i>
                </button>


                <button class="btn btn-outline-warning btn-sm d-flex justify-content-between align-items-center">
                  <i class="bi bi-pencil"></i>
                </button>

                <span class="badge bg-secondary d-flex justify-content-center align-items-center" style="width: 100px">
                  <?= $row['status'] == 'pendente' ? 'Pendente' : ($row['status'] == 'em_progresso' ? 'Em andamento' : 'Concluido') ?>
                </span>
              </div>

            </li>

          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>