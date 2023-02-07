
<?php

include '../inc/conecta.php'; //SE NÃO COLOCAR O INCLUDE NADA VAI FUNCIONAR COLOCA O INCLUDE"!!!!!!!!!!!!!!!!!!!!!!!!!

echo "<form action='verCupons.php' method='post'>
        <input type='text' name='cpfconsulta' id='cpfconsulta' placeholder='Digite o CPF do cliente'>
        <button type='submit'>Consultar Cupom do cliente</button>
    </form>";

$cpfConsulta = isset($_POST['cpfconsulta']) ? $_POST['cpfconsulta']: null;

try {
    $sql = "SELECT CPF, CODIGO FROM cuponscadastrados WHERE CPF = '$cpfConsulta'";
    $con = mysqli_query($conexao, $sql);
    $qtdCupons = mysqli_num_rows($con); // aqui ele mostra quantas pessoas foram encontradas pelo select

    if ($qtdCupons > 0) {
        $cupons = mysqli_fetch_all($con); // se quantidade de pessoas for maior que 0, o myqsli fetch all vai trazer TODOS os dados encontrados pelo select

        foreach ($cupons as $cupom) {
           
            $codCupom = $cupom[1];
           
            echo "<table border='1'>
                        <tr>
                            <td>$codCupom</td>
                            
                        </tr>
                    </table>";
        }

        //CONSTRUIR UMA TELA COM UM BOTÃO COM A OPÇÃO DE VOLTAR PARA A AREA ADMINISTRATIVA(FAZER DENTRO DO PHP COM A TAG ECHO IGUAL EU FIZ A TABELA)
    }
   
} catch (Exception $e) { // vai cair no catch quando tiver algum erro de sintaxe no sql 
    var_dump($e);
    exit;
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}
echo"<form action='../adm.php' method='post'>
<button type='submit' id='voltar' ><a href='../adm.php'></a> Voltar</button>
</form>";