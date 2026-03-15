<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('contingut'); ?>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top px-3">
    <div class="container-fluid">
        <a class="navbar-brand logo" href="<?= base_url('Twitter/Admin/dashboard') ?>">
            TwitterX
        </a>
    </div>
</nav>

<h3>Piwladas</h3>

<a href="<?= base_url('Twitter/Admin/Piwladas/crear') ?>">
    CREAR NUEVA PUBLICACION
</a>

<table class="w3-table w3-bordered w3-striped w3-hoverable">
    <thead>
        <tr class="w3-light-grey">
            <th>Titulo</th>
            <th>Content</th>
            <th>Fecha de Publicacion</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($Piws as $Piw): ?>
        <tr>

            <td><?= esc($Piw->title) ?></td>

            <td><?= esc($Piw->content) ?></td>

            <td><?= esc($Piw->created_at) ?></td>

            <td>
                <a href="<?= base_url('Twitter/Admin/Piwladas/borrar/' . esc($Piw->Piw_id)) ?>"
                   class="w3-button w3-red w3-round w3-small">

                    <i class="fa fa-trash"></i> 
                    <span>Eliminar</span>

                </a>
            </td>

            <td>
                <a href="<?= base_url('Twitter/Admin/Piwladas/edit/' . esc($Piw->uuid)) ?>"
                   class="w3-button w3-blue w3-round w3-small">

                    <i class="fa fa-edit"></i> 
                    <span>Editar</span>

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