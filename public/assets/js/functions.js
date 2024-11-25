
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

// function fjs_see_all_donations() {
//     $.ajax({
//         url: baseURL + "r_alldonations", // URL do endpoint
//         type: 'GET',
//         success: function (data) {
//             if (data && data.length > 0) {
//                 // Limpar a div antes de adicionar os novos cards
//                 $('#id_table_all_donations').html('');

//                 // Criar os cards com base nos dados retornados
//                 var cardsHtml = '';
//                 $.each(data, function(index, row) {
//                     cardsHtml += `
//                         <div class="col-md-4 col-sm-6 mb-4">
//                             <div class="card">
//                                 <img src="path/to/images/${row.DOAIMG}" class="card-img-top" alt="${row.DOANOME}">
//                                 <div class="card-body">
//                                     <h5 class="card-title">${row.DOANOME || 'Sem nome'}</h5>
//                                     <p class="card-text">
//                                         Quantidade: ${row.DOAQNT || 'Não especificado'} <br>
//                                         Endereço: ${row.DOAEND || 'Não informado'} <br>
//                                         Data: ${row.DOADTA || 'Não informada'} <br>
//                                         Descrição: ${row.DOADESC || 'Sem descrição'}
//                                     </p>
//                                     <a href="detalhes/${row.ID_DOACAO}" class="btn btn-primary">Detalhes</a>
//                                 </div>
//                             </div>
//                         </div>
//                     `;
//                 });

//                 // Inserir os cards na div
//                 $('#id_table_all_donations').html(cardsHtml);
//             }
//         },
//         error: function() {
//             console.error("Erro ao carregar as doações.");
//         }
//     });
// }


