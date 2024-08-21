<?php
    //chama a classe de conexão
    require 'connection.php';

    //pega os dados do formulário
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $certidao = $_POST['certidao'];
    $naturalidade = $_POST['naturalidade'];
    $estadoCivil = $_POST['estado_civil'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $numeroEndereco = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    //código sql
    $sql = "INSERT INTO tblpacientes 
    (NomePaciente, 
    SobrenomePaciente, 
    DataNascimentoPaciente, 
    GeneroPaciente, 
    CpfPaciente,
    RgPaciente,
    CertidaoPaciente,
    NaturalidadePaciente, 
    EstadoCivilPaciente,
    TelefonePaciente,
    CelularPaciente,
    CepPaciente,
    LogradouroPaciente,
    NumeroEnderecoPaciente,
    BairroPaciente, 
    CidadePaciente, 
    EstadoPaciente) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // verifica se a preparação foi bem-sucedida
    if (!$stmt) {
    die("Erro na preparação da declaração: " . $conn->error);
    }

    // Vincula os parâmetros
    $stmt->bind_param("ssssssssssssssss", 
    $nome, 
    $sobrenome, 
    $data_nascimento, 
    $genero, 
    $cpf, 
    $rg, 
    $certidao, 
    $naturalidade, 
    $estadoCivil, 
    $telefone, 
    $celular, 
    $cep, 
    $logradouro, 
    $numeroEndereco, 
    $bairro, 
    $cidade, 
    $estado);

    // Executa a declaração
    if ($stmt->execute()) 
    {
        echo "Paciente cadastrado com sucesso!";
    } 
    else 
    {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();


?>