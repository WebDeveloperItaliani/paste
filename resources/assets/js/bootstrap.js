import Axios from 'axios';
import Lodash from 'lodash';
import Moment from 'moment';
import Vue from 'vue';
import Vuex from 'vuex';

// Add the global application object
window.Wdi = {};
window.Wdi.csrfToken = document.head.querySelector('[name=csrf-token]').content;
window.Wdi.locale = document.head.querySelector('[name=locale]').content;
window.Wdi.localeExtended = document.head.querySelector('[name=locale-extended]').content;

window._ = Lodash;
window.Axios = Axios;
window.Moment = Moment;
window.Vue = Vue;

// Set up Axios
window.Axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Wdi.csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
};

// Set up moment
window.Moment.locale(window.Wdi.locale);

// Set up Vue
window.Vue.use(Vuex);
