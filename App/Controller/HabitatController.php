<?php

namespace App\Controller;

use App\Repository\AnimalRepository;
use App\Repository\HabitatRepository;

class HabitatController extends Controller
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

                //Récupérer l'id de l'habitat
                $id = (int)$_GET['id'];
                //Charger l'habitat par un appel au repository
                $habitatRepository = new HabitatRepository();
                $habitat = $habitatRepository->findOneById($id);
                $animalRepository = new AnimalRepository();
                $animals = $animalRepository->findAllByHabitat($id);

                $this->render('habitat/show', [
                    'pageTitle' => 'Habitat ' . $habitat->getName(),
                    'habitat' => $habitat,
                    'animals' => $animals,
                    'animalPath' => 'index.php?controller=animal&action=show&id=',
                ]);
            } else {
                throw new \Exception("L'id est manquant en paramètre d'url");
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

            //Charger la liste des habitats par un appel au repository
            $habitatRepository = new HabitatRepository();
            $habitats = $habitatRepository->findAll();

            $this->render('habitat/list', [
                'pageTitle' => 'Liste des habitats',
                'habitats' => $habitats,
            ]);
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
            //on vérifie si l'id est présent dans l'url
            if (isset($_GET['id'])) {
                //on récupère l'id de l'habitat
                $id = (int)$_GET['id'];

                //on appelle le repository pour charger l'habitat
                $habitatRepository = new HabitatRepository();
                $habitat = $habitatRepository->findOneById($id);

                //on vérifie si le formulaire a été soumis
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    //on vérifie si le formulaire est valide
                    if ($this->validate()) {
                        //on met à jour l'habitat
                        $habitat->setName($_POST['name']);
                        $habitat->setDescription($_POST['description']);
                        $habitat->setImage($_FILES['image']['name']);

                        //on appelle le repository pour mettre à jour l'habitat
                        $habitatRepository->edit($habitat);

                        //on redirige vers la liste des habitats
                        header('Location: index.php?action=list');
                    }
                }

                $this->render('habitat/edit', [
                    'pageTitle' => 'Modifier l\'habitat ' . $habitat->getName(),
                    'habitat' => $habitat,
                ]);
            } else {
                throw new \Exception("L'id est manquant en paramètre d'url");
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
            //on vérifie si l'id est présent dans l'url
            if (isset($_GET['id'])) {
                //on récupère l'id de l'habitat
                $id = (int)$_GET['id'];

                //on appelle le repository pour charger l'habitat
                $habitatRepository = new HabitatRepository();
                $habitat = $habitatRepository->findOneById($id);

                //on vérifie si le formulaire a été soumis
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    //on appelle le repository pour supprimer l'habitat
                    $habitatRepository->delete($habitat);

                    //on redirige vers la liste des habitats
                    header('Location: index.php?action=list');
                }

                $this->render('habitat/delete', [
                    'pageTitle' => 'Supprimer l\'habitat ' . $habitat->getName(),
                    'habitat' => $habitat,
                ]);
            } else {
                throw new \Exception("L'id est manquant en paramètre d'url");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
        }
    }
}
