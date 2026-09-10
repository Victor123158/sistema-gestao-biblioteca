<?php
session_start();
require_once 'config/database.php';

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    $stmt = $conn->prepare('SELECT id, nome, email, senha, tipo FROM utilizadores WHERE email = ? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($senha, $user['senha'])) {
        unset($user['senha']);
        $_SESSION['utilizador'] = $user;
        header('Location: dashboard.php');
        exit;
    }
    $erro = 'Email ou senha inválidos.';
}
?>
<!doctype html><html lang="pt"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Login</title><link rel="stylesheet" href="assets/css/style.css"></head>
<body><div class="container" style="max-width:450px"><div class="card">
<h1>Biblioteca</h1><p>Acesso ao sistema</p>
<?php if($erro): ?><div class="alert"><?=htmlspecialchars($erro)?></div><?php endif; ?>
<form method="post">
<label>Email</label><input type="email" name="email" required>
<label>Senha</label><input type="password" name="senha" required>
<button type="submit">Entrar</button>
</form></div></div><script src="assets/js/app.js"></script></body></html>
