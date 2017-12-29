<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Twig\Environment;

class HomeController
{
    /**
     * @Route("/", name="home")
     * @param $twig Environment
     * @param $doctrine RegistryInterface
     * @param $formFactory FormFactoryInterface
     * @return twig
     */
    public function index(Environment $twig, RegistryInterface $doctrine)
    {
        $projects = $doctrine->getRepository(Project::class)->findAll();

        return new Response($twig->render('home.html.twig', [
            'projects' => $projects
        ]));
    }
}
