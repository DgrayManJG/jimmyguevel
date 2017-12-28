<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController
{
    /**
     * @Route("/", name="home")
     * @param $twig Environment
     * @return twig
     */
    public function index(Environment $twig)
    {
        return new Response($twig->render('home.html.twig'));
    }
}
