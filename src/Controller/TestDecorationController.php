<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestDecorationController extends AbstractController
{
    #[Route('/test', name: 'app_testing_decoration')]
    public function index(): Response
    {
        return $this->render('testing_stuff/index.html.twig');
    }
}
