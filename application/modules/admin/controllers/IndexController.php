<?php

class Admin_IndexController extends Zend_Controller_Action
{

	function indexAction(){
		$this->view->test = "Hello";
	}
   
}

