<?php
namespace Parser;
/**
 * Neural Network Node
 * @author Oleksandr Shynkariuk oleksandr.shynkariuk@gmail.com
 */

class Node {
    private $_id;
    /*
     * a dictionary of states and their probabilities
     * */
    private $_statesMap;

    public function __construct($id, $statesMap){
        $this->_id = $id;
        $this->_statesMap = $statesMap;
    }

    public function setId($id){
        $this->_id = $id;
    }

    public function getId(){
        return $this->_id;
    }

    public function setStatesMap($statesMap)
    {
        $this->_statesMap = $statesMap;
    }

    public function getStatesMap()
    {
        return $this->_statesMap;
    }


}