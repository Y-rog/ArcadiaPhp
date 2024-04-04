<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<main class="container pt-5 pb-5">
    <div class="text-center">
        <h1>Connexion</h1>
    </div>


    <?php foreach ($errors as $error) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $error; ?>
        </div>
    <?php } ?>

    <form method="POST">
        <div class="mb-3">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <input type="submit" name="loginUser" class="btn btn-primary" value="Connexion">

    </form>
</main>



<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>