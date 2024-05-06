<?php
require_once("Skill.php");

class JobSkill {
    private $_skill;
    private $_isEssential;

    public function isEssential() {
        return $this->_isEssential;
    }
    public function __construct($skillId, $isEssential, $conn){
        $this->_skill = new Skill($skillId);
        $conn2 = Settings::SQLConnection();
        $this->_skill->Load($conn2);
        $this->_isEssential = $isEssential;
    }

    public function toHtml(){
        return "<li>".$this->_skill->getName()."</li>";
    }
}
?>