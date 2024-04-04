<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>
<main class="container">
    <?php foreach ($habitats as $habitat) : ?>
        <div class="pb-3">
            <div class="container habitat">
                <a href="index.php?controller=habitat&action=show&id=<?= $habitat->getId() ?>">
                    <img class="card-img-top s" width="100%" height="auto" aria-hidden="true" src='<?= $habitat->getImagePath() ?>' alt="<?= $habitat->getName() ?>">
                    <h2><?= ucwords($habitat->getName()) ?></h2>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</main>
<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>