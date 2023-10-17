<?php 
include_once 'models/user-model-class';
include_once 'unittests/testsessionManager.php';
include_once 'unittests/testUser.php';
include_once 'unittests/testusercrud.php';
include_once 'unittests/testpagemodel.php';


use PHPUnit\Framework\TestCase;

class usermodeltest extends TestCase {
    public function testSaveUser(){
        // perpare
        $usercrud = new testusercrud();
        $usercrud->objToReturn = new testUser(6,"saveusertest");
        $PageModel = new testpagemodel();
        $user = new UserModel($PageModel, $usercrud);
        // run
        $user -> SaveUser(6,"saveusertest");
        $result = $usercrud -> SaveUser();
        // validate
        $this -> assertnotnull($result);
        $this -> assertSame(6, $result -> user["id"]);
        $this -> assertSame("saveusertest", $result -> user["name"]);
    }
    public function testGetUserWhenNoUser(){
        $testsession = new testsessionManager();
        $testsession->arrayToReturn = new testUser();
        // perpare
        $usercrud = new testusercrud();
        $PageModel = new testpagemodel($testsession);
        $user = new UserModel($PageModel, $usercrud);
        // run
        $result = $user -> GetUser();
        // validate
        $this -> assertnotnull($result);
        $this -> assertSame(NULL, $result[0]);
    }
    public function testUpdateUser(){
        // perpare
        $usercrud = new testusercrud();
        $usercrud->objToReturn = new testUser(3,"usertest");
        $PageModel = new testpagemodel();
        $user = new UserModel($PageModel, $usercrud);
        // run
        $user -> UpdateUser(3,"usertest");
        $result = $usercrud -> UpdateUser();
        // validate
        $this -> assertnotnull($result);
        $this -> assertSame(3, $result -> user["id"]);
        $this -> assertSame("usertest", $result -> user["name"]);
    }
    public function testAuthorizeUserByUserId(){
        // perpare
        $usercrud = new testusercrud();
        $usercrud->objToReturn = new testUser(16,'',"wachtwoord");
        $PageModel = new testpagemodel();
        $user = new UserModel($PageModel, $usercrud);
        // run
        $user -> AuthorizeUserByUserId(16,'',"wachtwoord");
        $result = $usercrud -> readUserByUserId();
        // validate
        $this -> assertnotnull($result);
        $this -> assertSame(16, $result -> user["id"]);
        $this -> assertSame("wachtwoord", $result -> user["password"]);
    }
    public function testAuthorizeUserByEmail(){
        // perpare
        $usercrud = new testusercrud();
        $usercrud->objToReturn = new testUser(21,'','',"test@gmail.com");
        $PageModel = new testpagemodel();
        $user = new UserModel($PageModel, $usercrud);
        // run
        $user -> AuthorizeUserByEmail(21,'','',"test@gmail.com");
        $result = $usercrud -> readUserByEmail();
        // validate
        $this -> assertnotnull($result);
        $this -> assertSame(21, $result -> user["id"]);
        $this -> assertSame("test@gmail.com", $result -> user["email"]);
    }
    public function testAuthorizeUserWhenEmpty(){
        // perpare
        $usercrud = new testusercrud();
        $usercrud->objToReturn = new testUser();
        $testuser = new testUser();
        $PageModel = new testpagemodel();
        $user = new UserModel($PageModel, $usercrud);
        // run
        $result = $user -> AuthorizeUser('','test');
        // validate
        $this -> assertnotnull($result);
        $this -> assertSame(-1, $result["result"]);
    }
    public function testAuthorizeUserWhenWrong(){
        // perpare
        $usercrud = new testusercrud();
        $usercrud->objToReturn = new testUser();
        $testuser = new testUser();
        $PageModel = new testpagemodel();
        $user = new UserModel($PageModel, $usercrud);
        // run
        $result = $user -> AuthorizeUser($testuser,'test');
        // validate
        $this -> assertnotnull($result);
        $this -> assertSame(-2, $result["result"]);
    }
    public function testAuthorizeUserWhenRight(){
        // perpare
        $usercrud = new testusercrud();
        $usercrud->objToReturn = new testUser();
        $testuser = array("password" => 'test');
        $PageModel = new testpagemodel();
        $user = new UserModel($PageModel, $usercrud);
        // run
        $result = $user -> AuthorizeUser($testuser,'test');
        // validate
        $this -> assertnotnull($result);
        $this -> assertSame(0, $result["result"]);
    }
    public function testauthenticateUser(){
        // perpare
        $usercrud = new testusercrud();
        $usercrud->objToReturn = new testUser(21,'','',"test@gmail.com");
        $PageModel = new testpagemodel();
        $user = new UserModel($PageModel, $usercrud);
        // run
        $user -> authenticateUser(21,'','',"test@gmail.com");
        $result = $usercrud -> readUserByEmail();
        // validate
        $this -> assertnotnull($result);
        $this -> assertSame(21, $result -> user["id"]);
        $this -> assertSame("test@gmail.com", $result -> user["email"]);
    }
    public function testLoginUser(){
        $testsession = new testsessionManager();
        $testsession->arrayToReturn = new testUser();
        // perpare
        $usercrud = new testusercrud();
        $PageModel = new testpagemodel($testsession);
        $user = new UserModel($PageModel, $usercrud);
        // run
        $user -> LoginUser();
        $result = $testsession -> LogInUserSession();
        // validate
        $this -> assertnotnull($result);
    }
    public function testLogoutUser(){
        $testsession = new testsessionManager();
        $testsession->arrayToReturn = new testUser();
        // perpare
        $usercrud = new testusercrud();
        $PageModel = new testpagemodel($testsession);
        $user = new UserModel($PageModel, $usercrud);
        // run
        $user -> LogoutUser();
        $result = $testsession -> LogoutUserSession();
        // validate
        $this -> assertnotnull($result);
    }
}