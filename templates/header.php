<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/styles/index.css">

</head>
<header>
    <nav id="nav">
        <div class="container-title-nav">
            <h2>Arcadia</h2>
        </div>
        <ul>
            <li><a href="index.php?controller=page&action=home">Accueil</a></li>
            <li><a href="index.php?controller=habitat&action=list">Habitats</a></li>
            <li><a href="index.php?controller=service&action=list">Services</a></li>
            <li><a href="index.php?controller=page&action=contact">Contact</a></li>
            <li class="link" id="link-signin"><a href="index.php?controller=page&action=signin">Connexion</a>
            </li>
            <li class="link" id="link-signout"><a href="">Déconnexion</a>
            </li>
        </ul>
        <div id="icons"></div>
        <ul>
            <div class="button" id="button-signin"><button class="button1">Connexion</button>
            </div>
            <div class="button" id="button-signout"><button class="button1">Déconnexion</button>
            </div>
        </ul>

    </nav>
    <aside>
        <h2>
            <?= $pageTitle ?>
        </h2>
    </aside>
</header>