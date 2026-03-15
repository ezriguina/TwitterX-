<!doctype html>
<html>

<head>
    <title><?= $page_title ?? ''; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <?= $this->renderSection('news_boot_css') ?>

</head>

<body>
    <div class='container'>
        <?= $this->renderSection('news_content') ?>
        <div>
            &copy;2025. ALPICAT FC.
        </div>
    </div>
</body>

</html>