<?php

namespace Coders\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CodersCoreBundle:Default:index.html.twig');
    }
}
