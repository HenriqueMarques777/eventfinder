<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title>PÁGINA INICIAL</title>
</head>

<body>
    <header>
    <nav>

<a class="logo" href="index-restrito-organizador.php"><img src="images/logo/logo.png" class="logo-img"></a>
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
    <?php
$diaSemana = [
    'Sun' => 'DOM',
    'Mon' => 'SEG',
    'Tue' => 'TER',
    'Wed' => 'QUA',
    'Thu' => 'QUI',
    'Fri' => 'SEX',
    'Sat' => 'SAB'
];

$meses = [
    'Jan' => 'JAN',
    'Feb' => 'FEV',
    'Mar' => 'MAR',
    'Apr' => 'ABR',
    'May' => 'MAI',
    'Jun' => 'JUN',
    'Jul' => 'JUL',
    'Aug' => 'AGO',
    'Sep' => 'SET',
    'Oct' => 'OUT',
    'Nov' => 'NOV',
    'Dec' => 'DEZ'
];

function formatarDataHora($data, $hora, $diaSemana, $meses) {
    $dataFormatada = $diaSemana[date('D', strtotime($data))];
    $dataFormatada .= date(', d', strtotime($data));
    $dataFormatada .= $meses[date('M', strtotime($data))];
    $horaFormatada = date(' . H:i', strtotime($hora));
    return mb_strtoupper($dataFormatada, 'UTF-8') . $horaFormatada;
}
?>
    <div class="wrapper">

        <?php
require_once("../Classes/Evento.php");
if (isset($_POST['pesquisa'])) {
    $termoPesquisa = $_POST['pesquisa'];
    $evento = new Evento();
    $resultados = $evento->pesquisarEventos($termoPesquisa);
?>

        <div class="tudoP">
            <div class="all">
                <?php foreach ($resultados as $resultado) { ?>
                <div class="container">
                    <div class="container">
                        <div class="card" style="width: 18rem;">
                            <button type="submit" class="btn-img">
                            <a href="formCadastrarEventoOrganizador.php"><img src="<?php echo $resultado['fotoEvento'] ?>" class="cardG" alt="..."></a>
                            </button>
                            <p class="data"><?php echo formatarDataHora($resultado['dataEvento'], $resultado['horaEvento'], $diaSemana, $meses) ?></p>
                            <h5 class="title"><?php echo $resultado['descEvento'] ?></h5>
                            <p class="card-text"><?php echo $resultado['localEvento'] ?></p>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <?php } ?>
    <?php } ?>
    <?php require_once("footer-restrito.php")?>
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