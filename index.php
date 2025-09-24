<?php
include "db.php";

$sql = "SELECT * FROM aniversarios ORDER BY MONTH(data_nascimento), DAY(data_nascimento)";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agenda de Aniversários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-4">Próximos Aniversários</h2>
    <div class="text-center mb-3">
        <a href="add.php" class="btn btn-success">➕ Adicionar Novo</a>
    </div>

    <table class="table table-striped table-bordered bg-white">
        <thead class="table-dark text-center">
            <tr>
                <th>Nome</th>
                <th>Data</th>
                <th>Idade</th>
                <th>Dias Faltando</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody class="text-center">
        <?php while($row = $result->fetch_assoc()): 
            $data = new DateTime($row['data_nascimento']);
            $hoje = new DateTime();
            $idade = $data->diff($hoje)->y;

            $proxAniversario = DateTime::createFromFormat('Y-m-d', $hoje->format('Y').'-'.$data->format('m-d'));
            if($proxAniversario < $hoje) $proxAniversario->modify('+1 year');
            $dias_faltando = $hoje->diff($proxAniversario)->days;
        ?>
           <tr>
    <td><?= $row['nome'] ?></td>
    <td><?= (new DateTime($row['data_nascimento']))->format('d/m/Y') ?></td>
    <td><?= $row['idade'] ?> anos</td>
    <td><?= $dias_faltando ?> dias</td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">✏️ Editar</a>
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Deseja excluir?')" class="btn btn-sm btn-danger">❌ Excluir</a>
    </td>
</tr>

        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
