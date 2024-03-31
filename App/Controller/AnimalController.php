<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Habitat;
use App\Repository\AnimalRepository;
use App\Repository\HabitatRepository;
use App\Security\AnimalValidator;




class AnimalController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        $this->show();
                        break;
                    case 'add':
                        $this->add();
                        break;
                    case 'edit':
                        $this->edit();
                        break;
                    case 'delete':
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

    protected function show()
    {
        try {
            $animalRepository = new AnimalRepository();
            $animal = $animalRepository->findOneById($_GET['id']);
            $this->render('animal/show', [
                'pathEdit' => 'index.php?controller=animal&action=edit&id=' . $animal->getId(),
                'pathDelete' => 'index.php?controller=animal&action=delete&id=' . $animal->getId(),
                'animal' => $animal,
                'id' => $animal->getId(),
                'race' => $animal->getRace(),
                'firstname' => ucfirst($animal->getFirstname()),
                'image' => $animal->getImagePath(),
                'pageTitle' => 'Détail de l\'animal',
                'habitatName' => (new HabitatRepository())->findOneById($animal->getHabitatId())->getName(),
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
            $errors = [];
            $animal = new Animal();

            if (isset($_POST['saveAnimal'])) {

                $animal->hydrate($_POST);

                $errors = (new AnimalValidator())->animalValidate($animal);

                if (empty($errors)) {
                    $animalRepository = new AnimalRepository();

                    $animalRepository->insert($animal);
                    header('Location: index.php?controller=animal&action=add');
                }
            }

            $this->render('animal/add', [
                'animal' => $animal,
                'errors' => $errors,
                'pageTitle' => 'Ajouter un animal',
                'habitats' => (new HabitatRepository())->findAll(),
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
            $errors = [];
            $animalRepository = new AnimalRepository();
            $animal = $animalRepository->findOneById($_GET['id']);

            if (isset($_POST['saveAnimal'])) {

                $animal->hydrate($_POST);

                $errors = (new AnimalValidator())->animalValidate($animal);

                if (empty($errors)) {
                    $animalRepository->insert($animal);
                    header('Location: index.php?controller=habitat&action=edit&id=' . $animal->getId());
                }
            }

            $this->render('animal/edit', [
                'animal' => $animal,
                'errors' => $errors,
                'pageTitle' => 'Modifier un animal',
                'habitats' => (new HabitatRepository())->findAll(),
            ]);
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
            $errors = [];
            $animalRepository = new AnimalRepository();
            $animal = $animalRepository->findOneById($_GET['id']);

            if (isset($_POST['delete'])) {
                $animalRepository->delete($animal->getId());
                header('Location: index.php?controller=habitat&action=list');
            }

            $this->render('animal/delete', [
                'animal' => $animal,
                'pageTitle' => 'Supprimer un animal',
                'pathShow' => 'index.php?controller=animal&action=show&id=' . $animal->getId(),
                'id' => $animal->getId(),
                'race' => $animal->getRace(),
                'firstname' => ucfirst($animal->getFirstname()),
                'image' => $animal->getImagePath(),
                'pageTitle' => 'Supression de l\'animal',
                'habitatName' => (new HabitatRepository())->findOneById($animal->getHabitatId())->getName(),
            ]);
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
                'pageTitle' => 'Erreur',
            ]);
        }
    }
}
