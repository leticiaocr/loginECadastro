<html>

<body style="background: white;">


    <link rel="stylesheet" href="../assets/estilos/style.css">
    <form action="atualizarClientes.php" id="form" name="form" method="post">

        <div class="input-group"></div>

        <div class="input-box">
            <input type="cpf" name="cpf" placeholder="Digite o CPF DO USUÁRIO">
        </div>

        <div class="input-box">
            <input type="text" name="nome" placeholder="Digite para atualizar o nome">
        </div>

        <div class="input-box">
            <input type="text" name="email" placeholder="Digite para atualizar o email">
        </div>

        <div class="input-box">
            <input type="date" name="dataNascimento" placeholder="Digite para atualizar a data de nascimento">
        </div>

        <div class="input-box">

            <input type="password" name="senha" placeholder="Digite para atualizar a senha">
        </div>
        <div class="submit">
            <input type="submit" value="Atualizar usuário">
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

$nome = (isset($_POST['nome'])) ? $_POST['nome'] : false;
$email = (isset($_POST['email'])) ? $_POST['email'] : false;
$cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : false;
$dataNascimento = (isset($_POST['dataNascimento'])) ? $_POST['dataNascimento'] : false;
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : false;
$confirmSenha = (isset($_POST['confirmSenha'])) ? $_POST['confirmSenha'] : false;
$genero = (isset($_POST['genero'])) ? $_POST['genero'] : false;

if ($email == false) {
    echo "Digite o CPF para identificar o usuário";
    exit;
}

if ($nome == false || $email == false || $dataNascimento == false || $senha == false) {
    echo "Digite os dados atuais caso não queira fazer atualizações";
    exit;
}


try {
    $sql = "UPDATE pessoas SET NOME = '$nome', EMAIL = '$email', SENHA = '$senha', DATANASCIMENTO = '$dataNascimento'
                WHERE CPF = '$cpf'";
    $con = mysqli_query($conexao, $sql);
} catch (Exception $e) {
   
    return [
        "sucesso" => false,
        "mensagem" => $e->getMessage()
    ];
}
