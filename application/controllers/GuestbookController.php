<?php

class GuestbookController extends Zend_Controller_Action
{

	public function init()
	{
		$auth = Zend_Auth::getInstance();
		if (!$auth->hasIdentity()) {
			return $this->_helper->redirector('index', 'auth');
		}

		$sdf = new Formatter_test();
	}

	public function indexAction()
	{
		$guestbook = new Application_Model_GuestbookMapper();
		$this->view->entries = $guestbook->fetchAll();
		$this->view->messages = $this->_helper->flashMessenger->getMessages();
		
	}

	public function signAction()
	{
		$request = $this->getRequest();
		$form    = new Application_Form_Guestbook();
		$mapper  = new Application_Model_GuestbookMapper();
		$blog_id = $this->getRequest()->getParam('id');

		if($blog_id){
			$formData = $mapper->find($blog_id);
			$form->populate($formData);
		}

		if ($this->getRequest()->isPost()) {
			if ($form->isValid($request->getPost())) {
				$comment = new Application_Model_Guestbook($form->getValues());
				$mapper->save($comment);
				$this->_helper->flashMessenger->addMessage('Saved');
				return $this->_helper->redirector('index');
			}
		}

		$this->view->form = $form;
	}

	public function deleteAction()
	{
		$blog_id = $this->getRequest()->getParam('id');

		if ($blog_id) {
			$mapper  = new Application_Model_GuestbookMapper();
			$mapper->delete($blog_id);
		}

		$this->_helper->flashMessenger->addMessage('Deleted');
		return $this->_helper->redirector('index');
	}

}
