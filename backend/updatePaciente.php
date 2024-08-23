<?php
require './connection.php';

// Verifica se o ID do paciente foi fornecido
$idPaciente = mysqli_real_escape_string($conn, $_POST['id'] ?? '');
if (empty($idPaciente)) {
    echo "ID do paciente não fornecido.";
    exit();
}

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém e sanitiza os dados do formulário
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

    // Código SQL para atualizar os dados
    $sql = "UPDATE tblpacientes SET 
        NomePaciente = '$nome',
        SobrenomePaciente = '$sobrenome',
        DataNascimentoPaciente = '$data_nascimento',
        GeneroPaciente = '$genero',
        CpfPaciente = '$cpf',
        RgPaciente = '$rg',
        CertidaoPaciente = '$certidao',
        NaturalidadePaciente = '$naturalidade',
        EstadoCivilPaciente = '$estadoCivil',
        TelefonePaciente = '$telefone',
        CelularPaciente = '$celular',
        CepPaciente = '$cep',
        LogradouroPaciente = '$logradouro',
        NumeroEnderecoPaciente = '$numeroEndereco',
        BairroPaciente = '$bairro',
        CidadePaciente = '$cidade',
        EstadoPaciente = '$estado',
        DataCadastroPaciente = CURRENT_TIMESTAMP
        WHERE IdPaciente = '$idPaciente'";

    // Executa a declaração
    if ($conn->query($sql) === TRUE) {
        header("Location: ../frontend/index.php?message=successUpdate");
        exit();
    } else {
        // Exibe a mensagem de erro completa para depuração
        echo "Erro: " . $conn->error;
        exit();
    }
}

$conn->close();
?>


