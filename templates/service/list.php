<?php require_once 'templates/header.php';

use App\Entity\Service;
use App\Controller\ServiceController; ?>


<main class="services">
    <div class="add-service">
        <a href="index.php?controller=service&action=add" class="button1">Ajouter un service</a>
    </div>
    <div class="container-services">
        <?php foreach ($services as $service) : ?>
            <div class="container-service">
                <div class="img-service"><img class="img-service" src=<?= $service->getImagePath() ?> alt="visite guidée">
                    <div class="icon-delete"><i data-show="admin" data-show="employee" class="fa-solid fa-trash-can"></i>
                    </div>
                    <div class="icon-update"><i data-show="admin" data-show="employee" class="fa-solid fa-pencil"></i>
                    </div>
                </div>
                <h3><?= $service->getName() ?></h3>
                <p><?= $service->getDescription() ?>.</p>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require_once 'templates/footer.php'; ?>