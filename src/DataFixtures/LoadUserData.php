<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadUserData extends Fixture
{
	private $encoder;

	public function __construct(UserPasswordEncoderInterface $encoder) {
		$this->encoder = $encoder;
	}

	public function load(ObjectManager $manager)
	{
		$user = new User();
		$user->setFirstname("Jimmy");
		$user->setLastname("GUEVEL");
		$user->setUsername("DgrayMan");
		$plainPassword = 'Oasisisgood9';
		$encoded = $this->encoder->encodePassword($user, $plainPassword);
		$user->setPassword($encoded);
		$user->setMail("jimmygue@hotmail.fr");
		$manager->persist($user);

		$manager->flush();
	}

}