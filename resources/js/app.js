/*
require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
*/

import { createApp } from 'vue';
import App from "./components/App";

createApp(App).mount('#mytable')
