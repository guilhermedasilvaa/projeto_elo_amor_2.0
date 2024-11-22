<ul class="nav nav-pills nav-fill bg-light m-3">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Doações</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Minhas Doações</a>
  </li>
</ul>


<div class="container" id="id_div_table_all_donations">
    <table class="table" id="id_table_all_donations"></table>
</div>

<div class="container" id="id_div_datatable_my_donations">
    <table class="table" id="id_table_my_donations"></table>
</div>

<script>

    function fjs_see_all_donations()
    {
        dt_all_donation = $("#id_div_table_all_donations").datatable({
            'processing':'true',
            'serverSide': 'true',
            "ajax": {
                "url": "r_alldonations", // URL do endpoint
                "type": "GET",
                //"dataSrc": function (json) {
                    //return json.data; // Manipulando os dados recebidos
                //}
            },
            

        });

    }




</script>