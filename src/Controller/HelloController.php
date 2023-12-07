<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class HelloController
{
    private array $messages = [
        'mangoes',
        'bananas',
        'raspberries',
    ];

    #[Route('/{limit?3}', name: 'app_index')]
    public function index(int $limit): Response
    {
        return new Response(implode(' ', array_slice($this->messages, 0, $limit)));
    }

    #[Route('/messages/{id}', name: 'app_show', requirements: ['id' => Requirement::DIGITS])]
    public function showOne(int $id): Response
    {
        return new Response($this->messages[$id]);
    }

}