<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<main class="main-form">
    <h3>Ecrivez nous !</h3>
    <form id="contact" action="" method="POST">
        <div>
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <div>
            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="submit">
            <input type="submit" class="btn-validate-form" id="submit" value="Envoyer">
        </div>
    </form>
</main>
<script src="../assets/js/pages/contact.js"></script>

<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>