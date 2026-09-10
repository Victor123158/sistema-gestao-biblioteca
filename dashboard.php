<?php
require_once 'config/auth.php'; requireLogin();
require_once 'config/database.php';
$livros = $conn->query("SELECT COUNT(*) c FROM livros")->fetch_assoc()['c'];
$users = $conn->query("SELECT COUNT(*) c FROM utilizadores")->fetch_assoc()['c'];
$emprestimos = $conn->query("SELECT COUNT(*) c FROM emprestimos WHERE estado='emprestado'")->fetch_assoc()['c'];
$disponiveis = $conn->query("SELECT COALESCE(SUM(quantidade_disponivel),0) c FROM livros")->fetch_assoc()['c'];
?>
<!doctype html><html lang="pt"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Dashboard</title><link rel="stylesheet" href="assets/css/style.css"></head>
<body><div class="navbar"><b>Gestão de Biblioteca</b><span>Olá, <?=htmlspecialchars($_SESSION['utilizador']['nome'])?> | <a href="logout.php">Sair</a></span></div>
<div class="container"><h1>Dashboard</h1><div class="grid">
<div class="card">Livros<div class="stat"><?=$livros?></div></div>
<div class="card">Utilizadores<div class="stat"><?=$users?></div></div>
<div class="card">Empréstimos activos<div class="stat"><?=$emprestimos?></div></div>
<div class="card">Exemplares disponíveis<div class="stat"><?=$disponiveis?></div></div>
</div>
<div class="card"><h2>Módulos</h2><div class="actions">
<a class="btn" href="livros/index.php">Livros</a><a class="btn" href="autores/index.php">Autores</a><a class="btn" href="categorias/index.php">Categorias</a><a class="btn" href="utilizadores/index.php">Utilizadores</a><a class="btn" href="emprestimos/index.php">Empréstimos</a>
</div></div></div></body></html>
