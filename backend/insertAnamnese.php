<?php
// Chama a classe de conexão
require './connection.php';

// Pega os dados do formulário
// mysqli_real_escape_string -> limpar a string que, no caso, será enviada ao banco de dados.
//Evita SQL Injection

$idPaciente =  mysqli_real_escape_string($conn, $_POST['idPaciente'] ?? '');

if ($idPaciente <= 0) {
    die("ID do paciente inválido. Valor recebido: " . var_export($idPaciente, true));
}

$queixaPrincipal = mysqli_real_escape_string($conn, $_POST['queixaPrincipal'] ?? '');
$historicoDoenca = mysqli_real_escape_string($conn, $_POST['historicoDoenca'] ?? '');
$antecedentesPessoais = mysqli_real_escape_string($conn, $_POST['antecedentesPessoais'] ?? '');
$antecedentesFamiliares = mysqli_real_escape_string($conn, $_POST['antecedentesFamiliares'] ?? '');
$exameFisico = mysqli_real_escape_string($conn, $_POST['exameFisico'] ?? '');
$hipoteseDiagnostica = mysqli_real_escape_string($conn, $_POST['hipoteseDiagnostica'] ?? '');
$planoDiagnostico = mysqli_real_escape_string($conn, $_POST['planoDiagnostico'] ?? '');

// Código SQL
$sql = "INSERT INTO tblanamneses 
    (IdPaciente,
    QueixaPrincipalAnamnese,
    HistoricoDoencaAtualAnamnese,
    AntecedentesPessoaisAnamnese,
    AntecedentesFamiliaresAnamnese,
    ExameFisicoAnamnese,
    HipotesesDiagnosticasAnamnese,
    PlanoTratamentoAnamnese,
    DataCadastroAnamnese) 
    VALUES ('$idPaciente', '$queixaPrincipal', '$historicoDoenca', '$antecedentesPessoais', '$antecedentesFamiliares',
    '$exameFisico', '$hipoteseDiagnostica', '$planoDiagnostico', CURRENT_TIMESTAMP)";

// Executa a declaração
if ($conn->query($sql) === TRUE) {
    header("Location: ../frontend/listaAnamneses.php?id=" . urlencode($idPaciente) . "&message=" . urlencode("successanamnese"));
    exit();
} else {
    // Exibe a mensagem de erro completa para depuração
    echo "Erro: " . $conn->error;
    exit();
}

$conn->close();
?>

