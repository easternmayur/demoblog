<?php
//include_once dirname(__FILE__).'/formatter/test.php';
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initDoctype()
    {
    	$this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }

    public function _initAutoload(){
    	$autoloader = new Zend_Application_Module_Autoloader(array(
		    'basePath'  => dirname(__FILE__),
		    'namespace' => 'Formatter_',
		));
    	$autoloader->addResourceType('formatter', 'formatter/', 'Formatter_');
        
        return $autoloader;
    //Zend_Loader_Autoloader::getInstance()->registerNamespace('Formatter_');
    }

}

