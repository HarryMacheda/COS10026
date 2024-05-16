<?php
    require_once("settings.php");
    require_once(dirname(__FILE__)."/PHP/ApplicantEmail.php");

    session_start();

    //Get applicant details
    $firstname = $_POST["firstname"];
    $lastname = $_POST["surname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $suburb = $_POST["suburb"];
    $state = $_POST["state"];
    $postcode = $_POST["postcode"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $otherSkills = $_POST["otherskills"];


    $applicantID = 0;
    //create applicant or get them if the exist
    $conn = Settings::SQLConnection();
    $query = "CALL sp_createApplicant("
        ."\"$firstname\","
        ."\"$lastname\","
        ."\"$dob\","
        ."\"$gender\","
        ."\"$address\","
        ."\"$suburb\","
        ."\"$state\","
        ."\"$postcode\","
        ."\"$email\","
        ."\"$phone\","
        ."\"$otherSkills\","
        ."@applicantID);";



    $result = mysqli_query($conn, $query);
    mysqli_next_result($conn);
    $query = "SELECT @applicantID as ApplicantId";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);
    $applicantID = $row["ApplicantId"];

    $conn->close();
    if ($applicantID == 0) { echo "ERROR: Applicant was not created";}
    else {
        //Add applicant to job listing
        $reference = $_POST["reference"];
        $query = "SELECT Id From JobListing WHERE Reference = \"$reference\"";

        $conn = Settings::SQLConnection();
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $listingId = $row["Id"];
        $conn->close();

        $uuid = uniqid();

        if (!$listingId) {echo "ERROR: Could not find job listing for reference: $reference";}
        else {
        $query = "CALL sp_createJobApplication("
        ."0,'"
        .$uuid."',"
        ."$applicantID,"
        ."$listingId,"
        ."'".date("Y-m-d h:i:s")."'"
        .");";
        echo $query;
        $conn = Settings::SQLConnection();
        $result = mysqli_query($conn, $query);
        $conn->close();
        }

        //Add applicants skills (even if we dont have a valid listing)
        $skills = $_POST["skills"];
        foreach( $skills as $skill ) {
            $query = "CALL sp_AddSkillsApplicant($applicantID,$skill)";
            $conn = Settings::SQLConnection();
            $result = mysqli_query($conn, $query);
            $conn->close();
        }

        ApplicantEmail($applicantID, $listingId, $uuid);
    }


?>