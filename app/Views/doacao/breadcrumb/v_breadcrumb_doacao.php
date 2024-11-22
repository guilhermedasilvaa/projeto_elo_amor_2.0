<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <div class="row w-100 ml-5" >
            <img src="<?php echo base_url('assets/imagens/logopng.png')?>" alt="Logo" width="60" height="35" class=" col-4 d-inline-block align-text-top">
            <h2 class="col-8" style="color:#087095"> Projeto Ação Vida </h2>
       </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
        <div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <?php if(!session('isLoggedIn')):{?>
                <li class="nav-item">
                <a class="nav-link active fs-5" aria-current="page" href="#">Conheça-nos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link fs-5" href="#">Doar</a>
                </li>
                <li class="nav-item">
                <a class="nav-link fs-5" href="#">Entre ou Cadastre-se</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Doar!</a>
                </li> -->
            <?php }else:{?>
               
                <li class="nav-item">
                <a class="nav-link fs-5" href="#">Suas Ações Concluidas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link fs-5" href="#">Agradecimentos a Você</a>
                </li>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownProfileButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://via.placeholder.com/40" alt="Perfil" class="rounded-circle" width="40" height="40">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfileButton">
                        <li><a class="dropdown-item" href="/perfil">Meu Perfil</a></li>
                        <li><a class="dropdown-item" href="/configuracoes">Configurações</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="javascript:void(0);" onclick="fjs_logout();">Sair</a></li>
                    </ul>
                </div>
            <?php } endif;?>
        </ul>
    </div>
  </div>
</nav>
