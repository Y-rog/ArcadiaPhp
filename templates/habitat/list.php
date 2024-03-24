<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>
<?php foreach ($habitats as $habitat) : ?>
    <main class="habitats">
        <div class="container-habitat">
            <div class="img-habitat"><img src='<?= _IMAGE_HABITAT_ . $habitat->getImage() ?>' alt="">
                <div class="icon-delete" data-show="admin"><i class="fa-solid fa-trash-can"></i></div>
                <div class="icon-update" data-show="admin"><i class="fa-solid fa-pencil"></i></div>
                <h3><?= $habitat->getName() ?></h3>
                <button id="button-discover-<?= $habitat->getName() ?>" class="button1">Découvrir</button>
                <div id="minimize-<?= $habitat->getName() ?>" class="minimize"><i class="fa-solid fa-window-minimize"></i>
                </div>
            </div>
        </div>
        <div id="description-<?= $habitat->getName() ?>" class="description">
            <p><?= $habitat->getDescription() ?></p>
        </div>
    </main>
<?php endforeach; ?>
<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>