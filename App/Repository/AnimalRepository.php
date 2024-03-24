<?php

namespace App\Repository;

use App\Entity\Animal;
use App\Db\Mysql;
use App\Tools\StringTools;

class AnimalRepository
{
    public function findOneById(int $id)
    {
        //Appel bdd
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM animal WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $animal = $query->fetch($pdo::FETCH_ASSOC);
        $animalEntity = new Animal();

        foreach ($animal as $key => $value) {
            $animalEntity->{'set' . StringTools::toPascalCase($key)}($value);
        }
        return $animalEntity;
    }

    public function findAll()
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM animal');
        $query->execute();
        $animals = $query->fetchAll($pdo::FETCH_ASSOC);
        $animalEntities = [];
        foreach ($animals as $animal) {
            $animalEntity = new Animal();
            foreach ($animal as $key => $value) {
                $animalEntity->{'set' . StringTools::toPascalCase($key)}($value);
            }
            $animalEntities[] = $animalEntity;
        }
        return $animalEntities;
    }

    public function findAllByHabitat(int $habitatId)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM animal WHERE habitat_id = :habitat_id');
        $query->bindValue(':habitat_id', $habitatId, \PDO::PARAM_INT);
        $query->execute();
        $animals = $query->fetchAll($pdo::FETCH_ASSOC);
        $animalEntities = [];
        foreach ($animals as $animal) {
            $animalEntity = new Animal();
            foreach ($animal as $key => $value) {
                $animalEntity->{'set' . StringTools::toPascalCase($key)}($value);
            }
            $animalEntities[] = $animalEntity;
        }
        return $animalEntities;
    }
}
