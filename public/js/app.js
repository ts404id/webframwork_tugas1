// Laravel renders the data and handles routing. The page also works without JavaScript.
// Focus internal link targets for keyboard accessibility.
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', () => {
        const target = document.getElementById(link.hash.slice(1));
        if (target) {
            target.setAttribute('tabindex', '-1');
            target.focus({ preventScroll: true });
        }
    });
});
