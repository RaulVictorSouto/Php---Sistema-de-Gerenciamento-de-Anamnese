<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Anamnese</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="container">
        <h1>Atualizar Anamnese</h1>

        <?php
            require '../backend/connection.php';
            $idAnamnese = mysqli_real_escape_string($conn, $_GET['idAnamnese'] ?? '');

            if (empty($idAnamnese)) {
                die("ID do paciente não fornecido.");
            }
            
            //função para preencher os dados do paciente nos campos do formulário
            function SetDados($idAnamnese, $conn) 
            {
                $sql = "SELECT * FROM anamnese.tblanamneses WHERE IdAnamnese = '$idAnamnese'";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    return $result->fetch_assoc();
                } else {
                    return null;
                }
            }
            
            //chama a SetDados
            $dadosAnamnese = SetDados($idAnamnese, $conn);

            if ($dadosAnamnese) {
                $idPaciente = $dadosAnamnese['IdPaciente'] ?? '';
                $queixaPrincipal = $dadosAnamnese['QueixaPrincipalAnamnese'] ?? '';
                $historicoDoenca = $dadosAnamnese['HistoricoDoencaAtualAnamnese'] ?? '';
                $antecedentesPessoais = $dadosAnamnese['AntecedentesPessoaisAnamnese'] ?? '';
                $antecedentesFamiliares = $dadosAnamnese['AntecedentesFamiliaresAnamnese'] ?? '';
                $exameFisico = $dadosAnamnese['ExameFisicoAnamnese'] ?? '';
                $hipoteseDiagnostica = $dadosAnamnese['HipotesesDiagnosticasAnamnese'] ?? '';
                $planoDiagnostico = $dadosAnamnese['PlanoTratamentoAnamnese'] ?? '';
            }

        ?>


        <form action="../backend/updateAnamnese.php" method="POST">
            <input type="hidden" id="idAnamnese" name="idAnamnese" value="<?php echo htmlspecialchars($idAnamnese); ?>">
            <input type="hidden" id="idPaciente" name="idPaciente" value="<?php echo htmlspecialchars($idPaciente); ?>">

            <!-- Queixa Principal -->
            <div class="form-group">
                <label for="queixaPrincipal">Queixa Principal:</label>
                <textarea id="queixaPrincipal" name="queixaPrincipal" rows="4"><?php echo htmlspecialchars($queixaPrincipal); ?></textarea>
            </div>

            <!-- Histórico da Doença Atual -->
            <div class="form-group">
                <label for="historicoDoenca">Histórico da Doença Atual:</label>
                <textarea id="historicoDoenca" name="historicoDoenca" rows="4"><?php echo htmlspecialchars($historicoDoenca); ?></textarea>
            </div>

            <!-- Antecedentes Pessoais -->
            <div class="form-group">
                <label for="antecedentesPessoais">Antecedentes Pessoais:</label>
                <textarea id="antecedentesPessoais" name="antecedentesPessoais" rows="4"><?php echo htmlspecialchars($antecedentesPessoais); ?></textarea>
            </div>

            <!-- Antecedentes Familiares -->
            <div class="form-group">
                <label for="antecedentesFamiliares">Antecedentes Familiares:</label>
                <textarea id="antecedentesFamiliares" name="antecedentesFamiliares" rows="4"><?php echo htmlspecialchars($antecedentesFamiliares); ?></textarea>
            </div>

            <!-- Exame Físico -->
            <div class="form-group">
                <label for="exameFisico">Exame Físico:</label>
                <textarea id="exameFisico" name="exameFisico" rows="4"><?php echo htmlspecialchars($exameFisico); ?></textarea>
            </div>

            <!-- Hipótese Diagnóstica -->
            <div class="form-group">
                <label for="hipoteseDiagnostica">Hipótese Diagnóstica:</label>
                <textarea id="hipoteseDiagnostica" name="hipoteseDiagnostica" rows="4"><?php echo htmlspecialchars($hipoteseDiagnostica); ?></textarea>
            </div>

            <!-- Plano Diagnóstico -->
            <div class="form-group">
                <label for="planoDiagnostico">Plano Diagnóstico:</label>
                <textarea id="planoDiagnostico" name="planoDiagnostico" rows="4"><?php echo htmlspecialchars($planoDiagnostico); ?></textarea>
            </div>

            <button type="submit">Atualizar Anamnese</button>
            <button onclick="window.location.href='./listaAnamneses.php?idPaciente=<?php echo urlencode($idPaciente); ?>'">Voltar</button>

        </form>

    </div>

</body>
</html>
