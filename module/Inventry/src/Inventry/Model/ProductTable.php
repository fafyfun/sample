<?php
/**
 * Created by PhpStorm.
 * User: indika
 * Date: 8/28/13
 * Time: 4:19 PM
 */

namespace Inventry\Model;


use Zend\Db\TableGateway\TableGateway;

class ProductTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway){
        $this->tableGateway = $tableGateway;

    }

    public function fetchAll(){
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getProduct($product_id){
        $product_id = (int) $product_id;
        $rowset = $this->tableGateway->select(array('product_id'=>$product_id));
        $row = $rowset->current();

        //print_r($row);

        if (!$row){
            throw new \Exception("Could Not Find Row");
        }

        return $row;
    }

    public function saveProduct(Product $newProduct){
        $data = array(
            'product_name'=> $newProduct->product_name,
            'product_description' => $newProduct->product_description
        );
        $product_id = (int)$newProduct->product_id;

        if($product_id==0){
            $this->tableGateway->insert($data);
        }else{
            if($this->getProduct($product_id)){
                $this->tableGateway->update($data, array('product_id'=>$product_id));
            }else{
                throw new \Exception('Form id does not match with db');
            }
        }
    }

    public function deleteProduct($product_id){
        if($this->getProduct($product_id)){
            $this->tableGateway->delete(array('product_id'=>$product_id));
        }else{
            throw new \Exception('Form id does not match with db');
        }
    }

} 