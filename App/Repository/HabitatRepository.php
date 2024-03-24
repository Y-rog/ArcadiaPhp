<?php

namespace App\Repository;

use App\Entity\Habitat;
use App\Db\Mysql;
use App\Tools\StringTools;

class HabitatRepository
{
    public function findOneById(int $id)
    {
        //Appel bdd
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM habitat WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $habitat = $query->fetch($pdo::FETCH_ASSOC);
        $habitatEntity = new Habitat();

        /*
        $habitatEntity->setId($habitat['id']);
        $habitatEntity->setName($habitat['name']);
        $habitatEntity->setDescription($habitat['description']);*/

        foreach ($habitat as $key => $value) {
            $habitatEntity->{'set' . StringTools::toPascalCase($key)}($value);
        }

        return $habitatEntity;
    }

    public function findAll()
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM habitat');
        $query->execute();
        $habitats = $query->fetchAll($pdo::FETCH_ASSOC);
        $habitatEntities = [];
        foreach ($habitats as $habitat) {
            $habitatEntity = new Habitat();
            foreach ($habitat as $key => $value) {
                $habitatEntity->{'set' . StringTools::toPascalCase($key)}($value);
            }
            $habitatEntities[] = $habitatEntity;
        }
        return $habitatEntities;
    }
}
