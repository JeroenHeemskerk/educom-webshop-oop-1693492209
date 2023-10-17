<?php
require_once("./ArrayUtil.php");
use PHPUnit\Framework\TestCase;

class ArrayUtilsTests extends TestCase
{
    public function testCreateRange_PositiveStartEnd()
    {
        // prepare
        $arrayUtil = new ArrayUtil();

        // run
        $result = $arrayUtil->createRange(3, 7);

        // validate 
        $this->assertNotNull($result);
        $this->assertSame(5, count($result));
        $this->assertSame([ 3, 4, 5, 6, 7 ], $result);
    }
}