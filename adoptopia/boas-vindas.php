<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['nome_usuario'])) {
    // Se o usuário não estiver autenticado, redirecione para a página de login
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Seu cabeçalho HTML aqui -->
</head>
<body>
  <header>
    <h1>Adoptopia</h1>
    <!-- Links para login e cadastro -->
    <nav>
      <a href="login.php">Login</a>
      <a href="cadastro_usuarios.php">Cadastro de Usuários</a>
      <a href="cadastro_animais.php">Cadastro de Animais</a>
    </nav>
  </header>

  <main>
    <h2>Olá, <?php echo $_SESSION['nome_usuario']; ?>!</h2>
    <p>Bem-vindo à Adoptopia.</p>
  </main>

  <footer>
    <p>Adoptopia - Todos os direitos reservados</p>
  </footer>
</body>
</html>
