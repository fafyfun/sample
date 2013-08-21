<?php
/**
 * Created by PhpStorm.
 * User: indika
 * Date: 8/21/13
 * Time: 1:20 PM
 */

namespace Test\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    public function indexAction(){
        $views = new ViewModel(array('text'=>"Hello World"));
        return $views;
    }

} 