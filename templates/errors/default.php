<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<?php if ($error) { ?>
    <div class="error">
        <h2><?= $error ?></h2>
    </div>
<?php } ?>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>