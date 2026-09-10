<?php
require_once '../config/auth.php'; requireLogin(); require_once '../config/database.php';
$result=$conn->query("SELECT l.*,a.nome autor,c.nome categoria FROM livros l JOIN autores a ON a.id=l.autor_id JOIN categorias c ON c.id=l.categoria_id ORDER BY l.id DESC");
?>
<!doctype html><html lang="pt"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Livros</title><link rel="stylesheet" href="../assets/css/style.css"></head><body>
<div class="navbar"><b>Livros</b><a href="../dashboard.php">Dashboard</a></div><div class="container"><div class="card"><a class="btn" href="criar.php">+ Novo livro</a></div><div class="card"><div class="table-wrap"><table><tr><th>Título</th><th>Autor</th><th>Categoria</th><th>Disponível</th><th>Ações</th></tr>
<?php while($r=$result->fetch_assoc()): ?><tr><td><?=htmlspecialchars($r['titulo'])?></td><td><?=htmlspecialchars($r['autor'])?></td><td><?=htmlspecialchars($r['categoria'])?></td><td><?=$r['quantidade_disponivel']?></td><td class="actions"><a class="btn" href="editar.php?id=<?=$r['id']?>">Editar</a><a class="btn btn-danger" href="eliminar.php?id=<?=$r['id']?>" onclick="return confirm('Eliminar este livro?')">Eliminar</a></td></tr><?php endwhile; ?>
</table></div></div></div></body></html>
