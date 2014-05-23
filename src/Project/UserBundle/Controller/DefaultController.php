<?php

namespace Project\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjectUserBundle:Default:index.html.twig', array('name' => $name));
    }
    public function adminAction()
    {
    	echo 'hola admin';exit;
        return $this->render('ProjectUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
