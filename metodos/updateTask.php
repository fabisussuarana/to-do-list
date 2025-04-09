ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



<?php
include './conexao.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];

$sql = "UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $titulo, $descricao, $status, $id);

if ($stmt->execute()) {
  header("Location: ../todoList.php");
  exit();
} else {
  echo "Erro ao atualizar tarefa: " . $conn->error;
}
