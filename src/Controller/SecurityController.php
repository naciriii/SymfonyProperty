<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $au)
    {
    	$lu = $au->getLastUsername();
    	$lae = $au->getLastAuthenticationError();
        return $this->render('security/login.html.twig',[
        	'last_username' => $lu,
        	'error' => $lae
        ]);
    }
   
}
