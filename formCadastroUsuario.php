<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="area-restrita/css/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title>PÁGINA INICIAL</title>

    <script src="area-restrita/js/validar-forms-usuario.js"></script>
</head>

<body>
    <div class="wrapperLL">

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

        <div class="login-boxFC">
            <form method="POST" action="./area-restrita/cadastroUsuario.php"
                onsubmit="return validarFormulario()">
                <table width="600px" border="0" align="center">
                    <h2>Cadastro de Usuário</h2>
                    <label for="nomeUsuario">Nome:</label>
                    <input class="caixa" type="text" id="nomeUsuario" name="nomeUsuario" placeholder="Digite seu nome"
                        required><br><br>

                    <label for="cpfUsuario">CPF:</label>
                    <input class="caixa" type="text" id="cpfUsuario" name="cpfUsuario" placeholder="Digite seu CPF"
                        required><br><br>
                    <span id="cpfError" class="error-message" style="display: none;">CPF inválido</span>

                    <label for="dataNasc">Data de Nascimento:</label>
                    <input class="caixa" type="date" id="dataNasc" name="dataNasc" placeholder="YYYY-MM-DD" required><br>
                    <span id="dataNascError" class="error-message" style="display: none;">Data de nascimento
                        inválida</span><br>

                    <label for="sexo">Sexo:</label>
                    <select class="caixa" id="sexo" name="sexoUsuario" required>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select><br><br>

                    <label for="celUsuario">Celular:</label>
                    <input class="caixa" type="tel" id="celUsuario" name="celUsuario" placeholder="(99) 99999-9999"
                        required><br><br>
                    <span id="celError" class="error-message" style="display: none;">Número de celular inválido</span>

                    <label for="emailUsuario">Email:</label>
                    <input class="caixa" type="email" id="emailUsuario" name="emailUsuario"
                        placeholder="exemplo@dominio.com" required><br><br>
                    <span id="emailError" class="error-message" style="display: none;">Email inválido</span>

                    <label for="senhaUsuario">Senha:</label>
                    <input class="caixa" type="password" id="senhaUsuario" name="senhaUsuario"
                        placeholder="Digite sua senha" required><br><br>
                    <span id="senhaError" class="error-message" style="display: none;">A senha deve ter no mínimo 8
                        caracteres, uma letra maiúscula, uma letra minúscula, um número e um caractere
                        especial</span><br>
                    <input class="caixa" type="submit" value="Cadastrar">
                </table>
            </form>
        </div>
        </div>
    </div>
    <?php require_once "footer.php";?>
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