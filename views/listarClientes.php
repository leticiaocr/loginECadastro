<?php
include '../inc/conecta.php';

try {
    $sql = "SELECT NOME, EMAIL, CPF, DATANASCIMENTO, GENERO FROM pessoas";
    $con = mysqli_query($conexao, $sql);
    $qtdPessoas = mysqli_num_rows($con); // aqui ele mostra quantas pessoas foram encontradas pelo select

    if ($qtdPessoas > 0) {
        $pessoas = mysqli_fetch_all($con); // se quantidade de pessoas for maior que 0, o myqsli fetch all vai trazer TODOS os dados encontrados pelo select

        foreach ($pessoas as $pessoa) {
            $nome = $pessoa[0];
            $email = $pessoa[1];
            $cpf = $pessoa[2];
            $dataNascimento = $pessoa[3];
            $genero = $pessoa[4];
            echo "<table border='1'>
                        <tr>
                            <td>$nome</td>
                            <td>$email</td>
                            <td>$cpf</td>
                            <td>$dataNascimento</td>
                            <td>$genero</td>
                        </tr>
                    </table>
                    ";

        }
    }
} catch (Exception $e) { // vai cair no catch quando tiver algum erro de sintaxe no sql 
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}

echo"<form action='../adm.php' method='post'>
<button type='submit' id='voltar' ><a href='../adm.php'></a> Voltar</button>
</form>";