<?php
include_once "../src/parser/SMILE_Network.php";
include_once "../src/parser/Node.php";

/**
 * Simple test case
 * @author Oleksandr Shynkariuk oleksandr.shynkariuk@gmail.com
 */
class Test extends PHPUnit_Framework_TestCase {

    public function testOpen(){
        $network = new SMILE_Network();
        $network->parseFromFile("../samples/net_beta1.xdsl");
        var_dump($network->getNodes());
    }
}
