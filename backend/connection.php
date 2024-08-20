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

//outra verificação, caso "result" seja false
if ($result === false) {
    die("Erro na consulta SQL: " . $conn->error);
}
?>