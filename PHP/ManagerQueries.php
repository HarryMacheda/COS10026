<?php

require_once(getcwd().'/settings.php');
require_once("JobApplication.php");


function ManagerQueriesResults() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        switch ($_POST["command"]) {
            case "submit":
                ManagerSearchResults();
                break;
            case "Delete for this job reference":
                ManagerDeleteForReference();
                break;
        }

    }
    else {
        //Create a table with for all the results
        CreateResultTable();
        //get all applicants
        $query = "CALL sp_getApplicants(1);";
        $result = mysqli_query(Settings::SQLConnection(),$query);

        while($row = mysqli_fetch_array($result)) {
            ApplicantInfoRowHtml($row);
            $query = "CALL sp_getApplicationsForApplicant(".$row["Id"].",'')";
            $result2 = mysqli_query(Settings::SQLConnection(),$query);
            while($row2 = mysqli_fetch_array($result2)) {
                $job = new JobApplication($row2["JobListingId"]);
                $job->Load(Settings::SQLConnection());
                ApplicationRowHtml($row2, $job->_title);
            }


        }



        echo "</table>";

    }
}

function CreateResultTable() {
    //Create the table headers
    echo " <table id=\"managerResultTable\" class=\"theme-dark table\">"
    ."<tr>"
    .   "<th>Job Title</th>"
    .   "<th>Status</th>"
    .   "<th>Applied Date</th>"
    ."</tr>";
}

function ApplicantInfoRowHtml($row)
{
    echo "<tr>"
    ."<td colspan=\"3\">".$row["FirstName"]." ".$row["LastName"]."</td>"
    ."</tr>";
}

function ApplicationRowHtml($row, $JobTitle)
{
    echo "<tr>"
    ."<td>$JobTitle</td>"
    ."<td>". StatusToText($row["Status"])."</td>"
    ."<td>".$row["ApplicationDate"]."</td>"
    ."</tr>";
}

function StatusToText($status)
{
    switch ($status) {
        case 0:
            return "Pending Confirmation";
        case 1:
            return "Confirmed";
        case 3:
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
    CreateResultTable();
        //get all applicants
        $query = "CALL sp_getApplicantsFromSearch($applicant,\"$search\",\"$reference\");";
        $result = mysqli_query(Settings::SQLConnection(),$query);

        while($row = mysqli_fetch_array($result)) {
            ApplicantInfoRowHtml($row);
            $query = "CALL sp_getApplicationsForApplicant(".$row["Id"].",\"$reference\")";
            $result2 = mysqli_query(Settings::SQLConnection(),$query);
            while($row2 = mysqli_fetch_array($result2)) {
                $job = new JobApplication($row2["JobListingId"]);
                $job->Load(Settings::SQLConnection());
                ApplicationRowHtml($row2, $job->_title);
            }


        }



        echo "</table>";
}

function ManagerDeleteForReference() {
    $reference = $_POST["reference"];
    $query = "CALL sp_deleteApplicationsForReference(\"$reference\");";
    $result = mysqli_query(Settings::SQLConnection(),$query);
}

?>