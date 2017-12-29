<?php
namespace App\DataFixtures;

use App\Entity\project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProjectData extends Fixture
{

	public function load(ObjectManager $manager)
	{
		date_default_timezone_set('Europe/Paris');
		$date = date("Y-m-d");

		$project = new Project();

		$project->setTitle("API wood-designer");
		$project->setContent("Blablabla");
		$project->setLink("https://www.wood-designer.fr/#/home");
		$project->setPublished(true);
		$project->setDate(new \DateTime($date));
		$project->setImage("Wood-Designer_visuel-generique2.jpg");

		$manager->persist($project);

		$manager->flush();
	}

}