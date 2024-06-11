import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css'
// import '../css/app.css';
import '../sass/app.scss';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import Vuex from 'vuex';

const store = new Vuex.Store({
    state: {
        remarks: "",
        isToastFlug: false,
    },
    mutations: {
        async updateRemarks (state, shop) {
            state.remarks = shop.remarks // ➂stateの更新
            const res = await axios.post('/shop/update', shop)
            // console.log(res);
            this.toastFlug(res)
            // if (res.status === 200) {
            //     state.isToastFlug = true;
            //     setTimeout(() => {this.isToastFlug = false},1500)
            // }
        },
        toastFlug(res) {
            if (res.status === 200) {
                state.isToastFlug = true;
                setTimeout(() => {this.isToastFlug = false},1500)
            }
        },

    },
    actions: {
        
    },
    getters: {
        
    },

})

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(Vuex)
            .use(store)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

