<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TwitterX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
        }

        .navbar-custom {
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }

        .logo {
            font-weight: bold;
            font-size: 24px;
            color: #1877f2;
        }

        .search-input {
            background: #f0f2f5;
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
            background: white;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,.1);
        }

        .post-header {
            display: flex;
            align-items: center;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .post-actions {
            border-top: 1px solid #eee;
            margin-top: 10px;
            padding-top: 10px;
        }

        .action-btn {
            width: 100%;
            border-radius: 8px;
            font-weight: 500;
        }

        .action-btn:hover {
            background: #f0f2f5;
        }

        .comment-box {
            background: #f0f2f5;
            border-radius: 10px;
            padding: 8px 12px;
            margin-bottom: 8px;
        }

        .comment-input {
            background: #f0f2f5;
            border: none;
            border-radius: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top px-3">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="<?= base_url('Twitter/Home') ?>">TwitterX</a>

            <form action="<?= base_url('Twitter/Piw/Search') ?>" method="get" class="d-flex">
                <input 
                    type="search"
                    name="search"
                    value="<?= esc($search ?? '') ?>"
                    class="form-control me-2"
                    placeholder="Buscar noticias..."
                >
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <div class="ms-auto d-flex align-items-center">
                <a href="<?= base_url('Twitter/Home') ?>">
                    <i class="bi bi-house-door icon-btn"></i>
                </a>
                <a href="<?= base_url('Twitter/Admin/Dashboard') ?>">
                    <i class="bi bi-people icon-btn"></i>
                </a>
                <i class="bi bi-bell icon-btn"></i>
                <a href="<?= base_url('Twitter/login') ?>">
                    <i class="bi bi-person-circle icon-btn"></i>
                </a>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="feed-container">
            <?php foreach($Piws as $Piw): ?>
<div class="news-card">

    <div class="post-header">
        <div>
            <strong>Usuario <?= esc($Piw->User_id) ?></strong><br>
            <small class="text-muted"><?= esc($Piw->created_at) ?></small>
        </div>

        <div class="ms-auto">
            <i class="bi bi-three-dots"></i>
        </div>
    </div>

    <h5 class="mt-2"><?= esc($Piw->title) ?></h5>

    <p><?= $Piw->content ?></p>

    <p><?= esc($Piw->uuid) ?></p>

<?php if($Piw->image): ?>
<div class="piw-image-wrapper mt-3 mb-3">
<img src="<?= base_url('uploads/'.$Piw->image) ?>" 
     class="img-fluid rounded shadow-sm piw-image">
</div>
<?php endif; ?>


<div class="post-actions row text-center">
<div class="col">

<a class="btn action-btn"
href="<?= base_url('Twitter/Admin/Piwladas/read/'.esc($Piw->uuid)) ?>">

<i class="bi bi-book"></i> Leer noticia

</a>

</div>
</div>


<div class="mt-3">

<form action="<?= base_url('Twitter/Admin/Piwladas/com') ?>" method="post">

<input type="hidden" name="piwlada_id"
value="<?= $Piw->Piw_id ?>">

<div class="input-group">

<input type="text" name="content"
class="form-control comment-input"
placeholder="Escribe un comentario...">

<button type="submit" class="btn btn-primary">
<i class="bi bi-send"></i>
</button>

</div>

</form>

<br>

<?php if(!empty($Piw->comments)): ?>
<?php foreach ($Piw->comments as $com): ?>

<div class="comment-box">
<?= esc($com['content']) ?>
</div>

<?php endforeach; ?>
<?php endif; ?>

</div>

</div>
<?php endforeach; ?>
        </div>
    </div>

    <div class="pagination-container text-center mb-5">
        <?= $pager->links() ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>