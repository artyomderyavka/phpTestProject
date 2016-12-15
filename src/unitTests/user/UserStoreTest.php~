<?php
require_once 'UserStore.php';
use PHPUnit\Framework\TestCase;

class UserStoreTest extends TestCase
{
    private $store;

    public function setUp()
    {
        $this->store = new UserStore();
    }

    public function tearDown()
    {
        
    }
    
    public function testGetUser()
    {
         $this->store->addUser("testUser", "test@gmail.com", "password");
         $user = $this->store->getUser("test@gmail.com");  
         $this->assertEquals($user['mail'], 'test@gmail.com');
         $this->assertEquals($user['name'], 'testUser');
         $this->assertEquals($user['pass'], 'password');

         $this->store->removeUser($user['mail']);
         //var_dump($this->store);

         return $this->store;
    }
    
    /**
     * @depends testGetUser
     */
    public function testRemoveUserFailed($store)
    {
        $this->setExpectedException("Exception");
        $store->removeUser("test@gmail.com");
    }
}
