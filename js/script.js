document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.querySelector('.menu-icon');
    const drawer = document.querySelector('.aside-navigation');
    const mainContent = document.querySelector('.main');

    // Abrir ou fechar o drawer quando clicar no ícone de menu
    menuIcon.addEventListener('click', function() {
        drawer.classList.toggle('open');
    });

    // Fechar o drawer quando clicar fora dele (no documento inteiro)
    document.addEventListener('click', function(event) {
        const isClickInsideDrawer = drawer.contains(event.target);
        const isClickOnMenuIcon = menuIcon.contains(event.target);
        if (!isClickInsideDrawer && !isClickOnMenuIcon) {
            drawer.classList.remove('open');
        }
    });

    // Impedir o fechamento do drawer ao clicar dentro dele
    drawer.addEventListener('click', function(event) {
        event.stopPropagation(); // Impede a propagação do evento de clique
    });
});
