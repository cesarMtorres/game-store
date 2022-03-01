const Home = () => import('./components/Home.vue');
const Contact = ()=> import('./components/Contact.vue');


// components blog
const Show = ()=> import('./components/game/Show.vue');
const Create = ()=> import('./components/game/Create.vue');
const Edit = ()=> import('./components/game/Edit.vue');


export const routes = [
    {
        name:'home',
        path: '/',
        component:Home
    },
    {
        name:'contact',
        path: '/contact',
        component:Contact
    },
    {
        name:'showGame',
        path: '/games',
        component:Show
    },

    {
        name:'createGame',
        path: '/create',
        component:Create
    },

    {
        name:'editGame',
        path: '/edit/:id',
        component:Edit
    },

];




