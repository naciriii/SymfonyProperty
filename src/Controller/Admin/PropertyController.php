<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PropertyRepository;
use App\Entity\Property;
use App\Form\PropertyType;
use Doctrine\Common\Persistence\ObjectManager;
use  Knp\Component\Pager\PaginatorInterface;

class PropertyController extends AbstractController
{
    public function __construct(PropertyRepository $pr, ObjectManager $em)
    {
        $this->repository = $pr;
        $this->em = $em;

    }

    /**
     * @Route("admin/property", name="admin.property.index")
     * @return [type] [description]
     */
    public function index(PaginatorInterface $paginator, Request $request)
    {
        $page = $request->get('page') ?? 1;
       
        $query = $this->repository->createQueryBuilder('c')
    ->getQuery();
    

            $properties = $paginator->paginate($query, $page, 10);
          


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
    		$this->em->flush();
    		 $this->addFlash("success", $property->getTitle()." was updated successfully!");
               return $this->redirectToRoute("admin.property.index");
    	}
    	
    	
    	return $this->render('admin/property/edit.html.twig',
    		['property' => $property,
    		'form' => $form->createView()
    	 ]);
    }

    /**
     * @Route("admin/property/create", name="admin.property.create")
     */
    public function create(Request $request)
    {
        $property = new Property();

        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($property);
            $this->em->flush();
            $this->addFlash("success", $property->getTitle()." was created successfully!");
            return $this->redirectToRoute("admin.property.index");

        }

        return $this->render("admin/property/create.html.twig", ['form' => $form]);
    }

    /**
     * @Route("admin/property/delete/{property}", name="admin.property.delete")
     */
    public function delete(Property $property)
    {
        $this->em->remove($property);
        
        $this->addFlash("success",$property->getTitle()." was deleted successfully");
        $this->em->flush();
        return $this->redirectToRoute("admin.property.index");


    }
}
