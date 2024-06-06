<?php
//verificar se um cliente foi selecionado para ediçao
    if (isset($_GET["id"])){
        $cliente_id =$_GET["id"];

        //conexao com o banco de dados
        $servername ="localhost";
        $username = "root";
        $password =   "";
        $dbnome = "bd_cadastro";

        $conn = new mysqli($servername, $username, $password, $dbnome);

        if ($conn->connect_error) {
            die("Erro na conexao com o banco de dados: " .$conn->connect_error);
    } 
    
    //obter os dados dos cliente para ediçao
    $sql ="SELECT * FROM cliente WHERE id = $cliente_id";
    $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
        else{
            echo "Cliente nao encontrado.";
            exit;
    }

    //processa o formulario para ediçao quando enviado
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
        $novo_nome = $_POST["nome"];
        $novo_email = $_POST["email"];
        $novo_telefone = $_POST["telefone"];
        $novo_descricao = $_POST["descricao"];

        //atualizar os dados do cliente no banco de dados
        $sql = "UPDATE cliente SET nome = '&novo_nome', email ='$novo_email', telefone = '$novo_telefone', descricao '$novo_descricao' WHERE id = $cliente_id";
    }

    }
        
