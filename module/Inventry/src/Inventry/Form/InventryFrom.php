<?php
/**
 * Created by PhpStorm.
 * User: indika
 * Date: 8/29/13
 * Time: 1:49 PM
 */

namespace Inventry\Form;


use Zend\Form\Form;

class InventryFrom extends Form {

    public function __construct(){
        parent::__construct('inventry');
        $this->setAttributes('method','post');

        $this->add(array(
                'name'=>'id',
                'type'=>'Hidden',
            ));

        $this->add(array(
            'name'=>'product_name',
            'type'=>'Text',
            'option'=> array(
                'label'=>'Name',
            )
        ));

        $this->add(array(
            'name'=>'product_description',
            'type'=>'Text',
            'option'=>array(
                'label'=>'Description'
            )
        ));

        $this->add(array(
            'name'=>'submit',
            'type'=>'Submit',
            'attributes'=>array(
                'value'=>'Go',
                'id'=>'submitbutton'
            )
        ));
    }

} 