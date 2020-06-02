<?php


class PremiumMember extends Member
{
private $_inDoorInterests;
private $_outDoorInterests;

//getters
public function getIndoor(){
    return $this->_inDoorInterests;
}
public function getOutdoor(){
    return $this->_outDoorInterests;
}

//setters
public function setIndoor($indoor){
    $this->_inDoorInterests=$indoor;
}

public function setOutdoor($outdoor){
    $this->_outDoorInterests=$outdoor;
}

}