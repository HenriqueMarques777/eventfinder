<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="area-restrita/css/Style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">


    <title>PÁGINA INICIAL</title>
</head>

<body>
    <header>
        <nav>
            <a class="logo" href="index.php"><img src="area-restrita/images/logo/logo.png" class="logo-img"></a>
            <form class="form-inline my-2 my-lg-0" method="POST" action="resultados-pesquisa.php">
                <input class="caixa" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
                <button class="btn" type="submit">Search</button>
            </form>
            <ul class="nav">
                <a class="at" href="escolhaCadastro.php">Cadastre-se</a>
                <a class="at" href="formLogin.php">Login</a>
            </ul>
        </nav>
    </header>
    <?php
$diaSemana = [
    'Sun' => ' DOM',
    'Mon' => ' SEG',
    'Tue' => ' TER',
    'Wed' => ' QUA',
    'Thu' => ' QUI',
    'Fri' => ' SEX',
    'Sat' => ' SAB'
];

$meses = [
    'Jan' => ' JAN',
    'Feb' => ' FEV',
    'Mar' => ' MAR',
    'Apr' => ' ABR',
    'May' => ' MAI',
    'Jun' => ' JUN',
    'Jul' => ' JUL',
    'Aug' => ' AGO',
    'Sep' => ' SET',
    'Oct' => ' OUT',
    'Nov' => ' NOV',
    'Dec' => ' DEZ'
];

function formatarDataHora($data, $hora, $diaSemana, $meses) {
    $dataFormatada = $diaSemana[date('D', strtotime($data))];
    $dataFormatada .= date(', d', strtotime($data));
    $dataFormatada .= $meses[date('M', strtotime($data))];
    $horaFormatada = date(' . H:i', strtotime($hora));
    return mb_strtoupper($dataFormatada, 'UTF-8') . $horaFormatada;
}
?>
    <?php
require_once("Classes/Evento.php");
$evento = new Evento();
$listaevento = $evento->listarTudo();
?>
    <div class="slick-carousel">
        <?php foreach ($listaevento as $evento) { ?>
        <div class="carousel-item">
            <img src="area-restrita/<?php echo $evento['fotoEvento'] ?>" alt="Imagem do Evento">
            <div class="carousel-caption">
                <div class="cardB">
                <p class="data"><?php echo formatarDataHora($evento['dataEvento'], $evento['horaEvento'], $diaSemana, $meses) ?></p>
                    <h5 class="title"><?php echo $evento['descEvento'] ?></h5>
                    <p class="card-texta"><?php echo $evento['localEvento'] ?></p>
                    <form action="formLogin.php">
                    <button type="submit" class="btn3">Comprar</button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.slick-carousel').slick({
            arrows: true,
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    });
    </script>
    <div class="tudo">
        <div class="all">
            <?php foreach ($listaevento as $evento) { ?>
            <div class="container">
                <div class="card" style="width: 18rem;">
                    <a href="formLogin.php"><img src="area-restrita/<?php echo $evento['fotoEvento'] ?>" class="card"
                            alt="..."></a>
                    <div class="cardB">
                    <p class="data"><?php echo formatarDataHora($evento['dataEvento'], $evento['horaEvento'], $diaSemana, $meses) ?></p>
                        <h5 class="title"><?php echo $evento['descEvento'] ?></h5>
                        <p class="card-text"><?php echo $evento['localEvento'] ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php require_once("footer.php")?>
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