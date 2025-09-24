<?php
include "db.php";

if(isset($_POST['submit'])){
    $nome = $conn->real_escape_string($_POST['nome']);
    $data = $_POST['data'];
    $idade = (int)$_POST['idade'];

    $sql = "INSERT INTO aniversarios (nome, data_nascimento, idade) VALUES ('$nome', '$data', $idade)";
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Aniversário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-4">Adicionar Novo Aniversário</h2>
    <form method="post" class="mx-auto" style="max-width:400px;">
        <input type="text" name="nome" class="form-control mb-3" placeholder="Nome" required>
        <input type="date" name="data" class="form-control mb-3" required>
        <input type="number" name="idade" class="form-control mb-3" placeholder="Quantos anos vai fazer?" required>
        <button type="submit" name="submit" class="btn btn-success w-100">Adicionar</button>
    </form>
    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-secondary">🔙 Voltar</a>
    </div>
</div>
</body>
</html>
