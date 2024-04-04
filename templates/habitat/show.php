<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>
<main class="habitat">
    <div class="container">
        <img class=" rounded" width="100%" height="auto" aria-hidden="true" src='<?= $habitat->getImagePath() ?>' alt="<?= $habitat->getName() ?>">
        <p><?= $habitat->getDescription() ?></p>
    </div>
    <div class="container ">
        <div class="text-center">
            <h3>Liste des animaux:</h3>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($animals as $animal) : ?>

                    <div class="col">
                        <div class="card h-100">
                            <img class="rounded-top" src=<?= $animal->getImagePath() ?> alt="">
                            <table>
                                <tr>
                                    <th>Prénom:</th>
                                    <td> <?= ucwords($animal->getFirstname()) ?></td>
                                </tr>
                                <tr>
                                    <th>Race:</th>
                                    <td><?= $animal->getRace() ?></td>
                                </tr>
                                <tr>
                                    <th>Habitat:</th>
                                    <td><?= $habitat->getName() ?></td>
                                </tr>
                            </table>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        <table>
                                            <tr>
                                                <th>Etat:</th>
                                                <td> <?= ucwords($animal->getFirstname()) ?></td>
                                            </tr>
                                        </table>
                                    </button>
                                </h3>
                                <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <table>
                                            <tr>
                                                <th>Prénom:</th>
                                                <td> <?= ucwords($animal->getFirstname()) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Race:</th>
                                                <td><?= $animal->getRace() ?></td>
                                            </tr>
                                            <tr>
                                                <th>Habitat:</th>
                                                <td><?= $habitat->getName() ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="back">
        <i class="fa-solid fa-angles-left"></i><a href="index.php?controller=habitat&action=list">Retour</a>
    </div>
</main>
<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>