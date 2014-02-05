<?php

namespace Coders\Bundle\CoreBundle\Controller;

use Coders\Bundle\CoreBundle\Data\Entry;
use Coders\Bundle\CoreBundle\Data\Repository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->_renderList();
    }

    public function deleteAction($valueA, $valueB) {
        $entry = new Entry(array('valueA' => $valueA, 'valueB' => $valueB));
        $this->_getRepository()->delete($entry);
        return $this->_renderList();
    }

    public function addAction(Request $request) {
        $form = $this->_getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entry = $form->getData();
            $this->_getRepository()->add($entry);
        }

        return $this->_renderList();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function _renderList()
    {
        $form = $this->_getForm();

        return $this->render('CodersCoreBundle:Default:index.html.twig', array(
            'entries' => $this->_getRepository()->getAll(),
            'form' => $form->createView(),
        ));
    }

    /**
     * @return Repository
     */
    private function _getRepository() {
        return $this->container->get('data.repository');
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    private function _getForm()
    {
        $entry = new Entry();
        $form = $this->createFormBuilder($entry)
            ->setAction($this->generateUrl('coders_core_add'))
            ->add('valueA', 'text')
            ->add('valueB', 'text')
            ->add('save', 'submit')
            ->getForm();
        return $form;
    }
}
