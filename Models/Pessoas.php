<?php

namespace Models;

use Exception;

include '../inc/conecta.php';

class Pessoas
{
    public function inserirPessoa($pessoaArray)
    {
        global $conexao;
        // ------------------------------------------ CONEXÃO COM O BANCO ------------------------------------------

        try {
            $sql = "INSERT INTO pessoas (NOME, EMAIL, CPF , DATADENASCIMENTO, SENHA)
                        VALUES ('$pessoaArray[nome]','$pessoaArray[email]', '$pessoaArray[cpf]', '$pessoaArray[dataDeNascimento]', '$pessoaArray[senha]')";
            $insert = mysqli_query($conexao, $sql);
            header('Location: login.html');
        } catch (Exception $e) {
            return [
                "sucesso" => false,
                "mensagem" => $e->getMessage()
            ];
        }
    }
}
