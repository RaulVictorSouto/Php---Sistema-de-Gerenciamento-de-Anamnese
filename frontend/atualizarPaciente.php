<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Dados de Paciente</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Atualizar Dados de Paciente</h1>

        <?php
            require '../backend/connection.php';
            $idPaciente = mysqli_real_escape_string($conn, $_GET['idPaciente'] ?? '');

            if (empty($idPaciente)) {
                die("ID do paciente não fornecido.");
            }
            
            //função para preencher os dados do paciente nos campos do formulário
            function SetDados($idPaciente, $conn) 
            {
                $sql = "SELECT * FROM anamnese.tblpacientes WHERE IdPaciente = '$idPaciente'";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    return $result->fetch_assoc();
                } else {
                    return null;
                }
            }
            
            //chama a SetDados
            $dadosPaciente = SetDados($idPaciente, $conn);

            if ($dadosPaciente) {
                $nome = $dadosPaciente['NomePaciente'] ?? '';
                $sobrenome = $dadosPaciente['SobrenomePaciente'] ?? '';
                $data_nascimento = $dadosPaciente['DataNascimentoPaciente'] ?? '';
                $genero = $dadosPaciente['GeneroPaciente'] ?? '';
                $cpf = $dadosPaciente['CpfPaciente'] ?? '';
                $rg = $dadosPaciente['RgPaciente'] ?? '';
                $certidao = $dadosPaciente['CertidaoPaciente'] ?? '';
                $naturalidade = $dadosPaciente['NaturalidadePaciente'] ?? '';
                $estadoCivil = $dadosPaciente['EstadoCivilPaciente'] ?? '';
                $telefone = $dadosPaciente['TelefonePaciente'] ?? '';
                $celular = $dadosPaciente['CelularPaciente'] ?? '';
                $cep = $dadosPaciente['CepPaciente'] ?? '';
                $logradouro = $dadosPaciente['LogradouroPaciente'] ?? '';
                $numeroEndereco = $dadosPaciente['NumeroEnderecoPaciente'] ?? '';
                $bairro = $dadosPaciente['BairroPaciente'] ?? '';
                $cidade = $dadosPaciente['CidadePaciente'] ?? '';
                $estado = $dadosPaciente['EstadoPaciente'] ?? '';
            }

        ?>


        <form action="../backend/updatePaciente.php" method="POST">
            <!-- Dados basicos -->
            <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($idPaciente); ?>">

            <div class="dadosBasicos">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>

                <label for="sobrenome">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $sobrenome; ?>" required>

                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $data_nascimento; ?>" required>

                <label for="genero">Gênero:</label>
                <select id="genero" name="genero" required>
                    <option value="">Selecione...</option>
                    <option value="Masculino" <?php echo ($genero === 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                    <option value="Feminino" <?php echo ($genero === 'Feminino') ? 'selected' : ''; ?>>Feminino</option>
                    <option value="Outro" <?php echo ($genero === 'Outro') ? 'selected' : ''; ?>>Outro</option>
                    <option value="Prefiro não informar" <?php echo ($genero === 'Prefiro não informar') ? 'selected' : ''; ?>>Prefiro não informar</option>
                </select>

                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" value="<?php echo $cpf; ?>">

                <label for="rg">RG:</label>
                <input type="text" id="rg" name="rg" placeholder="XX.XXX.XXX-X" value="<?php echo $rg; ?>">

                <label for="certidao">Certidão de Nascimento:</label>
                <input type="text" id="certidao" name="certidao" placeholder="XXXXXX, XX XX XXXX, XX:XX" value="<?php echo $certidao; ?>">
                
                <label for="naturalidade">Naturalidade:</label>
                <input type="text" id="naturalidade" name="naturalidade" placeholder="Cidade/Estado" value="<?php echo $naturalidade; ?>" required>

                <label for="estadoCivil">Estado Civil:</label>
                <select id="estadoCivil" name="estadoCivil" required>
                    <option value="">Selecione...</option>
                    <option value="Solteiro(a)" <?php echo ($estadoCivil === 'Solteiro(a)') ? 'selected' : ''; ?>>Solteiro(a)</option>
                    <option value="Casado(a)" <?php echo ($estadoCivil === 'Casado(a)') ? 'selected' : ''; ?>>Casado(a)</option>
                    <option value="Divorciado(a)" <?php echo ($estadoCivil === 'Divorciado(a)') ? 'selected' : ''; ?>>Divorciado(a)</option>
                    <option value="Viúvo(a)" <?php echo ($estadoCivil === 'Viúvo(a)') ? 'selected' : ''; ?>>Viúvo(a)</option>
                    <option value="Separado(a)" <?php echo ($estadoCivil === 'Separado(a)') ? 'selected' : ''; ?>>Separado(a)</option>
                </select>
            </div>
            <!-- Dados basicos -->

            <!-- Telefones -->
            <div class="telefones">
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXX-XXXX" value="<?php echo $telefone; ?>">

                <label for="celular">Celular:</label>
                <input type="tel" id="celular" name="celular" placeholder="(XX) XXXXX-XXXX" value="<?php echo $celular; ?>">

            </div>
            <!-- Telefone -->

            <!-- Endereço -->
            <div class="endereco">
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" placeholder="XXXXX-XXX" value="<?php echo $cep; ?>">

                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua" placeholder="Nome da Rua" value="<?php echo $logradouro; ?>">

                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" placeholder="Número" value="<?php echo $numeroEndereco; ?>">

                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" placeholder="Nome do Bairro" value="<?php echo $bairro; ?>">

                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" placeholder="Nome da Cidade" value="<?php echo $cidade; ?>"> 

                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="">Selecione...</option>
                    <option value="AC" <?php echo ($estado === 'AC') ? 'selected' : ''; ?>>AC</option>
                    <option value="AL" <?php echo ($estado === 'AL') ? 'selected' : ''; ?>>AL</option>
                    <option value="AP" <?php echo ($estado === 'AP') ? 'selected' : ''; ?>>AP</option>
                    <option value="AM" <?php echo ($estado === 'AM') ? 'selected' : ''; ?>>AM</option>
                    <option value="BA" <?php echo ($estado === 'BA') ? 'selected' : ''; ?>>BA</option>
                    <option value="CE" <?php echo ($estado === 'CE') ? 'selected' : ''; ?>>CE</option>
                    <option value="DF" <?php echo ($estado === 'DF') ? 'selected' : ''; ?>>DF</option>
                    <option value="ES" <?php echo ($estado === 'ES') ? 'selected' : ''; ?>>ES</option>
                    <option value="GO" <?php echo ($estado === 'GO') ? 'selected' : ''; ?>>GO</option>
                    <option value="MA" <?php echo ($estado === 'MA') ? 'selected' : ''; ?>>MA</option>
                    <option value="MT" <?php echo ($estado === 'MT') ? 'selected' : ''; ?>>MT</option>
                    <option value="MS" <?php echo ($estado === 'MS') ? 'selected' : ''; ?>>MS</option>
                    <option value="MG" <?php echo ($estado === 'MG') ? 'selected' : ''; ?>>MG</option>
                    <option value="PA" <?php echo ($estado === 'PA') ? 'selected' : ''; ?>>PA</option>
                    <option value="PB" <?php echo ($estado === 'PB') ? 'selected' : ''; ?>>PB</option>
                    <option value="PR" <?php echo ($estado === 'PR') ? 'selected' : ''; ?>>PR</option>
                    <option value="PE" <?php echo ($estado === 'PE') ? 'selected' : ''; ?>>PE</option>
                    <option value="PI" <?php echo ($estado === 'PI') ? 'selected' : ''; ?>>PI</option>
                    <option value="RJ" <?php echo ($estado === 'RJ') ? 'selected' : ''; ?>>RJ</option>
                    <option value="RN" <?php echo ($estado === 'RN') ? 'selected' : ''; ?>>RN</option>
                    <option value="RS" <?php echo ($estado === 'RS') ? 'selected' : ''; ?>>RS</option>
                    <option value="RO" <?php echo ($estado === 'RO') ? 'selected' : ''; ?>>RO</option>
                    <option value="RR" <?php echo ($estado === 'RR') ? 'selected' : ''; ?>>RR</option>
                    <option value="SC" <?php echo ($estado === 'SC') ? 'selected' : ''; ?>>SC</option>
                    <option value="SP" <?php echo ($estado === 'SP') ? 'selected' : ''; ?>>SP</option>
                    <option value="SE" <?php echo ($estado === 'SE') ? 'selected' : ''; ?>>SE</option>
                    <option value="TO" <?php echo ($estado === 'TO') ? 'selected' : ''; ?>>TO</option>
                </select>

            </div>
            <!-- Endereço -->

            <button type="submit" onclick="window.location.href='index.php';">Atualizar</button>
            <button onclick="window.location.href='index.php'">Voltar</button>
        </form>
    </div>
</body>
</html>