<ul class="nav nav-pills nav-fill bg-light m-3">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Doações</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Minhas Doações</a>
  </li>
</ul>


<div class="row" id="id_table_all_donations">
    <!-- <table class="table" id="id_table_all_donations"></table> -->
</div>

<div class="container" id="id_div_datatable_my_donations">
    <table class="table" id="id_table_my_donations"></table>
</div>

<button class="badge text-bg-primary p-2 px-3 fs-2 position-fixed bottom-0 end-0 m-5 "data-bs-toggle="modal" data-bs-target="#id_modal_doacao">
    Adicionar Doação
</button> 

<!-- <button class="badge text-bg-primary p-2 px-3 fs-2 position-fixed bottom-0 end-0 m-5 " onclick="fjs_see_all_donations();">
    teste
</button>  -->


<div class="modal fade modal-lg" id="id_modal_doacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Formulário de Doação</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container mt-4 p-4 border rounded bg-light" method="POST" action="<?php echo url_to('r_cad_doacao')?>" enctype="multipart/form-data" >

            <div class="mb-3">
                <label for="DOANOME" class="form-label">O que você vai doar?</label>
                <input type="text" class="form-control" id="id_doanome" name="txt_doanome" maxlength="20" placeholder="Digite o nome">
            </div>

            <div class="row">
                <div class=" col-9 mb-3">
            <label for="DOAQNT" class="form-label">Quantidade</label>
                    <input type="text" class="form-control" id="id_doaqtd" name="txt_doaqtd" maxlength="10" placeholder="Digite a quantidade">
                </div>
                <div class="col-3 mb-3">
                    <label for="DOAQNT" class="form-label">Tipo</label>
                    <select class="form-select" id="id_doa_tipo_quantidade" name="txt_doa_tipo_quantidade">
                        <option value="" selected>Selecione</option>
                        <option value="KG">kg</option>
                        <option value="UNIDADES">Unidades</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="DOAEND" class="form-label">Endereço para retirar doação</label>
                <input type="text" class="form-control" id="id_doaend" name="txt_doaend" maxlength="40" placeholder="Digite o endereço">
            </div>
            <div class="row">
                <div class="col-9 mb-3">
                    <label for="DOADTA" class="form-label">Data para retirar doação</label>
                    <input type="datetime-local" class="form-control" id="id_doadta" name="txt_doadta">
                </div>

                <div class="col-3 mb-3">
                    <label for="DOAFLEX" class="form-label">a data é Flexível?</label>
                    <select class="form-select" id="id_doaflex" name="txt_doaflex">
                    <option value="" selected>Selecione</option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-3">
                    <label for="DOAIMG" class="form-label">Se puder, compartilhe uma foto da doação</label>
                    <input type="file" class="form-control" id="id_doaimg" name="txt_doaimg" accept=".png .jpg .jpeg">
                </div>

                <div class="col-8 mb-3">
                    <label for="DOADESC" class="form-label">Descrição</label>
                    <textarea class="form-control" id="id_doadesc" name="txt_doadesc" rows="3" maxlength="50" placeholder="Digite a descrição"></textarea>
                </div>
            </div>
            <input type="number" class="form-control" id="id_usu_doa" name="txt_id_usu_doa" hidden>
            <input type="number" class="form-control" id="id_usu_trans" name="txt_id_usu_trans" hidden>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

function fjs_see_all_donations() {
    $.ajax({
        url: '<?php echo url_to('r_alldonations');?>', // URL do endpoint
        type: 'GET',
        success: function (data) {
            if (data && data.length > 0) {
                // Limpar a div antes de adicionar os novos cards
                $('#id_table_all_donations').html('');

                // Criar os cards com base nos dados retornados
                var cardsHtml = '';
                $.each(data, function(index, row) {
                    cardsHtml += `
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="card">
                                <img src="<?php echo base_url('assets/images/uploads/')?>${row.DOAIMG}") class="card-img-top" alt="${row.DOANOME}">
                                <div class="card-body">
                                    <h5 class="card-title">${row.DOANOME || 'Sem nome'}</h5>
                                    <p class="card-text">
                                        <span class="fw-bold">Quantidade:</span> ${row.DOAQNT || 'Não especificado'} <br>
                                        <span class="fw-bold">Endereço pra retirada:</span> ${row.DOAEND || 'Não informado'} <br>
                                        <span class="fw-bold">Data para retirada:</span> ${row.DOADTA || 'Não informada'} <br>
                                        <span class="fw-bold">Data pode ser outra?</span> ${row.DOAFLEX == 'S'?
                                            'Sim': 'Não'
                                        }<br>
                                       <span class="fw-bold"> Descrição:</span> ${row.DOADESC || 'Sem descrição'}
                                    </p>
                                    <a href="detalhes/${row.ID_DOACAO}" class="btn btn-primary">Detalhes</a>
                                </div>
                            </div>
                        </div>
                    `;
                });

                // Inserir os cards na div
                $('#id_table_all_donations').html(cardsHtml);
            }
        },
        error: function() {
            console.error("Erro ao carregar as doações.");
        }
    });
}



</script>


<script>  
    $(document).ready(function(){
        fjs_see_all_donations();
    })
</script>

