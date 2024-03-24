<?php

namespace App\Controller;

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
                    case 'signin':
                        // on appelle la méthode connexion
                        $this->signin();
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
        /*$params = [
            'title' => 'Accueil',
            'PageTitle' => 'Bienevenue au zoo',
        ];*/

        $this->render('page/home', [
            'title' => 'Accueil',
            'pageTitle' => 'Bienevenue au zoo',
        ]);
    }

    protected function contact(): void
    {
        $this->render('page/contact', [
            'title' => 'Accueil',
            'pageTitle' => 'Bienevenue au zoo',
        ]);
    }
}
