<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function requireLogin(): void {
    if (empty($_SESSION['utilizador'])) {
        header('Location: ../login.php');
        exit;
    }
}
?>
