import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import layout from './Shared/Layout.vue'

createInertiaApp({
    title: title => `${title} - Agile Vue`,
    progress: {
        color: '#29d',
        // showSpinner: true,
    },
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        const page  = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})
