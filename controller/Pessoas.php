<?php

namespace Controller;

use Models\Pessoas as ModelsPessoas;

class Pessoas
{
    public function cadastro()
    {
        $pessoaArray = $this->validaInformacoes();
        $this->trataDados($pessoaArray);
        $this->instanciarBanco($pessoaArray);
    }

    public function validaInformacoes()
    {
        $nome = (isset($_POST['nome'])) ? $_POST['nome'] : false;
        $email = (isset($_POST['email'])) ? $_POST['email'] : false;
        $cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : false;
        $dataNascimento = (isset($_POST['dataDeNascimento'])) ? $_POST['dataDeNascimento'] : false;
        $senha = (isset($_POST['senha'])) ? $_POST['senha'] : false;
        $confirmaSenha = (isset($_POST['confirmaSenha'])) ? $_POST['confirmaSenha'] : false;

        $pessoaArray = array(
            'nome' => $nome,
            'email' => $email,
            'cpf' => $cpf,
            'dataDeNascimento' => $dataNascimento,
            'senha' => $senha,
            'confirmaSenha' => $confirmaSenha,
        );

        return $pessoaArray;
    }

    public function trataDados($pessoaArray)
    {
        if ($pessoaArray['nome'] == false || $pessoaArray['email'] == false || $pessoaArray['cpf'] == false || $pessoaArray['dataDeNascimento'] == false || $pessoaArray['senha'] == false || $pessoaArray['confirmaSenha'] == false) {
            echo "Algum dos parâmetros necessários não foi preenchido, tente novamente.";
            exit;
        }

        if ($pessoaArray['senha'] != $pessoaArray['confirmaSenha']) {
            echo "Senhas diferentes, tente novamente";
            exit;
        }

        if (strlen($pessoaArray['cpf']) != 11) {
            echo "CPF inválido";
            exit;
        }
    }


    public function instanciarBanco($pessoaArray)
    {
        $pessoa = new ModelsPessoas;
        $pessoa->inserirPessoa($pessoaArray);
    }
}
