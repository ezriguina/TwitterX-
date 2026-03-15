<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom sticky-top px-3">
    <div class="container-fluid">

        <a class="navbar-brand logo" href="#">TwitterX</a>
        
        <div class="ms-auto d-flex align-items-center">
           <a href="<?= base_url('Twitter/Home') ?>"> <i class="bi bi-house-door icon-btn"></i></a>
          </div>

    </div>
</nav>
<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">

        <div class="col-md-6 d-flex flex-column justify-content-center mb-4 mb-md-0">
            <h1 class="brand-title">TwitterX</h1>
            <h4>Conecta con tus amigos y el mundo que te rodea</h4>
        </div>

        <div class="col-md-6">
            <div class="card auth-card p-4">
                <form action="<?= base_url('Twitter/login') ?>" method="post">
                <?= csrf_field(); ?>

                <?= validation_list_errors(); ?>   
                <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Correo electrónico" id="correo" name="correo">
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass">
                    </div>

                    <button class="btn btn-primary w-100 mb-3">Iniciar session</button>
</form>
                    <div class="divider"></div>

                    <a href="<?= base_url('Twitter/register') ?>" class="btn btn-success w-100">Crear cuenta nueva
                    </a>
                
            </div>
        </div>

    </div>
</div>

</body>
</html>