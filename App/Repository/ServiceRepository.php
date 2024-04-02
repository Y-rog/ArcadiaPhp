<?php

namespace App\Repository;

use App\Entity\Service;
use App\Entity\User;
use App\Db\Mysql;
use App\Tools\StringTools;

class ServiceRepository extends Repository
{
    public function findOneById(int $id)
    {

        $query = $this->pdo->prepare('SELECT * FROM service WHERE id = :id');
        $query->bindValue(':id', $id, $this->pdo::PARAM_INT);
        $query->execute();
        $service = $query->fetch($this->pdo::FETCH_ASSOC);
        $serviceEntity = new Service();

        /*
        $serviceEntity->setId($service['id']);
        $serviceEntity->setName($service['name']);
        $serviceEntity->setDescription($service['description']);*/

        foreach ($service as $key => $value) {
            $serviceEntity->{'set' . StringTools::toPascalCase($key)}($value);
        }

        return $serviceEntity;
    }

    public function findAll()
    {

        $query = $this->pdo->prepare('SELECT * FROM service');
        $query->execute();
        $services = $query->fetchAll($this->pdo::FETCH_ASSOC);
        $serviceEntities = [];
        foreach ($services as $service) {
            $serviceEntity = new Service();
            foreach ($service as $key => $value) {
                $serviceEntity->{'set' . StringTools::toPascalCase($key)}($value);
            }
            $serviceEntities[] = $serviceEntity;
        }
        return $serviceEntities;
    }

    public function insert(Service $service)
    {
        if ($service->getId() === null) {
            $query = $this->pdo->prepare('INSERT INTO service (name, description, image, user_id) VALUES (:name, :description, :image, :user_id)');
            $query->bindValue(':name', $service->getName(), $this->pdo::PARAM_STR);
            $query->bindValue(':description', $service->getDescription(), $this->pdo::PARAM_STR);
            $query->bindValue(':image', $service->getImage(), $this->pdo::PARAM_STR);
            $query->execute();
        } else {
            $query = $this->pdo->prepare('UPDATE service SET name = :name, description = :description, image = :image, user_id = :user_id WHERE id = :id');
            $query->bindValue(':name', $service->getName(), $this->pdo::PARAM_STR);
            $query->bindValue(':description', $service->getDescription(), $this->pdo::PARAM_STR);
            $query->bindValue(':image', $service->getImage(), $this->pdo::PARAM_STR);
            $query->bindValue(':id', $service->getId(), $this->pdo::PARAM_INT);
            $query->execute();
        }
    }


    public function delete(Service $service)
    {
        $query = $this->pdo->prepare('DELETE FROM service WHERE id = :id');
        $query->bindValue(':id', $service->getId(), $this->pdo::PARAM_INT);
        $query->execute();
    }
}
