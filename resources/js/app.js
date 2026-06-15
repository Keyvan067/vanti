// ۱. ایمپورت کردن آلپاین جی اس
import Alpine from 'alpinejs';
// ۳. راه‌اندازی و در دسترس قرار دادن Alpine در سراسر پروژه
window.Alpine = Alpine;


// console.log('Vanti Core: Vite 8 + Tailwind v4 + Franken UI v2 + Alpine.js Loaded Successfully! 🚀');


// MEGA-MENU-(Categories Menus)...
Alpine.data('megaMenu', () => ({

    // open: false,
    title: 'دسته بندی کالاها',
    stack: [],
    currentItems: [],
    original: [],

    get isVisible() {
        const panel = document.getElementById('p_1');

        return panel && !panel.classList.contains('hidden');
    },

    init() {

        const data = window.VANTI?.categories;

        console.log('RAW DATA:', data);

        this.original = data || [];
        this.currentItems = data || [];

        console.log('INIT DONE:', this.currentItems);
    },

    select(item) {

        if (!item.children?.length) {
            window.location.href = item.url;
            return;
        }

        this.stack.push({
            title: this.title,
            items: this.currentItems
        });

        this.currentItems = item.children;
        this.title = item.name;
    },

    back() {

        const prev = this.stack.pop();
        if (!prev) return;

        this.currentItems = prev.items;
        this.title = prev.title;
    },

    goTo(index) {

        this.stack = this.stack.slice(0, index);

        const last = this.stack[this.stack.length - 1];

        if (!last) {
            this.currentItems = this.original;
            this.title = 'دسته بندی کالاها';
            return;
        }

        this.currentItems = last.items;
        this.title = last.title;
    }

}));


Alpine.start();