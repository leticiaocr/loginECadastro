<?php
include '../inc/conecta.php';
try {
    $sql = "SELECT NUMEROSORTE FROM cuponscadastrados WHERE NUMEROSORTE IS NOT NULL";
    $con = mysqli_query($conexao, $sql);
    $qtdNumerosSorte = mysqli_num_rows($con);

    if ($qtdNumerosSorte > 0) {
        $numerosSorte = mysqli_fetch_all($con);


        foreach ($numerosSorte as $numero) {
            $numeroSorte = $numero[0];

            echo "<table border='1'>
                        <tr>
                            <td>$numeroSorte</td>
                            
                        </tr>
                    </table>";
        }
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
