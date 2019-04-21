<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
	function __construct(UserPasswordEncoderInterface $ui)
	{
		$this->encoder = $ui;
	}
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setUsername('test');
        $enc = $this->encoder->encodePassword($user, 'test');
        $user->setPassword($enc);

        $manager->persist($user);

        $manager->flush();
    }
}
