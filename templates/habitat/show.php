<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>
<main class="habitat">
    <div class="container-habitat">
        <div class="img-habitat"><img src=<?= _IMAGE_HABITAT_ . $habitat->getImage() ?> alt="">
            <h3><?= ucwords($habitat->getName()) ?></h3>
        </div>
    </div>
    <div class="description">
        <p><?= $habitat->getDescription() ?></p>
    </div>
    <div class="list-animals">
        <div class="list-title">
            <h3>Liste des animaux:</h3>
        </div>
    </div>
    <div class="container-animals">
        <?php foreach ($animals as $animal) : ?>
            <div class="container-animal">
                <div class="img-animal"> <img src=<?= $animal->getImagePath() ?> alt="">
                </div>
                <div class="li-page-habitat">
                    <li>Prénom: <?= ucwords($animal->getFirstname()) ?></li>
                    <li>Race: <?= $animal->getRace() ?></li>
                    <li>Habitat: <?= $habitat->getName() ?></li>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="back">
        <i class="fa-solid fa-angles-left"></i><a href="index.php?controller=habitat&action=list">Retour</a>
    </div>
</main>
<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>