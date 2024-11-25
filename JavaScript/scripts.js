document.addEventListener('DOMContentLoaded', function () {
    initializeMainNav();
    if (window.location.pathname.endsWith("4.evento.php")) {
        initializeEventNav();
    }
});

// Função para inicializar a barra de navegação principal
function initializeMainNav() {
    const nav = document.getElementById('mainNav');

    const logoDiv = createLogoDiv("CSS/0.mainNavigationBar/Logo_FT.png", "Logo_FT");
    const linksDiv = createLinksDiv([
        { href: "Index.html", text: "Página Inicial" },
        { href: "4.evento.php", text: "Eventos" },
        { href: "Parcerias.html", text: "Parcerias" },
        { href: "Contatos.html", text: "Contatos" },
        { href: "2.login.php", text: "Login Admin" }
    ]);

    nav.appendChild(logoDiv);
    nav.appendChild(linksDiv);
}

// Função para criar o div do logo
function createLogoDiv(src, alt) {
    const logoDiv = document.createElement("div");
    logoDiv.classList.add("logoNavbar");

    const logoImg = document.createElement("img");
    logoImg.src = src;
    logoImg.alt = alt;

    logoDiv.appendChild(logoImg);
    return logoDiv;
}

// Função para criar o div de links de navegação
function createLinksDiv(links) {
    const linksDiv = document.createElement("div");
    linksDiv.classList.add("hiperlinksNavbar");

    const ul = document.createElement("ul");
    links.forEach(link => {
        const li = document.createElement("li");
        const a = document.createElement("a");
        a.href = link.href;
        a.textContent = link.text;
        li.appendChild(a);
        ul.appendChild(li);
    });

    linksDiv.appendChild(ul);
    return linksDiv;
}

// Função para inicializar a navegação de eventos
function initializeEventNav() {
    const nav = document.getElementById('mainNavEvents');
    const ul = document.createElement("ul");

    const categories = [
        { text: "Todos", className: "all" },
        { text: "Tecnologia", className: "tecnologia" },
        { text: "Ambiental", className: "ambiental" },
        { text: "Telecomunicações", className: "telecomunicacoes" },
        { text: "Transportes", className: "transportes" }
    ];

    categories.forEach(category => {
        const li = document.createElement("li");
        const a = document.createElement("a");
        a.href = "#";
        a.textContent = category.text;
        a.addEventListener("click", function () {
            filterEvents(category.className);
            setActiveLink(a);
        });
        li.appendChild(a);
        ul.appendChild(li);
    });

    nav.appendChild(ul);

    setActiveLink(ul.querySelector('a'));
}

// Função para filtrar eventos com base na categoria
function filterEvents(category) {
    const events = document.querySelectorAll('.evento');
    events.forEach(event => {
        event.style.display = (category === 'all' || event.classList.contains(category)) ? 'block' : 'none';
    });
}

// Função para definir o link ativo
function setActiveLink(activeLink) {
    const links = activeLink.closest('ul').querySelectorAll('a');
    links.forEach(link => {
        link.style.color = "";
        link.style.fontWeight = "";
        link.style.background = "";
    });

    activeLink.style.background = "linear-gradient(to bottom left, #0f0f11, #18182b)";
    activeLink.style.color = "white";
    activeLink.style.fontWeight = "bold";
}

// Função para configurar a visibilidade da senha
function setupPasswordToggle() {
    document.getElementById('eyeIcon').onclick = togglePasswordVisibility;
}

function togglePasswordVisibility() {
    const passwordInput = document.getElementById('senha');
    const eyeIcon = document.getElementById('eyeIcon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.src = 'CSS/Page_Login/IMGs/eye_closed.png'; 
    } else {
        passwordInput.type = 'password';
        eyeIcon.src = 'CSS/Page_Login/IMGs/eye_open.png'; 
    }
}

// Função para mostar ou não input "outro"
document.getElementById("curso").addEventListener("change", function () {
    var cursoSelecionado = document.getElementById("curso").value;
    var campoOutro = document.getElementById("curso-outro");
    var labelOutro = document.getElementById("label-curso-outro");

    if (cursoSelecionado === "outro") {
        campoOutro.style.display = "block";
        labelOutro.style.display = "block";
    } else {
        campoOutro.style.display = "none";
        labelOutro.style.display = "none";
    }
});

// Função para mostar ou não input "outro"
document.getElementById("local-evento").addEventListener("change", function () {
    var localSelecionado = document.getElementById("local-evento").value;
    var campoOutro = document.getElementById("local-outro");
    var labelOutro = document.getElementById("label-local-outro");

    if (localSelecionado === "outro") {
        campoOutro.style.display = "block";
        labelOutro.style.display = "block";
    } else {
        campoOutro.style.display = "none";
        labelOutro.style.display = "none";
    }
});

// Função para verificar campos faltantes na página inserção
function validarFormulario(event) {
    event.preventDefault();

    const camposObrigatorios = [
        document.getElementById('nome'),
        document.getElementById('data-evento'),
        document.getElementById('curso'),
        document.getElementById('hora-evento'),
        document.getElementById('local-evento'),
        document.getElementById('imagem-evento')
    ];

    let camposFaltando = false;

    camposObrigatorios.forEach(campo => {
        if (!campo.value) {
            camposFaltando = true;
        }
    });

    const cursoSelecionado = document.getElementById('curso').value;
    const cursoOutro = document.getElementById('curso-outro').value;
    if (cursoSelecionado === 'outro' && !cursoOutro) {
        camposFaltando = true;
    }

    const localSelecionado = document.getElementById('local-evento').value;
    const localOutro = document.getElementById('local-outro').value;
    if (localSelecionado === 'outro' && !localOutro) {
        camposFaltando = true;
    }

    const imagemEvento = document.getElementById('imagem-evento');
    if (imagemEvento.files[0] && imagemEvento.files[0].size > 1048576) { 
        alert('O tamanho do arquivo excede 1 MB. Por favor, envie uma imagem menor.');
        return;
    }

    if (camposFaltando) {
        alert("Faltam campos obrigatórios. Por favor, preencha todos os campos marcados com *.");
    } else {
        document.querySelector('form').submit();
    }
}
