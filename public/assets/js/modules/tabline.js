/* 

const editorTabs = [
    {
        text: 'Noticias pendientes', 
        toggle: '', 
        target: '', 
        href: '#'
    },
    {
        text: 'Categorias', 
        toggle: '', 
        target: '', 
        href: '#'
    },
    {
        text: 'Pefil', 
        toggle: '', 
        target: '', 
        href: 'http://localhost/livetalkapp/user'
    },
    {
        text: 'Usuarios', 
        toggle: '', 
        target: '', 
        href: '#'
    },
    {
        text: 'Noticias', 
        toggle: '', 
        target: '', 
        href: '#'
    },
    {
        text: 'Noticias pendientes', 
        toggle: '', 
        target: '', 
        href: '#'
    }
]

const regTabs = [
    {
        text: 'Perfil', 
        toggle: '', 
        target: '', 
        href: 'http://localhost/livetalkapp/user'
    },
    {
        text: 'Noticias', 
        toggle: '', 
        target: '', 
        href: '#'
    },
    {
        text: 'Categorias', 
        toggle: '', 
        target: '', 
        href: '#'
    }
]

const userTabs = [
    {
        text: 'Categorias', 
        toggle: '', 
        target: '', 
        href: '#'
    },
    {
        text: 'Iniciar Session', 
        toggle: 'modal', 
        target: '#loginModal', 
        href: '#'
    },
    {
        text: 'Registrarse', 
        toggle: '', 
        target: '', 
        href: '#'
    },
    {
        text: 'Noticias', 
        toggle: '', 
        target: '', 
        href: '#'
    }
]

const type = document.querySelector('body').dataset.session;
console.log(type);

const itemComponent = ({text, toggle, target, href}) => {

    //Anchore module
    const item = document.createElement('a');
    item.href = href;
    item.dataset.toggle = toggle;
    item.dataset.target = target;

    item.textContent = text;

    //List item module
    const li = document.createElement('li');
    li.appendChild(item);
    console.log('test');
    return li;

}

const tabs = [];

switch (type) {
    case 'REGISTRADO':
        regTabs.forEach((tab) => {
            tabs.push(itemComponent(tab));
        })

        break;
    case 'EDITOR':
            editorTabs.forEach((tab) => {
                tabs.push(itemComponent(tab));
            })
        break;
    case 'USUARIO':
        userTabs.forEach((tab) => {
            tabs.push(itemComponent(tab));
        })
    default:
        break;
} */