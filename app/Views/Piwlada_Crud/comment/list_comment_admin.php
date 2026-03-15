<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('contingut'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Comentarios</title>
</head>
<style>
    .navbar-custom {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .logo {
        font-weight: bold;
        font-size: 24px;
        color: #1877f2;
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

    .pagination-container {
        margin-top: 30px;
    }

    .pagination {
        gap: 8px;
    }

    .page-item .page-link {
        border-radius: 10px;
        padding: 8px 14px;
        border: none;
        background: #f1f3f5;
        color: #333;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .page-item .page-link:hover {
        background: #0d6efd;
        color: white;
    }

    .page-item.active .page-link {
        background: #0d6efd;
        color: white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top px-3">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="<?= base_url('Twitter/Admin/dashboard') ?>">TwitterX</a>
        </div>
    </nav>

    <h3>Comentarios</h3>
    <table class="w3-table w3-bordered w3-striped w3-hoverable">
        <thead>
            <tr class="w3-light-grey">
                <th>Contenido</th>
                <th>Publicación (ID)</th>
                <th>Usuario (ID)</th>
                <th>Fecha de Creación</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comments as $comment): ?>
            <tr>
                <td><?= esc($comment['content']) ?></td>
                <td><?= esc($comment['Piw_id']) ?></td>
                <td><?= esc($comment['User_id']) ?></td>
                <td><?= esc($comment['created_at']) ?></td>

                <td>
                    <a href="<?= base_url('Twitter/Admin/Piwladas/com/delete/' . esc($comment['Com_id'])) ?>" 
                       class="w3-button w3-red w3-round w3-small">
                        <i class="fa fa-trash"></i> <span>Eliminar</span>
                    </a>
                </td>

                <td>
                    <a href="<?= base_url('Twitter/Admin/Piwladas/com/edit/' . esc($comment['Com_id'])) ?>" 
                       class="w3-button w3-blue w3-round w3-small">
                        <i class="fa fa-edit"></i> <span>Editar</span>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?= $this->endSection(); ?>
</body>
</html>