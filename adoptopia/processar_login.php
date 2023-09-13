<?php
// Iniciar a sessão
session_start();

// Verificar as credenciais (substitua este exemplo pelo código real de verificação)
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verificação de exemplo (substitua por sua lógica de autenticação real)
if ($email === 'fernando@gmail.com' && $senha === 'kaliuchis123') {
    // Autenticação bem-sucedida
    $_SESSION['nome_usuario'] = 'Fernando'; // Armazena o nome na sessão

    // Redireciona para a página de boas-vindas
    header('Location: boas-vindas.php');
    exit();
} else {
    // Autenticação falhou, redireciona de volta para a página de login
    header('Location: login.php?erro=1'); // Você pode adicionar um parâmetro de erro se desejar
    exit();
}
?>
