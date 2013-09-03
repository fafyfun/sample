<?php
/**
 * Created by PhpStorm.
 * User: indika
 * Date: 8/27/13
 * Time: 3:06 PM
 */

namespace Inventry\Controller;


use Inventry\Model\Product;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Inventry\Form\InventryFrom;

class InventryController extends AbstractActionController {

    protected $productTable;

    public function indexAction(){
        return new ViewModel(array('product'=>$this->getProduct()->fetchAll()));

    }
    public function addAction(){

        $form = new InventryFrom();
        $form->get('submit')->setValue('Add');

        //$request = $this->getRequest();
/*        if ($request->isPost()) {
            $album = new Product();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

/*            if ($form->isValid()) {
                $album->exchangeArray($form->getData());
                $this->getProduct()->saveAlbum($album);

                // Redirect to list of albums
                return $this->redirect()->toRoute('inventry');
            }
        }*/
        return array('form' => $form);

/*        $form = new InventryFrom();
        $form->get('submit')->setValue('Add');

        $request= $this->getRequest();

        if($request->isPost()){
            $product = new Product();
            $form->setInputFilter($product->getInputFilter());
            $form->setData($request->getPost);

            if($form->isValid()){
                $product->exchangeArray($form->getData());
                $this->getProduct()->saveProduct($product);

                return $this->redirect()->toRoute('inventry');
            }
        }
      return array('form'=>$form);*/
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