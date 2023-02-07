<?php
include '../inc/conecta.php';
try {
    $sql = "SELECT NUMEROSORTE FROM cuponscadastrados WHERE NUMEROSORTE IS NOT NULL";
    $con = mysqli_query($conexao, $sql);
    $qtdNumerosSorte = mysqli_num_rows($con); // aqui ele mostra quantas pessoas foram encontradas pelo select

    if ($qtdNumerosSorte > 0) {
        $numerosSorte = mysqli_fetch_all($con); // se quantidade de pessoas for maior que 0, o myqsli fetch all vai trazer TODOS os dados encontrados pelo select


        foreach ($numerosSorte as $numero) {
            $numeroSorte = $numero[0];

            echo "<table border='1'>
                        <tr>
                            <td>$numeroSorte</td>
                            
                        </tr>
                    </table>";
        }
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
