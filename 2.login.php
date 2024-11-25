<?php
include '1.conexaoDB.php';

if (!empty($_POST['senha'])) {
    $senha = $_POST['senha'];
} else {
    $senha = '';
}

$consulta_sql = "SELECT password FROM admin WHERE BINARY password = '$senha'";
$resultado_consulta = $conn->query($consulta_sql);

if ($resultado_consulta->num_rows > 0) {
    header('Location: 3.Insercao.php');
    exit;
} else if ($senha != '') {
    $_SESSION['alerta'] = 'Senha incorreta.';
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/Page_Login/CSS/style.css">
    <title>uniEventos - Login</title>

    <link rel="stylesheet" type="text/css" href="CSS/0.mainNavigationBar/navbar.css">
    <link rel="stylesheet" type="text/css" href="CSS/1.mainHeader/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;display=swap">

</head>

<body>

    <?php
    if (!empty($_SESSION['alerta'])) {
        echo "<script>
                window.onload = function() {
                    alert('" . $_SESSION['alerta'] . "');
                };
              </script>";
    }
    unset($_SESSION['alerta']);
    ?>

    <!-- HTML Navbar Padrão de Todas Páginas do Site -->
    <nav id="mainNav"></nav>
    <!-- HTML Navbar Padrão de Todas Páginas do Site -->

    <main>
        <header id="mainHeader">
            <h2>Login <br> Administrador</h2>
        </header>
        <div class="perfil"><img src="CSS/Page_Login/IMGs/icon_perfil.png" alt=""></div>
        <form action="2.login.php" method="POST">
            <div class="senha">
                <input type="password" id="senha" placeholder="Senha" name="senha">
                <img src="CSS/Page_Login/IMGs/eye_open.png" alt="Mostrar Senha" id="eyeIcon" class="eye-icon"
                    onclick="togglePasswordVisibility()">
            </div>
            <div class="button">
                <button type="submit" id="loginEnter">Entrar</button>
            </div>
        </form>
    </main>

    <script src="JavaScript/scripts.js"></script>

</body>

</html>