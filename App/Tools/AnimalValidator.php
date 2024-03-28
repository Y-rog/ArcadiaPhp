<?php

namespace App\Tools;

use App\Entity\Animal;
use App\Entity\Habitat;

class AnimalValidator extends Tools
{

    public function animalValidate(Animal $animal): array
    {
        $errors = [];
        if (empty($animal->getFirstname())) {
            $errors['firstname'] = 'Le prénom est obligatoire';
        }
        if (empty($animal->getRace())) {
            $errors['race'] = 'La race est obligatoire';
        }
        if (empty($animal->getImage())) {
            $errors['image'] = 'L\'image est obligatoire';
        }
        if (empty($animal->getHabitatId())) {
            $errors['habitatId'] = 'L\'habitat est obligatoire';
        }
        return $errors;
    }
}
