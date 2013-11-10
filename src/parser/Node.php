<?php
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
    private $_parents;

    public function __construct($id, $statesMap){
        $this->_id = $id;
        $this->_statesMap = $statesMap;
        $this->_parents = array();
    }

    public function setId($id){
        $this->_id = $id;
    }

    public function getId($id){
        return $this->_id;
    }

    public function addParent($parent){
        $this->_parents[] = $parent;
    }

    /**@var $parents Array
     * @var $network SMILE_Network*/
    public function addAllParents($parents, $network){
        if(is_array($parents) && count($parents) > 0){
            foreach($parents as $parentName){
                $parentObj = $network->getNodeByName($parentName);
                if($parentObj)
                    $this->addParent($parentObj);
            }
        }
    }

    public function getParents(){
        return $this->_parents;
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