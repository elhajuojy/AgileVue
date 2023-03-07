import { createApp, h } from 'vue'
import { createInertiaApp,Head } from '@inertiajs/vue3'
import layout from './Shared/Layout.vue'
import TheNav from './Shared/TheNav.vue'

createInertiaApp({
    title: title => `${title} - Agile Vue`,
    progress: {
        color: '#29d',
        // showSpinner: true,
    },
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        const page  = pages[`./Pages/${name}.vue`]
        if(page.default.layout === undefined){
            page.default.layout = page.default.layout || layout
        }
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Head",Head)
            .component("TheNav",TheNav)
            .mount(el)
    },
})
