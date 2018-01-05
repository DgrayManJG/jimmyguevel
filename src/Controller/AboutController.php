<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AboutController extends Controller
{
    /**
     * @Route("/about", name="about")
     * 
     * @param $twig Environment
     * @return twig
     */
    public function index(Environment $twig)
    {
        return new Response($twig->render('about.html.twig'));
    }
}
