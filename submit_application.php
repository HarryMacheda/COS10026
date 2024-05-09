<?php
    require_once("settings.php");



    mail(
        'harrymacheda@outlook.com',
        "Scam",
        "Hello"
    );

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



    echo $query;
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

        if (!$listingId) {echo "ERROR: Could not find job listing for reference: $reference";}
        else {
        $query = "CALL sp_createJobApplication("
        ."0,"
        ."$applicantID,"
        ."$listingId,"
        ."'".date("Y-m-d h:i:s")."'"
        .");";
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
    }


?>