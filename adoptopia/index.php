<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adoptopia - Animais para Adoção</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Adoptopia</h1>
    <!-- Links para login e cadastro -->
    <nav>
      <a href="login.php">Login</a>
      <a href="cadastro_usuarios.html">Cadastro de Usuários</a>
      <a href="cadastro_animais.php">Cadastro de Animais</a>
    </nav>
  </header>

  <main>
    <!-- Destaques dos animais para adoção -->
    <section class="destaques">
      <h2>Animais em Destaque</h2>
      <!-- Lista de animais com fotos e informações resumidas -->
      <div class="animal-card">
        <!-- Informações do animal -->
      </div>
      <div class="animal-card">
        <!-- Informações do animal -->
      </div>
      <!-- Adicionar mais animais em destaque -->
    </section>

    <!-- Filtros de busca -->
    <section class="filtros">
      <h2>Encontre um Animal</h2>
      <!-- Formulário com filtros de busca -->
      <form action="processar_busca.php" method="GET">
        <!-- Adicione os campos de filtro aqui -->
        <input type="text" name="nome_animal" placeholder="Nome do Animal">
        <input type="text" name="especie" placeholder="Espécie">
        <input type="text" name="raca" placeholder="Raça">
        <button type="submit">Buscar</button>
      </form>
    </section>

    <!-- Lista de animais disponíveis -->
    <section class="lista-animais">
      <h2>Animais para Adoção</h2>
      <!-- Lista de todos os animais disponíveis -->
      <div class="animal-card">
        <!-- Informações do animal -->
        <?php
          // Conecte-se ao banco de dados e recupere o caminho da imagem do animal em destaque
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "sistemaadopt";

          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
              die("Conexão falhou: " . $conn->connect_error);
          }

          $sql = "SELECT foto FROM Animais WHERE id = 2"; // Suponha que o animal em destaque tenha o ID 2
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $fotoCaminho = $row["foto"];
                  echo "<img src='$fotoCaminho' alt='Animal em Destaque'>";
              }
          } else {
              echo "Nenhum animal em destaque encontrado.";
          }

          $conn->close();
        ?>
      </div>
      <div class="animal-card">
        <!-- Informações do animal -->
      </div>
      <!-- Adicionar mais animais disponíveis -->
    </section>
  </main>

  <footer>
    <p>Adoptopia - Todos os direitos reservados</p>
  </footer>
</body>
</html>
