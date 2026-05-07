import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const html = document.documentElement;
const toggleBtn = document.getElementById('theme-toggle');

if (localStorage.getItem('theme') === 'dark') {
    html.classList.add('dark');
}

toggleBtn?.addEventListener('click', () => {
    html.classList.toggle('dark');

    localStorage.setItem(
        'theme',
        html.classList.contains('dark') ? 'dark' : 'light'
    );
});
