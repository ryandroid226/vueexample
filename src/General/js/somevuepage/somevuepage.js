import Vue from 'vue';

import SomeVuePage from './components/SomeVuePage.vue';

new Vue({
    el: '#vueexample',
    render: h => h(SomeVuePage),
})