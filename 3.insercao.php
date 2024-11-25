<?php

include '1.conexaoDB.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recuperando os dados enviados
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $dataEvento = $_POST['data-evento'];
    $curso = $_POST['curso'];
    $horaEvento = $_POST['hora-evento'];
    $localEvento = $_POST['local-evento'];
    $imagemEvento = $_FILES['imagem-evento'];

    $imagemBinaria = file_get_contents($imagemEvento['tmp_name']);

    if ($curso === 'outro') {
        $curso = $_POST['curso-outro'];
    }

    if ($localEvento === 'outro') {
        $localEvento = $_POST['local-outro'];
    }

    $consulta_sql = "INSERT INTO evento (nome, descricao, data, curso, horario, local, imagem) 
                     VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($consulta_sql);

    if ($stmt) {
        $stmt->bind_param("sssssss", $nome, $descricao, $dataEvento, $curso, $horaEvento, $localEvento, $imagemBinaria);

        if ($stmt->execute()) {
            echo "<script>window.onload = function() {
                    alert('Evento inserido com sucesso!');
            }</script>";
        } else {
            echo "<script>window.onload = function() {
                    alert('Erro ao inserir evento.');
            }</script>";
        }
    } else {
        echo "<script>window.onload = function() {
            alert('Erro ao preparar a consulta SQL.');
        }</script>";
    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/Page_insercao/CSS/style.css">
    <title>uniEventos - Login</title>

    <link rel="stylesheet" type="text/css" href="CSS/0.mainNavigationBar/navbar.css">
    <link rel="stylesheet" type="text/css" href="CSS/1.mainHeader/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;display=swap">

</head>

<body>

    <!-- HTML Navbar Padrão de Todas Páginas do Site -->
    <nav id="mainNav"></nav>
    <!-- HTML Navbar Padrão de Todas Páginas do Site -->

    <main>
        <header id="mainHeader">
            <h2>Inserção de Evento</h2>
        </header>

        <form method="POST" action="3.insercao.php" enctype="multipart/form-data">
            <div class="grupo-formulario">
                <label for="nome">Nome do evento<span> *</span></label>
                <input type="text" id="nome" name="nome">
            </div>

            <div class="grupo-formulario">
                <label for="descricao">Descrição do evento</label>
                <textarea id="descricao" name="descricao"></textarea>
            </div>

            <div class="grupo-formulario-linha">
                <div class="grupo-formulario">
                    <label for="data-evento">Data do evento<span> *</span></label>
                    <input id="data-evento" name="data-evento" type="date" placeholder="Selecione a data do evento">
                </div>

                <div class="grupo-formulario">
                    <label for="curso">Curso do evento<span> *</span></label>
                    <select id="curso" name="curso">
                        <option value="" disabled selected>Selecione o curso</option>
                        <option value="ambiental">Ambiental</option>
                        <option value="tecnologia">Tecnologia da Informação</option>
                        <option value="telecomunicacoes">Telecomunicações</option>
                        <option value="transportes">Transportes</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>

                <div class="grupo-formulario">
                    <label for="curso-outro" id="label-curso-outro">Digite o curso<span> *</span></label>
                    <input type="text" id="curso-outro" name="curso-outro">
                </div>
            </div>

            <div class="grupo-formulario-linha">
                <div class="grupo-formulario">
                    <label for="hora-evento">Hora do evento<span> *</span></label>
                    <input id="hora-evento" name="hora-evento" type="time" placeholder="Selecione a hora do evento">
                </div>

                <div class="grupo-formulario">
                    <label for="local-evento">Local do evento<span> *</span></label>
                    <select id="local-evento" name="local-evento">
                        <option value="" disabled selected>Selecione o local</option>
                        <option value="LP01">LP01</option>
                        <option value="LP02">LP02</option>
                        <option value="LP03">LP03</option>
                        <option value="LP04">LP04</option>
                        <option value="PA01">PA01</option>
                        <option value="PA02">PA02</option>
                        <option value="PA03">PA03</option>
                        <option value="PA04">PA04</option>
                        <option value="PA05">PA05</option>
                        <option value="PA06">PA06</option>
                        <option value="PA07">PA07</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>

                <div class="grupo-formulario">
                    <label for="local-outro" id="label-local-outro">Digite o local<span> *</span></label>
                    <input type="text" id="local-outro" name="local-outro">
                </div>
            </div>

            <div class="grupo-formulario">
                <label for="imagem-evento">Anexe a imagem capa do evento<span> *</span></label>
                <input type="file" id="imagem-evento" name="imagem-evento" accept="image/jpeg, image/png">
                <div class="container-enviar-imagem">
                    <label for="imagem-evento" class="file-label">
                        <svg viewBox="0 0 640 512" height="1em">
                            <path
                                d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z">
                            </path>
                        </svg>
                        <p>Drag and Drop</p>
                        <p>or</p>
                        <span class="imagem-botao">Browse file</span>
                    </label>
                </div>
            </div>
            <div class="acoes-formulario">
                <button type="submit" onclick="validarFormulario(event)">Enviar</button>
            </div>
        </form>
    </main>

    <script src="JavaScript/scripts.js"></script>

</body>

</html>