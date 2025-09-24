<?php
include "db.php";
$id = $_GET['id'];

$res = $conn->query("SELECT * FROM aniversarios WHERE id=$id");
$row = $res->fetch_assoc();

if(isset($_POST['submit'])){
    $nome = $conn->real_escape_string($_POST['nome']);
    $data = $_POST['data'];

    $sql = "UPDATE aniversarios SET nome='$nome', data_nascimento='$data' WHERE id=$id";
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
    <title>Editar Aniversário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-4">Editar Aniversário</h2>
    <form method="post" class="mx-auto" style="max-width:400px;">
        <input type="text" name="nome" class="form-control mb-3" value="<?= $row['nome'] ?>" required>
        <input type="date" name="data" class="form-control mb-3" value="<?= $row['data_nascimento'] ?>" required>
        <button type="submit" name="submit" class="btn btn-primary w-100">Salvar</button>
    </form>
    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-secondary">🔙 Voltar</a>
    </div>
</div>
</body>
</html>
