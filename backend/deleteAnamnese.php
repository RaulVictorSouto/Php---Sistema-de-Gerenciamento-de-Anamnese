<?php

//chama a conexao
require './connection.php';

//pega e apaga o id do anamnese
$idAnamnese = mysqli_real_escape_string($conn, $_GET['idAnamnese'] ?? '');
$idPaciente = mysqli_real_escape_string($conn, $_GET['idPaciente'] ?? '');

//verifica se o ID do anamnese foi fornecido
if (empty($idAnamnese)) {
    echo "ID do anamnese não fornecido.";
    exit();
}

//string de exclusão
$sql = "DELETE FROM tblanamneses WHERE IdAnamnese = '$idAnamnese'";

//executa a declaração
if ($conn->query($sql) === TRUE) {
    header("Location: ../frontend/listaAnamneses.php?id=" . urlencode($idPaciente));
} else {
    echo "Erro ao excluir o anamnese: " . $conn->error;
    exit();
}

// Fecha a conexão
$conn->close();

?>