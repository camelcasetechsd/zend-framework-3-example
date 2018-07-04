<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Repository\ProductRepository;

class ProductController extends AbstractActionController
{
    public function indexAction()
    {
        //echo 'ok'; die;
        //$products = new Product\src\Repository\ProductRepository();
        //$data = $products->findPublishedProducts();
        return new ViewModel(array('products' => $data));
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
