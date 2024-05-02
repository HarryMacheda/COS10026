<?php
class JobSkill {
    private $_skill;
    private $_isEssential;
    private $_ListOrder;

    public function __construct($skillId, $isEssential){
        $skill = new Skill($skillId);
        if($skill->Load(Settings::SQLConnection())){
            $this->_skill = $skill;
        }
        $this->_isEssential = $isEssential;
    }

    public function toHtml(){
        return "<li>".$this->_skill->getName()."</li>";
    }
}
?>