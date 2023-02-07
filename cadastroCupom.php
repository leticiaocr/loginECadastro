<?php
include 'inc/conecta.php';
session_start();
if ($_SESSION['logado'] != 'OK') {
    header('Location: login.html');
}


$bloqueado = isset($_SESSION['bloqueado']) ? $_SESSION['bloqueado'] : 'NAO';
if ($bloqueado == 'SIM') {
    echo "O sorteio já foi realizado";
    exit;
}


// VALIDAÇÕES ------------------------------

$codCupom = (isset($_POST['codigo'])) ? $_POST['codigo'] : false;
$cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : false;
$valorCupom = (isset($_POST['valorcupom'])) ? $_POST['valorcupom'] : false;
$dataCompra = (isset($_POST['dataCompra'])) ? $_POST['dataCompra'] : false;
$horaCompra = (isset($_POST['horaCompra'])) ? $_POST['horaCompra'] : false;
$statusCupom = (isset($_POST['status'])) ? $_POST['status'] : false;
$loja = (isset($_POST['loja'])) ? $_POST['loja'] : false;

// TRATATIVAS ------------------------------------------

if ($codCupom == false || $cpf == false || $valorCupom == false || $dataCompra == false || $horaCompra == false || $statusCupom == false || $loja == false) {
    echo "Alguns dos parâmetros necessários não foram preenchidos";
    exit;
}

if (strlen($cpf) != 11) {
    echo "CPF inválido";
    exit;
}


// CONEXÃO COM O BANCO------------------------------------------------------------


// VERIFICAR SE JÁ EXISTE UM CUPOM CADASTRADO COM O MESMO CÓDIGO
try {
    $sql = "SELECT * FROM cuponscadastrados WHERE CODIGO = '$codCupom'";
    $con = mysqli_query($conexao, $sql);
    $qtdcupons = mysqli_num_rows($con);

    if ($qtdcupons > 0) {
        echo "Já existe um cupom cadastrado com esse código";
        exit;
    }
} catch (Exception $e) {
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}

// VERIFICAR SE O CUPOM PERTENCE AO TITULAR DA AREA LOGADA 
try {
    $sql = "SELECT * FROM pessoas WHERE EMAIL = '$_SESSION[email]'";
    $con = mysqli_query($conexao, $sql);
    $qtdPessoas = mysqli_num_rows($con);
    if ($qtdPessoas > 0) {
        $pessoa = mysqli_fetch_assoc($con);
        if ($pessoa['CPF'] != $cpf) {
            echo "O cupom não pertence ao usuário desta conta";
            exit;
        }
    }
} catch (Exception $e) {
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}




//----------------------------------------------

$dataHoraCompra = $dataCompra . " " . $horaCompra;


//CADASTRANDO O CUPOM NO BANCO DE DADOS

try {
    $sql = "INSERT INTO cuponscadastrados (CODIGO, CPF, VALOR, LOJA, DATAHORACOMPRA, STATUS)
                        VALUES ('$codCupom', '$cpf', '$valorCupom', '$loja', '$dataHoraCompra', '$statusCupom')";
    $insert = mysqli_query($conexao, $sql);
} catch (Exception $e) {

    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}




// A CADA 300 REAIS EM CUPONS O CLIENTE GANHA UM NÚMERO DA SORTE 
try {
    $sql = "SELECT SUM(VALOR) as SOMACUPONS FROM cuponscadastrados WHERE CPF = '$cpf'";
    $con = mysqli_query($conexao, $sql); //abre a conexão e roda a variavel sql no banco
    $result = mysqli_fetch_assoc($con);
    $somaCupons = ($result['SOMACUPONS']);

    if ($somaCupons > 300) {


        $numeroSorte = geraNumeroSorte($cpf, $conexao);

        // caso não tenha esse numero da sorte, insira
        vinculaNumeroSorte($numeroSorte, $codCupom, $conexao);


        //------------
    }
} catch (Exception $e) {
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}






function geraNumeroSorte($cpf, $conexao)
{
    $numeroSorte = rand(100000, 999999);

    $sql = "SELECT NUMEROSORTE FROM cuponscadastrados WHERE NUMEROSORTE = '$numeroSorte'";
    $con = mysqli_query($conexao, $sql);
    $result = mysqli_fetch_assoc($con);
    if (!empty($result)) {
        geraNumeroSorte($cpf, $conexao);
    }


    return $numeroSorte;
}




function vinculaNumeroSorte($numeroSorte, $codCupom, $conexao)
{
    try {
        $sql = "UPDATE cuponscadastrados SET NUMEROSORTE = '$numeroSorte'WHERE CODIGO = '$codCupom'";
        $insert = mysqli_query($conexao, $sql);
        return true;
    } catch (Exception $e) {
        return [
            "sucesso" => false,
            "mensagem" => $e->getMessage()
        ];
    }
}
