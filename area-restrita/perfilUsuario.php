<?php
// Inclui o arquivo de validação da sessão
require_once('../valida-session.php');

require_once('../Classes/Usuario.php');

// Cria uma instância da classe Organizador
$usuario= new Usuario();

// Recupera o ID do organizador da variável de sessão
$idUsuario = $_SESSION['idUsuario'];

// Busca os dados completos do organizador
$dadosUsuario= $usuario->buscarUsuarioPorId($idUsuario);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title>PÁGINA EVENTOS</title>
</head>
 
<body>
    <div class="wrapperC">
        <header>
            <nav>
                <a class="logo" href="index-restrito-usuario.php"><img src="images/logo/logo.png" class="logo-img"></a>
                <form class="form-inline my-2 my-lg-0" method="POST" action="resultados-pesquisa-restrito-usuario.php">
                    <input class="caixa" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
                    <button class="btn" type="submit">Search</button>
                </form>
                <ul class="nav">

                    <a class="at" href="historico-pedidos.php">Histórico</a>
                    <a class="at" href="perfilUsuario.php">Perfil</a>
                    <a class="at" href="../logout.php">Sair</a>
                </ul>
            </nav>
        </header>
        <div class="login-boxC">
        <div class="user-boxC">
                <h2>Olá, <?php echo $dadosUsuario['nomeUsuario']; ?></h2>
                <p><strong>CPF:</strong> <?php echo $dadosUsuario['cpfUsuario']; ?></p>
                <p><strong>Data de Nascimento:</strong> <?php echo $dadosUsuario['dataNasc']; ?></p>
                <p><strong>Sexo:</strong> <?php echo $dadosUsuario['sexoUsuario']; ?></p>
                <p><strong>Celular:</strong> <?php echo $dadosUsuario['celUsuario']; ?></p>
                <p><strong>E-mail:</strong> <?php echo $dadosUsuario['emailUsuario']; ?></p>
                <form method="GET" action="alterarUsuario.php">
                    <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                    <a class="tt" type="submit" href="alterarUsuario.php">Alterar Dados</a>
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