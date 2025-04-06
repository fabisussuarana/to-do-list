<?php
    include 'conexao.php';

    // Adicionar uma nova tarefa
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_POST['status'])) {
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $status = $_POST['status'];

        $sql = "INSERT INTO tasks (title, description, status) VALUES ('$titulo', '$descricao', '$status')";
        $conn->query($sql);

        header("Location: ../todoList.php");
        exit();
    }
?>