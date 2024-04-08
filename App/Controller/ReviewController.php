<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
use App\Entity\Review;


class ReviewController extends Controller
{
    public function route(): void
    {
        try {
            //on verrifie si le controller est défini dans l'url
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'list':
                        // on appelle la méthode list
                        $this->list();
                        break;

                    default:
                        throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
        }
    }

    protected function list(): void
    {

        try {
            //on instancie la classe ReviewRepository
            $reviewRepository = new ReviewRepository();
            //on récupère la page demandée
            $currentPage = (int)($_GET['page'] ?? 1);
            //on récupère le nombre total d'avis
            $count = $reviewRepository->count();
            //on définit le nombre d'avis par page
            $perPage = 2;
            //on détermine le nombre de pages en arrondissant au supérieur
            $pages = ceil($count / $perPage);
            //on vérifie si la page demandée est supérieure au nombre de pages
            if ($currentPage > $pages) {
                $currentPage = $pages;
            }
            //on calcule les articles à afficher ex: page 1 => articles de 0 à 10 page 2 => articles de 10 à 20
            $offset = ($currentPage - 1) * $perPage;
            //on récupère les articles par pages
            $reviews = $reviewRepository->showPageReviews($currentPage, $perPage);
            //on affiche la vue
            $this->render('review/list', [
                'reviews' => $reviews,
                'currentPage' => $currentPage,
                'pages' => $pages,

            ]);
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
        }
    }
}
