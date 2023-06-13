<?php
// Inclui o arquivo de validação da sessão
require_once('../valida-session.php');
require_once('../Classes/Organizador.php');

// Cria uma instância da classe Organizador
$organizador = new Organizador();

// Recupera o ID do organizador da variável de sessão
$idOrganizador = $_SESSION['idOrganizador'];

// Busca os dados completos do organi ador
$dadosOrganizador = $organizador->buscarOrganizadorPorId($idOrganizador);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title>PÁGINA INICIAL RESTRITA ORGANIZADOR</title>
</head>

<body>
    <div class="wrapperC"> 
        <header>
            <nav>
                <a class="logo" href="index-restrito-organizador.php"><img src="images/logo/logo.png"
                        class="logo-img"></a>
                <form class="form-inline my-2 my-lg-0" method="POST" action="resultados-pesquisa-organizador.php">
                    <input class="caixa" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
                    <button class="btn" type="submit">Search</button>
                </form>
                <ul class="nav">
                    <a class="at" href="formCadastrarEventoOrganizador.php">Eventos</a>
                    <a class="at" href="perfilOrganizador.php">Perfil</a>
                    <a class="at" href="../logout.php">Sair</a>
                </ul>
            </nav>
        </header>
        <div class="login-boxC">
            <div class="user-boxC">
                <h2>Olá, <?php echo $dadosOrganizador['nomeOrganizador']; ?></h2>
                <p><strong>Documento:</strong> <?php echo $dadosOrganizador['docOrganizador']; ?></p>
                <p><strong>Data de Nascimento:</strong> <?php echo $dadosOrganizador['dataNasc']; ?></p>
                <p><strong>Sexo:</strong> <?php echo $dadosOrganizador['sexoOrganizador']; ?></p>
                <p><strong>Celular:</strong> <?php echo $dadosOrganizador['celOrganizador']; ?></p>
                <p><strong>E-mail:</strong> <?php echo $dadosOrganizador['emailOrganizador']; ?></p>
                <form method="GET" action="alterarOrganizador.php">
                    <input type="hidden" name="idOrganizador" value="<?php echo $idOrganizador; ?>">
                    <a type="submit" class="tt" href="alterarOrganizador.php">Alterar Dados</a>
                </form>
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