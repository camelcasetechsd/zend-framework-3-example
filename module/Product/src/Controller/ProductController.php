<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function newAction()
    {
        return new ViewModel();
    }
    public function editAction()
    {
        return new ViewModel();
    }
    public function showAction()
    {
        return new ViewModel();
    }
    public function deleteAction()
    {
        return new ViewModel();
    }
}
