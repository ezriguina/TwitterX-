
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel de Administració - Alpicat FC</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/customRed.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>
<body>

<div class="sidebar">

    <div class="logo">

        <a href="#" style="font-family: 'Arial', sans-serif !important;">
            <small>Panel de Administracion</small>
        </a>

    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('Twitter/Admin/Piwladas_list') ?>"> <i class="fa fa-newspaper"></i><span> Gestionar Piwlades</span></a></li>
        </ul>
    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('Twitter/Admin/Piwladas/com/list') ?>"><i class="fa fa-trophy"></i> <span> Gestionar Comments</span></a></li>
        </ul>
    </div>
     <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('Twitter/Admin/Piwladas_list/admin') ?>"><i class="fa fa-trophy"></i> <span> Gestionar public Admin </span></a></li>
        </ul>
    </div>
    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('Twitter/Admin/Piwladas/com/list/admin') ?>"><i class="fa fa-trophy"></i> <span> Gestionar Comentarios Admin </span></a></li>
        </ul>
    </div>
     <div class="menu-section">
        
            <li class="menu-item"><a href="<?php echo base_url('Twitter/Admin/logout') ?>"><i class="bi bi-box-arrow-right"></i>Cerrar session</a></li>
        
    </div>




</div>

    <div class="main-content w3-container">

        <?php if (session()->getFlashdata('success')): ?>
            <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="w3-panel w3-red w3-padding w3-round w3-margin-bottom w3-center">
                <?= session('error') ?>
            </div>
        <?php endif; ?>

        <?php echo $this->renderSection('contingut'); ?>
        
    </div>

</body>
</html>