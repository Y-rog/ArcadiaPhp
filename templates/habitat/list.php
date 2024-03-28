<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>
<main class="habitat">
    <?php foreach ($habitats as $habitat) : ?>
        <div class="container-habitat">
            <div class="img-habitat"><img src='<?= $habitat->getImagePath() ?>' alt="<?= $habitat->getName() ?>">
                <div class="icon-delete" data-show="admin"><i class="fa-solid fa-trash-can"></i></div>
                <div class="icon-update" data-show="admin"><i class="fa-solid fa-pencil"></i></div>
                <h3><?= ucwords($habitat->getName()) ?></h3>
                <button class="button1"> <a href="index.php?controller=habitat&action=show&id=<?= $habitat->getId() ?>">Découvrir</a></button>

            </div>
        </div>
        </div>
    <?php endforeach; ?>
</main>
<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>