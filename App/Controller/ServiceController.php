<?php

namespace App\Controller;

use App\Repository\ServiceRepository;

class ServiceController extends Controller
{
    public function route(): void
    {
        try {
            //on verrifie si le controller est défini dans l'url
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        //on appelle la méthode show
                        $this->show();
                        break;
                    case 'list':
                        // on appelle la méthode list
                        $this->list();
                        break;
                    case 'add':
                        // on appelle la méthode add
                        $this->add();
                        break;
                    case 'edit':
                        // on appelle la méthode edit
                        $this->edit();
                        break;
                    case 'delete':
                        // on appelle la méthode delete
                        $this->delete();
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
}
