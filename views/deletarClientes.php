<html>

<body style="background: white;">

    <link rel="stylesheet" href="../assets/estilos/style.css">
    <form action="deletarClientes.php" id="form" name="form" method="post">

        <div class="input-group"></div>
        <div class="input-box">
            <input type="test" name="cpf" placeholder="digite o CPF para excluir um usuário">
        </div>

        <div class="submit">
            <input type="submit" value="Excluir usuário">
        </div>
        </div>

    </form>
</body>

</html>

<?php
echo "<form action='../adm.php' method='post'>
<button type='submit' id='voltar' style='padding: 10px;
    margin: 10px;
    background: #A60303;
    border: none;
    border-radius: 10px;
    width: 200px;
    color: white; '  ><a href='../adm.php'></a> Voltar</button>
</form>";

include '../inc/conecta.php';

$cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : false;

if ($cpf == false) {
    echo "informe os dados para deletar o usuário";
    exit;
}

try {
    $sql = "DELETE FROM pessoas WHERE CPF = '$cpf'";
    $con = mysqli_query($conexao, $sql);
} catch (Exception $e) {
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}
