<?php 
include_once 'models/sessionManager';

use PHPUnit\Framework\TestCase;

class sessiontests extends TestCase {

    public function setUp(): void{
        session_start();
        session_unset();
        session_destroy();
    }
    public function testLoginSession()
    {
        $session = new sessionManager();

        $session -> LogInUserSession('test', 1, 'admin');

        $this->assertTrue($session -> IsUserLogIn());
        $this->assertSame('test', $session->getLogInUsername());
        $this->assertSame(1, $session->getLogInUserId());
        $this->assertSame('admin', $session->getLogInRole());
    }
    public function testLogoutSession()
    {
        session_start();
        $_SESSION['name'] = 'test';
        $_SESSION['userId'] = 1;
        $_SESSION['role'] = 'admin';
        $session = new sessionManager();

        $session -> LogoutUserSession();

        $this->assertFalse($session -> IsUserLogIn());
        $this->assertNull($session->getLogInUsername());
        $this->assertNull($session->getLogInUserId());
        $this->assertNull($session->getLogInRole());
    }
    public function testUserCheck_LoggedOut()
    {
        $session = new sessionManager();

        $this->assertFalse($session -> IsUserLogIn());
    }
    public function testUserCheck_Loggedin()
    {
        $_SESSION['name'] = 'test'; 
        $session = new sessionManager();
    
        $this->assertTrue($session -> IsUserLogIn());
    }
    public function testLoginName()
    {
        $_SESSION['name'] = 'test';
        $session = new sessionManager();
    
        $this->assertSame('test', $session -> getLogInUsername());
    }
    public function testLoginId()
    {
        $_SESSION['userId'] = 1;
        $session = new sessionManager();
    
        $this->assertSame(1, $session -> getLogInUserId());
    }
    public function testLoginRole()
    {
        $_SESSION['role'] = 'admin';
        $session = new sessionManager();
    
        $this->assertSame('admin', $session -> getLogInRole());
    }
    public function testcleancart()
    {
        session_start();
        $_SESSION['cart'] = [1 => 2, 5  => 3];
        $session = new sessionManager();

        $session -> CleanCart();

        $this->assertSame([], $session -> getCart());
    }
    public function testgetcart_NotLoggedin()
    {
        $session = new sessionManager();
        $this->assertSame([], $session -> getCart());
    }
    public function testgetcart_Loggedin_Empty()
    {
        $_SESSION['name'] = 'test';
        $_SESSION['cart'] = [];
        $session = new sessionManager();
        $this->assertSame([], $session -> getCart());
    }
    public function testgetcart_Loggedin_NotEmpty()
    {
        $_SESSION['name'] = 'test'; 
        $_SESSION['cart'] = [1 => 2, 5  => 3]; 
        $session = new sessionManager();
        $this->assertSame([1 => 2, 5  => 3], $session -> getCart());
    }
}