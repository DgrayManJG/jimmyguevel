<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request)
    {
        $user = $this->getUser();
        if ($user instanceof UserInterface) {
            return $this->redirectToRoute('home');
        }

        /** @var AuthenticationException $exception */
        $exception = $this->get('security.authentication_utils')
            ->getLastAuthenticationError();

        return $this->render('default/login.html.twig', [
            'error' => $exception ? $exception->getMessage() : NULL,
        ]);
    }
}
