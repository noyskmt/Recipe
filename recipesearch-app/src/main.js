import { createApp } from 'vue'
import App from './App.vue'

// Vue Datepickerに関するimport
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';

const app = createApp(App);
// Vue Datepickerのコンポーネントを登録
app.component('VueDatePicker', VueDatePicker);

createApp(App).mount('#app')
