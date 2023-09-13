<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistemaadopt";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se as chaves do array $_POST existem
if (isset($_POST['nomeUsuario']) && isset($_POST['emailUsuario']) && isset($_POST['senhaUsuario'])) {
    $nomeUsuario = $_POST['nomeUsuario'];
    $emailUsuario = $_POST['emailUsuario'];
    $senhaUsuario = password_hash($_POST['senhaUsuario'], PASSWORD_DEFAULT); // Criptografa a senha

    // Prepara a instrução SQL
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, usuario, senha) VALUES (?, ?, ?)");
    
    // Verifique se a preparação foi bem-sucedida
    if ($stmt) {
        // Define os parâmetros e seus tipos
        $stmt->bind_param("sss", $nomeUsuario, $emailUsuario, $senhaUsuario);

        // Executa a inserção
        if ($stmt->execute() === TRUE) {
            echo "Cadastro de usuário realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário: " . $conn->error;
        }
        
        // Fecha a declaração preparada
        $stmt->close();
    } else {
        echo "Erro na preparação da declaração SQL.";
    }
} else {
    echo "Campos do formulário não foram preenchidos corretamente.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
