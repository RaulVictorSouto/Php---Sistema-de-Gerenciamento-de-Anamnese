<?php

    require './connection.php';

    $idAnamnese =  mysqli_real_escape_string($conn, $_POST['idAnamnese'] ?? '');
    $idPaciente =  mysqli_real_escape_string($conn, $_POST['idPaciente'] ?? '');

    if ($idAnamnese <= 0) {
        die("ID da anamnese inválido. Valor recebido: " . var_export($idAnamnese, true));
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Obtém e sanitiza os dados do formulário
        $queixaPrincipal = mysqli_real_escape_string($conn, $_POST['queixaPrincipal'] ?? '');
        $historicoDoenca = mysqli_real_escape_string($conn, $_POST['historicoDoenca'] ?? '');
        $antecedentesPessoais = mysqli_real_escape_string($conn, $_POST['antecedentesPessoais'] ?? '');
        $antecedentesFamiliares = mysqli_real_escape_string($conn, $_POST['antecedentesFamiliares'] ?? '');
        $exameFisico = mysqli_real_escape_string($conn, $_POST['exameFisico'] ?? '');
        $hipoteseDiagnostica = mysqli_real_escape_string($conn, $_POST['hipoteseDiagnostica'] ?? '');
        $planoDiagnostico = mysqli_real_escape_string($conn, $_POST['planoDiagnostico'] ?? '');

        //Sql para atualizar
        $sql = "UPDATE tblanamneses SET 
            QueixaPrincipalAnamnese = '$queixaPrincipal',
            HistoricoDoencaAtualAnamnese = '$historicoDoenca',
            AntecedentesPessoaisAnamnese = '$antecedentesPessoais',
            AntecedentesFamiliaresAnamnese = '$antecedentesFamiliares',
            ExameFisicoAnamnese = '$exameFisico',
            HipotesesDiagnosticasAnamnese = '$hipoteseDiagnostica',
            PlanoTratamentoAnamnese = '$planoDiagnostico'
            WHERE IdAnamnese = '$idAnamnese'";
        
         // Executa a declaração
            if ($conn->query($sql) === TRUE) {
                header("Location: ../frontend/listaAnamneses.php?id=" . urlencode($idPaciente));
                exit();
            } else {
                // Exibe a mensagem de erro completa para depuração
                echo "Erro: " . $conn->error;
                exit();
            }
    }

    $conn->close();
?>