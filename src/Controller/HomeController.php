<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController 
{

	public function __construct(Environment $twig)
	{
       
		$this->twig = $twig;

	}
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return new Response($this->twig->render("home/index.html.twig", [
        	'current_page' => "test"]));
    }
}
