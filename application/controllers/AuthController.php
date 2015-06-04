<?php

class AuthController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
	}

	public function indexAction()
	{
		$login_form = new Application_Form_Login();
		$request = $this->getRequest();
		if ($request->isPost()) {
			if ($login_form->isValid($request->getPost())) {
				if($this->_process($login_form->getValues())){
					$this->_helper->redirector('index', 'guestbook');
				}
			}
		}
		$this->view->form = $login_form;
	}

	public function _process($formValues){
    	// Get our authentication adapter and check credentials
		$dbAdapter = Zend_Db_Table::getDefaultAdapter();
		$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

		$authAdapter->setTableName('users')
		->setIdentityColumn('username')
		->setCredentialColumn('password')
		->setCredentialTreatment('SHA1(CONCAT(?,salt))');

		//$adapter = $this->_getAuthAdapter();
		$authAdapter->setIdentity($formValues['username']);
		$authAdapter->setCredential($formValues['password']);

		$auth = Zend_Auth::getInstance();
		$result = $auth->authenticate($authAdapter);
		if ($result->isValid()) {
			$user = $authAdapter->getResultRowObject();
			$auth->getStorage()->write($user);
			return true;
		}else{
			switch ($result->getCode()) {

				case Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND:
				echo "Wrong Username";
				break;

				case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
				echo "Wrong Password";
				break;

				case Zend_Auth_Result::SUCCESS:
				echo "Success";
				break;

				default:
				echo "Fail";
				break;
			}
		}
		return false;
	}

	public function logoutAction(){
		Zend_Auth::getInstance()->clearIdentity();
		$this->_helper->redirector('index', 'auth');
	}


}

