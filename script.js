document.querySelector('form').addEventListener('submit', function (e) {
const projetos = [
    {
        id: 1,
        nome: "Sistema de Avaliação de Projetos",
        descricao: "Um sistema para avaliação de projetos em festivais.",
        status: "Aprovado"
    },
    {
        id: 2,
        nome: "Aplicativo de Exposições Artísticas",
        descricao: "Uma plataforma para exposições artísticas virtuais.",
        status: "Rejeitado"
    },
    {
        id: 3,
        nome: "Plataforma de Gerenciamento de Festivais",
        descricao: "Um sistema completo para gestão de festivais de projetos.",
        status: "Pendente"
    }
];

function renderGerenciamentoProjetos() {
    const projectList = document.getElementById('project-list');
    projectList.innerHTML = ''; 
    projetos.forEach(projeto => {
        const projectElement = document.createElement('div');
        projectElement.classList.add('project');
        
        projectElement.innerHTML = `
            <p><strong>Nome:</strong> ${projeto.nome}</p>
            <p><strong>Descrição:</strong> ${projeto.descricao}</p>
            <p><strong>Status:</strong> ${projeto.status}</p>
            <div class="actions">
                <button onclick="editarProjeto(${projeto.id})">Editar</button>
                <button class="reject" onclick="excluirProjeto(${projeto.id})">Excluir</button>
            </div>
        `;
        projectList.appendChild(projectElement);
    });
}

function editarProjeto(id) {
    const projeto = projetos.find(proj => proj.id === id);
    if (projeto) {
        const novoNome = prompt("Edite o nome do projeto:", projeto.nome);
        const novaDescricao = prompt("Edite a descrição do projeto:", projeto.descricao);
        if (novoNome && novaDescricao) {
            projeto.nome = novoNome;
            projeto.descricao = novaDescricao;
            alert(`Projeto "${projeto.nome}" editado com sucesso!`);
            renderGerenciamentoProjetos();
        }
    }
}

function excluirProjeto(id) {
    const index = projetos.findIndex(proj => proj.id === id);
    if (index !== -1) {
        const confirmacao = confirm(`Tem certeza que deseja excluir o projeto "${projetos[index].nome}"?`);
        if (confirmacao) {
            projetos.splice(index, 1);
            alert("Projeto excluído com sucesso!");
            renderGerenciamentoProjetos();
        }
    }
}

renderGerenciamentoProjetos();



    const novaSenha = document.getElementById('nova_senha').value;
    const confirmarSenha = document.getElementById('confirmar_senha').value;

    if (novaSenha !== confirmarSenha) {
        e.preventDefault();
        alert('As senhas não coincidem. Por favor, tente novamente.');
    }
});
const notifications = [
    {
        id: 1,
        message: "Seu projeto foi aprovado.",
        time: "2024-06-27 12:30",
        read: false
    },
    {
        id: 2,
        message: "Nova atualização disponível no sistema.",
        time: "2024-06-26 09:15",
        read: false
    },
    {
        id: 3,
        message: "Você recebeu um comentário no seu projeto.",
        time: "2024-06-25 16:45",
        read: true
    }
];
const projetos = [
    {
        id: 1,
        nome: "Sistema de Avaliação de Projetos",
        descricao: "Um sistema para avaliação de projetos em festivais.",
        status: "Pendente"
    },
    {
        id: 2,
        nome: "Aplicativo de Exposições Artísticas",
        descricao: "Uma plataforma para exposições artísticas virtuais.",
        status: "Pendente"
    }
];

function renderProjetos() {
    const projectList = document.getElementById('project-list');
    projectList.innerHTML = ''; 
    projetos.forEach(projeto => {
        const projectElement = document.createElement('div');
        projectElement.classList.add('project');
        
        projectElement.innerHTML = `
            <p><strong>Nome:</strong> ${projeto.nome}</p>
            <p><strong>Descrição:</strong> ${projeto.descricao}</p>
            <p><strong>Status:</strong> ${projeto.status}</p>
            <div class="actions">
                <button onclick="aprovarProjeto(${projeto.id})">Aprovar</button>
                <button class="reject" onclick="rejeitarProjeto(${projeto.id})">Rejeitar</button>
            </div>
        `;
        projectList.appendChild(projectElement);
    });
}

function aprovarProjeto(id) {
    const projeto = projetos.find(proj => proj.id === id);
    if (projeto) {
        projeto.status = "Aprovado";
        alert(`Projeto "${projeto.nome}" aprovado!`);
        renderProjetos();
    }
}

function rejeitarProjeto(id) {
    const projeto = projetos.find(proj => proj.id === id);
    if (projeto) {
        projeto.status = "Rejeitado";
        alert(`Projeto "${projeto.nome}" rejeitado!`);
        renderProjetos();
    }
}

renderProjetos();


function renderNotifications() {
    const notificationList = document.getElementById('notification-list');
    notificationList.innerHTML = '';
    notifications.forEach(notification => {
        const notificationElement = document.createElement('div');
        notificationElement.classList.add('notification');
        if (!notification.read) {
            notificationElement.classList.add('unread');
        }

        notificationElement.innerHTML = `
            <p>${notification.message}</p>
            <span class="time">${notification.time}</span>
        `;
        notificationList.appendChild(notificationElement);
    });
}

document.getElementById('markAllRead').addEventListener('click', function() {
    notifications.forEach(notification => notification.read = true);
    renderNotifications();
});

renderNotifications();


const festivalForm = document.getElementById('festivalForm');
const mensagemSucesso = document.getElementById('mensagemSucesso');

festivalForm.addEventListener('submit', function(event) {
    event.preventDefault(); 

  
    const nome = document.getElementById('nomeFestival').value;
    const dataInicio = document.getElementById('dataInicio').value;
    const dataFim = document.getElementById('dataFim').value;
    const local = document.getElementById('localFestival').value;
    const descricao = document.getElementById('descricaoFestival').value;

    console.log('Festival criado com os seguintes dados:');
    console.log(`Nome: ${nome}`);
    console.log(`Data de Início: ${dataInicio}`);
    console.log(`Data de Fim: ${dataFim}`);
    console.log(`Local: ${local}`);
    console.log(`Descrição: ${descricao}`);


    mensagemSucesso.classList.remove('hidden');

    setTimeout(() => {
        mensagemSucesso.classList.add('hidden');
    }, 3000);

    festivalForm.reset();

});
