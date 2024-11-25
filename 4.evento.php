<?php
include '1.conexaoDB.php';

$sql = "SELECT nome, descricao, data, curso, horario, local, imagem FROM evento";
$result = $conn->query($sql);

?>

<!DOCTYPE hmtl>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">

    <link rel="stylesheet" href="CSS/Paginas_Eventos/css/Eventos.css">
    <script src="JavaScript/scripts.js"></script>
    <title>Eventos FT Unicamp</title>

    <link rel="stylesheet" type="text/css" href="CSS/0.mainNavigationBar/navbar.css">
    <link rel="stylesheet" type="text/css" href="CSS/1.mainHeader/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;display=swap">

</head>

<body>
    <!-- HTML navbar padrao de todas as paginas do site -->
    <nav id="mainNav"></nav>
    <!-- HTML navbar padrão de todas as páginas do site -->

    <main>
        <header id="mainHeader">
            <h2>Eventos</h2>
        </header>

        <nav id="mainNavEvents"></nav>

        <!-- Galeria de eventos -->
        <section class="gallery">

            <?php
            // Verificar se há eventos no banco de dados
            if ($result->num_rows > 0) {
                // Exibir cada evento
                while ($row = $result->fetch_assoc()) {
                    // Gerar HTML para cada evento
                    echo '<div class="evento ' . $row['curso'] . '">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="' . $row['nome'] . '">';
                    echo '<div class="infoEvento">';
                    echo '<p class="title">' . $row['nome'] . '</p>';
                    $dataEvento = strtotime($row['data']);
                    $dataFormatada = date('d \d\e F', $dataEvento); // Formatação para exibir apenas a data sem a hora
                    $horaEvento = date('H:i', strtotime($row['horario'])); // Apenas hora e minuto
                    echo '<p class="date-location">Data: ' . $dataFormatada . ' - ' . $horaEvento . ' Local: ' . $row['local'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>

<div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/Comissão_Ambiental.png" alt="Evento 1">
                    <p class="title">Casos de Uso e suas Multidisciplinas</p>
                    <p class="date-location">Data: 01 de Outubro - 09:00 Local: PA02</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoCI&T.png" alt="Evento 2">
                    <p class="title">Desvendando o Mundo da Inteligência Artificial de Dados</p>
                    <p class="date-location">Data: 01 de Outubro - 10:30 Local: PA01</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoCAART.png" alt="Evento 3">
                    <p class="title">Arteris Intervias: 23 Anos de Concessão de Rodovias</p>
                    <p class="date-location">Data: 01 de Outubro - 10:30 Local: PA04</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/Comissão_Ambiental.png" alt="Evento 4">
                    <p class="title">Introdução à Programação Utilizando Python</p>
                    <p class="date-location">Data: 01 de Outubro - 11:00 Local: PA02</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoCAART.png" alt="Evento 5">
                    <p class="title">Cenário Nacional do Transporte Dutoviário</p>
                    <p class="date-location">Data: 01 de Outubro - 13:00 Local: PA02</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoCDI.png" alt="Evento 6">
                    <p class="title">Âmbitos de Pesquisa dos Docentes de Computação da FT-UNICAMP</p>
                    <p class="date-location">Data: 01 de Outubro - 14:00 Local: PA02</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoViaOnda.png" alt="Evento 7">
                    <p class="title">A tecnologia RFID</p>
                    <p class="date-location">Data: 01 de Outubro - 15:30 Local: PA01</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoACOEM.jpg" alt="Evento 8">
                    <p class="title">Monitoramento de Material Particulado - Métodos de Referência e Novas Tecnologias</p>
                    <p class="date-location">Data: 01 de Outubro - 16:30 Local: PA04</p>
                </div>
               
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoCAART.png" alt="Evento 9">
                    <p class="title">BIM + IA + Mercado: O Hoje e o Futuro</p>
                    <p class="date-location">Data: 01 de Outubro - 20:00 Local: PA05</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoMotorola.png" alt="Evento 12">
                    <p class="title">Como a Motorola Solutions Ajuda a Manter as Cidades mais Seguras?</p>
                    <p class="date-location">Data: 02 de Outubro - 09:00 Local: PA03</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoSnowFlake.png" alt="Evento 10">
                    <p class="title">Data Cloud: Zero to Snowflake</p>
                    <p class="date-location">Data: 02 de Outubro - 10:00 Local: PA03</p>
                </div> 
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoMigratio.png" alt="Evento 15">
                    <p class="title">Inovações do Mercado de Energia</p>
                    <p class="date-location">Data: 02 de Outubro - 11:45 Local: PA05</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoHidrovias.png" alt="Evento 14">
                    <p class="title">Transporte Hidroviário: Um Panorama sobre Logísitca Multimodal, Tecnologias e Desafios para o Futuro</p>
                    <p class="date-location">Data: 02 de Outubro - 19:30 Local: PA03</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoPADTEC.png" alt="Evento 13">
                    <p class="title">Arquitetura para Gerenciamento de Equipamentos de Redes</p>
                    <p class="date-location">Data: 03 de Outubro - 16:30 Local: PA03</p>
                </div>
                <div class="evento">
                    <img src="CSS/Paginas_Eventos/IMGs/LogoBinance.png" alt="Evento 11">
                    <p class="title">Blockchain & DeFi</p>
                    <p class="date-location">Data: 03 de Outubro - 18:00 Local: PA07</p>
                </div>  
        </section>
    </main>


</body>