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
        test: [],
    },
    mutations: {
        testaa (state, payload) {
            state.test = payload // ➂stateの更新
        }
    },
    actions: {
        async testaa (context, payload) {
            await userUpdateApi(payload) // 非同期処理の実行
            .then(res => {
                context.commit('testaa', res.data) // ➁非同期処理のレスポンスをコミット
            })
            .catch(err => {
                errHandlerFunc(err)
            })
        }

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

