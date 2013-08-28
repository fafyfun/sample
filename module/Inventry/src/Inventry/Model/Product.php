<?php
/**
 * Created by PhpStorm.
 * User: indika
 * Date: 8/28/13
 * Time: 3:58 PM
 */

namespace Inventry\Model;


class Product {

    public $product_id;
    public $product_name;
    public $product_description;

    public function exchangeArray($data){
        $this->product_id = (!empty($data['id'])) ? $data['id'] :null;
        $this->product_name = (!empty($data['name'])) ? $data['name'] :null;
        $this->product_description = (!empty($data['description'])) ? $data['description'] :null;

    }


} 