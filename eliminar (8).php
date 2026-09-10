<?php
require_once '../config/auth.php'; requireLogin(); require_once '../config/database.php';
$id=(int)($_GET['id']??0); $stmt=$conn->prepare("DELETE FROM livros WHERE id=?");$stmt->bind_param('i',$id);$stmt->execute();header('Location: index.php');exit;
?>
