<?php

namespace Coders\Bundle\AspectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CodersAspectBundle:Default:index.html.twig', array('name' => $name));
    }
}
