<?php
class Responsibility {
    private $_id;
    private $_name;

    public function getName() {
        return $this->_name;
    }

    public function __construct($id){
        $this->_id = $id;
    }

    public function Load($conn){

        if($conn == null){ return false;}
        if($this->_id == null){ return false;}

        $query = "CALL sp_getResponsibility($this->_id);";
        $result = mysqli_query($conn, $query);

        if(!$result) {return false;}

        $row = mysqli_fetch_array($result);
        $this->_name = $row["Name"];
        return true;
    }

    public function toHtml(){
        return "<li>".$this->getName()."</li>";
    }
}
?>