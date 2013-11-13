<?php
namespace Parser;
/*
 * TODO: add class description here
 * @author Oleksandr Shynkariuk oleksandr.shynkariuk@gmail.com
 */


class HiddenLayerNode extends Node {
    private $_parents;

    public function __construct($id, $statesMap){
        parent::__construct($id, $statesMap);
        $this->_parents = array();
    }

    public function addParent($parent){
        $this->_parents[] = $parent;
    }

    /*
     * @var $parents Array
     * @var $network SMILE_Network
     * */
    public function addAllParents($parents, $network)
    {
        foreach ($parents as $parentName) {
            $parentObj = $network->getNodeByName($parentName);
            if ($parentObj)
                $this->addParent($parentObj);
        }
    }

    public function getParents(){
        return $this->_parents;
    }

    /**
     * @var $probabilities Array
     * generate a table with probabilities for every combination of states of the parents
     */
    public function generateDefinitionTable($probabilities){
        echo "Probs Size: " . count($probabilities) . "\t";
        echo "Parents Size: " . count($this->_parents) . "\n";
        $rows = count(parent::getStatesMap());
        echo "States Map: " . count(parent::getStatesMap()) . "\n";
    }
}