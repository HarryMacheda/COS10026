<?php
class JobApplication {
    private static $_id;
    private static $_title;
    private static $_reference;
    private static $_description;
    private static $_salaryLow;
    private static $_salaryHigh;

    private static $_skills;

    public function __construct($id) {
        $this->_id = $id;
    }

    public function Load($conn) {
        if($conn == null){ return false;}
        if($this->_id == null){ return false;}

        $query = "CALL sp_getListingInfo($this->_id)";

        $result = mysqli_query($conn, $query);

        if(!$result) {return false;}

        $row = mysqli_fetch_array($result);
        $this->_title = $row["Title"];
        $this->_reference = $row["Reference"];
        $this->_description = $row["Description"];
        $this->_salaryLow = $row["SalaryLow"];
        $this->_salaryHigh = $row["SalaryHigh"];

        mysqli_next_result($conn);
        //responsibilities
        mysqli_next_result($conn);
        $this->_skills = array();
        while($row = mysqli_fetch_array($result)) {
            $tempSkill = new JobSkill($row["SkillId"], $row["IsEssential"]);
            array_push($this->_skills, $tempSkill);
        }
    }

    public function ToHtml() {
        $ret = "";
        $ret.="<h1>".$this->_title."</h1>"
            ."<h2>".$this->_reference."</h2>"
            ."<p>".$this->_description."</p>"
            ."<p> Salary range $".$this->_salaryLow." - $".$this->_salaryHigh."</p>";
        $ret.=count($this->_skills);
        foreach ($this->_skills as $x) {
            echo "hello";
            $ret.="hello".$x->ToHtml();
        }

        return $ret;
    }
}
?>