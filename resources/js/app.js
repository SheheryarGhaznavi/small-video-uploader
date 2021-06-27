
require('./bootstrap');

window.Vue = require('vue');

require('./components/upload-video')

const app = new Vue({
    el: '#app',
});
