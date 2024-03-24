<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<main class="accueil">
    <section class="section-home-bigTitle">
        <h1>Arcadia</h1>
        <p>Vivez une experience inoubliable!</p>
    </section>
    <section class="section-home-container">
        <section class="section-home-1">
            <div class="container-title">
                <h2>Nous et nos animaux</h2>
            </div>
            <div class="container-home-1">
                <div class="container-left">
                    <img src="/assets/img/panda.jpg" alt="panda">
                </div>
                <div class="container-right">
                    <p>Situé en Bretagne proche de la forêt de Brocéliande, nous sommes heureux de vous accueillir
                        depuis
                        1960.
                    </p>
                    <div class="link-home"><a href="#">Nous localiser</a></div>
                </div>

            </div>
            <div class="container-home-2">
                <div class="container-left">
                    <p>Venez vous aventurez dans la savane, la jungle et le marais.
                        Découvrez plus de 30 espèces d’animaux.</p>
                    <div class="link-home"><a href="#">Voir les habitats</a></div>
                </div>
                <div class="container-right">
                    <img src="/assets/img/homme-girafe.jpg" alt="girafe">
                </div>
            </div>
            <div class="container-home-3">
                <div class="container-left">
                    <img src="/assets/img/restauration.jpg" alt="restauration">
                </div>
                <div class="container-right">
                    <p>Le parc vous propose plusieurs services pour agrémenter votre visite. </p>
                    <div class="link-home"><a href="#">Voir les services</a></div>
                </div>
            </div>
            </div>
            </div>
        </section>

        <section class="section-home-2">
            <h2>Nos valeurs</h2>
            <div class="container-values">
                <div class="container-house">
                    <div class="icon"><i class="fa-solid fa-house"></i></div>
                    <p>Soucieux du bien être de nos animaux, nous avons reproduits leurs habitats naturels. </p>
                </div>
                <div class="container-pulse">
                    <div class="icon"><i class="fa-solid fa-heart-pulse"></i></div>
                    <p>La santé de nos animaux est primordiales, plusieurs vétérinaires contrôlent avant ouverture
                        du
                        zoo de la bonne santé des animaux.</p>
                </div>
                <div class="container-leaf">
                    <div class="icon"><i class="fa-solid fa-leaf"></i></div>
                    <p>Engagé également pour la protection de l’environnement, notre zoo est autosuffisant en
                        énergies.
                    </p>
                </div>
            </div>
        </section>

        <section class="section-home-3">
            <div class="title-review">
                <h2>Les visiteurs témoignent</h2>
                <div class="button-review"><button id="button-review" class="button2">Ajouter un
                        avis</button></div>
            </div>

            <div class="container-review" id="review-1">
                <p>“Un des plus beau zoo que j’ai visité, je conseille la visite en petit train, c’était super!”</p>
                <span>Maurice, 06/02/2024
                </span>
            </div>
            <div class="container-review" id="review-2">
                <p>“Une super journée en famille.”</p>
                <span>Léo, 06/01/2024
                </span>
            </div>
            <div class="container-review" id="review-3">
                <p>“Un très beau parc, le personnel est très attentionné.”</p>
                <span>Huguette, 01/01/2024
                </span>
            </div>
            <div class="link-review" id="linkReview"><a href="">Voir plus d'avis</a></div>


        </section>
    </section>
</main>
<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>