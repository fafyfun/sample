<?php
/**
 * Created by PhpStorm.
 * User: indika
 * Date: 8/27/13
 * Time: 3:06 PM
 */

namespace Inventry\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class InventryController extends AbstractActionController {

    protected $productTable;

    public function indexAction(){
        return new ViewModel(array('product'=>$this->getProduct()->fetchAll()));

    }
    public function addAction(){

    }
    public function editAction(){

    }
    public function deleteAction(){

    }

    public function getProduct(){

        if(!$this->productTable){
            $sm = $this->getServiceLocator();
            $this->productTable = $sm->get('Inventry\Model\ProductTable');
        }
        return $this->productTable;

    }

} 