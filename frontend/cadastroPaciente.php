<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Paciente</h1>
        <form action="cadastroPaciente.php" method="POST">

            <!-- Dados basicos -->
            <div class="dadosBasicos">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="sobrenome">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" required>

                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>

                <label for="genero">Gênero:</label>
                <select id="genero" name="genero" required>
                    <option value="">Selecione...</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                    <option value="nao_informar">Prefiro não informar</option>
                </select>

                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>

                <label for="rg">RG:</label>
                <input type="text" id="rg" name="rg" placeholder="XX.XXX.XXX-X" pattern="\d{2}\.\d{3}\.\d{3}-\d{1}" required>

                <label for="certidao">Certidão de Nascimento:</label>
                <input type="text" id="certidao" name="certidao" placeholder="XXXXXX, XX XX XXXX, XX:XX" pattern="\d{6}, \d{2} \d{2} \d{4}, \d{2}:\d{2}" required>
                
                <label for="naturalidade">Naturalidade:</label>
                <input type="text" id="naturalidade" name="naturalidade" placeholder="Cidade/Estado" required>

                <label for="estadoCivil">Estado Civil:</label>
                <select id="estadoCivil" name="estadoCivil" required>
                    <option value="">Selecione...</option>
                    <option value="solteiro">Solteiro(a)</option>
                    <option value="casado">Casado(a)</option>
                    <option value="divorciado">Divorciado(a)</option>
                    <option value="viuvo">Viúvo(a)</option>
                    <option value="separado">Separado(a)</option>
                </select>
            </div>
            <!-- Dados basicos -->

            <!-- Telefones -->
            <div class="telefones">
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXX-XXXX" pattern="\(\d{2}\) \d{4}-\d{4}" required>

                <label for="celular">Celular:</label>
                <input type="tel" id="celular" name="celular" placeholder="(XX) XXXXX-XXXX" pattern="\(\d{2}\) \d{5}-\d{4}" required>

            </div>
            <!-- Telefone -->

            <!-- Endereço -->
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" placeholder="XXXXX-XXX" pattern="\d{5}-\d{3}" required>
            </div>

            <div class="endereco">
            <label for="rua">Rua:</label>
            <input type="text" id="rua" name="rua" placeholder="Nome da Rua" required>

            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" placeholder="Número" required>

            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento" placeholder="Complemento (Opcional)">

            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" placeholder="Nome do Bairro" required>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" placeholder="Nome da Cidade" required>

            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="">Selecione...</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SP">SP</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>
            </select>

            <!-- Endereço -->

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
