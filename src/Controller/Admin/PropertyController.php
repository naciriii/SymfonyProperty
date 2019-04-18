<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PropertyRepository;
use App\Entity\Property;
use App\Form\PropertyType;

class PropertyController extends AbstractController
{
    public function __construct(PropertyRepository $pr)
    {
        $this->repository = $pr;
    }

    /**
     * @Route("admin/property", name="Admin.property.index")
     * @return [type] [description]
     */
    public function index()
    {
        $properties = $this->repository->findAll();

        return $this->render('admin/property/index.html.twig', ['properties' => $properties]);
    }
    /**
     * @Route("admin/property/edit/{property}", name="admin.property.edit")
     */
    public function edit(Property $property, Request $request)
    {
    	$form  = $this->createForm(Propertytype::class, $property);
    	$form->handleRequest($request);

    	if($form->isSubmitted() && $form->isValid()) {
    		dump($form);
    		die();
    	}
    	
    	
    	return $this->render('admin/property/edit.html.twig',
    		['property' => $property,
    		'form' => $form->createView()
    	 ]);



    }
}
