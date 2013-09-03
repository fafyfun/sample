<?php
/**
 * Created by PhpStorm.
 * User: indika
 * Date: 8/28/13
 * Time: 3:58 PM
 */

namespace Inventry\Model;


use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Product implements InputFilterAwareInterface {

    public $product_id;
    public $product_name;
    public $product_description;
    protected $inputFilter;

    public function exchangeArray($data){
        $this->product_id = (!empty($data['id'])) ? $data['id'] :null;
        $this->product_name = (!empty($data['name'])) ? $data['name'] :null;
        $this->product_description = (!empty($data['description'])) ? $data['description'] :null;

    }


    /**
     * Set input filter
     *
     * @param  InputFilterInterface $inputFilter
     * @return InputFilterAwareInterface
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {

       throw new \Exception("Not Used");
    }

    /**
     * Retrieve input filter
     *
     * @return InputFilterInterface
     */
    public function getInputFilter()
    {
        if(!$this->inputFilter){
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

       /*     $inputFilter ->add($factory->createInput(array(
                'name'=>'product_id',
                'required'=>true,
                'filters'=>array(
                    array('name'=>'int')
                )
            )));*/

           /* $inputFilter->add($factory->createInput(array(
                    'name'=>'product_name',
                    'required'=>true,
                    'filters'=>array(
                        array('name'=>'StripTags'),
                        array('name'=>'StripTrim'),
                    ),
                    'validators'=>array(
                        array(
                            'name'=>'StringLength',
                            'options'=>array(
                                'encoding' => 'UTF-8',
                                'min'=> 1,
                                'max'=> 100,
                            )
                        )
                    )
                )
                )
            );
            $inputFilter->add($factory->createInput(array(
                    'name'=>'product_description',
                    'required'=>true,
                    'filters'=>array(
                        array('name'=>'StripTags'),
                        array('name'=>'StripTrim'),
                    ),
                    'validators'=>array(
                        array(
                            'name'=>'StringLength',
                            'options'=>array(
                                'encoding' => 'UTF-8',
                                'min'=> 1,
                                'max'=> 100,
                            )
                        )
                    )
                ))
            );*/

        }

        return $this->inputFilter;
    }
}