<?php

namespace Example\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Example\Service\ExampleService;

class IndexController extends AbstractActionController
{
    private $exampleService;

    public function __construct(ExampleService $exampleService)
    {
        $this->exampleService = $exampleService;
    }

    public function indexAction()
    {
        $view = new ViewModel();

        $view->something = $this->exampleService->returnSomething();

        return $view;
    }
}
