<?php
include_once "../src/parser/SMILE_Network.php";
include_once "../src/parser/Node.php";

/**
 * Created by JetBrains PhpStorm.
 * User: oleksandr
 * Date: 11/9/13
 * Time: 2:08 PM
 * To change this template use File | Settings | File Templates.
 */

class Test extends PHPUnit_Framework_TestCase {

    public function testOpen(){
        $network = new SMILE_Network();
        $network->parseFromFile("../samples/net_beta1.xdsl");
    }
}
