<?php

include '../inc/conecta.php';
session_start();

try {
    $sql = "SELECT NUMEROSORTE FROM cuponscadastrados WHERE NUMEROSORTE IS NOT NULL";
    $con = mysqli_query($conexao, $sql);
    $qtdNumerosSorte = mysqli_num_rows($con);

    if ($qtdNumerosSorte > 0) {
        $numerosSorte = mysqli_fetch_all($con);

        $resultSorteio = $numerosSorte[array_rand($numerosSorte, 1)];
        $numeroSorte = $resultSorteio[0];
        echo "<p style='font-size: 18px; display: inline-block; background-color: #403C08; color: white; padding: 10px; border-radius: 8px;'> O número sorteado foi $numeroSorte </p>";
        
        $_SESSION['bloqueado'] = 'SIM';
    }
} catch (Exception $e) {

    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}

echo "<form action='../adm.php' method='post'>
<button type='submit' id='voltar' style='padding: 6px;
margin: 10px;
background: #A60303;
border: none;
border-radius: 10px;
width: 100px;
color: white; display: block;'><a href='../adm.php'></a> Voltar</button>
</form>";

