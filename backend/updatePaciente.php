<?php
// Chama a classe de conexão
require './connection.php';

// Pega o id do paciente
$idPaciente = mysqli_real_escape_string($conn, $_GET['id'] ?? '');

if (empty($idPaciente)) {
    die("ID do paciente não fornecido.");
}

// Função para preencher os dados do paciente nos campos do formulário
function SetDados($idPaciente, $conn) 
{
    // Buscar os dados do paciente
    $sql = "SELECT * FROM tblpacientes WHERE IdPaciente = '$idPaciente'";
    $result = $conn->query($sql);

    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Retorna os dados do paciente como um array associativo
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Chama a SetDados
$dadosPaciente = SetDados($idPaciente, $conn);

if ($dadosPaciente) {
    // Preenche os dados dos pacientes se eles existirem
    $nome = $dadosPaciente['NomePaciente'] ?? '';
    $sobrenome = $dadosPaciente['SobrenomePaciente'] ?? '';
    $data_nascimento = $dadosPaciente['DataNascimentoPaciente'] ?? '';
    $genero = $dadosPaciente['GeneroPaciente'] ?? '';
    $cpf = $dadosPaciente['CpfPaciente'] ?? '';
    $rg = $dadosPaciente['RgPaciente'] ?? '';
    $certidao = $dadosPaciente['CertidaoPaciente'] ?? '';
    $naturalidade = $dadosPaciente['NaturalidadePaciente'] ?? '';
    $estadoCivil = $dadosPaciente['EstadoCivilPaciente'] ?? '';
    $telefone = $dadosPaciente['TelefonePaciente'] ?? '';
    $celular = $dadosPaciente['CelularPaciente'] ?? '';
    $cep = $dadosPaciente['CepPaciente'] ?? '';
    $logradouro = $dadosPaciente['LogradouroPaciente'] ?? '';
    $numeroEndereco = $dadosPaciente['NumeroEnderecoPaciente'] ?? '';
    $bairro = $dadosPaciente['BairroPaciente'] ?? '';
    $cidade = $dadosPaciente['CidadePaciente'] ?? '';
    $estado = $dadosPaciente['EstadoPaciente'] ?? '';
} else {
    // Se não houver dados, inicializa as variáveis com valores vazios
    $nome = $sobrenome = $data_nascimento = $genero = $cpf = $rg = $certidao = $naturalidade = $estadoCivil = $telefone = $celular = $cep = $logradouro = $numeroEndereco = $bairro = $cidade = $estado = '';
}

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
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
