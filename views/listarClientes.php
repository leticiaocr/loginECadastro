<?php
include '../inc/conecta.php';

try {
    $sql = "SELECT NOME, EMAIL, CPF, DATANASCIMENTO, GENERO FROM pessoas";
    $con = mysqli_query($conexao, $sql);
    $qtdPessoas = mysqli_num_rows($con);

    if ($qtdPessoas > 0) {
        $pessoas = mysqli_fetch_all($con);
        echo "<table border='1' style='width: 1000px;'>
                <th style='background: #ffecec;'>Nome</th>
                <th style='background: #ffecec;'>Email</th>
                <th style='background: #ffecec;'>CPF</th>
                <th style='background: #ffecec;'>Data de Nascimento</th>
                <th style='background: #ffecec;'>Gênero</th>";
        foreach ($pessoas as $pessoa) {
            $nome = $pessoa[0];
            $email = $pessoa[1];
            $cpf = $pessoa[2];
            $dataNascimento = $pessoa[3];
            $genero = $pessoa[4];
            echo "<tr>
                    <td>$nome</td>
                    <td>$email</td>
                    <td>$cpf</td>
                    <td>$dataNascimento</td>
                    <td>$genero</td>
                </tr>";
        }
        echo "</table>";
    }
} catch (Exception $e) {
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}

echo "<form action='../adm.php' method='post'>
<button type='submit' id='voltar' style='padding: 10px;
    margin: 10px;
    background: #A60303;
    border: none;
    border-radius: 10px;
    width: 200px;
    color: white; '  ><a href='../adm.php'></a> Voltar</button>
</form>";
