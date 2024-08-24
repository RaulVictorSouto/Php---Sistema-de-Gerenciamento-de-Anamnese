<?php
// conecta com banco de dados
$conn = new mysqli("localhost", "root", "", "anamnese");

// verifica se conexão foi bem sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// seleção de pacientes
$sql = "SELECT IdPaciente, CONCAT(NomePaciente, ' ', SobrenomePaciente) AS NOME, DataCadastroPaciente FROM tblpacientes";
$result = $conn->query($sql);

if ($result === false) {
    die("Erro na consulta SQL: " . $conn->error);
}

//seleção de anamnese
$idPaciente = mysqli_real_escape_string($conn, $_GET['id'] ?? '');
$sqlAnamnese = "SELECT IdAnamnese, DataCadastroAnamnese FROM tblanamneses WHERE IdPaciente = '$idPaciente'";
$resultAnamnese = $conn->query($sqlAnamnese);

if ($resultAnamnese === false) {
    die("Erro na consulta SQL: " . $conn->error);
}

//outra verificação, caso "result" seja false
if ($result === false) {
    die("Erro na consulta SQL: " . $conn->error);
}
?>