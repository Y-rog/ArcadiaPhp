<?php

namespace App\Repository;

use App\Entity\Review;
use App\Db\Mysql;
use App\Tools\StringTools;

class ReviewRepository extends Repository
{

    public function count()
    {
        $query = $this->pdo->query('SELECT COUNT(id) FROM review');
        return (int)$query->fetch($this->pdo::FETCH_NUM)[0];
    }

    public function showPageReviews($currentPage, $perPage)
    {
        // On récupère la page demandée
        $currentPage = (int)($_GET['page'] ?? 1);
        if ($currentPage < 1) {
            $currentPage = 1;
        }
        var_dump($currentPage);
        // On récupère le nombre total d'avis'
        $count = $this->count();
        var_dump($count);

        //On définit le nombre d'avis par page
        $perPage = 2;
        var_dump($perPage);

        //détermine le nombre de pages en arrondissant au supérieur
        $pages = ceil($count / $perPage);
        var_dump($pages);
        if ($currentPage > $pages) {
            $currentPage = $pages;
        }

        // On calcule les articles à afficher ex:page 1 => artciles de 0 à 10 page 2 => articles de 10 à 20
        $offset = ($currentPage - 1) * $perPage;
        var_dump($offset);

        // On récupère les articles par pages
        $reviews = $this->pdo->query('SELECT * FROM review LIMIT ' . $perPage . ' OFFSET ' . $offset)->fetchAll($this->pdo::FETCH_ASSOC);
        var_dump($reviews);

        //On hydrate les articles
        $reviewEntities = [];
        if ($reviews) {
            foreach ($reviews as $review) {
                $reviewEntities[] = Review::createAndHydrate($review);
            }
        }
        return $reviewEntities;
        var_dump($reviewEntities);
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
