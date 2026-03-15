<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('contingut'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASH</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
        }

        .navbar-custom {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .logo {
            font-weight: bold;
            font-size: 24px;
            color: #1877f2;
        }

        .search-input {
            background-color: #f0f2f5;
            border: none;
            border-radius: 20px;
            padding-left: 40px;
        }

        .search-wrapper {
            position: relative;
        }

        .search-wrapper i {
            position: absolute;
            left: 15px;
            top: 8px;
            color: gray;
        }

        .icon-btn {
            font-size: 20px;
            margin-left: 20px;
            cursor: pointer;
            color: #65676b;
        }

        .icon-btn:hover {
            color: #1877f2;
        }

        .feed-container {
            max-width: 600px;
            margin: 30px auto;
        }

        .news-card {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top px-3">
    <div class="container-fluid">
   
        <a class="navbar-brand logo" href="#">TwitterX</a>
        
        
        <div class="ms-auto d-flex align-items-center">
           <a href="<?= base_url('Twitter/Admin/logout') ?>"> <i class="bi bi-box-arrow-right"></i></a>
        </div>

    </div>
</nav>

<div class="container">
    <div class="feed-container">
        <h2 class="ms-auto d-flex align-items-center"> <?= $nom ?></h2>
        <h2 class="ms-auto d-flex align-items-center"> <?= $cognom ?></h2>
        <h2 class="ms-auto d-flex align-items-center"> <?= $correo ?></h2>
        <h2 class="ms-auto d-flex align-items-center"> <?= $rol ?></h2>


    </div>
</div>
<?= $this->endSection(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
</body>
</html>