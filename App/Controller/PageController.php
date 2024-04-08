<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
use App\Entity\Review;
use App\Security\ReviewValidator;

class PageController extends Controller
{
    public function route(): void
    {
        try {
            //on verrifie si le controller est défini dans l'url
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'home':
                        //on appelle la méthode home
                        $this->home();
                        break;
                    case 'contact':
                        // on appelle la méthode contact
                        $this->contact();
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

    protected function home(): void
    {
        try {
            $errors = [];
            $review = new Review();

            if (isset($_POST['addReview'])) {
                $review->hydrate($_POST);
                $reviewValidator = new ReviewValidator();
                $errors = $reviewValidator->validate($review);
                if (empty($errors)) {
                    $reviewRepository = new ReviewRepository();
                    $reviewRepository->insert($review);
                    header('Location: index.php?controller=page&action=home');
                } else throw new \Exception("Le formulaire contient des erreurs");
            }
            /*$params = [
            'title' => 'Accueil',
            'PageTitle' => 'Bienevenue au zoo',
        ];*/
            $this->render('page/home', [
                'title' => 'Accueil',
                'pageTitle' => 'Bienvenue au zoo',
                'errors' => $errors,
            ]);
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
        }
    }

    protected function contact(): void
    {
        $this->render('page/contact', [
            'title' => 'Contact',
            'pageTitle' => 'Contact',
        ]);
    }
}
