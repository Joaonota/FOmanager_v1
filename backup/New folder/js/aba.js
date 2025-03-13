
    var navBar = document.getElementById('navBar');
    var buttonGroup = document.getElementById('ButtonGroup1');

    // Inicia a barra na segunda aba
    var initialButton = document.getElementById('ButtonGroupItem2');
    var initialButtonRect = initialButton.getBoundingClientRect();
    var groupRect = buttonGroup.getBoundingClientRect();
    var initialOffsetX = initialButtonRect.left - groupRect.left;
    navBar.style.width = initialButton.offsetWidth + 'px';
    navBar.style.transform = 'translateX(' + initialOffsetX + 'px)';

    function changeTab(tabId, button) {
        // Oculta todas as abas
        var tabs = document.querySelectorAll('.tab-content');
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
        });

        // Mostra a aba clicada
        var tabToShow = document.getElementById(tabId);
        tabToShow.classList.add('active');

        // Move a barra para a posição do botão clicado
        var buttonRect = button.getBoundingClientRect();
        var offsetX = buttonRect.left - groupRect.left;
        navBar.style.width = button.offsetWidth + 'px';
        navBar.style.transform = 'translateX(' + offsetX + 'px)';
    }