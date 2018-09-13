<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationList;

Abstract Class JsonController extends AbstractController
{

    /**
     * This method returns a JSON-formatted error response to be used when violations have been raised
     * @param ConstraintViolationList $violationList
     * @return JsonResponse
     */
    protected function displayViolationMessages(ConstraintViolationList $violationList): JsonResponse
    {
        $messages = [];

        foreach($violationList as $violation){
            /** @var $violation ConstraintViolationInterface */
            $messages[$violation->getPropertyPath()][] = $violation->getMessage();
        }

        return $this->json($messages, 400);
    }

}