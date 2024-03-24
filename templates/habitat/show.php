<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>
<main class="habitats">
    <div class="container-habitat">
        <div class="img-habitat"><img src=<?= _IMAGE_HABITAT_ . $habitat->getImage() ?> alt="">
            <h3><?= $habitat->getName() ?></h3>
        </div>
    </div>
    <div class="description">
        <p><?= $habitat->getDescription() ?></p>
    </div>
    <div class="list-animals">
        <div class="list-title">
            <h3>Liste des animaux: <?= $habitat->getNAme() ?></h3>
        </div>
        <?php foreach ($animals as $animal) : ?>
            <div class="img-animal"> <img src=<?= _IMAGE_ANIMAL_ . $animal->getImage() ?> alt="">
            </div>
            <div class="li-page-habitat">
                <li>Prénom:<?= $animal->getFirstname() ?></li>
                <li>Race:<?= $animal->getRace() ?></li>
                <li>Habitat:<?= $habitat->getName() ?></li>
            </div>
        <?php endforeach; ?>
</main>
<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>