<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo_list";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}


// Completar uma tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $id = $_POST['id'];
  $sql = "UPDATE tasks SET status = 'completado' WHERE id = $id";
  $conn->query($sql);

  header("Location: todoList.php");
  exit();
}
