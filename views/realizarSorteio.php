<?php

// 1 - Pegar todos os números da sorte
// 2 - Pegar um número aleatorio dentro desses números da sorte (array_rand)
// 3 - Depois que o sorteio for realizado, impedir de cadastrar clientes e cupons
// 3.1 - Pensar em uma maneira de identificar quando o sorteio for cadastrado ou não (parecido com o Login)
// 3.2 - FIM
include '../inc/conecta.php';
try {
    $sql = "SELECT NUMEROSORTE FROM cuponscadastrados WHERE NUMEROSORTE IS NOT NULL";
    $con = mysqli_query($conexao, $sql);
    $qtdNumerosSorte = mysqli_num_rows($con); // aqui ele mostra quantas pessoas foram encontradas pelo select

    if ($qtdNumerosSorte > 0) {
        $numerosSorte = mysqli_fetch_all($con); // se quantidade de pessoas for maior que 0, o myqsli fetch all vai trazer TODOS os dados encontrados pelo select
        // Você tem o indice do array sorteado

        $resultSorteio = $numerosSorte[array_rand($numerosSorte, 1)];
        $numeroSorte = $resultSorteio[0];
        echo "O número sorteado foi $numeroSorte";
    }
} catch (Exception $e) { // vai cair no catch quando tiver algum erro de sintaxe no sql 

    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}

echo "<form action='../adm.php' method='post'>
<button type='submit' id='voltar' ><a href='../adm.php'></a> Voltar</button>
</form>";
