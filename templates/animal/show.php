<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>
<div class="container-animal-show">
    <div class="img-animal"> <img src=<?= $image ?> alt="">
        <a href=<?=$pathEdit?>><i class="fa-solid fa-pen-to-square icon-update"></i></a>
        <a href=<?=$pathDelete?>><i class="fa-solid fa-trash icon-delete"></i></a>
    </div>
    <div class="info-animal">
        <table>
            <tr>
                <th>Prénom:</th>
                <td><?= $firstname ?></td>
            </tr>
            <tr>
                <th>Race:</th>
                <td><?= $race ?></td>
            </tr>
            <tr>
                <th>Habitat:</th>
                <td><?= $habitatName ?></td>
            </tr>
        </table>
    </div>
</div>
<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>