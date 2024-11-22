
function fjs_logout() {
    
    $.ajax({
        url: baseURL + "C_Access/r_logout",
        type: "GET"
    })
    .done(function(response) {
        console.log('Logout concluído com sucesso');
        window.location.href = baseURL; // Redireciona após sucesso
    })
    .fail(function(xhr, status, error) {
        console.error('Erro ao tentar realizar o logout:', error);
    })
    .always(function() {
        console.log('Requisição AJAX concluída (sucesso ou erro)');
    });
}

