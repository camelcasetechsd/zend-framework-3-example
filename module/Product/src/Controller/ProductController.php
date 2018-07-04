<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductController extends AbstractActionController
{
    public function indexAction()
    {
        //echo 'ok'; die;
        $users = $this->getObjectManager()->getRepository('\Application\Entity\User')->findAll();
        return new ViewModel(array('products' => $products));
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }
}
