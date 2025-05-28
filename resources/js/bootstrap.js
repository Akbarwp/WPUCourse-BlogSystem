import axios from 'axios';
import 'remixicon/fonts/remixicon.css';
import $ from 'jquery';

window.axios = axios;
window.$ = window.jQuery = $;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
