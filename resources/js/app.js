require("./bootstrap");

import Vue from "vue";

import { InertiaApp } from "@inertiajs/inertia-vue";
import { InertiaForm } from "laravel-jetstream";
import PortalVue from "portal-vue";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faStream, faChartBar } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

library.add([faStream, faChartBar]);

Vue.component("font-awesome-icon", FontAwesomeIcon);

const app = document.getElementById("app");

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default
            }
        })
}).$mount(app);
