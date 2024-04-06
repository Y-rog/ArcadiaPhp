<?php

namespace App\Repository;

use App\Entity\Review;
use App\Db\Mysql;
use App\Tools\StringTools;

class ReviewRepository extends Repository
{
    public function findAll()
    {
        $query = $this->pdo->prepare('SELECT * FROM review');
        $query->execute();
        $reviews = $query->fetchAll($this->pdo::FETCH_ASSOC);
        $reviewEntities = [];
        if ($reviews) {
            foreach ($reviews as $review) {
                $reviewEntities[] = Review::createAndHydrate($review);
            }
        }

        return $reviewEntities;
    }

    public function insert(Review $review)
    {
        $query = $this->pdo->prepare('INSERT INTO review (user_name, content) VALUES (:user_name, :content)');
        $query->bindValue(':user_name', $review->getUserName(), $this->pdo::PARAM_STR);
        $query->bindValue(':content', $review->getContent(), $this->pdo::PARAM_STR);
        $query->execute();
    }

    public function delete(Review $review)
    {
        $query = $this->pdo->prepare('DELETE FROM review WHERE id = :id');
        $query->bindValue(':id', $review->getId(), $this->pdo::PARAM_INT);
        $query->execute();
    }
}
