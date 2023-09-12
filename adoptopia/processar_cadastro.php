<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "Cefet@2023";
$dbname = "adopt";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Dados do formulário de cadastro
$nomeAnimal = $_POST['nome'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];
$idade = $_POST['idade'];
$genero = $_POST['genero'];
$descricao = $_POST['descricao'];
$foto = $_FILES['foto']['name'];
$foto_temp = $_FILES['foto']['tmp_name'];
$ID_Doador = 1; // Substitua pelo ID do doador (usuário) real
$disponivelParaAdocao = true; // Defina o status de disponibilidade

// Move a foto para o diretório desejado (por exemplo, 'uploads/')
$destino = 'uploads/' . $foto;
move_uploaded_file($foto_temp, $destino);

// Prepara a instrução SQL
$stmt = $conn->prepare("INSERT INTO Animais (NomeAnimal, Espécie, Raça, Idade, Gênero, Descrição, Foto, ID_Doador, DisponivelParaAdoção) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiisssb", $nomeAnimal, $especie, $raca, $idade, $genero, $descricao, $foto, $ID_Doador, $disponivelParaAdocao);

// Executa a inserção
if ($stmt->execute() === TRUE) {
    echo "Cadastro do animal realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
