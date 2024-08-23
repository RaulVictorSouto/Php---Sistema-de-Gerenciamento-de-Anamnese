<?php

//chama a conexao
require './connection.php';

//pega e apaga o id do paciente
$idPaciente = mysqli_real_escape_string($conn, $_GET['id'] ?? '');

//verifica se o ID do paciente foi fornecido
if (empty($idPaciente)) {
    echo "ID do paciente não fornecido.";
    exit();
}

//string de exclusão
$sql = "DELETE FROM tblpacientes WHERE IdPaciente = '$idPaciente'";

//executa a declaração
if ($conn->query($sql) === TRUE) {
    header("Location: ../frontend/index.php?message=deleted");
} else {
    echo "Erro ao excluir o paciente: " . $conn->error;
    exit();
}

// Fecha a conexão
$conn->close();

?>