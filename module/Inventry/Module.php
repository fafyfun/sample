<?php
namespace Inventry;

use Inventry\Model\Product;
use Inventry\Model\ProductTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig(){
        return array(
            'factories'=> array(
                'Inventry\Model\ProductTable'=> function($sm){
                    $tabelGateway = $sm->get('ProductTableGateway');
                    $table = new ProductTable($tabelGateway);
                    return $table;
                },
                'ProductTableGateway' => function($sm){
                    $dbAdpater = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype= new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Product());
                    return new TableGateway('product',$dbAdpater,null,$resultSetPrototype);
                }
            ),
        );
    }
}
