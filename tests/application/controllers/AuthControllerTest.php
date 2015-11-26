<?php

class AuthControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testIndexActionShouldContainLoginForm()
    {
        $this->dispatch('/auth');
        $this->assertAction('index');
        $this->assertQueryCount('form#login', 1);
    }


}

