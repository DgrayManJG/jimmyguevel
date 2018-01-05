<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class ContactController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param $twig Environment
     * @param $formFactory FormFactoryInterface
     * @param $doctrine RegistryInterface
     * @param $flashbag FlashBagInterface
     * @return redirect
     */
    public function index(Request $request, Environment $twig, RegistryInterface $doctrine, FormFactoryInterface $formFactory, FlashBagInterface $flashbag)
    {
        $contact = new Contact();
        $form = $formFactory->createBuilder(ContactType::class, $contact)->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($contact);
            $em->flush();

            $flashbag->add("success", "Le message à bien été transmit.");
        }

        return new Response($twig->render('contact.html.twig', [
            'form' => $form->createView()
        ]));
    }
}
