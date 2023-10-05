<?php 
use PHPUnit\Framework\TestCase;

class shopmodeltest extends TestCase {
public function testPrepWebShop() {
    $crud= new testshopcrud(); 
    $crud->arrayToReturn = array(1 => $this->createTestProduct(1), 
    3 => $this->createTestProduct(3) );
}
function createTestProduct($id) {
    return new TestProduct($id, "Test".$id, "A Test product", $id,  1.01, "testimage.jpg");
}
}