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
		$project->setPublished(true);
		$project->setDate(new \DateTime($date));
		$project->setImage("wolf.png");

		$manager->persist($project);

		$manager->flush();
	}

}