<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<main class="main-form">
    <form id="signin" action="" method="GET">
        <div>
            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>
            <div class="invalid-credentials">Le mail et/ou le mot de passe sont incorrects.</div>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="button-signin">
            <button type="button" class="btn-validate-form" id="btnSignin">Connexion</button>
        </div>
    </form>
</main>

<script src="../assets/js/pages/signin.js'"></script>

<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>