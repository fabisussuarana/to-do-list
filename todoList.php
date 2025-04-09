<?php
  include './metodos/conexao.php';

  // Filtrar tarefas
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['palavra_filtro']) || isset($_POST['status_filtro']))) {
    $busca = $_POST['palavra_filtro'] ?? '';
    $status = $_POST['status_filtro'] ?? '';
  
    $sql = "SELECT * FROM tasks WHERE 1";
  
    if (!empty($busca)) {
      $sql .= " AND (title LIKE '%$busca%' OR description LIKE '%$busca%')";
    }
  
    if (!empty($status)) {
      $sql .= " AND status = '$status'";
    }
  } else{
    $sql = "SELECT * FROM tasks";
  }

  $todasTarefas = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/style.css">
  </head>

  <body class="d-flex justify-content-center align-items-center">
    <div class="container my-5">
      <h1 class="text-center text-light mb-3">Lista de Atividades</h1>
      <div class="card shadow-lg mx-auto">
        <div class="card-body text-white rounded p-4">
          <!-- formulário para adicionar atividade -->
          <form class="mb-3" method="POST" action="./metodos/insertTask.php">
            <div class="row">
              <div class="col-12 col-md-4">
                <input required type="text" class="form-control mb-2" id="titulo" name="titulo" placeholder="Título">
              </div>
              <div class="col-12 col-md-4">
                <input required type="text" class="form-control mb-2" id="descricao" name="descricao" placeholder="Descrição">
              </div>
              <div class="col-12 col-md-4">
                <select class="form-select mb-2" id="status" name="status">
                  <option value="pendente">Pendente</option>
                  <option value="em_andamento">Em andamento</option>
                  <option value="concluido">Concluído</option>
                </select>
              </div>
            </div>
            
            <div class="text-end mt-2">
              <button type="submit" class="btn btn-success">
                <span>Adicionar</span>
                <i class="bi bi-plus-lg"></i>
              </button>
            </div>
          </form>

          <!-- Filtro -->
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <div class="accordion-header">
                <div class="mostra-filtro ms-auto mb-3">
                  <button class="accordion-button collapsed rounded py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Mostrar Filtro
                  </button>
                </div>
              </div>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <h4 class="text-center mb-3 titulo-search">Filtro</h4>
                <form method="POST" class="mb-3">
                  <div class="row">
                    <div class="col-6">
                      <input type="text" name="palavra_filtro" class="form-control mb-2" placeholder="Pesquisar por palavra chave" value="<?= $_GET['busca'] ?? '' ?>">
                    </div>
                    <div class="col-6">
                      <select class="form-select mb-2" id="status_filtro" name="status_filtro">
                        <option value="">Todos os status</option>
                        <option value="pendente">Pendente</option>
                        <option value="em_andamento">Em andamento</option>
                        <option value="concluido">Concluído</option>
                      </select>
                    </div>
                  </div>
                  <div class="text-end mt-2">
                    <button type="submit" class="btn btn-search">
                      <span>Pesquisar</span>
                      <i class="bi bi-search"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <?php if ($todasTarefas->num_rows == 0) : ?>
            <div class="alert alert-info text-center" role="alert">
              Nenhuma tarefa encontrada.
            </div>
          <?php endif; ?>

          <ul class="list-group list-group-flush d-flex gap-2" id="listaTarefas">
            <?php while ($row = $todasTarefas->fetch_assoc()) : ?>
              <li class="list-group-item d-flex justify-content-between align-items-center w-100 border-0 rounded shadow-sm"
              style="background-color: <?= $row['status'] == 'pendente' ? '#f7ffa9' : ($row['status'] == 'em_andamento' ? '#d0e2fd' : '#c0fbc6') ?>;"
              >
                <!-- Cada atividade da lista -->
                <div class="row w-100 flex-grow-1 align-items-center">
                  <!-- Coluna de título e descrição -->
                  <div class="col-4">
                    <h6>
                      <?= $row['title'] ?>
                    </h6>
                    <p class="m-0">
                      <?= $row['description'] ?>
                    </p>
                  </div>
                  <!-- Coluna de status -->
                  <div class="col-4 d-flex justify-content-center">
                    <p class="badge m-0"
                      style="width: 100%; font-size: 16px; color: <?= $row['status'] == 'pendente' ? '#ffc107' : ($row['status'] == 'em_andamento' ? '#052659' : '#198754') ?>;">
                      <?= $row['status'] == 'pendente' ? 'Pendente' : ($row['status'] == 'em_andamento' ? 'Em andamento' : 'Concluído') ?>
                    </p>
                  </div>
                  <!-- coluna de ações -->
                  <div class="d-flex gap-2 col-4 justify-content-end">
                    <!-- Formulário para marcar como concluído -->
                    <form method="POST" action="./metodos/completeTask.php" class="d-inline">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <button type="submit" class="btn btn-success btn-sm" style="display: <?= $row['status'] == 'concluido' ? 'none' : 'block' ?>">
                        <i class="bi bi-check"></i>
                      </button>
                    </form>
                    <!-- Formulário para editar -->
                    <form method="POST" action="metodos/editTask.php" class="d-inline">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button class="btn btn-warning btn-sm d-flex justify-content-between align-items-center">
                        <i class="bi bi-pencil text-light"></i>
                        </button>
                    </form>
                    <form method="POST" action="./updateTask.php" class="d-none">
  <input type="hidden" name="id" value="<?= $row['id'] ?>">
  <input type="text" name="titulo" value="<?= $row['title'] ?>">
  <input type="text" name="descricao" value="<?= $row['description'] ?>">
  <select name="status">
    <option value="pendente" <?= $row['status'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
    <option value="em_andamento" <?= $row['status'] == 'em_andamento' ? 'selected' : '' ?>>Em andamento</option>
    <option value="concluido" <?= $row['status'] == 'concluido' ? 'selected' : '' ?>>Concluído</option>
  </select>
  <button type="submit" class="btn btn-primary btn-sm">
    Salvar Alterações
  </button>
</form>


              

                    <!-- Formulário para deletar -->
                    <form method="POST" action="./metodos/deleteTask.php" class="d-inline">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </div>
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