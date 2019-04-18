<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends AbstractController
{

	public function __construct(PropertyRepository $pr, $em, $twig)
	{
		$this->repository = $pr;
		$this->em = $em;
		$this->twig = $twig;
		
	}
    /**
     * @Route("/property", name="properties.index")
     */
    public function index()
    {
    	/*$property = new Property();
    	$property->setTitle("test ");
    	$property->setDescription("test description");
    	$property->setSurface(200);
    	$property->setPrice(206);
    	$property->setRooms(5);
    	$property->setBedrooms(3);
    	$property->setFloor(4);
    	$property->setHeat(1);
    	$property->setCity("tunis");
    	$property->setPostalCode(5000);
    	$property->setAddress("tunios tes add");
    	$em = $this->getDoctrine()->getManager();
    		
    
    		$em->persist($property);
    		$em->flush();*/
    		$properties = $this->repository->findAll();
    		


        return $this->render('property/index.html.twig', [
            'current_page' => 'properties',
            'properties' => $properties
        ]);
    }
    
}
