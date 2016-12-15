<?php

require_once 'UserStore.php';
require_once 'Validator.php';

use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function testValidate_FalsePass()
    {
	$store = $this->createMock("UserStore");

	$this->validator = new Validator($store);

        $store->expects($this->once())
              ->method("notifyPasswordFailure")
              ->with($this->equalTo('bob@example.com'));
        

	$store->expects($this->once())
              ->method("getUser")
              ->will($this->returnValue(['name' => 'bob',
                                         'mail' => 'bob@example.com',
                                         'pass' => 'right'
                                        ]));

        $this->validator->validateUser('bob@example.com', 'wrong');

    }

    public function testValidate_TruePass()
    {
	$store = $this->createMock("UserStore");

	$this->validator = new Validator($store);

        $store->expects($this->never())
              ->method("notifyPasswordFailure")
              ->with($this->equalTo('bob@example.com'));
        

	$store->expects($this->once())
              ->method("getUser")
              ->will($this->returnValue(['name' => 'bob',
                                         'mail' => 'bob@example.com',
                                         'pass' => 'right'
                                        ]));

        $this->validator->validateUser('bob@example.com', 'right');

    }
}
