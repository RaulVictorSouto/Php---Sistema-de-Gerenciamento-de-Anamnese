<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Lista de Pacientes</title>
</head>
<body>
    <div class="container">
        <h1>Lista de Pacientes</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // chama o arquivo de conexão
                    require '../backend/connection.php';

                    if ($result->num_rows > 0) {
                        // cria a lista de pacientes
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["NOME"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["DataCadastroPaciente"]) . "</td>";
                            echo "<td>";
                            echo "<a href='./atualizarPaciente.php?id=" . urlencode($row["IdPaciente"]) . "'>Editar</a> | ";
                            echo "<a href='../backend/deletePaciente.php?id=" . urlencode($row["IdPaciente"]) . "' onclick='return confirm(\"Você tem certeza que deseja excluir este paciente?\");'>Excluir</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Nenhum paciente encontrado</td></tr>";
                    }
                ?>
            </tbody>
        </table>

        <div class="botaoCadastrar">
            <button onclick="window.location.href='cadastroPaciente.php';">Cadastrar Novo Paciente</button>
        </div>

        <script>
            // função para exibir o alerta com base na mensagem da query string
            function showAlert(message) {
                if (message === 'success') {
                    alert('Paciente cadastrado com sucesso!');
                } else if (message === 'error') {
                    alert('Erro ao cadastrar paciente.');
                }
            }

            // obter a mensagem da query string
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');
            
            //mostrar o alerta se houver mensagem
            if (message) {
                showAlert(message);
            }
        </script>
        
    </div>
</body>
</html>

