<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<?php foreach ($errors as $error) : ?>
    <div class="error"><?= $error ?></div>
<?php endforeach; ?>

<main class=main-form>
    <form method="POST">
        <div class="form-group">
            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>
            <div class="invalid-credentials">Le mail et/ou le mot de passe sont incorrects.</div>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="button-login">
            <button type="submit" name="loginUser" class="btn-validate-form" id="loginUser">Connexion</button>
        </div>
    </form>
</main>


<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>