<?php
  include 'conexao.php';

  // Deletar uma tarefa
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM tasks WHERE id = $id";
    $conn->query($sql);

    header("Location: ../todoList.php");
    exit();
  }
?>