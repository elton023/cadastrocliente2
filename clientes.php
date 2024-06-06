<!DOCTYPE html>
<html lang="pt-brt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de clientes </title>
</head>
<body>
    <h1>listar de  clientes</h1>

    <?php

    //conexao com banco de dados 
    $servername ="localhost";
    $username = "root";
    $password =   "";
    $dbnome = "bd_cadastro";


        $conn = new mysqli($servername, $username, $password, $dbnome);

    if ($conn->connect_error) {
        die("Erro na conexao com o banco de dados: " .$conn->connect_error);
    }  
    //verificar se um cliente foi excluido 
    if (isset($GET ["excluido"]) && $_GET ["excluido"] == "true") {
        echo "<p>Cliente excluido com sucesso!</p>";

    }  
    //SQL para selecionar todos os clientes
    $sql = "SELECT * FROM cliente";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>id</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Descrição</th><th>Ações</th></tr>";
   

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["telefone"] . "</td>";
        echo "<td>" . $row["descricao"] . "</td>";
        echo "<td>";
        echo "<a href='editar_cliente.php?id=". $row["id"] ."'>Editar</a>";
        echo "|";
        echo "<a href='excluir_cliente.php?id=". $row["id"] ."'>Editar</a>";
        echo "</td";
        echo "<tr>";

    }
        echo "</table>";
    } 
    else{
            echo "Nenhum cliente cadastrado.";
    }

    $conn->close();

    ?>
    
</body>
</html>