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
    <div class="wrapper">
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
        <div class="wrapper">
            <h1 class="titulo">Seja bem vindo, <?php echo $dadosUsuario['nomeUsuario']; ?></h1><br>
            <?php
require_once("../Classes/Evento.php");
$evento = new Evento();
$listaevento = $evento->listarTudo();
?>
            <div class="tudo">
                <div class="all">
                    <?php foreach ($listaevento as $evento) { ?>
                    <div class="container">
                        <div class="card" style="width: 18rem;">
                            <form method="POST" action="detalhes-evento.php">
                                <input type="hidden" name="idEvento" value="<?php echo $evento['idEvento']; ?>">
                                <button type="submit" class="btn-img">
                                    <img src="<?php echo $evento['fotoEvento'] ?>" class="card" alt="...">
                                </button>
                            </form>
                            <div class="cardB">
                                <p class="data"><?php echo $evento['dataEvento'] ?></p>
                                <h5 class="title"><?php echo $evento['descEvento'] ?></h5>
                                <p class="card-text"><?php echo $evento['localEvento'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php require_once "footer-restrito.php"?>
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
    </div>
    <script>
    // Função para alternar a visibilidade da senha
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var toggleIcon = document.getElementById("toggle-icon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.add("active");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("active");
        }
    }

    // Evento de clique no ícone de toggle
    var toggleIcon = document.getElementById("toggle-icon");
    toggleIcon.addEventListener("click", togglePasswordVisibility);
    </script>
</body>

</html>
</body>

</html>