<?php

require_once(getcwd().'/settings.php');
require_once("JobApplication.php");


function ManagerQueriesResults() {
    $doGet = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $command = (isset($_POST["command"]) ?  $_POST["command"] : "null");
        if ($command == "null"){
            $command = GetCommandIfNUll();
        }

        if($command == "UpdateStatus") {
            ManagerUpdateStatus();
            $command = $_POST["hidUpdatePreviousCommand"];
            if ($command == ""){
                $doGet = true;
            }
        }

        echo "<input id=\"hidPrevCommand\" name=\"hidPrevCommand\" type=\"text\" value=\"$command\" hidden>";

        switch ($command) {
            case "submit":
                ManagerSearchResults();
                break;
            case "Delete for this job reference":
                ManagerDeleteForReference();
                break;
            default:
                $doGet = true;
                break;
        }

    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' || $doGet){
        echo "<input id=\"hidPrevCommand\" name=\"hidPrevCommand\" type=\"text\" value=\"\" hidden>";


        //get all applicants
        $query = "CALL sp_getApplicants(1);";
        $result = mysqli_query(Settings::SQLConnection(),$query);

        if(mysqli_num_rows($result) == 0) {
            echo "<p>No Results were returned for your query</p>";
        }
        else {
            CreateResultTable();
            while($row = mysqli_fetch_array($result)) {
                ApplicantInfoRowHtml($row);
                $query = "CALL sp_getApplicationsForApplicant(".$row["Id"].",\"\")";
                $result2 = mysqli_query(Settings::SQLConnection(),$query);
                while($row2 = mysqli_fetch_array($result2)) {
                    $job = new JobApplication($row2["JobListingId"]);
                    $job->Load(Settings::SQLConnection());
                    ApplicationRowHtml($row["Id"],$row2, $job->_title);
                }
    
    
            }   
            echo "</table>";
        }

    }
}

function CreateResultTable() {
    //Create the table headers
    echo " <table id=\"managerResultTable\" class=\"theme-dark table\">"
    ."<tr>"
    .   "<th>Job Title</th>"
    .   "<th>Status</th>"
    .   "<th>Applied Date</th>"
    .   "<th></th>"
    ."</tr>";
}

function ApplicantInfoRowHtml($row)
{
    echo "<tr>"
    ."<td colspan=\"4\">".$row["FirstName"]." ".$row["LastName"]."</td>"
    ."</tr>";
}

function ApplicationRowHtml($applicant,$row, $JobTitle)
{
    echo "<tr>"
    ."<td>$JobTitle</td>"
    ."<td>". StatusToText($row["Status"])."</td>"
    ."<td>".$row["ApplicationDate"]."</td>";

    if($row["Status"]  == 0) { //If we are waiting confirmation dont show the buttons
        echo "<td></td>";
    }
    else
    {
        echo "<td>"
        ."<button class=\"theme-dark submit\" onclick=\"Populatehiddenfields(".$row["Id"].",3)\">Approve</button>"
        ."&nbsp;"
        ."<button class=\"theme-dark submit\" onclick=\"Populatehiddenfields(".$row["Id"].",2)\">Reject</button>"
        ."</td>";
    }
    echo "</tr>";
}

function StatusToText($status)
{
    switch ($status) {
        case 0:
            return "Pending Confirmation";
        case 1:
            return "Confirmed";
        case 2:
            return "Rejected";
        case 3:
            return "Approved";
        default:
            return "Unknown Status";
    }
}


function ManagerSearchResults() {
    //Search based on the results
    $applicant = $_POST["applicant"];
    $search = $_POST["search"];
    $reference = $_POST["reference"];


    //get all applicants based on the search results
        //get all applicants
        $query = "CALL sp_getApplicantsFromSearch($applicant,\"$search\",\"$reference\");";
        $result = mysqli_query(Settings::SQLConnection(),$query);

        if(mysqli_num_rows($result) == 0) {
            echo "<p>No Results were returned for your query</p>";
        }
        else {
            CreateResultTable();
            while($row = mysqli_fetch_array($result)) {
                ApplicantInfoRowHtml($row);
                $query = "CALL sp_getApplicationsForApplicant(".$row["Id"].",\"$reference\")";
                $result2 = mysqli_query(Settings::SQLConnection(),$query);
                while($row2 = mysqli_fetch_array($result2)) {
                    $job = new JobApplication($row2["JobListingId"]);
                    $job->Load(Settings::SQLConnection());
                    ApplicationRowHtml($row["Id"],$row2, $job->_title);
                }
    
    
            }   
            echo "</table>";
        }

}

function ManagerDeleteForReference() {
    $reference = $_POST["reference"];
    $query = "CALL sp_deleteApplicationsForReference(\"$reference\");";
    $result = mysqli_query(Settings::SQLConnection(),$query);
}

function ManagerUpdateStatus() {
    $applicantionId = $_POST["hidUpdateApplicationId"];
    $status = $_POST["hidUpdateStatus"];


    $query = "CALL sp_updateJobApplication($applicantionId,\"\",$status);";
    $result = mysqli_query(Settings::SQLConnection(),$query);
}


function GetCommandIfNUll()
{
    if(isset($_POST["hidUpdateStatus"]) == 1){
        return "UpdateStatus";
    }
    
    return "";
}

?>