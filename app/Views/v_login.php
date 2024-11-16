<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #ffab0a;
            height: 100vh;
            margin: 0;

        }
        .login-container {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        .login-header {
            font-weight: 600;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form-control {
            height: calc(2.75rem + 2px);
            border-radius: 0.375rem;
        }
        .btn-primary {
            width: 100%;
            border-radius: 0.375rem;
            padding: 0.75rem;
        }
        .footer-links {
            text-align: center;
            margin-top: 1.5rem;
        }
        .footer-links a {
            text-decoration: none;
            color: #6c757d;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="d-flex">
<div class="container-fluid d-flex justify-content-end align-items-center ">
    <div class="login-container bg-light p-3" id="id_tab_login" style="width:400px">
        <div class="login-header">
            <h3>Entrar</h3>
            <p>Faça login para acessar sua conta</p>
        </div>
        <form>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Digite seu email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Lembrar-me</label>
                </div>
                <a href="#" class="text-primary">Esqueceu a senha?</a>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
        <div class="footer-links mt-4">
            <p>Não tem uma conta? <a href="#"onclick="fjs_logoucad()">Cadastre-se</a></p>
        </div>
    </div>
    <div class="login-container d-none bg-light" id="id_tab_cadastro" style="width:600px;">
        <div class="login-header">
            <h4 class="mb-0 pt-2">Cadastro</h4>
            <p class="mb-0 text-muted">Crie sua conta</p>
        </div>
        <form class="p-3 bg-light" id="id_form_cad">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <label for="Nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control form-control-sm" id="id_cad_nome" name="txt_cad_nome" placeholder="Digite nome Completo" required>
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="Telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control form-control-sm" id="id_cad_tel" name="txt_cad_tel" placeholder="Digite seu Tel" required>
                </div>
                <div class="col-lg-10 col-md-12">
                    <label for="Endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control form-control-sm" id="id_cad_end" name="txt_cad_end" placeholder="Digite seu endereço" required>
                </div>
                <div class="col-lg-2 col-md-12">
                    <label for="Numero" class="form-label">Numero</label>
                    <input type="text" class="form-control form-control-sm" id="id_cad_nmr" name="txt_cad_nmr" placeholder="" required>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control form-control-sm" id="id_cad_email" name="txt_cad_email" placeholder="Digite seu email" required>
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control form-control-sm" id="id_cad_password" name="txt_cad_password" placeholder="Digite sua senha" required>
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="password" class="form-label">Confirme a Senha</label>
                    <input type="password" class="form-control form-control-sm" id="id_confirm_password" placeholder="Confirme senha" required>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Lembrar-me</label>
                </div>
            </div>
            <button type="button" class="btn btn-primary" onclick="fjs_cadastro();">Cadastrar</button>
        </form>
        <div class="footer-links mt-4">
            <p>Já tem uma conta? <a href="#" onclick="fjs_logoucad('log')">entre</a></p>
        </div>
    </div>
</div>

<!-- Bootstrap 5.3 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
     function fjs_logoucad($logoucad)
    {
        if($logoucad =='log')
        {
            $('#id_tab_cadastro').addClass('d-none');
            $('#id_tab_login').removeClass('d-none');
        }
        else
        {
            $('#id_tab_cadastro').removeClass('d-none');
            $('#id_tab_login').addClass('d-none');
        }
    }

    function fjs_cadastro()
    {
        console.log($('#id_tab_cadastro').serialize());
        // $.ajax
        // ({
        //     url:'/r_cadastro',
        //     type:'POST',
        //     data:$('#id_tab_cadastro').serialize()
        // })
    }
</script>
</body>
</html>
