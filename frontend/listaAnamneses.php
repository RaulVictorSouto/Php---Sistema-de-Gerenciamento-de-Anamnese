<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Lista de Anamneses</title>
</head>
<body>
    <div class="container">
        <h1>Lista de Anamneses</h1>
        <table>
            <thead>
                <tr>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // chama o arquivo de conexão
                    require '../backend/connection.php';

                    if ($resultAnamnese->num_rows > 0) 
                    {
                        echo "Número de resultados: " . $resultAnamnese->num_rows . "<br>";
                        while($row = $resultAnamnese->fetch_assoc()) {
                            echo "Dados retornados: ";
                            print_r($row);
                            echo "<br>";
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["DataCadastroAnamnese"]) . "</td>";
                            echo "<td>";
                            echo "<a href='../backend/deleteAnamnese.php?id=" . urlencode($row["IdAnamnese"]) . "' onclick='return confirm(\"Você tem certeza que deseja excluir esta anamnese?\");'>Excluir</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } 
                    else
                    {
                        echo "<tr><td colspan='2'>Nenhuma anamnese encontrada</td></tr>";
                    }
                    
                ?>
            </tbody>
        </table>

        <div class="botaoCadastrar">
            <button onclick="window.location.href='cadastroAnamnese.php?id=<?php echo urlencode($idPaciente); ?>';">Cadastrar Nova Anamnese</button>

        </div>

        <script>
            // função para exibir o alerta com base na mensagem da query string
            function showAlertInsert(message) 
            {
                if (message === 'success') {
                    alert('Paciente cadastrado com sucesso!');
                } else if (message === 'error') {
                    alert('Erro ao cadastrar paciente.');
                }
            }

            function showAlertUpdate(message) 
            {
                if (message === 'successUpdate') {
                    alert('Paciente atualizado com sucesso!');
                } else if (message === 'error') {
                    alert('Erro ao atualizar paciente.');
                }
            }

            // obter a mensagem da query string
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');
            
            //mostrar o alerta se houver mensagem
            if (message) 
            {
                showAlertInsert(message);
            }
        </script>
        
    </div>
</body>
</html>