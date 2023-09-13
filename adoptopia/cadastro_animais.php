<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adoptopia - Cadastro</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Adoptopia</h1>
    <!-- Links para login e cadastro -->
    <nav>
      <a href="login.php">Login</a>
      <a href="cadastro.php">Cadastro</a>
    </nav>
  </header>
    <!-- Formulário de cadastro -->
    <form action="processar_cadastro.php" method="POST" enctype="multipart/form-data">
      <h2>Cadastre um Animal para Adoção</h2>
      <!-- Campos do formulário -->
      <input type="text" name="nome" placeholder="Nome do Animal" required>
      <input type="text" name="especie" placeholder="Espécie" required>
      <input type="text" name="raca" placeholder="Raça">
      <input type="number" name="idade" placeholder="Idade">
      <select name="genero">
        <option value="macho">Macho</option>
        <option value="femea">Fêmea</option>
      </select>
      <textarea name="descricao" placeholder="Descrição do Animal" required></textarea>
      <input type="file" name="foto" required>
      <button type="submit">Cadastrar animal</button>
    </form>
  </main>
<!-- ... Cabeçalho e outras partes do HTML ... -->

<!-- ... Rodapé e outras partes do HTML ... -->
  <footer>
    <p>Adoptopia - Todos os direitos reservados</p>
  </footer>
</body>
</html>
