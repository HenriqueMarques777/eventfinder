<?php
// Inclui o arquivo de validação da sessão
require_once('../valida-session.php');
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

    <header>
        <nav>
            <a class="logo" href="index-restrito-usuario.php"><img src="images/logo/logo.png" class="logo-img"></a>
            <form class="form-inline my-2 my-lg-0" method="POST" action="resultados-pesquisa-restrito-usuario.php">
                <input class="caixa" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
                <button class="btn" type="submit">Search</button>
            </form>
            <ul class="nav">

                <a class="at" href="histórico-pedidos.php">Histórico</a>
                <a class="at" href="perfilUsuario.php">Perfil</a>
                <a class="at" href="../logout.php">Sair</a>
            </ul>

            </div>
        </nav>
    </header>
    <div class="wrapperLL">
        <?php
require_once('../Classes/Evento.php');

// Verifica se o formulário foi enviado
if (isset($_POST['idEvento'])) {
    $idEvento = $_POST['idEvento'];

    $evento = new Evento();
    $evento->setIdEvento($idEvento);
    $dadosEvento = $evento->buscarPorId();
}

?>
        <?php if (isset($dadosEvento)) { ?>
        <div class="CDE">
            <img class="imgA" src="<?php echo $dadosEvento['fotoEvento']?>">
            <img class="imgB" src="<?php echo $dadosEvento['fotoEvento']?>">
        </div>
        <div class="login-boxDE">
            <div class="user-boxDE">
                <p><strong>Descrição:</strong> <?php echo $dadosEvento['descEvento']; ?></p>
                <p><strong>Tipo:</strong> <?php echo $dadosEvento['tipoEvento']; ?></p>
                <p><strong>Idade mínima:</strong> <?php echo $dadosEvento['idadeMinima']; ?></p>
                <p><strong>Valor camarote:</strong> <?php echo $dadosEvento['precoCamarote']; ?></p>
                <p><strong>Valor pista:</strong> <?php echo $dadosEvento['precoPista']; ?></p>
                <p><strong>Local:</strong> <?php echo $dadosEvento['localEvento']; ?></p>
                <p><strong>Data:</strong> <?php echo $dadosEvento['dataEvento']; ?></p>
                <p><strong>Hora:</strong> <?php echo $dadosEvento['horaEvento']; ?></p>
                <p><strong>Horário de Abertura:</strong> <?php echo $dadosEvento['horaAberturaEvento']; ?></p>

                <form method="post" action="comprar-ingresso.php">
                    <input type="hidden" name="idEvento" value="<?php echo $dadosEvento['idEvento']; ?>">
                    <div class="form-group">
                        <label for="quantidade">Camarote:</label>
                        <input type="number" name="quantidade-camarote" id="quantidade" class="form-control" min="0"
                            value="0">

                    </div>
                    <div class="form-group">
                        <label for="quantidade">Pista:</label>
                        <input type="number" name="quantidade-pista" id="quantidade" class="form-control" min="0"
                            value="0">
                    </div>
                    <button type="submit" class="btn btn-primary">Comprar</button>
                </form>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <p>O evento não foi encontrado.</p>
    <?php } ?>

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