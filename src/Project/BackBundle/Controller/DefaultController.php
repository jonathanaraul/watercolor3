<?php

namespace Project\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->render('ProjectBackBundle:Default:index.html.twig', array('name' => ''));
    }
    public static function promover(){

    	$userManager = $this->container->get('fos_user.user_manager');
    	$user = $this->getUser();
    	$user-> addRole( 1);
        $userManager->updateUser($user);

    }
}
