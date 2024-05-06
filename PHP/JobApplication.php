<?php

require_once("JobSkills.php");
require_once("Responsibility.php");

class JobApplication {
    private static $_id;
    private static $_title;
    private static $_reference;
    private static $_description;
    private static $_salaryLow;
    private static $_salaryHigh;

    private static $_responsibilities;
    private static $_skills;

    private static $_essential;
    private static $_nonEssential;

    public function __construct($id) {
        $this->_id = $id;
    }

    public function Load($conn) {
        if($conn == null){ return false;}
        if($this->_id == null){ return false;}

        $query = "CALL sp_getListingInfo($this->_id)";

        $result = mysqli_multi_query($conn, $query);

        if(!$result) {return false;}

        $result = mysqli_store_result($conn);
        $row = mysqli_fetch_assoc($result);
        $this->_title = $row["Title"];
        $this->_reference = $row["Reference"];
        $this->_description = $row["Description"];
        $this->_salaryLow = $row["SalaryLow"];
        $this->_salaryHigh = $row["SalaryHigh"];

        mysqli_free_result($result);

        //responsibilities
        mysqli_next_result($conn);
        $result = mysqli_store_result($conn);
        $this->_responsibilities = array();
        while($row = mysqli_fetch_assoc($result)) {
            $tempresponse = new Responsibility($row["Id"]);
            $conn2 = Settings::SQLConnection();
            if ($tempresponse->Load($conn2))
            {
                array_push($this->_responsibilities, $tempresponse);
            }
        }

        mysqli_free_result($result);

        //skills
        mysqli_next_result($conn);
        $result = mysqli_store_result($conn);
        $this->_essential = array();
        $this->_nonEssential = array();
        while($row = mysqli_fetch_assoc($result)) {
            $tempSkill = new JobSkill($row["SkillId"], $row["IsEssential"], $conn);
            if($tempSkill->isEssential())
            {
                array_push($this->_essential, $tempSkill);
            }
            else 
            {
                array_push($this->_nonEssential, $tempSkill);
            }
        }
    }

    public function ToHtml() {
        $ret = "";
        $ret.="<section class=\"glasspane jobsbox\" id=\"".$this->_reference."\">"
        ."<h2 class=\"theme-dark heading\">".$this->_title."</h2>"
        ."<p class=\"theme-dark paragraph\">Position reference: <a class=\"theme-dark link\" href=\"./apply.php?ref=".$this->_reference."\">".$this->_reference."</a></p>"
        ."<h3 class=\"theme-dark heading\">Position Description</h3>"
        ."<p class=\"theme-dark paragraph\">".$this->_description."</p>"
        ."<h3 class=\"theme-dark heading\">Position Salary</h3>"
        ."<p class=\"theme-dark paragraph\">$".$this->_salaryLow." - $".$this->_salaryHigh."</p>";

        $ret.= "<h3 class=\"theme-dark heading\">Key Responsibilities</h3>"
        ."<ol class=\"theme-dark paragraph\">";
        
        foreach ($this->_responsibilities as $x) {
            $ret.=$x->ToHtml();
        }

        $ret.= "</ol>";


        $ret.= "<h3 class=\"theme-dark heading\">Required Skills</h3>";

        if(count($this->_essential) > 0){
            $ret.= "<h4 class=\"theme-dark heading\">Essential</h4>"
            ."<ul class=\"theme-dark paragraph\">";
            foreach ($this->_essential as $x) {
                $ret.=$x->ToHtml();
            }
            $ret.= "</ul>";
        }

        if(count($this->_nonEssential) > 0){
            $ret.= "<h4 class=\"theme-dark heading\">Essential</h4>"
            ."<ul class=\"theme-dark paragraph\">";
            foreach ($this->_nonEssential as $x) {
                $ret.=$x->ToHtml();
            }
            $ret.= "</ul>";
        }

        $ret.= "</section>";

        return $ret;
    }
}
?>