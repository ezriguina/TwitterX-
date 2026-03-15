<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
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
            <h4>Crea una cuenta y empieza a compartir.</h4>
        </div>

        <div class="col-md-6">
            <div class="card auth-card p-4">
                
                <form action="<?= base_url('Twitter/register')?>"   method="post">
                    <?= validation_list_errors() ?>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nombre" id="nom" name="nom" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Apellido" id="cognom" name="cognom">
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Correo electrónico" id="correo" name="correo">
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Nueva contraseña" id="pass" name="pass">
                    </div>
                    
                    <div class="mb-3"> 
                   <select name="rol" id="rol" class="form-control">
                   <option value="usuario">Usuario estandar</option>
                    <option value="admin">Usuario Admin</option>
                   </select>
                  </div>
                    <br>

              <div class="mb-3">
            <div class="g-recaptcha"  data-sitekey="6Lfc7IMsAAAAADnIBZ1xi1rHL7A7iIPPFHAtrO7q"></div>
             </div><br>
                    <button class="btn btn-primary w-100 mb-3">Registrarse</button>
                </form>
                    <div class="text-center">
                        <a href="<?= base_url('Twitter/login') ?>" class="text-decoration-none">
                            ¿Ya tienes cuenta? Inicia sesión
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>