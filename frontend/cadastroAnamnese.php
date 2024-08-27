<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Anamnese</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="container">
        <h1>Registro de Anamnese</h1>

        <?php
            // Incluir o arquivo de conexão com o banco de dados
            require '../backend/connection.php';

            // Verifica se o id foi passado e atribui à variável
            if (isset($_GET['idPaciente']) && !empty($_GET['idPaciente'])) {
                $idPaciente = mysqli_real_escape_string($conn, $_GET['idPaciente']);
            } 
            else
            {
                die("ID do paciente não fornecido.");
            }
        ?>


        <form action="../backend/insertAnamnese.php" method="POST">
            <input type="hidden" id="idPaciente" name="idPaciente" value="<?php echo htmlspecialchars($idPaciente); ?>">
            <!-- Queixa Principal -->
            <div class="form-group">
                <label for="queixaPrincipal">Queixa Principal:</label>
                <textarea id="queixaPrincipal" name="queixaPrincipal" rows="4" required></textarea>
            </div>

            <!-- Histórico da Doença Atual -->
            <div class="form-group">
                <label for="historicoDoenca">Histórico da Doença Atual:</label>
                <textarea id="historicoDoenca" name="historicoDoenca" rows="4"></textarea>
            </div>

            <!-- Antecedentes Pessoais -->
            <div class="form-group">
                <label for="antecedentesPessoais">Antecedentes Pessoais:</label>
                <textarea id="antecedentesPessoais" name="antecedentesPessoais" rows="4"></textarea>
            </div>

            <!-- Antecedentes Familiares -->
            <div class="form-group">
                <label for="antecedentesFamiliares">Antecedentes Familiares:</label>
                <textarea id="antecedentesFamiliares" name="antecedentesFamiliares" rows="4"></textarea>
            </div>

            <!-- Exame Físico -->
            <div class="form-group">
                <label for="exameFisico">Exame Físico:</label>
                <textarea id="exameFisico" name="exameFisico" rows="4"></textarea>
            </div>

            <!-- Hipótese Diagnóstica -->
            <div class="form-group">
                <label for="hipoteseDiagnostica">Hipótese Diagnóstica:</label>
                <textarea id="hipoteseDiagnostica" name="hipoteseDiagnostica" rows="4"></textarea>
            </div>

            <!-- Plano Diagnóstico -->
            <div class="form-group">
                <label for="planoDiagnostico">Plano Diagnóstico:</label>
                <textarea id="planoDiagnostico" name="planoDiagnostico" rows="4"></textarea>
            </div>

            <button type="submit" onclick="window.location.href='./listaAnamneses.php';">Cadastrar Anamnese</button>
            <button onclick="window.location.href='./listaAnamneses.php'">Voltar</button>
        </form>
    </div>

</body>
</html>
