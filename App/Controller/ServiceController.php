<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use App\Entity\Service;

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

    protected function show(): void
    {
        try {
            if (isset($_GET['id'])) {

                //Récupérer l'id du service
                $id = (int)$_GET['id'];
                //Charger le service par un appel au repository
                $serviceRepository = new ServiceRepository();
                $service = $serviceRepository->findOneById($id);

                if ($service) {
                    $this->render('service/show', [
                        'service' => $service,
                        'title' => 'Service',
                        'pageTitle' => 'Service',
                    ]);
                } else {
                    throw new \Exception("Service introuvable");
                }
            } else {
                throw new \Exception("Aucun id détecté");
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
            $serviceRepository = new ServiceRepository();
            $services = $serviceRepository->findAll();

            $this->render('service/list', [
                'services' => $services,
                'title' => 'Services',
                'pageTitle' => 'Services',
            ]);
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
        }
    }

    protected function add(): void
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $service = new Service();
                $service->setName($_POST['name']);
                $service->setDescription($_POST['description']);
                $service->setImage($_POST['image']);

                $serviceRepository = new ServiceRepository();
                $serviceRepository->insert($service);

                header('Location: index.php?controller=service&action=list');
            } else {
                $this->render('service/add', [
                    'title' => 'Ajouter un service',
                    'pageTitle' => 'Ajouter un service',
                ]);
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
        }
    }

    protected function edit(): void
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];

                $serviceRepository = new ServiceRepository();
                $service = $serviceRepository->findOneById($id);

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $service->setName($_POST['name']);
                    $service->setDescription($_POST['description']);
                    $service->setImage($_POST['image']);

                    $serviceRepository->insert($service);

                    header('Location: index.php?controller=service&action=list');
                } else {
                    $this->render('service/edit', [
                        'service' => $service,
                        'title' => 'Modifier un service',
                        'pageTitle' => 'Modifier un service',
                    ]);
                }
            } else {
                throw new \Exception("Aucun id détecté");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
        }
    }

    protected function delete(): void
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];

                $serviceRepository = new ServiceRepository();
                $serviceRepository->delete($id);

                header('Location: index.php?controller=service&action=list');
            } else {
                throw new \Exception("Aucun id détecté");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
        }
    }
}
