<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\entity\Property;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        // 
        // 
    	for($i =0 ; $i<100; $i++) {
    		$prop = new Property();
    		$prop->setTitle("prop".$i);
    		$prop->setDescription("description test".$i);
    		$prop->setSurface(2);
    		$prop->setRooms(4);
    		$prop->setBedrooms(4);
    		$prop->setFloor(1);
    		$prop->setPrice(102);
    		$prop->setHeat(1);
    		$prop->setCity("tunisia");
    		$prop->setAddress("tunisia");
    		$prop->setPostalcode("25000");
    		$manager->persist($prop);
    	}

        $manager->flush();
    }
}
