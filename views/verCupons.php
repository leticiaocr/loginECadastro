
<?php

include '../inc/conecta.php';

echo "<form action='verCupons.php' method='post'>
        <input type='text' name='cpfconsulta' id='cpfconsulta' placeholder='Digite o CPF do cliente' style='margin: 10px;
        padding: 8px;
        width: 200px;
        border: 1px solid #403C08;
        border-radius: 10px;
        box-shadow: 1px 1px 6px #0000001c;
        font-size: 12px;'>
        <button type='submit' style='padding: 6px;
        margin: 10px;
        background: #A60303;
        border: none;
        border-radius: 10px;
        width: 200px;
        color: white;'>Consultar Cupom do cliente</button>
    </form>";

$cpfConsulta = isset($_POST['cpfconsulta']) ? $_POST['cpfconsulta'] : null;

try {
    $sql = "SELECT CPF, CODIGO FROM cuponscadastrados WHERE CPF = '$cpfConsulta'";
    $con = mysqli_query($conexao, $sql);
    $qtdCupons = mysqli_num_rows($con);

    if ($qtdCupons > 0) {
        $cupons = mysqli_fetch_all($con);

        foreach ($cupons as $cupom) {

            $codCupom = $cupom[1];

            echo "<table border='1'>
                        <tr>
                            <td>$codCupom</td>
                            
                        </tr>
                    </table>";
        }
    }
} catch (Exception $e) {
    var_dump($e);
    exit;
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}
echo "<form action='../adm.php' method='post'>
<button type='submit' id='voltar'style='padding: 10px;
margin: 10px;
background: #A60303;
border: none;
border-radius: 10px;
width: 200px;
color: white; ' ><a href='../adm.php'></a> Voltar</button>
</form>";
