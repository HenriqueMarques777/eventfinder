<?php
require_once('../valida-session.php');
require_once("../Classes/Ingresso.php");
require_once("../Classes/Evento.php");

// Obter o ID do usuário logado
$idUsuario = $_SESSION['idUsuario'];

// Criar uma instância da classe Ingresso
$ingresso = new Ingresso();

// Obter todos os ingressos do usuário
$ingressos = $ingresso->buscarIngressoPorIdUsuario($idUsuario);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title>Histórico de Ingressos</title>
    <!-- Seus estilos CSS e links para bibliotecas -->
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

                <a class="at" href="historico-pedidos.php">Histórico</a>
                <a class="at" href="perfilUsuario.php">Perfil</a>
                <a class="at" href="../logout.php">Sair</a>
            </ul>
        </nav>
    </header>

    <div class="wrapper">
        <div class="allHP">
            <h2>Histórico de Ingressos</h2>

            <?php if (empty($ingressos)) : ?>
            <p>Nenhum ingresso encontrado.</p>
            <?php else : ?>
            <tbody>
                <?php foreach ($ingressos as $ingresso) : ?>
                <?php
                    // Criar uma instância da classe Evento
                    $evento = new Evento();
                    $evento->setIdEvento($ingresso['idEvento']);
                    $dadosEvento = $evento->buscarPorId();
                    ?>
                <tr>
                    <div class="HP">
                        <div class="card">
                            <img src="<?php echo $dadosEvento['fotoEvento'] ?>" class="card">
                        </div>
                        <div class="cardHP">
                            <p class="title"><?php echo $dadosEvento['descEvento']; ?></p>
                            <p class="data">Data da Compra: <?php echo $ingresso['dataCompra']; ?></p>
                            <p class="data">Camarote: <?php echo $ingresso['quantidadeCamarote']; ?></p>
                            <p class="data">Pista: <?php echo $ingresso['quantidadePista']; ?></p>
                            <p class="data">Valor Total: <?php echo $ingresso['valorTotal']; ?></p>
                        </div>
                    </div>


                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
    </div>
    </div>

    <?php require_once "footer-restrito.php";?>
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