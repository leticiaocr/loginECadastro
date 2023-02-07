<?php
include 'inc/conecta.php';
session_start();

// VALIDAÇÃO --------------------------------------------

$email = (isset($_POST['email'])) ? $_POST['email'] : false;
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : false;

// TRATATIVAS -------------------------------------------

if ($email == false || $senha == false) {
    echo "Algum dos parâmetros necessários não foi preenchido.";
    exit;
}

// CONEXÃO COM O BANCO -------------------------------------------

try {
    $sql = "SELECT * FROM pessoas WHERE EMAIL = '$email' and SENHA = '$senha'";
    $con = mysqli_query($conexao, $sql);
    $qtdPessoas = mysqli_num_rows($con);

    if ($qtdPessoas > 0) {
        $pessoa = mysqli_fetch_assoc($con);
        $_SESSION['logado'] = 'OK';
        $_SESSION['email'] =  $pessoa['EMAIL'];
        header('Location: cadastroCupom.html');
    } else {
        header('Location: login.html');
    }
} catch (Exception $e) {
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}
