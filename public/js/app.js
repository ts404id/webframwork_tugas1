// Data dan routing dirender Laravel. Halaman tetap berfungsi tanpa JavaScript.
// Beri fokus pada tujuan tautan internal untuk akses keyboard.
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', () => {
        const target = document.getElementById(link.hash.slice(1));
        if (target) {
            target.setAttribute('tabindex', '-1');
            target.focus({ preventScroll: true });
        }
    });
});
