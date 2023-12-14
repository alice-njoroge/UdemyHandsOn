<?php

namespace App\Controller;


use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class HelloController extends AbstractController
{
    private array $messages = [
        ['title'=>'Hallo', 'created'=>'2023/06/12'],
        ['title'=>'Guten Tag', 'created'=>'2023/07/12'],
        ['title'=>'Guten Abend', 'created'=>'2021/07/12'],
    ];

    #[Route('/{limit?3}', name: 'app_index')]
    public function index(int $limit): Response
    {
        return $this->render(
            'index.html.twig',
            [
                'messages' => $this->messages,
                'limit' => $limit
            ]
        );
    }

    #[Route('/messages/{id}', name: 'app_show', requirements: ['id' => Requirement::DIGITS])]
    public function showOne(int $id): Response
    {
        return $this->render(
            'show.html.twig',
            ['message' => $this->messages[$id]]
        );
    }

}