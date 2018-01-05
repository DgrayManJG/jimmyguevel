<?php

namespace App\Controller\Scraping;

use App\Entity\Citation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CitationController
{
    /**
     * @Route("/citation", name="citation")
     * @param $doctrine RegistryInterface
     */
    public function index(RegistryInterface $doctrine)
    {
        for($i = 1; $i < 100; $i++){
            $url = "http://citation-celebre.leparisien.fr/liste-citation?nationalite=france&page=".$i."";
            $client = new Client();
            $crawler = $client->request('GET', $url);

            $citations = $crawler->filter('p.laCitation')->extract("_text");
            $citations = str_replace("\t", "", $citations);
            $citations = str_replace("\n", "", $citations);

            $auteurs = $crawler->filter('div.auteur')->extract("_text");
            $auteurs = str_replace("\t", "", $auteurs);
            $auteurs = str_replace("\n", "", $auteurs);

            for($i = 0; $i < sizeof($citations); $i++){
                $citation = new Citation();
                $citation->setCitation($citations[$i]);
                $citation->setAuthor($auteurs[$i]);

                $em = $doctrine->getManager();
                $em->persist($citation);
                $em->flush();

                echo $citations[$i] . "  " . $auteurs[$i] . "<br>";
            }
        }
        exit;
    }
}
