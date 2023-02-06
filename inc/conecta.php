<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancoDeDados = "campanhanatal";
$porta = 3306;

$conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDeDados, $porta);


if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

