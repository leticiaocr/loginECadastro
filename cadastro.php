<?php
include 'formCadastro.html';
include 'inc/conecta.php';

//1. TRATAR OS DADOS QUE SERÃO ÚTEIS DE FORMA SEPARADA PARA EVITAR PROBLEMAS
// ex: fazer uma validação para ver se os dados foram preenchidos e não foram enviados vazios. (isset e empty)
// 2. fazer um if para verificar se alguma variável tem o valor falso
// 3. conectar com o banco (criar o arquivo conecta.php e fazer o try catch)

// ============================== VALIDACOES ==============================


$nome = (isset($_POST['nome'])) ? $_POST['nome'] : false;
$email = (isset($_POST['email'])) ? $_POST['email'] : false;
$cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : false;
$dataNascimento = (isset($_POST['dataNascimento'])) ? $_POST['dataNascimento'] : false;
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : false;
$confirmSenha = (isset($_POST['confirmSenha'])) ? $_POST['confirmSenha'] : false;
$genero = (isset($_POST['genero'])) ? $_POST['genero'] : false;


// ============================== TRATATIVAS ==============================

if ($nome == false || $email == false || $cpf == false || $dataNascimento == false || $senha == false || $confirmSenha == false || $genero == false) {
    echo "Algum dos parâmetros necessários não foi preenchido, tente novamente.";
    exit;
}

if ($senha != $confirmSenha) {
    echo "Senhas diferentes";
    exit;
}

if (strlen($cpf) != 11) {
    echo "CPF inválido";
    exit;
}



// ============================== CONEXÃO COM O BANCO ==============================

try {
    $sql = "INSERT INTO pessoas (NOME, EMAIL, CPF , DATANASCIMENTO, SENHA, GENERO)
                        VALUES ('$nome', '$email', '$cpf', '$dataNascimento', '$senha', '$genero')";
    $insert = mysqli_query($conexao, $sql);
    header('Location: login.html');
} catch (Exception $e) {
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}
