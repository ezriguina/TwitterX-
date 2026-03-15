<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('contingut'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Comentario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        :root {
            --primary: #378bbf;
            --light: #f5f5f5;
        }

        body {
            margin: 0;
            background-color: var(--light);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding: 60px 20px;
        }

        .card {
            background: white;
            width: 100%;
            max-width: 600px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-left: 5px solid var(--primary);
        }

        h2 {
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: none;
        }

        button {
            background-color: var(--primary);
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            opacity: 0.9;
        }

        .alert {
            background: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
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
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top px-3">
    <div class="container-fluid">
        <a class="navbar-brand logo" href="<?= base_url('Twitter/Admin/dashboard') ?>">TwitterX</a>
    </div>
</nav>

<div class="card">

    <h2>Editar Comentario</h2>
    
    <form action="<?= base_url('Twitter/Admin/Piwladas/com/update/'.$comment['Com_id']); ?>" method="post">
        <?= csrf_field(); ?>
        <?= validation_list_errors() ?>

        <div class="form-group">
            <label for="content">Contenido del Comentario</label>
            <textarea id="content" name="content" rows="4"><?= esc($comment['content']) ?></textarea>
        </div>

        <button type="submit">Actualizar Comentario</button>
    </form>

</div>

<?= $this->endSection(); ?>

</body>
</html>