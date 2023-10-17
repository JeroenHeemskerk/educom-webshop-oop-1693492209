<?php 
include_once 'models/shop-model-class';
include_once 'unittests/testshopcrud.php';
include_once 'unittests/testpagemodel.php';
include_once 'unittests/testProduct.php';
include_once 'unittests/testProducts.php';
include_once 'unittests/testOrder.php';
include_once 'unittests/testCart.php';
include_once 'unittests/testsessionManager.php';

use PHPUnit\Framework\TestCase;

class shopmodeltest extends TestCase {
    public function testinvalidateProduct(){
        //prepare
        $shopcrud = new testshopcrud();
        $PageModel = new testpagemodel();
        $shop = new ShopModel($PageModel, $shopcrud);
        // run
        $shop -> validateProduct();
        // validate
        $this -> assertnotnull($shop -> name);
        $this -> assertSame('', $shop -> name);
    }
    public function testvalidateProduct(){
        //prepare POST
        $_POST = array("name" => "product");
        //prepare
        $shopcrud = new testshopcrud();
        $shopcrud->objToReturn = new testProduct();
        $PageModel = new testpagemodel();
        $shop = new ShopModel($PageModel, $shopcrud);
        // run
        $shop -> validateProduct();
        // validate
        $this -> assertnotnull($shop -> name);
        $this -> assertSame('product', $shop -> name);
    }
    public function testGetAllProducts(){
        // perpare
        $shopcrud = new testshopcrud();
        $shopcrud->arrayToReturn = new testProducts();
        $PageModel = new testpagemodel();
        $shop = new ShopModel($PageModel, $shopcrud);
        // run
        $result = $shop -> GetAllProducts();
        // validate
        $this -> assertnotnull($result);
        $this->assertSame('product_1', $result -> name[0]);
        $this->assertSame('product_2', $result -> name[1]);
        // validate shopcrud
        $this -> assertSame(array('readAllProducts'), $shopcrud -> sqlQueries);
    }
    public function testProductId(){
        // perpare
        $shopcrud = new testshopcrud();
        $shopcrud->objToReturn = new testProduct(1);
        $PageModel = new testpagemodel();
        $shop = new ShopModel($PageModel, $shopcrud);
        // run
        $result = $shop -> GetProductById(1);
        // validate
        $this -> assertnotnull($result);
        $this->assertSame('product_1', $result -> name);
        // validate shopcrud
        $this -> assertSame(array('readProductByProductId'), $shopcrud -> sqlQueries);
    }
    public function testTop5Products(){
        // perpare
        $shopcrud = new testshopcrud();
        $shopcrud->arrayToReturn = new testProducts();
        $PageModel = new testpagemodel();
        $shop = new ShopModel($PageModel, $shopcrud);
        // run
        $result = $shop -> GetTop5Products();
        // validate
        $this -> assertnotnull($result);
        $this->assertSame('product_1', $result -> name[0]);
        $this->assertSame('product_2', $result -> name[1]);
        // validate shopcrud
        $this -> assertSame(array('readTop5Products'), $shopcrud -> sqlQueries);
    }
    public function testSaveorder(){
        // perpare
        $shopcrud = new testshopcrud();
        $shopcrud->objToReturn = new testOrder(3,5);
        $PageModel = new testpagemodel();
        $shop = new ShopModel($PageModel, $shopcrud);
        // run
        $shop -> SaveOrder(3,5);
        $result = $shopcrud -> CreateOrder();
        // validate
        $this -> assertnotnull($result);
        $this -> assertSame(3, $result -> userid);
        $this -> assertSame(5, $result -> productid);
    }
    public function testRequestcart(){
        //prepare session
        $testsession = new testsessionManager();
        $testsession->arrayToReturn = new testCart();
        //prepare shop
        $shopcrud = new testshopcrud();
        $PageModel = new testpagemodel($testsession);
        $shop = new ShopModel($PageModel, $shopcrud);
        //run
        $result = $shop -> requestCart();
        //validate
        $this -> assertnotnull($result);
        $this -> assertSame(1, $result -> cart["id"]);
        $this -> assertSame("cart", $result -> cart["name"]);
    }
    public function testHandleActionAddToCart(){
        //prepare POST
        $_POST = array("action" => "AddProductToCart", "productid" => 1);
        //prepare session
        $testsession = new testsessionManager();
        $testsession->arrayToReturn = new testCart();
        //prepare shop
        $shopcrud = new testshopcrud();
        $PageModel = new testpagemodel($testsession);
        $shop = new ShopModel($PageModel, $shopcrud);
        //run
        $shop -> handleActions();
        $result = $testsession -> AddProductToCart();
        $this -> assertnotnull($result);
        $this -> assertSame("cart", $result -> cart["name"]);
    }
    public function testHandleActionRemoveFromCart(){
        //prepare POST
        $_POST = array("action" => "RemoveProductFromCart", "productid" => 1);
        //prepare session
        $testsession = new testsessionManager();
        $testsession->arrayToReturn = new testCart();
        //prepare shop
        $shopcrud = new testshopcrud();
        $PageModel = new testpagemodel($testsession);
        $shop = new ShopModel($PageModel, $shopcrud);
        //run
        $shop -> handleActions();
        $result = $testsession -> RemoveProductFromCart();
        $this -> assertnotnull($result);
    }
    // public function testProductAddToDB(){
    //     //prepare session
    //     $testsession = new testsessionManager();
    //     $testsession->arrayToReturn = new testProducts();
    //     //prepare shop
    //     $shopcrud = new testshopcrud();
    //     $PageModel = new testpagemodel($testsession);
    //     $shop = new ShopModel($PageModel, $shopcrud);
    //     //run
    //     $result = $shop -> AddProductToDatabase();
    //     $this -> assertnotnull($result);
    // }
}