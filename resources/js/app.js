import './bootstrap';
import '../css/app.css';
import "../css/all.css";
import "../css/all.min.css";


import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import '@shoelace-style/shoelace/dist/themes/light.css';
import { setBasePath } from '@shoelace-style/shoelace/dist/utilities/base-path';
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import {createPinia} from 'pinia'
import * as directives from 'vuetify/directives'


import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

setBasePath('https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.3.0/dist/');

const vuetify = createVuetify({
    components,
    directives,
})

const pinia = createPinia()

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faUserSecret)



const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Agile Vue';

const logo = '/storage/Home/Logo.png';



createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>{

    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    const page  = pages[`./Pages/${name}.vue`]
    if(page.default.layout === undefined){
        page.default.layout = page.default.layout || null
    }
    return page

    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(vuetify)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(pinia)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
    progress: {
        color: '#5299fd',
    },
});
