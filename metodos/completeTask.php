<?php
include 'conexao.php';

// Completar uma tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $id = $_POST['id'];
  $sql = "UPDATE tasks SET status = 'concluido' WHERE id = $id";
  $conn->query($sql);

  header("Location: ../todoList.php");
  exit();
}
