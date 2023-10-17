<?php 
include_once 'models/sessionManager';

use PHPUnit\Framework\TestCase;

class sessiontests extends TestCase {

    public function setUp(){
        session_unset();
        session_destroy();
    }
    public function testUserCheck()
    {
        $session = new sessionManager();
    
        $this->assertSame(false, $session -> IsUserLogIn());
    }
    public function testLoginName()
    {
        $_SESSION['name'] = 'test';
        $session = new sessionManager();
    
        $this->assertSame('test', $session -> getLogInUsername());
    }
    public function testgetcart_notloggedin()
    {
        $session = new sessionManager();
        $this->assertSame('test', $session -> getCart());
    }
}