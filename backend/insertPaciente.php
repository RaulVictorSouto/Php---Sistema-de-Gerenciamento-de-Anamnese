<?php
// Chama a classe de conexão
require './connection.php';

// Pega os dados do formulário
// mysqli_real_escape_string -> limpar a string que, no caso, será enviada ao banco de dados.
//Evita SQL Injection
$nome = mysqli_real_escape_string($conn, $_POST['nome'] ?? '');
$sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome'] ?? '');
$data_nascimento = mysqli_real_escape_string($conn, $_POST['data_nascimento'] ?? '');
$genero = mysqli_real_escape_string($conn, $_POST['genero'] ?? '');
$cpf = mysqli_real_escape_string($conn, $_POST['cpf'] ?? '');
$rg = mysqli_real_escape_string($conn, $_POST['rg'] ?? '');
$certidao = mysqli_real_escape_string($conn, $_POST['certidao'] ?? '');
$naturalidade = mysqli_real_escape_string($conn, $_POST['naturalidade'] ?? '');
$estadoCivil = mysqli_real_escape_string($conn, $_POST['estadoCivil'] ?? '');
$telefone = mysqli_real_escape_string($conn, $_POST['telefone'] ?? '');
$celular = mysqli_real_escape_string($conn, $_POST['celular'] ?? '');
$cep = mysqli_real_escape_string($conn, $_POST['cep'] ?? '');
$logradouro = mysqli_real_escape_string($conn, $_POST['rua'] ?? '');
$numeroEndereco = mysqli_real_escape_string($conn, $_POST['numero'] ?? '');
$bairro = mysqli_real_escape_string($conn, $_POST['bairro'] ?? '');
$cidade = mysqli_real_escape_string($conn, $_POST['cidade'] ?? '');
$estado = mysqli_real_escape_string($conn, $_POST['estado'] ?? '');

// Código SQL
$sql = "INSERT INTO tblpacientes 
    (NomePaciente, 
    SobrenomePaciente, 
    DataNascimentoPaciente, 
    GeneroPaciente, 
    CpfPaciente,
    RgPaciente,
    CertidaoPaciente,
    NaturalidadePaciente, 
    EstadoCivilPaciente,
    TelefonePaciente,
    CelularPaciente,
    CepPaciente,
    LogradouroPaciente,
    NumeroEnderecoPaciente,
    BairroPaciente, 
    CidadePaciente, 
    EstadoPaciente,
    DataCadastroPaciente) 
    VALUES ('$nome', '$sobrenome', '$data_nascimento', '$genero', '$cpf', '$rg', '$certidao', '$naturalidade',
    '$estadoCivil', '$telefone', '$celular', '$cep', '$logradouro', '$numeroEndereco', '$bairro', '$cidade', '$estado', CURRENT_TIMESTAMP)";

// Executa a declaração
if ($conn->query($sql) === TRUE) {
    header("Location: ../frontend/index.php?message=success");
} else {
    // Exibe a mensagem de erro completa para depuração
    echo "Erro: " . $conn->error;
    exit();
}

$conn->close();
?>

