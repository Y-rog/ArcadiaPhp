<?php

use App\Security\Security; ?>


<footer class="container-fluid py-3 my-4 border-top">
    <div class="row">
        <div class="d-flex col-4 align-items-center">
            <a href="/">
                <img width="200" src="../assets/img/logo-svg.svg" alt="logo Arcadia" class="img-fluid">
            </a>
        </div>

        <ul class="col-4 d-flex align-items-center justify-content-center mb-0 list-unstyled">
            <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-twitter-x"></i>
                </a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-instagram"></i>
                </a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-facebook"></i></a></li>
        </ul>

        <div class="col-4 text-end">
            <?php if (Security::isLogged()) { ?>
                <a class="nav-link" href=" /index.php?controller=auth&action=logout">Déconnexion</a>
            <?php } else { ?>
                <a class="nav-link" href="/index.php?controller=auth&action=login">Espace administration <i class="bi bi-person-fill-lock"></i></a>
            <?php } ?>
        </div>
    </div>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>