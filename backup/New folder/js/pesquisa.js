$(document).ready(function() {
    var initialResults = $('#initialData').html();
    $('#searchInput').on('input', function() {
        const query = $(this).val();

        // Se o campo de pesquisa estiver vazio, mostra os dados iniciais e oculta os resultados da pesquisa
        if (query == '') {
            $('#initialData').show();
            $('#searchResults').children().not('#initialData').remove();
            $('#searchResults').children().append(initialResults);

            return; // Retorna para evitar que a solicitação AJAX seja feita
        }

        // Faz uma solicitação AJAX para buscar os resultados da pesquisa no servidor
        $.ajax({
            url: 'pesquisa1.php', // Caminho para o script PHP que busca os resultados da pesquisa
            method: 'POST',
            data: { query: query }, // Envia o termo de pesquisa para o servidor
            success: function(response) {
                $('#initialData').hide();
                $('#searchResults').children().not('#initialData').remove();
                $('#searchResults').append(response); // Atualiza os resultados da pesquisa com a resposta do servidor
            }
        });
    });
});