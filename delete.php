<?php
include "db.php";
$id = $_GET['id'];

$conn->query("DELETE FROM aniversarios WHERE id=$id");
header("Location: index.php");
exit;
?>
