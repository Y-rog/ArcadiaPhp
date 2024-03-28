<?php

namespace App\Repository;

use App\Entity\Animal;
use App\Db\Mysql;
use App\Tools\StringTools;

class AnimalRepository extends Repository
{
    public function findOneById(int $id)
    {
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

    public function insert(Animal $animal)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        if ($animal->getId() === null) {
            $query = $pdo->prepare('INSERT INTO animal (firstname, race, image, habitat_id) VALUES (:firstname, :race, :image, :habitat_id)');
            $query->bindValue(':firstname', $animal->getFirstname(), \PDO::PARAM_STR);
            $query->bindValue(':race', $animal->getRace(), \PDO::PARAM_STR);
            $query->bindValue(':image', $animal->getImage(), \PDO::PARAM_STR);
            $query->bindValue(':habitat_id', $animal->getHabitatId(), \PDO::PARAM_INT);
            $query->execute();
            return $pdo->lastInsertId();
        } else {
            $query = $pdo->prepare('UPDATE animal SET firstname = :firstname, race=:race, image=:image, habitat_id=:habitat_id WHERE id = :id');
            $query->bindValue(':id', $animal->getId(), \PDO::PARAM_INT);
            $query->bindValue(':firstname', $animal->getFirstname(), \PDO::PARAM_STR);
            $query->bindValue(':race', $animal->getRace(), \PDO::PARAM_STR);
            $query->bindValue(':image', $animal->getImage(), \PDO::PARAM_STR);
            $query->bindValue(':habitat_id', $animal->getHabitatId(), \PDO::PARAM_INT);
            $query->execute();
            return $animal->getId();
        }
                
    }

    public function delete(int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('DROP FROM animal WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
    }

}

