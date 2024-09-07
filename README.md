Introdução

Conforme Bento (2021), o PHP trata-se de uma linguagem de programação destinada ao desenvolvimento de interfaces web. Sua popularidade deve-se à natureza aberta, uso gratuito e simples, além disso, ela possibilita a integração com servidores web de forma simplificada. A fim de revisar os fundamentos da linguagem PHP, foi proposto o desenvolvimento de sistema de gerenciamento e documentação de anamneses clínicas. Em adição, as tecnologias MySql, HTML, CSS e XAMPP também mostraram-se necessárias para concepção do projeto.

Desenvolvimento

Levantamento de requisitos

Segundo Lima et. al. (2021), a anamnese tem como objetivo o levantamento e registro inicial das queixas e histórico de um determinado paciente, com o intuito de se encontrar uma hipótese diagnóstica. As principais informações levantadas durante a anamnese são as principais queixas dos pacientes, o histórico da atual enfermidade, bem como os antecedentes pessoais e familiares.

Modelagem do diagrama de classes UML

Tendo em vista as informações extraídas, procedeu-se com a modelagem do diagrama de classes Unified Modeling Language (UML). De acordo com Koç et. al. (2021), o diagrama de classes UML, através de sua linguagem visual, possibilita a melhor compreensão dos requisitos e limitações de um dado cenário em que um software será desenvolvido.
Devido à natureza simples e polida do projeto, apenas duas classes foram concebidas, sendo ela “Paciente” e “Anamnese”. Ambas as classes armazenam os principais dados acerca das entidades que representam. Também nota-se, hierarquicamente, a classe “Anamnese” está abaixo da classe paciente “Paciente”, sendo que a primeira herda a chave primária da segunda. Além disso, em um contexto real, um paciente pode ser vinculado a vários anamneses, mas cada anamnese deve ser vinculada a apenas um paciente.

Desenvolvimento do sistema 

Afora, utilizou-se o sistema gerenciador de banco de dados MySql Workbench para criação do banco de dados do sistema. Segundo Bento (2021), o MySql trata-se de um software de uso livre para desenvolvimento e gerências de bases de dados relacionais. Também foi utilizado, por meio do ambiente de desenvolvimento XAMPP, o Servidor Apache, que, conforme Clemente (2019), trata-se de um serviço de  software de código aberto destinado ao processamento de informações transmitidas via Protocolo de Transferência de Hipertexto (HTTP).
Após isso, o projeto foi dividido em duas pastas: “frontend”, para interfaces gráficas, “backend”, para processamento dos dados e comunicação com o banco de dados. Na pasta “backend”, inicialmente foi criado o arquivo “connection.php”, que continha a string de conexão com a base de dados. 
Posteriormente, iniciou-se o trabalho com a Classe Paciente. Na pasta “frontend”, foram criadas interfaces de listagem, cadastro e edição de pacientes, por meio da Linguagem de Marcação de Hipertexto (HTML) e Cascading Style Sheets (CSS). A página de listagem é a principal interface do sistema, através de comanda require — presente em todas as interfaces — que permite que uma dada classe herde características de outra, conforme a documentação oficial do PHP (2024), foi realizada a conexão com o banco de dados para exibição dos pacientes cadastros. Esta página também encaminha o usuário para os formulários de cadastro e atualização dos dados de pacientes, além de possibilidades a exclusão dos pacientes e a visualização das anamnese a eles vinculadas.
A Classe Anamnese foi desenvolvida de forma semelhante, contudo, atenta-se ao fato do valor da variável “idPaciente”, chave estrangeira da Classe Anamnese e necessária para suas operações com banco de dados ter sido passada através do método GET. Ainda segundo a documentação oficial da tecnologia (2024), trata-se de vetor associativo de variáveis passadas entre scripts por meio de parâmetros na URL, o que proporciona facilidade aos testes com o sistema.
Ressalta-se que os scripts para gerenciamento e processamentos dos dados aplicados ao sistema, como inserção, exclusão e atualização, foram depositados na pasta “backend”. Sua funcionalidade consiste na captura de dados para execução automática de comandos SQL.

Conclusão

Através do desenvolvimento deste projeto, os fundamentos da linguagem de programação PHP, voltados ao desenvolvimento web, foram abordados. 
A fim de se realizar uma comparação com outros trabalhos, em estado de arte, menciona-se o artigo de De Melo Luiz e Montanha (2019), que também consiste no desenvolvimento de um sistema de gerenciamento de pacientes. Este 
projeto foi desenvolvido com a linguagem de programação C#, a estrutura Asp.Net, o padrão arquitetural MVC e o  framework de desenvolvimento Serenity. O sistema apresenta maior complexidade e número de classes, além de ser otimizado e possuir boa usabilidade.
Por fim, com o objetivo de analisar comparações entre comentários de fóruns especializados, destaque outros modos de estabelecer-se uma hierarquia entre as classes. De acordo com os usuários do fórum Stack Overflow (2020), além do comando “require”, pode-se estabelecer conexão com “include” ou “set_include_path”, atentando-se aos caminhos relativos das classes em questão.

Referências

BENTO, Evaldo Junior. Desenvolvimento web com PHP e MySQL. Editora Casa do Código, 2021.
CLEMENTE, Matheus. O que é e por que usar o servidor Apache. Rockcontent. 2019. Disponível em <https://rockcontent.com/br/blog/apache/>. Acesso em 29 de agosto de 2024.
DE MELLO LUIZ, Fábio; MONTANHA, Gustavo Kimura. DESENVOLVIMENTO DE UM SISTEMA DE CONTROLE DE CADASTRO DE PACIENTES UTILIZANDO O FRAMEWORK SERENITY. In: VIII JORNACITEC-Jornada Científica e Tecnológica. 2019.
KOÇ, Hatice et al. UML diagrams in software engineering research: a systematic literature review. In: Proceedings. MDPI, 2021. p. 13.
LIMA, Fernando Gabriel Santos et al. Anamnese: uma reflexão da sua importância na relação médico-paciente dentro da formação médica. In: Anais Colóquio Estadual de Pesquisa Multidisciplinar (ISSN-2527-2500) & Congresso Nacional de Pesquisa Multidisciplinar. 2021.
PHP. Require. The PHP Documentation Group. 2024. Disponível em <https://www.php.net/manual/pt_BR/function.require.php>. Acesso em 29 de agosto de 2024.
PHP. $_GET. The PHP Documentation Group. 2024. Disponível em <https://www.php.net/manual/pt_BR/reserved.variables.get.php>. Acesso em 29 de agosto de 2024.
STACK OVERFLOW. PHP require file from top directory. 2020. Disponível em <https://stackoverflow.com/questions/7630002/php-require-file-from-top-directory>. Acesso em 29 de agosto de 2024.


