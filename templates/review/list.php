<?php require_once _ROOTPATH_ . '/templates/header.php';

use App\Entity\Review;
use App\Repository\ReviewRepository;
use App\Controller\ReviewController;
?>




<main class="container pt-1 pb-5">
    <div class="justify-content-center text-center pb-3">
        <h1 class="pb-3">Liste des avis</h1>

        <div class="text-center row justify-content-center reviews">
            <?php foreach ($reviews as $review) { ?>
                <div class="border rounded pt-2 mb-3 fst-italic col-10">
                    <p><?= $review->getContent() ?></p>
                    <div class="blockquote-footer"><?= $review->getUsername() ?>, le <?= $review->getCreatedAt()  ?></div>
                </div>
            <?php } ?>
        </div>
        <div class="d-flex jsutify-content-between my-4">
            <?php if ($currentPage > 1) { ?>
                <a href="index.php?controller=review&action=list&page=<?= $currentPage - 1 ?>" class="btn btn-primary">Précédent</a>
            <?php } ?>
            <?php if ($currentPage < $pages) { ?>
                <a href="index.php?controller=review&action=list&page=<?= $currentPage + 1 ?>" class="btn btn-primary">Suivant</a>
            <?php } ?>
        </div>


    </div>

</main>



<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>