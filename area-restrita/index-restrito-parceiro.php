<?php
require_once('../valida-session.php');
require_once('../Classes/Parceiro.php');

// Cria uma instância da classe Organizador
$parceiro= new Parceiro();

// Recupera o ID do organizador da variável de sessão
$idParceiro = $_SESSION['idParceiro'];


// Busca os dados completos do organizador
$dadosParceiro= $parceiro->buscaParceiroPorId($idParceiro);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">


    <title>PÁGINA INICIAL PARCEIRO</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <nav>
                <a class="logo" href="index-restrito-parceiro.php"><img src="images/logo/logo.png" class="logo-img"></a>
                <form class="form-inline my-2 my-lg-0" method="POST" action="resultados-pesquisa-parceiro.php">
                    <input class="caixa" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
                    <button class="btn" type="submit">Search</button>
                </form>
                <ul class="nav">
                    <a class="at" href="../logout.php">Sair</a>
                </ul>

    </div>
    </nav>
    </header>



    <div class="box">
        <div class="ec">
            <h2>Olá, <?php echo $dadosParceiro['nomeParceiro']; ?></h2>
            <p><strong>CNPJ:</strong> <?php echo $dadosParceiro['cnpjParceiro']; ?></p>
            <p><strong>Celular::</strong> <?php echo $dadosParceiro['celParceiro']; ?></p>
            <p><strong>Email:</strong> <?php echo $dadosParceiro['emailParceiro']; ?></p>
            <p><strong>CEP:</strong> <?php echo $dadosParceiro['cep']; ?></p>
            <form method="GET" action="alterarParceiro.php">
                <input type="hidden" name="idParceiro" value="<?php echo $idParceiro; ?>">
                <button type="submit" class="btn2">Alterar Dados</button>
            </form>
        </div>
    </div>
    </div>
    </div>

    <?php require_once("./footer-restrito.php")?>
    <!--libras-->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <!--end libras-->
</body>

</html>