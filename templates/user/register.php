<?php require_once _ROOTPATH_ . '/templates/header.php';
/**
 * @var \APP\Entity\User $user */ ?>

<?php foreach ($errors as $error) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
<?php endforeach; ?>

<main class=main-form>
    <form method="POST">
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id=" email" name="email" value="" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" value="" required>
        </div>
        <div class="form-group">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
        </div>
        <div class="form-group">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
        </div>
        <div class="form-group">
            <select name="role" id="role" class="form-control">
                <option value="employee">Employé</option>
                <option value="veterinary">Vétérinaire</option>
                <option value="user">user</option>
            </select>
        </div>

        <div class="form-btn">
            <input type="submit" id="saveUser" name="saveUser" class="btn-validate-form" value="Enregistrer">
        </div>
    </form>
</main>
<div class="back">
    <i class="fa-solid fa-angles-left"></i><a href="index.php?controller=user&action=register">Retour</a>
</div>
<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>