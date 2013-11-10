<?php
/*
 * TODO: add class description here
 * @author Oleksandr Shynkariuk oleksandr.shynkariuk@gmail.com
 */


class SMILE_Network {
    private $_nodes = array();

    public function parseFromFile($filename){
        $xml = simplexml_load_file($filename);
        /** @var SimpleXMLElement $nodes*/
        foreach($xml->children() as $nodes){
            if($nodes->getName() == "nodes"){//parse 'nodes'
                /**@var SimpleXMLElement $cpt*/
                foreach($nodes->children() as $cpt){
                    /**@var SimpleXMLElement $child*/
                    $id = $cpt->attributes()->id;
                    $statesMap = array();
                    $states = array();
                    $probabilities = array();
                    $parents = array();
                    foreach($cpt->children() as $child){
                        if($child->getName() == "state"){
                            foreach($child->attributes() as $state){
                                $states[] = $state;
                            }
                        } else if($child->getName() == "probabilities"){
                            $probabilities = explode(" ", $child);
                        } else if($child->getName() == "parents"){
                            $parents = explode(" ", $child);
                        }
                    }
                    $i = 0;
                    foreach($states as $st){
                        $statesMap[(string)$st] = $probabilities[$i];
                        ++$i;
                    }
                    $node = new Node($id, $statesMap);
                    $node->addAllParents($parents, $this);
                    //array_push($this->_nodes, $node);
                    $this->_nodes[(string)$id] = $node;

                }
            }//and skip 'extensions'
        }
        var_dump($this->_nodes);

    }

    public function getNodeByName($name){
        if(empty($this->_nodes))
            return null;
        else {
            //echo "!PName: " . $name . "\n";
            //var_dump($this->_nodes);
            return $this->_nodes[(string)$name];
        }
    }
}