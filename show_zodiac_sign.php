<?php include('layout/header.php'); ?>

<div class="container mt-5">
    <h1>Qual seu signo?</h1>
<?php

//Capitura de da data de nascimento//
$data_nascimento = $_POST['data_nascimento'];

//Pegar o o arquivo xml//
$signos = simplexml_load_file("signos.xml");
$data_nascimento = new DateTime($data_nascimento);
$signo_encontrado = false;


foreach ($signos->signo as $signo) {
$data_inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
$data_fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);


// Pega o ano e a data de nascimento 
$data_inicio->setDate($data_nascimento->format('Y'), $data_inicio->format('m'),
$data_inicio->format('d'));
$data_fim->setDate($data_nascimento->format('Y'), $data_fim->format('m'),
$data_fim->format('d'));
if ($data_inicio > $data_fim) {
$data_fim->modify('+1 year');

if ($data_nascimento < $data_inicio && $data_nascimento > $data_fim) {
    continue;
    }
    }


//Verifica se a data está nas diretrizes pega o signo correspondente 
    if ($data_nascimento >= $data_inicio && $data_nascimento <= $data_fim) {
    echo "<h2>{$signo->signoNome}</h2>";
    echo "<p>{$signo->descricao}</p>";
    $signo_encontrado = true;
    break;
    }
    }
    
    ?>
    <a href="index.php" > Voltar </a>
    </div>

    