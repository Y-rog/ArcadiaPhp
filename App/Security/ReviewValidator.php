<?php

namespace App\Security;

use App\Entity\Review;


class ReviewValidator extends Security
{

    public function validate(Review $review): array
    {
        $errors = [];
        if (empty($review->getUserName())) {
            $errors['user_name'] = 'Le prénom est obligatoire';
        }
        if (empty($review->getContent())) {
            $errors['content'] = 'Le contenu est obligatoire';
        }
        return $errors;
    }
}
