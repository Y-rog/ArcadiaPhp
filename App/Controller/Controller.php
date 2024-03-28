<?php

namespace App\Controller;

class Controller
{
    public function route(): void
    {
        try {
            //on verrifie si le controller est défini dans l'url
            if (isset($_GET['controller'])) {
                switch ($_GET['controller']) {
                        //Charger Controller Page Home
                    case 'page':
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                        //Charger Controller Page Habitat
                    case 'habitat':
                        $pageController = new HabitatController();
                        $pageController->route();
                        break;
                    case 'animal':
                        $pageController = new AnimalController();
                        $pageController->route();
                        break;
                        //Charger  Page Service
                    case 'service':

                        break;
                        //Par défaut charger erreur
                    default:
                        throw new \Exception("Le controller n'existe pas");
                        break;
                }
            } else {
                // charger la page d'accueil
                $pageController = new PageController();
                $pageController->home();
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
        }
    }

    // méthode pour afficher le rendu
    protected function render(string $path, array $params = []): void
    {
        $filePath = _ROOTPATH_ . '/templates/' . $path . '.php';


        try {
            if (!file_exists($filePath)) {
                throw new \Exception('Le fichier ' . $filePath . ' n\'existe pas');
            } else {
                extract($params);
                require_once $filePath;
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
            echo $e->getMessage();
        }
    }
}
