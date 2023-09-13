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

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $especie = $_POST["especie"];
    $raca = $_POST["raca"];
    $idade = $_POST["idade"];
    $genero = $_POST["genero"];
    $descricao = $_POST["descricao"];

    // Tratamento da foto
    $foto = null;
    //verificamos se um arquivo de imagem foi enviado no formulário
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
        $foto = $_FILES["foto"]["name"];
        move_uploaded_file($_FILES["foto"]["tmp_name"], "uploads/" . $foto);
    }

    // Prepara a instrução SQL para inserção
    $stmt = $conn->prepare("INSERT INTO Animais (nome, especie, raca, idade, genero, descricao, foto) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Verifica se a preparação foi bem-sucedida
    if ($stmt) {
        // Define os parâmetros e seus tipos
        $stmt->bind_param("sssiiss", $nome, $especie, $raca, $idade, $genero, $descricao, $foto);

        // Executa a inserção
        if ($stmt->execute() === TRUE) {
            echo "Cadastro do animal realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar o animal: " . $stmt->error;
        }

        // Fecha a declaração preparada
        $stmt->close();
    } else {
        echo "Erro na preparação da declaração SQL.";
    }
} else {
    echo "O formulário não foi enviado corretamente.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
