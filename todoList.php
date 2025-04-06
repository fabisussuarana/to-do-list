<?php
$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];
$port = $_ENV['DB_PORT'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
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

        <form class="mb-3">
          <input required type="text" class="form-control mb-2" id="titulo" placeholder="Título">
          <input required type="text" class="form-control mb-2" id="descricao" placeholder="Descrição">
          <select class="form-select mb-2" id="status">
            <option value="pendente">Pendente</option>
            <option value="em_progresso">Em progresso</option>
            <option value="completado">Completado</option>
          </select>
          <div class="text-end">
            <button class="btn btn-outline-light rounded-circle">
              <i class="bi bi-plus-lg"></i>
            </button>
          </div>
        </form>

        <ul class="list-group list-group-flush px-4 d-flex gap-4" id="listaTarefas">
          <li class="list-group-item d-flex justify-content-between align-items-center w-100 border-0 rounded-bottom shadow-sm">
            Atividade 1

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

              <span class="badge bg-secondary d-flex justify-content-center align-items-center" style="width: 100px">Pendente</span>
            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between align-items-center w-100 border-0 rounded-bottom shadow-sm">
            Atividade 2

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

              <span class="badge bg-primary d-flex justify-content-center align-items-center" style="width: 100px">Em andamento</span>
            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between align-items-center w-100 border-0 rounded-bottom shadow-sm">
            Atividade 3

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

              <span class="badge bg-success d-flex justify-content-center align-items-center" style="width: 100px">Concluido</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>