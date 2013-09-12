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

        $request= $this->getRequest();

          if($request->isPost()){


             $product = new Product();
             $form->setInputFilter($product->getInputFilter());
             $form->setData($request->getPost());

               if($form->isValid()){
                  $product->exchangeArray($form->getData());
                  $this->getProduct()->saveProduct($product);

                  return $this->redirect()->toRoute('inventry');
              }
          }
      return array('form'=>$form);
    }
    public function editAction(){

        $id = (int) $this->params()->fromRoute('id',0);
        if(!$id){
            return $this->redirect()->toRoute('inventry',array(
                'action'=>'add'
            ));
        }

        try{
            $product = $this->getProduct()->getProduct($id);
        }catch (\Exception $ex){
            return $this->redirect()->toRoute('inventry',array(
                'action'=>'index'
            ));
        }

        $from = new InventryFrom();
        print_r($product);
        $from->bind($product);
        $from->get('submit')->setValue('Edit');

        $request = $this->getRequest();

        if($request->isPost()){
            $from->setInputFilter($product->getInputFilter());
            $from->setData($request->isPost());

            if($from->isValid()){
                $this->getProduct()->saveProduct($product);
                return $this->redirect()->toRoute('inventry');
            }

        }

        return array(
            'product_id'=> $id,
            'form'=>$from
        );

    }
    public function deleteAction(){
        $id = (int) $this->params()->fromRoute('id',0);
        if(!$id){
            return $this->redirect()->toRoute('inventry');
        }

        $request= $this->getRequest();


    }

    public function getProduct(){

        if(!$this->productTable){
            $sm = $this->getServiceLocator();
            $this->productTable = $sm->get('Inventry\Model\ProductTable');
        }
        return $this->productTable;
    }

} 