<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<main class="container pt-1 pb-5">
    <div class="justify-content-center text-center pb-3">
        <h1>Liste des avis</h1>
    </div>
    <div class="text-center row justify-content-center reviews">
        <?php foreach ($reviews as $review) { ?>
            <div class="border rounded pt-2 mb-3 fst-italic col-10">
                <p><?= $review->getContent() ?></p>
                <div class="blockquote-footer"><?= $review->getUsername() ?></div>
            </div>
        <?php } ?>
    </div>

</main>



<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>